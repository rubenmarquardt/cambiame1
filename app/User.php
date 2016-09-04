<?php

namespace App;


use Illuminate\Support\Facades\Cache;
use Carbon\Carbon;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','whatsapp', 'linkedinProfile'
    ];
    
    /** Relaciones **/
    
    public function ofertas() {
        return $this->hasMany('App\Oferta');
    }

    /*
    * Checkeo si el user esta aun online
    */

    public function isOnline()
    {
        return Cache::has('user-is-online-' . $this->id);
    }

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
}
