<?php
 namespace App\Http\Middleware;
 use Closure;
 use Illuminate\Http\Request;

 class SuperAdmin{
    public function handle(Request $request, Closure $next)
    {
       if(auth()->user() && auth()->role_id_fk==1){
        return $next($request);
       } 
       return redirect()->route('login');
    }
 }


?>