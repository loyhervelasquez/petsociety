<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Owner extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
    	'cedula', 'nombre', 'direccion'
	];

	/**
     * Get animals by the owner.
     */
    public function animals()
    {
        return $this->hasMany('App\Animal');
    }
}
