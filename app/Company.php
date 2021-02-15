<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $fillable = [
        'name',
        'state',
        'cnpj'
    ];
    

    public function customers()
    {
        return $this->hasMany('App\Customer');
    }
}
