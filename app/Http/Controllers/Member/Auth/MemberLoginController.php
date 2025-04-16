<?php

namespace App\Http\Controllers\Member\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Model\MemberRegister;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class MemberLoginController extends Controller
{
    public function showloginform(){
        return view('member.auth.login');
    }
    public function dashboard(){
        $data="hi";
        dd(session()->all()); 
    }
    // public function memberloginform(Request $request){

    //     $credentials = $request->only('phone', 'password');
       
    //     if (Auth::guard('member')->attempt($credentials)) {
    //         dd($credentials);
    //         return redirect()->route('memberdashboard')->with('success', 'member logged in successfully!');
    //     } else {
          
    //         return redirect()->route('memberlogin')->with('error', 'Invalid login credentials.');
    //     }
    //  }
//     public function memberloginform(Request $request)
// {
//     $credentials = $request->only('phone', 'password');

//     if (Auth::guard('member')->attempt($credentials)) {
//         $member = Auth::guard('member')->user();
//         session(['member_login' => true]);
//         session(['member_user_id' => $member->id]);
//         return redirect()->route('memberdashboard')->with('success', 'Member logged in successfully!');
//     } else {
//         // Debugging: Print error and user details
//         dd([
//             'credentials' => $credentials,
//             'user_exists' => \App\Models\MemberRegister::where('phone', $credentials['phone'])->exists(),
//             'hashed_password' => \App\Models\MemberRegister::where('phone', $credentials['phone'])->value('password'),
//             'input_password' => bcrypt($credentials['password']), 
//             'attempt_result' => Auth::guard('member')->attempt($credentials)
//         ]);
//     }
// }


public function memberloginform(Request $request)
{
    $credentials = $request->only('phone', 'password');

    if (Auth::guard('member')->attempt($credentials)) {
        $member = Auth::guard('member')->user();

        // Storing session values
        session([
            'member_login' => true,
            'member_user_id' => $member->id,
            'member_name' => $member->name,
            'member_phone' => $member->phone,
        ]);

        if ($request->hasSession()) {
            $request->session()->put('auth.password_confirmed_at', time());
        }

        // **📌 Store login details in `member_logs` table**
        DB::table('member_logs')->insert([
            'member_id' => $member->id,
            'member_ip_addr' => $request->ip(), // Get IP address
            'created_at' => now(),
            'updated_at' => now()
        ]);

        return redirect()->route('memberdashboard')->with('success', 'Member logged in successfully!');
    } else {
        return redirect()->route('memberlogin')->with('error', 'Invalid login credentials.');
    }
}

    public function showRegisterForm(){
        return view('member.auth.register');
    }

    public function logout(Request $request)
{
    Auth::guard('member')->logout(); // Logout the member
    session()->forget('member_login'); // Clear member session data
    session()->forget('member_user_id');

    return redirect('/member/login')->with('success', 'Member logged out successfully!');
}

public function store(Request $request)
{
   // dd($request);
  
   

    $request->validate([
        'firstname' => 'required|string|max:255',
        'lastname' => 'required|string|max:255',
        'phone' => 'required|string|max:15|unique:member_registers,phone',
        'email' => 'required|email|unique:member_registers,email',
        'permanent_addr' => 'required|string',
        'temporary_addr' => 'required|string',
        'pan_num' => 'required|string|max:255|unique:member_registers,pan_num',
        'adhr_num' => 'required|string|max:255|unique:member_registers,adhr_num',
        'accnt_num' => 'required|string|max:255|unique:member_registers,accnt_num',
        'accnt_ifsc_num' => 'required|string|max:255',
        'accnt_brnch_dtl' => 'required|string|max:255',
        'monthly_inc' => 'required|string|max:255',
        'sadh_mem' => 'required|string|max:255',
        'sadh_mem_id' => 'required|string|max:255|unique:member_registers,sadh_mem_id',
        'password' => 'required|string|max:255',
    ], [
        'phone.unique' => 'This phone number is already registered.',
        'email.unique' => 'This email is already registered.',
        'pan_num.unique' => 'This PAN number is already registered.',
        'adhr_num.unique' => 'This Aadhaar number is already registered.',
        'accnt_num.unique' => 'This Account number is already registered.',
        'sadh_mem.unique' => 'This Sadhguru Membership  number is already registered.',
    ]);
    
    if ($request->hasFile('document_one')) {
        $file = $request->file('document_one');
        $filename = date('YmdHis') . $file->getClientOriginalName();
        $file->move(public_path('uploads/member-documents'), $filename);
    }

    if ($request->hasFile('pan_doc')) {
        $file = $request->file('pan_doc');
        $filename = date('YmdHis') . $file->getClientOriginalName();
        $file->move(public_path('uploads/member/pan_doc'), $filename);
    }

    if ($request->hasFile('adhr_doc')) {
        $file = $request->file('adhr_doc');
        $filename = date('YmdHis') . $file->getClientOriginalName();
        $file->move(public_path('uploads/member/adhr_doc'), $filename);
    }

   
    $data = MemberRegister::create([
        'firstname' => $request->input('firstname'),
        'lastname' => $request->input('lastname'),
        'phone' => $request->input('phone'),
        'email' => $request->input('email'),
        'permanent_addr' => $request->input('permanent_addr'),
        'temporary_addr' => $request->input('temporary_addr'),
        'document_one' => $request->input('document_one'),
        'pan_num' => $request->input('pan_num'),
        'pan_doc' => $request->input('pan_doc'),
        'adhr_num' => $request->input('adhr_num'),
        'adhr_doc' => $request->input('adhr_doc'),
        'accnt_num' => $request->input('accnt_num'),
        'accnt_ifsc_num' => $request->input('accnt_ifsc_num'),
        'accnt_brnch_dtl' => $request->input('accnt_brnch_dtl'),
        'monthly_inc' => $request->input('monthly_inc'),
        'sadh_mem' => $request->input('sadh_mem'),
        'sadh_mem_id' => $request->input('sadh_mem_id'),
        'password' => Hash::make($request->input('password')),
        'uuid' => (string) Str::uuid(),
    ]);

    
    if (auth()->guard('user')->check()) {
      
        return redirect()->route('memberlogin')->with('success', 'Member registered successfully!');
    } else {
      
        return redirect()->route('memberlogin')->with('success', 'Member registered successfully!');
    }
 //   return redirect()->route('registers.index')->with('success', 'Member registered successfully!');
}

public function forgotpassword(){
    //dd()
    return view('member.auth.forgotpassword');
}
public function forgotform(Request $request){
   
    $numberexist = DB::table('member_registers')->where('phone',$request->phone)->first();
   // dd($numberexist);
    if (!$numberexist) {
        return redirect()->back()->with('error', 'Phone number not found.');
    }
    $update = DB::table('member_registers')->where('phone',$request->phone)->update([
        'password' => Hash::make($request->input('password'))
    ]);


    return redirect()->route('memberlogin')->with('success', 'member password changed successfully!');

}

}



