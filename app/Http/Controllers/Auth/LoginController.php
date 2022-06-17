<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

// use Auth;
class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function login(Request $request)
    {   
        $input = $request->all();
     
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required',
        ]);
     
        if(auth()->attempt(array('email' => $input['email'], 'password' => $input['password'], )))
        {
            if (auth()->user()->stts_approval_user == 'T') {
                Auth::logout();
                return redirect()->route('login')->with('error_log','Akun Anda sudah Terdaftar ✅, tinggal verifikasi');;
            } else {
                if (auth()->user()->type == 'dokter') {

                    return redirect()->route('dokter.home');
    
                }else if (auth()->user()->type == 'apotik') {
    
                    return redirect()->route('apotik.home');
                    
                }else if (auth()->user()->type == 'lab'){
                    
                    return redirect()->route('lab.home');
    
                }else if (auth()->user()->type == 'pasienParent'){
                    
                    return redirect()->route('pasienP.home');
    
                }else if (auth()->user()->type == 'pasienChild'){
                    
                    return redirect()->route('pasienC.home');
    
                }else if (auth()->user()->type == 'support'){
                    return redirect()->route('support.home');
                }else if (auth()->user()->type == 'manejemen'){
                    return redirect()->route('manej.home');
                }else if (auth()->user()->type == 'validator'){
                    return redirect()->route('validator.home');
                }else if( auth()->user()->type == 'admin' ){
                    return redirect()->route('admin.home');
                }
            }
        }else{
            return redirect()->route('login')
                ->with('error','Email-Address And Password Are Wrong.');
        }
          
    }
}
