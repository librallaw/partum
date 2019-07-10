<?php

namespace App\Http\Controllers;

use App\Target;
use Illuminate\Http\Request;
use App\Autosave;
use App\Account;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Symfony\Component\Console\Input\Input;
use App\Payment;
use App\Transaction;
use App\User;


class AutosaveController extends Controller
{
    //


	public function doAutoSave(Request $request){


		$validate = $request->validate([

			'amount' => 'required|integer',
			'type' =>'required'

			]);

		$usersave = Autosave::where("unique_id",Auth::user()->unique_id)->first();

		//check if user already has an autosave set
		if(empty($usersave)){

			$Save = new Autosave();
			$Save->unique_id = Auth::user()->unique_id;
			$Save->type = $request->post("type");
			$Save->amount = $request->post("amount");
			$Save->time =time();
			$Save->save();

            return Redirect::route('showDashboard')->with("message",'Auto Save successfully created')->with("type",'success');

        }else{

            $usersave -> type = $request->post("type");
            $usersave->unique_id = Auth::user()->unique_id;
            $usersave->amount = $request->post("amount");
            $usersave->time =time();
            $usersave -> save();

            return Redirect::route('showDashboard')->with("message",'Auto Save successfully updated')->with("type",'success');

        }


	}



    public function doAutoSaveOff(Request $request){


        $usersave = Autosave::where("unique_id",Auth::user()->unique_id)->first();

        //check if user already has an autosave set
        if(empty($usersave)){

            Autosave::where("unique_id",Auth::user()->unique_id)->delete();
            return Redirect::route('showDashboard')->with("message",'Auto Save successfully created')->with("type",'success');

        }else{

            return Redirect::route('showDashboard')->with("message",'Auto Save not set for this account')->with("type",'success');

        }


    }



	public function random_num($size) {
            $alpha_key = '';
            $keys = range('A', 'Z');

            for ($i = 0; $i < 2; $i++) {
                $alpha_key .= $keys[array_rand($keys)];
            }

            $length = $size - 2;

            $key = '';
            $keys = range(0, 9);

            for ($i = 0; $i < $length; $i++) {
                $key .= $keys[array_rand($keys)];
            }

            return $alpha_key . $key;
        }



        public function randomId($num){

            $id = $this->random_num($num);

            $validator = \Validator::make(['unique_id'=>$id],['id'=>'unique:payments,reference']);

            if($validator->fails()){
                return $this->randomId($num);
            }

            return $id;
        }


