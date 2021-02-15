<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $fillable = [
        'company',
        'name',
        'document',
        'birth_date',
        'phone',
        'cel_phone',
        'email'
        
    ];

    public function companies()
    {
        return $this->belongsTo('App\Company', 'company');
    }
}
