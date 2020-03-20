<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Autosave extends Model
{
    //
    
    protected $table ="autosave";

    public function getDateFormat()
    {
        return "Y-m-d H:i:s.u";
    }
     public function user()
    {
        return $this->belongsTo('App\User','unique_id','unique_id');
    }
    
}
