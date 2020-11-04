<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Demande extends Model
{
    protected $fillable = [
        'nationalite', 'payeV','typeVisa' ,'dateA','status' ,'NomV' ,'nomA','cause'
    ];


    public function voyageur()
    {
        return $this->belongsto('App\Voyageur',"NomV","id")->get();
    }

    public function file()
    {
        return $this->belongsto('App\file_upload',"id","visaDemand")->get();
    }

    public function agence()
    {
        return $this->belongsto('App\agence',"nomA","id")->get();
    }

    public function visa()
    {
        return $this->belongsto('App\visa',"typeVisa","id")->get();
    }
}
