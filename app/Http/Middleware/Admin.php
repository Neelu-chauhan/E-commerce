<?php
 namespace App\Http\Middleware;
 use Closure;
 use Illuminate\Http\Request;

 class Admin{
    public function handle(Request $request, Closure $next)
    {
       if(auth()->user() && auth()->role_id_fk==2){
        return $next($request);
       } 
       return redirect()->route('login');
    }
 }


?>