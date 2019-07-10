<?php

namespace App\Http\Controllers;

use App\Account;
use App\Autosave;
use App\Fixedlock;
use App\Payment;

use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class FixedController extends Controller
{
    //

    public function showFixedLock()
    {




        $this_month = date('m-y',time());



        $data['total_month_saving'] = Payment::select('amount')
                ->where("unique_id",Auth::user()->unique_id)
                ->where("date",$this_month)
                ->where("trans_type","FIXED")
                ->where("status","success")->sum('amount') / 100;



        $data['withdrawals'] = Payment::select('amount')
                ->where("unique_id",Auth::user()->unique_id)
                ->where("date",$this_month)
                ->where("trans_type","Withdrawal")
                ->where("status","success")->sum('amount') / 100;

        $data['failed'] = Payment::select('amount')
            ->where("unique_id",Auth::user()->unique_id)
            ->where("date",$this_month)
            ->where("status","failed")->get();

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

        $data['balance'] = Fixedlock::where("unique_id",Auth::user()->unique_id)
            ->first();


        $data['autorisation'] = Auth::user()->authorization_code;

        $data['autosave'] = Autosave::where("unique_id",Auth::user()->unique_id)->first();



        return view('fixed.dashboard',$data);
    }



    public function creditFixed(Request $request)
    {

        //  dd("I got here");exit;

        $validatedData = $request->validate([
            'amount' => 'required|integer',
            'duration' => 'required|integer',
        ]);



        $reference = $this->randomId(15);
        $new_payment = new Payment();

        $new_payment->init_time = time();

        $new_payment->trans_id =$this->randomId(7);
        $new_payment->reference =$reference;
        $new_payment->unique_id = Auth::user()->unique_id;
        $new_payment->amount = $request->post("amount") * 100;
        $new_payment->status = "pending";
        $new_payment->product = "FL";
        $new_payment->trans_type = "Credit";
        $new_payment->init_time = time();
        $new_payment->date =  date('m-y',time());

        $new_payment->save();

        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://api.paystack.co/transaction/charge_authorization",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => json_encode([
                'amount'=> $request->post("amount") * 100,
                'email'=>Auth::user()->email,
                'authorization_code'=>Auth::user()->authorization_code,
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

            return Redirect::route("showSavingsGoals")->with("message", "An error625w32 occurred")
                ->with("type", 'danger');
        }



        $paymentDetails = json_decode($response);

        if($paymentDetails->status){


            $payment = Payment::where('reference',$paymentDetails->data->reference)->first();

            //dd($paymentDetails);

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



            if($paymentDetails->data->status =="success" && $paymentDetails->status ==true) {

                $balance = Fixedlock::where("unique_id",Auth::user()->unique_id)->first();

                if(!empty($balance)){

                    //  dd("I have an account");
                    $balance->amount  = (int)$balance->amount + ((int) $paymentDetails->data->amount / 100);
                    $balance->save();
                    echo "Your Payment was Successfully";

                }else{

                    $current = Carbon::now();

                    $balance = new Fixedlock();
                    $balance->amount =  $paymentDetails->data->amount;
                    $balance->duration =  $request->duration;
                    $balance->unix_time =  time();
                    $balance->due_date =  $current->addMonths($request->duration);
                    $balance->unique_id =  Auth::user()->unique_id;
                    $balance -> save();


                    return Redirect::route("showFixedLock")->with("message", "Your Savings was successfully locked")
                        ->with("type", 'success');


                }




                return Redirect::route("showFixedLock")->with("message", "Your Payment was Successfully")->with("type", 'success');

            }else{

            }




        }else{
            return Redirect::route("showDashboard")->with("message","An error occured with your transaction, please try again later")->with("type",'danger');

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

}
