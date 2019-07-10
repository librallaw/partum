<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Account;
use App\Autosave;
use App\Banks;
use App\Fixedlock;
use App\Payment;
use App\Transaction;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;

class InstantController extends Controller
{
    //

    public function showInstantSavings()
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


        $data['autorisation'] = Auth::user()->authorization_code;

        $data['autosave'] = Autosave::where("unique_id",Auth::user()->unique_id)->first();

        $data['fixedlock'] = Fixedlock::where("unique_id",Auth::user()->unique_id)
            ->first();




        //dd($data['transactions']);

        /*if(isset(Auth::user()->account->balance)){
            $data['balance'] = Auth::user()->account->balance;
        }else{
            $data['balance'] =null;
        }*/




        /*        $data['monthly_saving'] = Payment::where("unique_id",Auth::user()->unique_id)
            ->where("gateway_response","Successful")->get();
        */

        return view("user.dashboard2",$data);
    }
}
