<?php

namespace App\Http\Controllers\Member\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\MemberRegister;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function create()
    {
        return view('member.auth.register');
    }

    /**
     * Store a newly created resource in storage.
     */
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
   // dd($request->all());
    // if ($request->hasFile('document_one')) {
    //     $file = $request->file('document_one');
    //     $filename = date('YmdHis') . $file->getClientOriginalName();
    //     $file->move(public_path('uploads/member-documents'), $filename);
    // }

    // if ($request->hasFile('pan_doc')) {
    //     $file = $request->file('pan_doc');
    //     $filename = date('YmdHis') . $file->getClientOriginalName();
    //     $file->move(public_path('uploads/member/pan_doc'), $filename);
    // }

    // if ($request->hasFile('adhr_doc')) {
    //     $file = $request->file('adhr_doc');
    //     $filename = date('YmdHis') . $file->getClientOriginalName();
    //     $file->move(public_path('uploads/member/adhr_doc'), $filename);
    // }
    $documentOneFilename = date('YmdHis') . '_' . $request->file('document_one')->getClientOriginalName();
    $request->file('document_one')->move(public_path('uploads/member-documents'), $documentOneFilename);

    $panDocFilename = date('YmdHis') . '_' . $request->file('pan_doc')->getClientOriginalName();
    $request->file('pan_doc')->move(public_path('uploads/member/pan_doc'), $panDocFilename);

    $adhrDocFilename = date('YmdHis') . '_' . $request->file('adhr_doc')->getClientOriginalName();
    $request->file('adhr_doc')->move(public_path('uploads/member/adhr_doc'), $adhrDocFilename);

   
    $data = MemberRegister::create([
        'firstname' => $request->input('firstname'),
        'lastname' => $request->input('lastname'),
        'phone' => $request->input('phone'),
        'email' => $request->input('email'),
        'permanent_addr' => $request->input('permanent_addr'),
        'temporary_addr' => $request->input('temporary_addr'),
       // 'document_one' => $request->input('document_one'),
       'document_one' => $documentOneFilename,
        'pan_num' => $request->input('pan_num'),
     //   'pan_doc' => $request->input('pan_doc'),
        'pan_doc' => $panDocFilename,
        'adhr_num' => $request->input('adhr_num'),
      //  'adhr_doc' => $request->input('adhr_doc'),
        'adhr_doc' => $adhrDocFilename,
        'accnt_num' => $request->input('accnt_num'),
        'accnt_ifsc_num' => $request->input('accnt_ifsc_num'),
        'accnt_brnch_dtl' => $request->input('accnt_brnch_dtl'),
        'monthly_inc' => $request->input('monthly_inc'),
        'sadh_mem' => $request->input('sadh_mem'),
        'sadh_mem_id' => $request->input('sadh_mem_id'),
        'password' => Hash::make($request->input('password')),
        'uuid' => (string) Str::uuid(),
    ]);

    
  
        return redirect()->route('memberlogin')->with('success', 'Member registered successfully!');
       
 //   return redirect()->route('registers.index')->with('success', 'Member registered successfully!');
}
}
