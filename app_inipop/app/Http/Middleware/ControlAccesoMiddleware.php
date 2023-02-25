<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class ControlAccesoMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $blockAccess = true;
      
 if(auth()->user()->confirmed === 1)

    return $request;
    $blockAccess = false;

   if($blockAccess){
    
       return back()->with('message', ['danger', 'Debes validar tu correo electronico para continuar']);
       

   }

    return $next($request);
    }
}
