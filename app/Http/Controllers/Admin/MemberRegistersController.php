<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\MemberRegister;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;



class MemberRegistersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function dashboard()
    {
        return view('admin.dashboard');
    }
    public function index()
    {
        $data= MemberRegister::orderby('id','Desc')->get();
        return view('admin.registers.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.registers.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
  //  dd($request);
  
   

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
        'document_one' => $documentOneFilename,
        'pan_num' => $request->input('pan_num'),
        'pan_doc' => $panDocFilename,
        'adhr_num' => $request->input('adhr_num'),
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

    
    if (auth()->guard('admin')->check()) {
      
        return redirect()->route('registers.index')->with('success', 'Member registered successfully!');
    } else {
      
        return redirect()->route('members.login')->with('success', 'Member registered successfully!');
    }
 //   return redirect()->route('registers.index')->with('success', 'Member registered successfully!');
}

   
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data = MemberRegister::where('id',$id)->first();
        return view('admin.registers.view',compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     */
  public function edit(string $id)
    {
       // dd($id);
       $data = MemberRegister::where('id',$id)->first();

        return view ('admin.registers.edit',compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
{
    $member = MemberRegister::findOrFail($id); // You missed this line


    if ($request->hasFile('document_one')) {
        $documentOne = $request->file('document_one');
        $documentOneFilename = time() . '_doc_' . $documentOne->getClientOriginalName();
        $documentOne->move(public_path('uploads/member-documents'), $documentOneFilename);
    } else {
        $documentOneFilename = $member->document_one; // keep existing
    }

 
    if ($request->hasFile('pan_doc')) {
        $panDoc = $request->file('pan_doc');
        $panDocFilename = time() . '_pan_' . $panDoc->getClientOriginalName();
        $panDoc->move(public_path('uploads/member/pan_doc'), $panDocFilename);
    } else {
        $panDocFilename = $member->pan_doc;
    }

  
    if ($request->hasFile('adhr_doc')) {
        $adhrDoc = $request->file('adhr_doc');
        $adhrDocFilename = time() . '_aadhaar_' . $adhrDoc->getClientOriginalName();
        $adhrDoc->move(public_path('uploads/member/adhr_doc'), $adhrDocFilename);
    } else {
        $adhrDocFilename = $member->adhr_doc;
    }

    // Update the record
    $member->update([
        'firstname' => $request->input('firstname'),
        'lastname' => $request->input('lastname'),
        'phone' => $request->input('phone'),
        'email' => $request->input('email'),
        'permanent_addr' => $request->input('permanent_addr'),
        'temporary_addr' => $request->input('temporary_addr'),
        'document_one' => $documentOneFilename,
        'pan_num' => $request->input('pan_num'),
        'pan_doc' => $panDocFilename,
        'adhr_num' => $request->input('adhr_num'),
        'adhr_doc' => $adhrDocFilename,
        'accnt_num' => $request->input('accnt_num'),
        'accnt_ifsc_num' => $request->input('accnt_ifsc_num'),
        'accnt_brnch_dtl' => $request->input('accnt_brnch_dtl'),
        'monthly_inc' => $request->input('monthly_inc'),
        'sadh_mem' => $request->input('sadh_mem'),
        'sadh_mem_id' => $request->input('sadh_mem_id'),
    ]);

    return redirect()->route('registers.index')->with('success', 'Member updated successfully!');
}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        dd($id);
        $data = MemberRegister::where('id',$id)->delete();
        return redirect()->back()->with('Member deleted successfully!');
    }
}
