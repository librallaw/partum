<?php

namespace App\Http\Controllers;

use App\Payment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TransactionController extends Controller
{
    //

    public function showTransactions()
    {
        $data['transactions'] = Payment::where("unique_id",Auth::user()->unique_id)->orderBy("id","desc")->get();



        return view("transactions.transactions",$data);
    }
}
