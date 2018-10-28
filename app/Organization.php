<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Organization extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
    	'rif', 'nombre', 'direccion', 'descripcion', 'email', 'password', 'api_token'
	];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
    ];
}
