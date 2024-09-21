<?php
 namespace App\Http\Middleware;
 use Closure;
 use Illuminate\Http\Request;

 class Manager{
    public function handle(Request $request, Closure $next)
    {
       if(auth()->user() && auth()->role_id_fk==4){
        return $next($request);
       } 
       return redirect()->route('login');
    }
 }


?>