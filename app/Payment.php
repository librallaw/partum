<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    //

    public function user()
    {
        return $this->belongsTo('App\User','unique_id','unique_id');
    }

    public function getDateFormat()
    {
        return "Y-m-d H:i:s.u";
    }
}