    public function daily(){

    		$billings = Autosave::where("type","daily")->get();

       // dd($billings);

        $x = 0;
    		if(count($billings) > 0){

    			foreach ($billings as $billing) {
    				# code...


          
    			$userdata =  User::where("unique_id",$billing->unique_id)->first();



            $reference = $this->randomId(15);
            $new_payment = new Payment();

            $new_payment->init_time = time();
            $new_payment->trans_id =$this->randomId(7);
            $new_payment->reference =$reference;
            $new_payment->unique_id = $billing->unique_id;
            $new_payment->amount = $billing->amount * 100;
            $new_payment->status = "pending";
            $new_payment->trans_type = "Auto save Credit";
            $new_payment->init_time = time();
            $new_payment->date =  date('m-y',time());

            $new_payment->save();

            $curl = curl_init();

            curl_setopt_array($curl, array(
                CURLOPT_URL => "https://api.paystack.co/transaction/charge_authorization",
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_CUSTOMREQUEST => "POST",
                CURLOPT_POSTFIELDS => json_encode([
                    'amount'=> $billing->amount * 100,
                    'email'=>$userdata->email,
                    'authorization_code'=>$userdata->authorization_code,
                    "reference" => $reference
                ]),

                CURLOPT_HTTPHEADER => [
                    "authorization: Bearer ".getenv('PAYSTACK_SECRET_KEY'),
                    "content-type: application/json",
                    "cache-control: no-cache"
                ],
            ));

            $response = curl_exec($curl);
            $err = curl_error($curl);



            if($err){
                // there was an error contacting the Paystack API
                /*  return Redirect::route("loadPayment",['id'=>$request->post('movie_id'),'slug'=>$deta->slug])->with('message',"An error occurred while trying to process your transaction, Please try again Later")->with('type','danger')->with('reference','danger');*/

                echo 'Curl returned error: ' . $err;
            }



            $paymentDetails = json_decode($response);

           // dd($paymentDetails);


            $payment = Payment::where('reference',$paymentDetails->data->reference)->first();

            // dd($paymentDetails);

            //Update transaction table with new details
            $payment->amount = $paymentDetails->data->amount;
            $payment->currency = $paymentDetails->data->currency;
            $payment->transaction_date = $paymentDetails->data->transaction_date;
            $payment->status = $paymentDetails->data->status;
            $payment->reference = $paymentDetails->data->reference;
            $payment->gateway_response = $paymentDetails->data->gateway_response;
            $payment->ip_address = $paymentDetails->data->ip_address;
            $payment->complete_time = time();

            $payment->authorization_code = $paymentDetails->data->authorization->authorization_code;
            $payment->bin = $paymentDetails->data->authorization->bin;
            $payment->last4 = $paymentDetails->data->authorization->last4;
            $payment->exp_month = $paymentDetails->data->authorization->exp_month;
            $payment->exp_year = $paymentDetails->data->authorization->exp_year;
            $payment->channel = $paymentDetails->data->authorization->channel;
            $payment->card_type = $paymentDetails->data->authorization->card_type;
            $payment->bank = $paymentDetails->data->authorization->bank;
            $payment->country_code = $paymentDetails->data->authorization->country_code;
            $payment->brand = $paymentDetails->data->authorization->brand;
            $payment->reusable = $paymentDetails->data->authorization->reusable;
            $payment->signature = $paymentDetails->data->authorization->signature;
            $payment->date = date('m-y',time());

            $payment->save();



            if($paymentDetails->data->status =="success" && $paymentDetails->status ==true){


                $balance = Account::where("unique_id",$payment->unique_id)->first();

                //check if user has a balance
                if(!empty($balance)){

                    //  dd("I have an account");
                    $balance->balance  = $balance->balance + $paymentDetails->data->amount;
                    $balance->save();
                }else{

                    //dd("I have not account");
                    //insert fresh if user does not have an account balance
                    $balance = new Account();
                    $balance->unique_id  = $payment->unique_id;
                    $balance->balance  = $balance->balance + $paymentDetails->data->amount;
                    $balance->save();

                }

                $transaction =  new Transaction();
                $transaction->type = "Credit";
                $transaction->amount = $paymentDetails->data->amount;
                $transaction->reference = $paymentDetails->data->reference;
                $transaction->unique_id = $payment->unique_id;
                $transaction->save();


              echo "Your Payment was Successfully";
                //return Redirect::route("showDashboard")->with("message","Your Payment was Successfully")->with("type",'success');


            }else{

            	 echo "An error occured with your transaction, please try again later";
              

            }
    			$x++;


    			}

    			echo $x."Number saved";




    		}else{
    			die("no data available for dailt");
    		}
    }


    public function loadAutosave()
    {


        $this_month = date('m-y',time());


        $data['total_month_saving'] = Payment::select('amount')
                ->where("unique_id",Auth::user()->unique_id)
                ->where("date",$this_month)
                ->where("gateway_response","Successful")->sum('amount') / 100;

        $data['withdrawals'] = Payment::select('amount')
                ->where("unique_id",Auth::user()->unique_id)
                ->where("date",$this_month)
                ->where("type","debit")
                ->where("gateway_response","Successful")->sum('amount') / 100;

        $data['failed'] = Payment::select('amount')
            ->where("unique_id",Auth::user()->unique_id)
            ->where("date",$this_month)
            ->where("gateway_response","!=","Successful")->get();

        $data['pending'] = Payment::select('amount')
            ->where("unique_id",Auth::user()->unique_id)
            ->where("date",$this_month)
            ->where("status","pending")->get();

        $data['daily_savings'] = Payment::select('amount')
            ->where("unique_id",Auth::user()->unique_id)
            ->where("gateway_response","Successful")->get();

        $data['transactions'] = Payment::where("unique_id",Auth::user()->unique_id)
            ->orderBY('id','desc')
            ->first();

        $data['balance'] = Account::where("unique_id",Auth::user()->unique_id)
            ->first();


        $data['autorisation'] = Auth::user()->authorization_code;

        $data['autosave'] = Autosave::where("unique_id",Auth::user()->unique_id)->first();





        return view("user.autosave",$data);
    }





