<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class visa extends Model
{
    protected $fillable = [
    'payev', 'typevisa', 'tarifv' ,'disponibilitev', 'remboursablev','tarifvn','date'
];
}
