<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if(auth('web')->check()){
            return redirect(RouteServiceProvider::HOME);
        }
         if(auth('teacher')->check()){
            return redirect(RouteServiceProvider::TEACHER);
        }
         if(auth('parnt')->check()){
            return redirect(RouteServiceProvider::PARENT);
        }
         if(auth('student')->check()){
            return redirect(RouteServiceProvider::STUDENT);
        }      
        return $next($request);
    }
}
