<?php

namespace App\Http\Controllers;

use App\Owner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class OwnerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
            'cedula'      => ['required', 'numeric', 'unique:owners'],
            'nombre'      => ['required', 'string', 'max:255'],
            'direccion'   => ['required', 'string'],
        ]);

        if($validator->fails()){
            return $this->sendError('Error de Validación.', $validator->errors());
        }

        $owner = Owner::create($input);

        return $this->sendResponse($owner->toArray(), 'Dueño creado exitosamente.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Owner  $owner
     * @return \Illuminate\Http\Response
     */
    public function show($cedula)
    {
        $owner = Owner::where('cedula', $cedula)->first();

        if ($owner)
            return $this->sendResponse($owner->toArray());

        return $this->sendError('Usuario no encontrado');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Owner  $owner
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Owner $owner)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Owner  $owner
     * @return \Illuminate\Http\Response
     */
    public function destroy(Owner $owner)
    {
        //
    }
}
