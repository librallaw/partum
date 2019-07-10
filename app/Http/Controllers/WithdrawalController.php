<?php

namespace App\Http\Controllers;

use App\Banks;
use App\Payment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Account;

class WithdrawalController extends Controller
{
    //

    public function showWithdrawal()
    {


        $this_month = date('m-y',time());

        $data['total_month_saving'] = Payment::select('amount')
                ->where("unique_id",Auth::user()->unique_id)
                ->where("date",$this_month)
                ->where("trans_type","Credit")
                ->orWhere("trans_type","AutoSave Credit")
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
        $data['balance'] = Account::where("unique_id",Auth::user()->unique_id)
            ->first();

        return view("transactions.withdrawal",$data);
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

    public function turnotpoff()
    {
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://api.paystack.co/transfer/disable_otp",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_HTTPHEADER => array(
                "authorization: Bearer sk_test_858bc6de2e4a4e4b138356234bcc15ac99a373d0",
                "cache-control: no-cache",
                "content-type: application/x-www-form-urlencoded",
            ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
            echo "cURL Error #:" . $err;
        } else {
            echo $response;
        }

        dd($response);
    }


    public function turnofffinal($otp)
    {
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://api.paystack.co/transfer/disable_otp_finalize",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => "------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"otp\"\r\n\r\n$otp\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW--",
            CURLOPT_HTTPHEADER => array(
                "authorization: Bearer sk_test_858bc6de2e4a4e4b138356234bcc15ac99a373d0",
                "cache-control: no-cache",
                "content-type: multipart/form-data; boundary=----WebKitFormBoundary7MA4YWxkTrZu0gW",
                "postman-token: 6c1031eb-8afa-d490-42ca-2b5be8cbed48"
            ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
            echo "cURL Error #:" . $err;
        } else {
            echo $response;
        }

        dd($response);
    }



    public function processWithdrawal(Request $request)
    {
        $bank = Banks::where("unique_id",Auth::user()->unique_id)->first();



        if(count($bank) < 1){
            return redirect()->back()->with("message","No bank account found, Go to my profile to add your bank details")->with("type","danger"); exit;

        }

        //withdrawal date

        //check user balance

        //check paystack balance

        $validate = $request->validate([
            'amount'=>'required'
        ]);




        $withdrawaldate = "21-jun-2018";

        $balance = Auth::user()->account->balance;

        $reference =md5(time().$this->randomId(15));



        if(($request->post("amount") * 100) > $balance){




            $new_payment1 = new Payment();

            $new_payment1->init_time = time();
            $new_payment1->trans_id =$this->randomId(7);
            $new_payment1->reference =$reference;
            $new_payment1->unique_id = Auth::user()->unique_id;
            $new_payment1->amount = $request->post("amount") * 100;
            $new_payment1->status = "failed";
            $new_payment1->trans_type = "Withdrawal";
            $new_payment1->init_time = time();
            $new_payment1->date =  date('m-y',time());

            $new_payment1->message = "Insufficient Funds";
            $new_payment1->save();

            return redirect()->back()->with("message","Insufficient Funds")->with("type","danger"); exit;
        }else{




            //Store the initial transaction details
            $reference2 =$this->randomId(15);
           // dd($reference);
            $new_payment = new Payment();

            $new_payment->init_time = time();
            $new_payment->trans_id =$this->randomId(7);
            $new_payment->reference =$reference;
            $new_payment->unique_id = Auth::user()->unique_id;
            $new_payment->amount = $request->post("amount") * 100;
            $new_payment->status = "pending";
            $new_payment->trans_type = "Withdrawal";
            $new_payment->init_time = time();
            $new_payment->date =  date('m-y',time());

            $new_payment->save();



            //SEND transfer to paystack
            $curl = curl_init();

            curl_setopt_array($curl, array(
                CURLOPT_URL => "https://api.paystack.co/transfer",
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_CUSTOMREQUEST => "POST",
                CURLOPT_POSTFIELDS => json_encode([
                    'source'=>'balance',
                    'reason'=>'Withdrawal',
                    'amount'=> $request->post("amount") * 100,
                    'recipient'=>Auth::user()->bank->recipient_code,
                    'reference'=>$reference

                ]),

                CURLOPT_HTTPHEADER => [
                    "authorization: Bearer ".getenv('PAYSTACK_SECRET_KEY'),
                    "content-type: application/json",
                    "cache-control: no-cache"
                ],
            ));



        $response = json_decode(curl_exec($curl));
        $err = curl_error($curl);



       // dd($response);


        if($response->status){

            //

           // dd($response);

            $new_payment = Payment::where('reference',$response->data->reference)->first();

            //fetch user account balance
            $balance = Account::where("unique_id", Auth::user()->unique_id)->first();

           // dd($balance);

            //check if user has a balance that is less than the withdrwal amount, kill the trasaction else, debit his account with us
            if ($balance->balance >= $response->data->amount) {

                //  dd("I have an account");
                $balance->balance = $balance->balance - $response->data->amount;
                $balance->save();
            } else {


                //dd("balance is".$balance->amount."while widraw is".$response->data->amount);


                // store failed transaction details
                $new_payment->complete_time = time();
                $new_payment->amount = $request->post("amount") * 100;
                $new_payment->currency = $response->data->currency;
                $new_payment->transfer_code = $response->data->transfer_code;
                $new_payment->status = $response->data->status;
                $new_payment->amount = $response->data->amount;
                $new_payment->message = "Balance is less than withdrawal bonus";
                $new_payment->date =  date('m-y',time());

                $new_payment->save();

                return redirect()->back()->with("message","An error occurred while processing your transaction, please try again later error0097")->with("type","danger"); exit;

            }



           /// dd($response);
            // dd("balance is".$balance->balance."while widraw is".$response->data->amount);

            //store successful transaction details
            $new_payment->complete_time = time();
            $new_payment->amount = $request->post("amount") * 100;
            $new_payment->currency = $response->data->currency;
            $new_payment->transfer_code = $response->data->transfer_code;
            $new_payment->status = $response->data->status;
            $new_payment->amount = $response->data->amount;
            $new_payment->message = $response->message;
            $new_payment->date =  date('m-y',time());

            $new_payment->save();
            return redirect()->back()->with("message","Request has been queued")->with("type","success"); exit;




        }else{

           dd($response);


            $payment = Payment::find($new_payment->id);
            $payment->complete_time = time();
            $payment->status = "failed";
            $payment->message = $response->message;
            $payment->date =  date('m-y',time());

            $payment->save();

            return redirect()->back()->with("message","An error occurred while processing your transaction, please try again  err0046")->with("type","danger"); exit;


        }



        }




    }
}
