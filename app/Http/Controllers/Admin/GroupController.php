<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Group;
use App\Models\Groupmember;
use App\Models\MemberRole;
use App\Models\MemberRegister;
use Illuminate\Http\Request;
use App\Models\GroupMeeting;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\exist;


class GroupController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data=Group::withCount('groupmembers')->get();
     
        return view('admin.group-management.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $members = MemberRegister::where('status',1)->get();
        $memberroles = MemberRole::all();
        return view('admin.group-management.create',compact('members','memberroles'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{

    // $groupData = [
    //     'name' => $request->input('name'),
    //     'logo' => $request->file('logo')->store('logos'), 
    // ];
    $logoFilename = null; 
if ($request->hasFile('logo')) {
    $logoFilename = date('YmdHis') . '_' . $request->file('logo')->getClientOriginalName();
    $request->file('logo')->move(public_path('uploads/group-logos'), $logoFilename);
}
   
    
   
    $group = Group::create([
                'name' => $request->input('name'),
                'logo' => $logoFilename,
            ]);

    
   
    $memberIds = $request->input('members');
    $roleIds = $request->input('roles');

    
    if (count($memberIds) !== count($roleIds)) {
        return back()->with('error', 'Mismatch between members and roles.');
    }

   
    foreach ($memberIds as $index => $memberId) {
        $roleId = $roleIds[$index];

       
        GroupMember::create([
            'group_id' => $group->id, 
            'member_id' => $memberId,
            'role' => $roleId,
        ]);
    }

    foreach ($memberIds as $index => $memberId) {
        MemberRegister::where('id',$memberId)->update([
            'status' => 2, 
        ]);
    }

  
    return redirect()->route('group.index')->with('success', 'Group created successfully.');
}

   
    

    /**
     * Display the specified resource.
     */
    public function show(Group $group)
    {
       // $group = Group::find($group->id); 
      //  $data = Groupmember::group($group->id);
        // $groupmembers  = $group->groupmembers; 
        // $members = $groupmembers->map(function ($groupmember) {
        //     return $groupmember->member;  
        // });  

      

        $newmembers = MemberRegister::where('status',1)->get();
        $group = Group::with('groupmembers.member')->find($group->id);
        $members = $group->groupmembers->pluck('member');  
    
        $gpmeeting = GroupMeeting::where('group_id',$group->id)->get();
        $roles = MemberRole::all();

      
        return view('admin.group-management.view',compact('group','members','newmembers','gpmeeting','roles'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Group $group)
    {
        $newmembers = MemberRegister::where('status',1)->get();
        $group = Group::with('groupmembers.member')->find($group->id);
        $members = $group->groupmembers->pluck('member');  
    
        $gpmeeting = GroupMeeting::where('group_id',$group->id)->get();
        $roles = MemberRole::all();

     
        return view('admin.group-management.edit',compact('group','members','newmembers','gpmeeting','roles'));
     
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Group $group)
    {
   

       $request->validate([
        'name' => 'required|string|max:255',
      //  'logo' => 'nullable|string|max:255',
    ]);

    if ($request->hasFile('logo')) {
        $documentOne = $request->file('logo');
        $documentOneFilename = time() . '_doc_' . $documentOne->getClientOriginalName();
        $documentOne->move(public_path('uploads/group-logos'), $documentOneFilename);
      //  dd('File uploaded as: ' . $documentOneFilename);

    } else {
        $documentOneFilename = $group->logo; 
       
    }

    $updated = $group->update([
        'name' => $request->input('name'),  
        'logo' => $documentOneFilename,
    ]);
      
       if($updated){
        return redirect()->back()->with('success','group details updated successfully!');
       }
       else{
        return redirect()->back()->with('error','something went wrong!');

       }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Group $group)
    {
     
      
        $groupmember =    Groupmember::where('group_id',$group->id)->get();
    
        foreach($groupmember as $groupmem => $upgroupmember){
            $data = MemberRegister::where('id',$upgroupmember->member_id)->update(['status'=>'1']);
            $upgroupmember->delete();
        }
       
        $group->delete();

        return redirect()->back()->with('success','group deleted');
    }
}
