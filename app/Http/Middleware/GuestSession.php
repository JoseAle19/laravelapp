<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class GuestSession
{
    public function handle(Request $request, Closure $next)
    {
         if ($request->session()->has('user_id')) {
            return redirect()->route('usuarios.catalogo');
        }

        return $next($request);
    }
}
