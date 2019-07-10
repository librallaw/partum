<?php

namespace App\Http\Controllers;

    use App\Account;
    use App\Http\Controllers\Auth\RegisterController;
    use App\Payment;
    use App\Transaction;
    use App\User;
    use Illuminate\Http\Request;

    use App\Http\Requests;
    use Illuminate\Support\Facades\Auth;
    use Illuminate\Support\Facades\Redirect;
    use Paystack;
    use Unicodeveloper\Paystack\PaystackServiceProvider;


    class PaymentController extends Controller
    {



        /**
         * Redirect the User to Paystack Payment Page
         * @return Url
         */


        /*public function gateway(Request $request)
        {
           // dd("I got here");exit;
            $validatedData = $request->validate([
                'amount' => 'required',

            ]);



            $paystack  = new Paystack(getenv('PAYSTACK_SECRET_KEY'));



            $rand = new RegisterController();
            $reference = $rand->randomId(10);

            try
            {
                $tranx = $paystack->transaction->initialize([
                    'amount'=>$request->post('amount'),       // in kobo
                    'email'=>Auth::user()->email,         // unique to customers
                    'reference'=>$reference, // unique to transactions
                ]);

               // dd("I got here again");
            } catch(\Yabacon\Paystack\Exception\ApiException $e){
                print_r($e->getResponseObject());
                die($e->getMessage());
            }

            // store transaction reference so we can query in case user never comes back
            // perhaps due to network issue
           // save_last_transaction_reference($tranx->data->reference);

           // dd($tranx->data);
            $transaction =  new Payment();
            $transaction->unique_id = Auth::user()->unique_id;
            $transaction->reference = $reference;
            $transaction->status = 'pending';

            $transaction->save();


            // redirect to page so User can pay
            header('Location: ' . $tranx->data->authorization_url);








        }*/
        public function redirectToGateway(Request $request)
        {

            $validatedData = $request->validate([
                'amount' => 'required|integer',
            ]);

            $curl = curl_init();

            curl_setopt_array($curl, array(
                CURLOPT_URL => "https://api.paystack.co/transaction/initialize",
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_CUSTOMREQUEST => "POST",
                CURLOPT_POSTFIELDS => json_encode([
                    'amount'=> $request->post("amount") * 100,
                    'email'=>Auth::user()->email,
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

                die('Curl returned error: ' . $err);
            }



            $tranx = json_decode($response);

            //dd($tranx);

            if(!$tranx->status){
                // there was an error from the API
              /*  return Redirect::route("loadPayment",['id'=>$request->post('movie_id'),'slug'=>$deta->slug])->with('message',$tranx->message)->with('type','danger')->with('reference','danger');*/


                die("error from API");

            }

// store transaction reference so we can query in case user never comes back
// perhaps due to network issue

            $new_payment = new Payment();
            $new_payment->reference = $tranx->data->reference;
            $new_payment->unique_id = Auth::user()->unique_id;
            $new_payment->amount = $request->post("amount") * 100;
            $new_payment->status = "pending";
            $new_payment->trans_type = "Credit";
            $new_payment->product = "IS";
            $new_payment->init_time = time();
            $new_payment->date =  date('m-y',time());

            $new_payment->save();

            //save_last_transaction_reference($tranx->data->reference);

// redirect to page so User can pay



            // echo $tranx->data->authorization_url;exit;

            return Redirect::away($tranx->data->authorization_url);


           // return \Unicodeveloper\Paystack\Facades\Paystack::getAuthorizationUrl()->redirectNow();
        }

        /**
         * Obtain Paystack payment information
         * @return void
         */
        public function handleGatewayCallback(Request $request)
        {


          /*
            $paymentDetails = Paystack::getPaymentData();
            dd($paymentDetails);
            $payment = new Payment();
*/

            $paymentDetails = Paystack::getPaymentData();
           // dd($paymentDetails);








            $curl = curl_init();
            $reference = isset($_GET['reference']) ? $_GET['reference'] : '';
            if(!$reference){
//                return Redirect::route("showFirstPayment")->with("message",'An error occured, please contact support')->with("type",'danger');
//                exit;
               die('No reference supplied');
            }



            //Check if the reference exists in the database
            $reference2 = Payment::where('reference',$reference)->first();

            $route = "showDashboard";
           // dd("I got here");

            if(count($reference2) < 1){
             return Redirect::route($route)->with("message",'Invalid transaction')->with("type",'danger');
               // exit;

                die("Reference does not exist");

            }

            $customer = User::where("unique_id",$reference2->unique_id)->first();

           // dd($customer);

          
            //Check if value has already been given to the user
            if(!empty($reference2->gateway_response)){
              //  dd($reference2->status);
                return Redirect::route($route)->with("message",'Value already given for this transaction')->with("type",'danger');
                exit;
            }



            //send reference to paystack to verify
            curl_setopt_array($curl, array(
                CURLOPT_URL => "https://api.paystack.co/transaction/verify/".$reference,
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_HTTPHEADER => [
                    "accept: application/json",
                    "authorization: Bearer ".getenv('PAYSTACK_SECRET_KEY'),
                    "cache-control: no-cache"
                ],
            ));

            $response = curl_exec($curl);
            $err = curl_error($curl);

            //dd($response);

            if($err){


                return Redirect::route($route)->with("message",'Invalid transaction')->with("type",'danger');
                exit;
                // there was an error contacting the Paystack API
              die('Curl returned error: ' . $err);
            }

          //  dd("I am here1w2");exit;
            $tranx = json_decode($response);

            if(!$tranx->status){
                // there was an error from the API

                return Redirect::route($route)->with("message",$tranx->message)->with("type",'danger');
                //die('API returned error: ' . $tranx->message);
            }

          //  dd("I got here");
            if('success' == $tranx->data->status){



                // dd($tranx);
                $paymentDetails = json_decode($response);
               //dd($paymentDetails);

                $payment = Payment::where('reference',$paymentDetails->data->reference)->first();

                // dd($paymentDetails);



                //Update transaction table with new details
                $payment->trans_id = $paymentDetails->data->id;
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


                $user = User::where("unique_id",$payment->unique_id)->first();

                //check if user has authorization code, else update his authorization for recurrent billings
                if(empty($user->authorization_code)){

                    //dd($paymentDetails->data->authorization->authorization_code);
                    $user ->authorization_code = $paymentDetails->data->authorization->authorization_code;
                    $user->save();
                }



                //Update Account Balance
                //check if transaction returned a true
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
                }


                //Log in transaction history




                $user->setup = 2;
                $user->save();




               

                //dd($paymentDetails);


                return Redirect::route("showDashboard")->with("message","Your Payment was Successfully")->with("type",'success');


            }else{

                dd("Transaction was not successfull");
            }


            
            // Now you have the payment details,
            // you can store the authorization_code in your db to allow for recurrent subscriptions
            // you can then redirect or do whatever you want
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


        public function credit(Request $request)
        {

          //  dd("I got here");exit;
            
            $validatedData = $request->validate([
                'amount' => 'required|integer',
            ]);




            $reference = $this->randomId(15);
            $new_payment = new Payment();

            $new_payment->init_time = time();
            $new_payment->trans_id =$this->randomId(7);
            $new_payment->reference =$reference;
            $new_payment->unique_id = Auth::user()->unique_id;
            $new_payment->amount = $request->post("amount") * 100;
            $new_payment->status = "pending";
            $new_payment->product = "IS";
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

                die('Curl returned error: ' . $err);
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


                $balance = Account::where("unique_id", $payment->unique_id)->first();

                //check if user has a balance
                if (!empty($balance)) {

                    //  dd("I have an account");
                    $balance->balance = $balance->balance + $paymentDetails->data->amount;
                    $balance->save();
                } else {

                    //dd("I have not account");
                    //insert fresh if user does not have an account balance
                    $balance = new Account();
                    $balance->unique_id = $payment->unique_id;
                    $balance->balance = $balance->balance + $paymentDetails->data->amount;
                    $balance->save();

                }



                return Redirect::route("showInstantSavings")->with("message", "Your Payment was Successfully")->with("type", 'success');

            }else{

            }




            }else{
                return Redirect::route("showInstantSavings")->with("message","An error occured with your transaction, please try again later")->with("type",'danger');

            }

        }


    }