    public function daily_target(){

        $billings = Target::where("type","daily")->get();

        // dd($billings);

        $x = 0;
        if(count($billings) > 0){

            foreach ($billings as $billing) {
                # code...

                $userdata =  User::where("unique_id",$billing->unique_id)->first();

                $reference = $this->randomId(15);

                $new_payment = new Payment();

                $new_payment->module_id = $billing->module_id;
                $new_payment->init_time = time();
                $new_payment->trans_id = $this->randomId(7);
                $new_payment->reference = $reference;
                $new_payment->unique_id = $billing->unique_id;
                $new_payment->amount = $billing->quota * 100;
                $new_payment->status = "pending";
                $new_payment->trans_type = "Target Savings";
                $new_payment->init_time = time();
                $new_payment->date =  date('m-y',time());

                $new_payment->save();

                $curl = curl_init();

                curl_setopt_array($curl, array(
                    CURLOPT_URL => "https://api.paystack.co/transaction/charge_authorization",
                    CURLOPT_RETURNTRANSFER => true,
                    CURLOPT_CUSTOMREQUEST => "POST",
                    CURLOPT_POSTFIELDS => json_encode([
                        'amount'=> $new_payment->amount,
                        'email'=>$userdata->email,
                        'authorization_code'=>$userdata->authorization_code,
                        "reference" => $reference
                    ]),

                    CURLOPT_HTTPHEADER => [
                        "authorization: Bearer ".getenv('PAYSTACK_SECRET_KEY'),
                        "content-type: application/json",
                        "cache-control: no-cache"
                    ],
                ));

                $response = curl_exec($curl);
                $err = curl_error($curl);



                if($err){
                    // there was an error contacting the Paystack API
                    /*  return Redirect::route("loadPayment",['id'=>$request->post('movie_id'),'slug'=>$deta->slug])->with('message',"An error occurred while trying to process your transaction, Please try again Later")->with('type','danger')->with('reference','danger');*/

                    echo 'Curl returned error: ' . $err;
                }



                $paymentDetails = json_decode($response);

                //dd($paymentDetails);


                $payment = Payment::where('reference',$paymentDetails->data->reference)->first();



                //Update transaction table with new details
                $payment->amount = $paymentDetails->data->amount;
                $payment->currency = $paymentDetails->data->currency;
                $payment->transaction_date = $paymentDetails->data->transaction_date;
                $payment->status = $paymentDetails->data->status;
                $payment->reference = $paymentDetails->data->reference;
                $payment->gateway_response = $paymentDetails->data->gateway_response;
                $payment->ip_address = $paymentDetails->data->ip_address;
                $payment->complete_time = time();

                $payment->authorization_code = $paymentDetails->data->authorization->authorization_code;
                $payment->bin = $paymentDetails->data->authorization->bin;
                $payment->last4 = $paymentDetails->data->authorization->last4;
                $payment->exp_month = $paymentDetails->data->authorization->exp_month;
                $payment->exp_year = $paymentDetails->data->authorization->exp_year;
                $payment->channel = $paymentDetails->data->authorization->channel;
                $payment->card_type = $paymentDetails->data->authorization->card_type;
                $payment->bank = $paymentDetails->data->authorization->bank;
                $payment->country_code = $paymentDetails->data->authorization->country_code;
                $payment->brand = $paymentDetails->data->authorization->brand;
                $payment->reusable = $paymentDetails->data->authorization->reusable;
                $payment->signature = $paymentDetails->data->authorization->signature;
                $payment->date = date('m-y',time());

                $payment->save();


                if($paymentDetails->data->status =="success" && $paymentDetails->status ==true){

                    $balance = Target::where("module_id",$billing->module_id)->first();

                    //check if user has a balance
                    if(!empty($balance)){



                        //  dd("I have an account");
                        $balance->redeemed  = (int)$balance->redeemed + ((int) $paymentDetails->data->amount / 100);
                        $balance->save();
                        echo "Your Payment was Successfully";

                    }else{

                        echo "An error ocurred-error 24rty Payme";

                    }


                    //return Redirect::route("showDashboard")->with("message","Your Payment was Successfully")->with("type",'success');

                }else{

                    echo "An error occured with your transaction, please try again later";


                }
                $x++;


            }

            echo $x."Number saved";




        }else{
            die("no data available for daily");
        }
    }


}
