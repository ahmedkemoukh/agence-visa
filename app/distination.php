<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class distination extends Model
{
    protected $fillable = [
        'paye'
    ];


    public function evisa()
    {
        return $this->belongsto('App\visa',"paye","payev");
    }
}
