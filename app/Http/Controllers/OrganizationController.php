<?php

namespace App\Http\Controllers;

use App\Organization;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Validator;

class OrganizationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return $this->sendResponse(Organization::all()->toArray());
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
            'rif'         => ['required', 'numeric'],
            'nombre'      => ['required', 'string', 'max:255'],
            'direccion'   => ['required', 'string'],
            'descripcion' => ['required', 'string'],
            'email'       => ['required', 'string', 'email', 'max:255', 'unique:organizations'],
            'password'    => ['required', 'string', 'min:6', 'confirmed'],
        ]);

        if($validator->fails()){
            return $this->sendError('Error de Validación.', $validator->errors(), 400);
        }

        $input["password"]  = Hash::make($input["password"]);
        $input["api_token"] = str_random(60);

        $organization = Organization::create($input);

        return $this->sendResponse($organization->toArray(), 'Organización creada exitosamente.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Organization  $organization
     * @return \Illuminate\Http\Response
     */
    public function show(Organization $organization)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Organization  $organization
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Organization $organization)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Organization  $organization
     * @return \Illuminate\Http\Response
     */
    public function destroy(Organization $organization)
    {
        $organization->delete();
        return $this->sendResponse([], 'Organización Eliminada exitosamente.');
    }

    public function login(Request $request)
    {
        $input = $request->only(['username', 'password']);

        $organization = Organization::where('email', $input['username'])->first();

        if(!$organization)
            $organization = Organization::where('rif', $input['username'])->first();

        if ($organization && Hash::check($input['password'], $organization->password)){
            return $this->sendResponse([
                "nombre"    => $organization->nombre,
                "api_token" => $organization->api_token,
            ]);
        }

        return $this->sendError('Error de Login.', ['error' => "credenciales incorrectas"], 400);       
    }
}
