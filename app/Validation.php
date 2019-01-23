<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Demande extends Model
{
    public $guarded = [
        'id',
    ];

    public $rules = [
    	'status' => 'integer'
    ];

    public $table = 'validation';

    public $with = [
        'user',
    ];    

}
