<?php

namespace App\Http\Middleware;

// use Auth;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserAccess
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    // public function handle(Request $request, Closure $next, $userType)
    public function handle(Request $request, Closure $next, $userType)
    {
        // return $next($request);
        if(auth()->user()->type == $userType ){
            return $next($request);
        }


        // if(auth()->check() && auth()->user()->type == $userType && auth()->user()->stts_approval_user == 'Y' ){
        //    Auth::logout();
        //    $request->session()->invalidate();
        //    $request->session()->regenerateToken();
        //     return redirect()->route('login')->with('error','test');
        // }

        // $next($request);


        $data = array('pesan'=>'Anda tidak memiliki izin untuk mengakses halaman ini.');
        //   return response()->json($data);
        // return response()->json(['err : ']);
         return response()->view('errors.check-permission'); 
    }
}
