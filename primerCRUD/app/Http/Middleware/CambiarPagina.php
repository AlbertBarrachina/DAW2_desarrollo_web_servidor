<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CambiarPagina
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle($request, Closure $next)
    {
        if ($request->has('tipo')) {
            $userType = $request->input('tipo');

            if ($userType === 'Admin') {
                return redirect('/pokemon');
            } elseif ($userType === 'Usuario') {
                return redirect('/show');
            }
        }

        // If 'user_type' is not provided or not recognized, proceed with the request
        return $next($request);
    }
}
