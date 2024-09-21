<?php
 namespace App\Http\Middleware;
 use Closure;
 use Illuminate\Http\Request;

 class User{
    public function handle(Request $request, Closure $next)
    {
       if(auth()->user() && auth()->role_id_fk==5){
        return $next($request);
       } 
       return redirect()->route('login');
    }
 }


?>