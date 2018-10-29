<?php

namespace App\Http\Middleware;

use Closure;
use App\Organization;
use Illuminate\Support\Facades\Route;

class AccesoMiddelware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $api_token = $request->get("api_token");

        $organizacion = Organization::where("api_token", $api_token)->first();

        if($organizacion){
            $request->merge(['organization' => $organizacion ]);
            return $next($request);
        }else{
            return response()->json([
                'success' => false,
                'message' => "No Autorizado",
            ], 403);
        }
    }
}