<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class Admin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // if user is not logged in then it will redirect to login page
        if(!Auth::check()){
            return redirect()->route('login');
        }

        $userRole=Auth::user()->role;
        
        // Seller
        if($userRole==1){
            return redirect()->route('seller.dashboard');
        }

        // Admin
        if($userRole==2){
            return $next($request);
        }

        // Normal User
        if($userRole==3){
            return redirect()->route('dashboard');
        }
    }
}
