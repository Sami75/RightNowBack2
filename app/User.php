<?php

namespace App;

use Watson\Validating\ValidatingModel;
use App\Demande;

class User extends ValidatingModel
{
    public $guarded = [
        'id',
    ];

    public $rules = [
        'nom' => 'required|string',
        'prenom' => 'required|string',
        'mail' => 'required|string|email|unique:users',
        'adresse' => 'string',
        'cdp' => 'integer',
        'ville' => 'string',
        'sexe' => 'string',
        'telephone' => 'required|numeric',
        'password' => 'required|min:6',
    ];

    public $table = 'users';

    public function demande(): HasMany
    {
        return $this->hasMany(Demande::class);
    }

    public function validation(): HasMany
    {
        return $this->hasMany(Demande::class);
    }
}
