<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    //

    public function getDateFormat()
    {
        return "Y-m-d H:i:s.u";
    }
}
