<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DepositController extends Controller
{
    //
    public function showDeposit()
    {
        return view("transactions.deposit");
    }

}
