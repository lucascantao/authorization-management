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


        // Pegar uri completa da rota acessada
        $uri = $request->route()->uri; // Ex: produto/create

        // Separar a string por '/'
        $chunks = explode("/", $uri);

        // Pegar apenas o prefixo da rota
        $prefix = $chunks[0]; // Ex: produto

        // Pegar o perfil do usuário que está acessando
        $perfil = Auth::user()->perfil;

        // Se o usuário não tiver perfil, então autorize
        if($perfil == null) {
            return $next($request);
        }

        // Pegar a relação da ROTA com o PERFIL
        $route_config = $perfil->rotas()->where('rotas.endpoint', $prefix)->first();

        // Se não houver relação (restrição) de rota para esse perfil, então autorize
        if($route_config == null) {
            return $next($request);
        }

    
        $actions = [
            'create' => $route_config->pivot->create,
            'store' => $route_config->pivot->create,
            'show' => $route_config->pivot->read,
            'edit' => $route_config->pivot->update,
            'update' => $route_config->pivot->update,
            'destroy' => $route_config->pivot->delete,
        ];

        // Se a for uma rota composta (se não for a index)
        if(sizeof($chunks) > 1) {

            // Pega a action no final da uri
            $action = end($chunks);

            // Checa se essa action está no array como 1 (TRUE) ou 0 (FALSE), OU SEJA, se o PERFIL do USUÁRIO pode acessar essa ROTA específica
            if($actions[$action]){
                return $next($request);
            }

            return redirect(route($prefix . '.index'))->with('failed', 'Você não tem permissão para acessar essa rota');

        }

        return $next($request);


    }
}
