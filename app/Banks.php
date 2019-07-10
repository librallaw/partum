<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Banks extends Model
{
    //



    protected $fillable = [
        'bank_code','acc_number','unique_id','bank_name','recipient_code'
    ];

    public function user()
    {
        return $this->belongsTo('App\User','unique_id','unique_id');
    }
}
