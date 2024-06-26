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

        // dd($request->route());

        // return $next($request);

        // dd(Auth::user()->perfil->rotas['0']->pivot->read);

        $uri = $request->route()->uri; // Ex: produto/create
        $chunks = explode("/", $uri);
        $prefix = $chunks[0]; // Ex: produto
        // $action = explode("/", $uri)[1]; // Ex: /create

        // dd(explode("/", $uri)[1]);


        $route_config = Auth::user()->perfil->rotas()->where('rotas.endpoint', $prefix)->first();

        // dd($route_config);

        if($route_config == null) {
            return $next($request);
        }

        // dd(sizeof($chunks) == 1);


        // LÓGICA ESTÁ ERRADA
        if(sizeof($chunks) == 1 && $route_config->pivot->read == 1) {
            return $next($request);
        } else {
            dd('entrou');
            return redirect(route('user.index'))->with('failed', 'Você não tem permissão para acessar essa rota');
        }

        dd(str_contains($uri, 'create'));

        if(str_contains($uri, 'create') && $route_config->pivot->create == 1){
            return $next($request);
        } else {
            return redirect(route($prefix . '.index'))->with('failed', 'Você não tem permissão para acessar essa rota');
        }



        // dd($route_config);



        // die();


    }
}
