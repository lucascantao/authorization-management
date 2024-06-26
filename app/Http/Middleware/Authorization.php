<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class Authorization
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {

        dd($request->route());
        
        return $next($request);
        
        

        // dd(Auth::user()->perfil->rotas['0']->pivot->read);
        $uri = $request->route()->uri;
        $route_configs = Auth::user()->perfil->rotas()->where('rotas.endpoint', $uri)->get();

        foreach($route_configs as $config) {
            dd($config->pivot);
        }

        dd($route_configs->pivot);

        return $next($request);
    }
}
