<?php

namespace App\Http\Controllers;

use App\Animal;
use App\Organization;
use App\Owner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AnimalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $animals = Animal::all();
        return $this->sendResponse($animals->toArray());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         $input = $request->all();

        $validator = Validator::make($input, [
            'tipo'            => ['required', 'string', 'max:255', ] ,
            'nombre'          => ['required', 'string', 'max:255', ] ,
            'anio_nacimiento' => ['required', 'digits:4'],
            'estatus'         => ['required', 'string', 'max:255', ] ,
            'procedencia'     => ['required', 'string', 'max:255', ] ,
            'descripcion'     => ['required', 'string', 'max:255', ] ,
            'vacunas'         => ['required', 'string', 'max:255', ] ,
            'cedula'          => ['required', 'exists:owners,cedula'],
        ]);

        if($validator->fails()){
            return $this->sendError('Error de Validación.', $validator->errors());
        }

        $owner = Owner::where('cedula', $input['cedula'])->first();
        $organization = Organization::where('id', 1)->first();

        $input['owner_id'] = $owner->id;
        $input['organization_id'] = $organization->id;

        $animal = Animal::create($input);

        return $this->sendResponse($animal->toArray(), 'Animal creado exitosamente.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Animal  $animal
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $animal = Animal::where('id', $id)->first();
        
        if($animal)
            return $this->sendResponse($animal->toArray());

        return $this->sendError('Animal no Encontrado');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Animal  $animal
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Animal $animal)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Animal  $animal
     * @return \Illuminate\Http\Response
     */
    public function destroy(Animal $animal)
    {
        //
    }
}
