<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class AdminLoginController extends Controller
{
    public function showloginform(){
        return view('admin.auth.login');
    }
    public function dashboard(){
        $data="hi";
        dd(session()->all()); 
    }
 

public function adminloginform(Request $request)
{
    $credentials = $request->only('email', 'password');

    if (Auth::guard('admin')->attempt($credentials)) {
        $admin = Auth::guard('admin')->user();

        
        session([
            'admin_login' => true,
            'admin_user_id' => $admin->id,
            'admin_name' => $admin->name,
            'admin_email' => $admin->email,
        ]);

        if ($request->hasSession()) {
            $request->session()->put('auth.password_confirmed_at', time());
        }

      
        DB::table('admin_logs')->insert([
            'admin_id' => $admin->id,
            'admin_ip_addr' => $request->ip(), 
            'created_at' => now(),
            'updated_at' => now()
        ]);

        return redirect()->route('dashboard')->with('success', 'Admin logged in successfully!');
    } else {
        return redirect()->route('adminlogin')->with('error', 'Invalid login credentials.');
    }
}

    // public function adminloginform(Request $request){

    //     $credentials = $request->only('email', 'password');
      
    //     if (Auth::guard('admin')->attempt($credentials)) {
    //         $admin = Auth::guard('admin')->user();
    //         session(['admin_login' => true]);
    //         session(['admin_user_id' => $admin->id]);
    //         return redirect()->route('dashboard')->with('success', 'Admin logged in successfully!');
    //     } else {
    //         return redirect()->route('adminlogin')->with('error', 'Invalid login credentials.');
    //     }
    // }

    public function logout(Request $request)
{
    Auth::guard('admin')->logout(); 
    session()->forget('admin_login'); 
    session()->forget('admin_user_id');

    return redirect()->route('adminlogin')->with('success', 'Admin logged out successfully!');
}
}
