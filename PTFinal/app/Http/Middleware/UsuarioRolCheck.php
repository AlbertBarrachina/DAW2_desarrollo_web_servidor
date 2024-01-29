<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class UsuarioRolCheck
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {

        $user = auth()->user();

        if ($user) {
            $userRol = $usuario->rol;
        } else {
            $userRol = 'guest';
        }

        // Share the user role with all views
        view()->share('userRol', $userRol);

        return $next($request);
    }
}
