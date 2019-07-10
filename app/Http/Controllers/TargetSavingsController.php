<?php

namespace App\Http\Controllers;



use App\Payment;
use App\Target;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class TargetSavingsController extends Controller
{
    //
    public function showSavingsGoals()
    {

        $data['goals']  = Target::where("unique_id",Auth::user()->unique_id)->get();
        return view("target.targets",$data);
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


    public function createTarget()
    {

       return view("target.create");
    }


    public function creditTarget(Request $request)
    {

        //  dd("I got here");exit;

        $validatedData = $request->validate([
            'amount' => 'required|integer',
        ]);

        //check if form field was not tempered with
        $module_id = $request->post("mdlid");
        if(empty($module_id)){
            return Redirect::route("showSavingsGoals")->with("message", "An error212 occurred, please try again")->with
            ("type", 'danger'); exit;

        }

        //check if module exists in the table
        $check_module = Target::where("module_id",$module_id)->first();

        if(count($check_module) < 1){
            return Redirect::route("showSavingsGoals")->with("message", "An error493 occurred, please try again")->with
            ("type", 'danger'); exit;
        }


        if(Auth::user()->unique_id != $check_module->unique_id){
            return Redirect::route("showSavingsGoals")->with("message", "An error923 occurred, please try again")->with
            ("type", 'danger'); exit;
        }





        $reference = $this->randomId(15);
        $new_payment = new Payment();

        $new_payment->init_time = time();
        $new_payment->module_id = $module_id;

        $new_payment->trans_id =$this->randomId(7);
        $new_payment->reference =$reference;
        $new_payment->unique_id = Auth::user()->unique_id;
        $new_payment->amount = $request->post("amount") * 100;
        $new_payment->status = "pending";
        $new_payment->product = "TS";
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

                $balance = Target::where("module_id",$module_id)->first();
                if(!empty($balance)){

                    //  dd("I have an account");
                    $balance->redeemed  = (int)$balance->redeemed + ((int) $paymentDetails->data->amount / 100);
                    $balance->save();
                    echo "Your Payment was Successfully";

                }else{

                    return Redirect::route("showSavingsGoals")->with("message", "An error986 occurred")
                        ->with("type", 'danger');


                }




                return Redirect::route("showSavingsGoals")->with("message", "Your Payment was Successfully")->with("type", 'success');

            }else{

            }




        }else{
            return Redirect::route("showDashboard")->with("message","An error occured with your transaction, please try again later")->with("type",'danger');

        }

    }


    public function DoaddTarget(Request $request)
    {
        $validate =  $validatedData = $request->validate([
            'title' => 'required',
            'amount' => 'required',
            'duration' => 'required',
            'type' => 'required',
            'quota' => 'required',
        ]);

        $newTarget = new Target();


        if(!empty($request->file('image'))){

            $image = $request->file('image');

            $imagename = md5(Auth::user()->email.time()).'.'.$image->getClientOriginalExtension();

            //dd($imagename);
            $destinationPath = "./goals";

            if($image->move($destinationPath, $imagename)){

                $newTarget['image'] = "/goals/".$imagename;


            }
        }


        $newTarget -> unique_id = Auth::user()->unique_id;
        $newTarget -> title = $request->post('title');
        $newTarget -> amount = $request->post('amount');
        $newTarget -> duration = $request->post('duration');
        $newTarget -> type = $request->post('type');
        $newTarget -> quota = $request->post('quota');
        $newTarget -> module_id = md5(Auth::user()->email.time().Auth::user()->id);
        $newTarget -> status = 1;
        $newTarget->save();


        return Redirect::route("showSavingsGoals")
            ->with("message","Saving goal uploaded successfully  ")
            ->with("type","success");
    }


}
