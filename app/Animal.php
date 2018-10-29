<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Animal extends Model
{
	/**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
		'tipo', 'nombre', 'anio_nacimiento', 'estatus', 'procedencia', 'descripcion', 'vacunas', 'owner_id', 'organization_id'
	];
    
    /**
     * Get the organization that registered the animal.
     */
    public function organization()
    {
        return $this->belongsTo('App\Organization');
    }

    /**
     * Get the owner that owns the animal.
     */
    public function owner()
    {
        return $this->belongsTo('App\Organization');
    }
}
