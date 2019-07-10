<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Autosave extends Model
{
    //
    
    protected $table ="autosave";

     public function user()
    {
        return $this->belongsTo('App\User','unique_id','unique_id');
    }
    
}
