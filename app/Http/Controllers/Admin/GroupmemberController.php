<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Models\Group;
use App\Models\MemberRegister;

use App\Models\Groupmember;
use Illuminate\Http\Request;

class GroupmemberController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

      
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
    //   $datain = $request->all();
     //  $data = count($datain);
     // $data = $request->all()->count(); 
  //  dd($data);
      $request->validate([
        'member_id' => 'required|int|unique:groupmembers,member_id',
        'group_id' => 'required|int',
        'role' => 'required|int',
      ]);
      
      $data['member_id'] = $request->input('member_id');
      $data['group_id'] = $request->input('group_id');
      $data['role'] = $request->input('role');

      $addmember= Groupmember::create($data);
      $memberid = $request->input('member_id');
      $update = MemberRegister::where('id',$memberid)->update([ 'status'=> '2']);

      if($addmember){
        return redirect()->back()->with('member added to the group successfully');
      }else{
        return redirect()->back()->with('something went wrong member is not added to the group');

      }
      
    }

    /**
     * Display the specified resource.
     */
    public function show(Groupmember $groupmember)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Groupmember $groupmember)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Groupmember $groupmember)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Groupmember $groupmember)
    {
     // dd($groupmember);
       $groupmember->delete();
       $updatemember = MemberRegister::where('id',$groupmember->member_id)->update(['status'=>'1']);
       return redirect()->back()->with('success', 'Member deleted successfully.');

    }
}
