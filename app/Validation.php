<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Validation extends Model
{
    public $guarded = [
        'id',
    ];

    public $rules = [
    	'demande_id' => 'integer',
    	'jobeur_id' => 'integer',
    	'status' => 'integer'
    ];

    public $table = 'validation'; 

}
