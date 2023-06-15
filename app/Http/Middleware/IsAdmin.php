<?php
namespace App\Http\Middleware;
use closure;
use illuminate\Http\Request; 

class IsAdmin {
    public function handle($request, Closure $next) {
        if (auth()->check() && auth()->user()->admin == 1) {
            return $next($request);
        } else {
            return response()->view('annonces.midelware', [], 403);
        }
    }
}

