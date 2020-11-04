<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Voyageur extends Model
{
    protected $fillable = [  'nomeV', 'prenomeV' ,'dateNV' ,'lieuNV' ,'documentV','numeroV','dateDV','dateEV' ,'dateEV', 'adressV' ,'emailV' ,'mobileV'];
}
