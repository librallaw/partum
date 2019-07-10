<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name','last_name','email', 'password','unique_id','setup'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];


    public function full_name()
    {
        return ucfirst(strtolower($this->first_name))." ".ucfirst(strtolower($this->last_name));
    }

    public function account()
    {
        return $this->hasOne('App\Account','unique_id','unique_id');
    }

    public function transactions()
    {
        return $this->hasMany('App\Payment','unique_id','unique_id');
    }

    public function autosave()
    {
        return $this->hasOne('App\autosave','unique_id','unique_id');
    }

    public function bank()
    {
        return $this->hasOne('App\Banks','unique_id','unique_id');

    }

}
