<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


use Illuminate\Foundation\Auth\AuthenticatesUsers;

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
    protected $redirectTo = '/dashboard';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
        $this->middleware('auth')->only('logout');
        
    }
    public function logout(Request $request)
    {
        Auth::guard('user')->logout(); 
        $request->session()->invalidate(); 
        $request->session()->regenerateToken(); 
    
        return redirect('/login'); 
    }

    public function authenticated(Request $request, $user)
{
   
    return redirect()->route('dashboard');  
}

public function showLoginForm()
{
   
    return view('admin.auth.login');  
}
protected function guard()
    {
        return Auth::guard('user');  
    }

}
