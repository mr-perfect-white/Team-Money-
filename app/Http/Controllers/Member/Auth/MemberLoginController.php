<?php

namespace App\Http\Controllers\Member\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;

class MemberLoginController extends Controller
{
    use AuthenticatesUsers;

    protected $redirectTo = '/member-dashboard';

    public function __construct()
    {
        $this->middleware('guest:member')->except('logout');
    }

    /**
     * Override the username method to use 'email' or 'username' for member login.
     */
    public function username()
    {
        return 'phone';  // You can change this to 'username' if you want members to log in using their username
    }

    /**
     * Override the guard method to specify the 'members' guard.
     */
    protected function guard()
    {
        return Auth::guard('member');  // This tells Laravel to use the 'members' guard
    }

    public function logout(Request $request)
{
    Auth::guard('member')->logout(); 
    $request->session()->invalidate(); 
    $request->session()->regenerateToken(); 

    return redirect('/'); 
}
public function authenticated(Request $request, $user)
{
    // Redirect to member dashboard after login
    return redirect()->route('memberdashboard');  // Adjust to your actual member dashboard route
}
public function showLoginForm(){
    return view('member.auth.login');
}

public function showRegisterForm(){
    return view('member.auth.register');

}
}