<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class AuthMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $a = Auth::guard("pemilik")->check() === false ? Auth::guard("pelanggan")->check() : true;
        return $a === true ? $next($request) : redirect()->route('login')->with(
            'failed',
            'Anda harus login terlebih dahulu'
        );


        // return $next($request);
    }
}
