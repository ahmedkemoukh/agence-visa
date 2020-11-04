<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class agence extends Model
{
    protected $fillable = [
        'user', 'nome', 'addresse' ,'email1', 'ville', 'codPosta', 'mobile1', 'telephone','sold'
    ];


    public function user()
    {
        return $this->belongsto('App\User','user')->get();
    }
}
