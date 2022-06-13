<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class UserAccess
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next, $userType)
    {
        // return $next($request);
        if(auth()->user()->type == $userType){
            return $next($request);
        }
        $data = array('pesan'=>'Anda tidak memiliki izin untuk mengakses halaman ini.');
        //   return response()->json($data);
        // return response()->json(['err : ']);
         return response()->view('errors.check-permission'); 
    }
}
