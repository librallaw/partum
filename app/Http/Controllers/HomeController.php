<?php

namespace App\Http\Controllers;

use App\Banks;
use App\Contact;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use Mailgun\Mailgun;
use PhpParser\Comment;
use Symfony\Component\Console\Input\Input;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */

    public function logout()
    {
        Auth::logout();
        return redirect("/login");
    }
    public function index()
    {
        return view('home');
    }
    
    public function setup()
    {
        return view("setup");
    }

    public function addbank()
    {
        return view("addbank");
    }

    public function randomId(){

        $id = str_random(10);

        $validator = \Validator::make(['id'=>$id],['id'=>'unique:table,col']);

        if($validator->fails()){
            return $this->randomId();
        }

        return $id;
    }

    public function doAddBank(Request $request)
    {
        $validatedData = $request->validate([
            'bank_name' => 'required',
            'bank_account' => 'required',
        ]);


        $bank  = new Banks([
            'bank_code'=>$request->post("bank_name"),
            'acc_number'=>$request->post("bank_account"),
            'unique_id'=>Auth::user()->unique_id]
        );

        if($bank->save()){
            $user = Auth::user();
            $user->setup = 1;
            $user->save();




            return redirect()->route("showFirstPayment")
                ->with("message",'Bank account successfully added')
                ->with("type","success");

        }

        else{


           return redirect()->route("addbank")
                ->with("message",'An error occured while adding your Bank account')
                ->with("type","danger");
        }



    }

    public function showFirstPayment()
    {
        return view("first_payment");
    }


    public function doFirstPayments()
    {

    }


    public function showFaq()
    {
        return view("home.faq");
    }



}
