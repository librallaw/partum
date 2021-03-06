<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    //

    protected $table="accounts";

    public function getDateFormat()
    {
        return "Y-m-d H:i:s.u";
    }
    public function user()
    {
        return $this->belongsTo('App\User','unique_id','unique_id');
    }
}
