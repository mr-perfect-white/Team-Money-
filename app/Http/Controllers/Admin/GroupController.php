<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Group;
use App\Models\Groupmember;
use App\Models\MemberRole;
use App\Models\MemberRegister;
use Illuminate\Http\Request;

class GroupController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data=Group::withCount('groupmembers')->get();
      //  dd($data);
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
    $groupData = [
        'name' => $request->input('name'),
        'logo' => $request->file('logo')->store('logos'), 
    ];

  
    $group = Group::create($groupData);
   
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

  
    return redirect()->route('groups.index')->with('success', 'Group created successfully.');
}

    public function storeold(Request $request)
    {
      // dd($request);
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'logo' => 'required|file|max:3000',
            'member_id' => 'required|array',  
            'role' => 'required|array',       
        ]);
    
       
        $groupData = [
            'name' => $request->input('name'),
            'logo' => $request->file('logo')->store('logos'), 
        ];
    
        // Create the group
        $group = Group::create($groupData);
    
       
        $members = $request->input('member_id'); 
        $roles = $request->input('role'); 
    
        foreach ($members as $key => $member_id) {
            $memdata = [
                'group_id' => $group->id,    
                'member_id' => $member_id,    
                'role' => $roles[$key],       
            ];
    
            Groupmember::create($memdata); 
        }
    
     
        return redirect()->route('admin.group-management.index')->with('success', 'Group created successfully');
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


        // Fetch the group with all its related Groupmembers and eager load the MemberRegister
        $group = Group::with('groupmembers.member')->find($group->id);

       //Access the member data directly
        $members = $group->groupmembers->pluck('member');  


       // dd($members);
        return view('admin.group-management.view',compact('group','members'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Group $group)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Group $group)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Group $group)
    {
        //
    }
}
