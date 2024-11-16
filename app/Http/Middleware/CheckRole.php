<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        // Verificar si el usuario está autenticado y tiene el rol de 'admin'
        if (!Auth::check() || Auth::user()->role !== 'admin' || Auth::user()->role !== 'user') {
            // Si no es admin o no está autenticado, redirigir a 'home'
            return redirect('home');
        }

        // Permitir el acceso a la ruta solicitada si el usuario es 'admin'
        return $next($request);
    }
}
