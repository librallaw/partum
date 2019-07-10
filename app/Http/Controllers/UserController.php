<?php

namespace App\Http\Controllers;

use App\Account;
use App\Autosave;
use App\Banks;
use App\Fixedlock;
use App\Kidsexpress;
use App\Payment;
use App\Target;
use App\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;

class UserController extends Controller
{
    //



    public function showDashboard()
    {





        $this_month = date('m-y',time());




        $data['balance'] = Account::where("unique_id",Auth::user()->unique_id)
            ->first();


        $data['autorisation'] = Auth::user()->authorization_code;

        $data['autosave'] = Autosave::where("unique_id",Auth::user()->unique_id)->first();

        $data['fixedlock'] = Fixedlock::where("unique_id",Auth::user()->unique_id)
            ->first();

        $data['transactions'] = Payment::where("unique_id",Auth::user()->unique_id)->orderBy("id","desc")->take(10)
            ->get();

        $data['targets']  = Target::where("unique_id",Auth::user()->unique_id)->get();
        $data['kids']  = Kidsexpress::where("unique_id",Auth::user()->unique_id)->get();





        //dd($data['transactions']);

        /*if(isset(Auth::user()->account->balance)){
            $data['balance'] = Auth::user()->account->balance;
        }else{
            $data['balance'] =null;
        }*/

       


        /*        $data['monthly_saving'] = Payment::where("unique_id",Auth::user()->unique_id)
            ->where("gateway_response","Successful")->get();
        */

        return view("user.dashboard3",$data);
    }


    public function showProfile()
    {
        $this_month = date('m-y',time());

        $data['total_month_saving'] = Payment::select('amount')
                ->where("unique_id",Auth::user()->unique_id)
                ->where("date",$this_month)
                ->where("gateway_response","Successful")->sum('amount') / 100;

        $data['withdrawals'] = Payment::select('amount')
                ->where("unique_id",Auth::user()->unique_id)
                ->where("date",$this_month)
                ->where("trans_type","debit")
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

        $data['bank'] = Banks::where("unique_id",Auth::user()->unique_id)
            ->first();






        return view("user.profile",$data);
    }


    public function doChangePassword(Request $request)
    {

        $this->validate($request, [

            'current-password' => 'required',
            'password' => 'required|same:password',
            'password_confirmation' => 'required|same:password',

        ]);


        $current_password = Auth::User()->password;
        if(Hash::check($request->post('current-password'), $current_password))
        {
            Auth::User()->password = Hash::make($request->post('password'));
            Auth::User()->save();

            $message = "Profile Pic updated successfully";
            $type = "success";
        }
        else
        {
            $message = "Please enter correct current password";
            $type = "danger";

            //return response()->json(array('error' => $error), 400);
        }



        return back()->with('message',$message)->with("type",$type);



    }


    public function postCredentials(Request $request)
    {
        if(Auth::Check())
        {
            $request_data = $request->All();
            $validator = $this->admin_credential_rules($request_data);
            if($validator->fails())
            {
                return response()->json(array('error' => $validator->getMessageBag()->toArray()), 400);
            }
            else
            {
                $current_password = Auth::User()->password;
                if(Hash::check($request_data['current-password'], $current_password))
                {
                    $user_id = Auth::User()->id;
                    $obj_user = User::find($user_id);
                    $obj_user->password = Hash::make($request_data['password']);;
                    $obj_user->save();
                    return "ok";
                }
                else
                {
                    $error = array('current-password' => 'Please enter correct current password');
                    return response()->json(array('error' => $error), 400);
                }
            }
        }
        else
        {
            return redirect()->to('/');
        }
    }


    public function doEditProfile(Request $request)
    {
        $validate =  $validatedData = $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'phone' => 'required',
        ]);



        Auth::user()->first_name = $request->post("first_name");
        Auth::user()->last_name = $request->post("last_name");
        Auth::user()->phone = $request->post("phone");

        Auth::user()->save();

        return Redirect::route("showProfile")
            ->with("message","Profile update successfully")
            ->with("type","success");
    }


    public function doUploadPic(Request $request)

    {

        $this->validate($request, [

            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',

        ]);


        $image = $request->file('image');

        $imagename = md5(Auth::user()->email.time()).'.'.$image->getClientOriginalExtension();

        //dd($imagename);

        $destinationPath = "./user_res";

        if($image->move($destinationPath, $imagename)){


            Auth::user()->profile_pic = "/user_res/".$imagename;
            Auth::user()->save();

            $message = "Profile Pic updated successfully";
            $type = "success";

            return back()->with('message',$message)->with("type",$type);

        }else{

            $message = "An error occured while updating your profile pic, please try again alater";
            $type = "danger";

            return back()->with('message',$message)->with("type",$type);


        }



    }


    public function doAddBank(Request $request)
    {

        $validatedData = $request->validate([
            'bank_name' => 'required',
            'account_number' => 'required',
        ]);


        $formdata = explode("+", $request->post("bank_name"));
        $bank_code = $formdata[0];
        $bank_name = $formdata[1];




        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://api.paystack.co/transferrecipient",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => json_encode([
                'type'=>'nuban',
                'description'=>'Zombier',
                'account_number'=> $request->post("account_number"),
                'bank_code'=> $bank_code,
                'name'=>Auth::user()->full_name()."-".Auth::user()->email,

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




        if($err){
            // there was an error contacting the Paystack API
            /*  return Redirect::route("loadPayment",['id'=>$request->post('movie_id'),'slug'=>$deta->slug])->with('message',"An error occurred while trying to process your transaction, Please try again Later")->with('type','danger')->with('reference','danger');*/
            return redirect()->route("showProfile")
                ->with("message",'An error occured while we were adding your Bank account')
                ->with("type","danger");

            //echo 'Curl returned error: ' . $err;
        }


       // dd($response);

        if($response->status){
            $userbank = Banks::where("unique_id",Auth::user()->unique_id)->first();

            if(empty($userbank)){
                $bank = new Banks();
                $bank->unique_id = Auth::user()->unique_id;
                $bank->acc_number = $response->data->details->account_number;
                $bank->bank_name = $response->data->details->bank_name;
                $bank->bank_code = $response->data->details->bank_code;
                $bank->recipient_code = $response->data->recipient_code;
                $bank->save();
            }else{

                $userbank->unique_id = Auth::user()->unique_id;
                $userbank->acc_number = $response->data->details->account_number;
                $userbank->bank_name = $response->data->details->bank_name;
                $userbank->bank_code = $response->data->details->bank_code;
                $userbank->recipient_code = $response->data->recipient_code;
                $userbank->save();
            }




            return redirect()->route("showProfile")
                ->with("message",'Bank details update successfully')
                ->with("type","success");




        }else{

            return redirect()->route("showProfile")
                ->with("message",$response->message)
                ->with("type","danger");
        }




    }


    
}
