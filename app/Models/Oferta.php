<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
//use User;

class Oferta extends Model
{

        protected $fillable = [
        'user_id', 'cantidad', 'moneda', 'accion', 'dolarInter', 'dolarCambio', 'resultado', 'comentario'
    ];
    
    
    public function user()
    {
        return $this->belongsTo('App\User');
    }

}
