<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Demande extends Model
{
    public $guarded = [
        'id',
    ];

    public $rules = [
        'intitule' => 'required|string',
        'temps' => 'required|integer',
        'prix' => 'required|float',
        'latitude' => 'required|double',
        'longitude' => 'required|double',
        'user_id' => 'exists:users,id|required'
    ];

    public $table = 'demande';
}
