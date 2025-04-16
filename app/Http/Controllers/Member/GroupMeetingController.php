<?php

namespace App\Http\Controllers\Member;
use App\Http\Controllers\Controller;
use App\Models\Groupmember;

use App\Models\GroupMeeting;
use Illuminate\Http\Request;
use App\Models\MemberRole;
use App\Models\MemberRegister;

class GroupMeetingController extends Controller
{
    /**
     * Display a listing of the resource.
     */

   
    public function index()
    {
        $meeting = GroupMeeting::OrderBy('id','desc')->get();
        return view('member.meeting.index',compact('meeting'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $dataroles = MemberRole::select('id','name')->where('id',1)->get();
        $data_role = [];
        foreach($dataroles as $key=> $datarole){
            $data_role[$key]['name']=$datarole->name;
            $data_role[$key]['id'] = $datarole->id;
            $gp_mem = Groupmember::select('group_id','member_id','role')->where('role',$datarole->id)->get();
            foreach($gp_mem as $gpkey=>$member){
                $member_dtl[$gpkey]= $member->member_id;
                foreach($member_dtl as $keymem => $membername){
                  $datamember[$keymem] =MemberRegister::where('id',$membername)->get();
                }
            }
        }

       // dd($datamember);
        $member = auth()->guard('member')->user()->id;

        $grp_id = Groupmember::select('group_id')->where('member_id',$member)->first();
       //dd($grp_id);
        return view('member.meeting.create',compact('grp_id','datamember','data_role'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
      
       $request->validate([
            'gp_mtng_nm' => 'required|string|max:255',
            'gp_mtng_purpose' => 'required|string|max:255',
            'gp_mtng_details' => 'required|string|max:255',
            'gp_mtng_date' => 'required|date',
            'gp_mtng_time' => 'required|date_format:H:i',
            'gp_mtng_mode' => 'required|string|max:255',
          //  'group_id' => 'required|exists:groups,id',
            
       ]);
    
       $data = $request->only(['group_id','gp_mtng_nm','gp_mtng_purpose','gp_mtng_details','gp_mtng_date','gp_mtng_time','gp_mtng_mode']);
       //dd($data);
     $data = GroupMeeting::create($data);

     return redirect()->route('groupmeeting.index')->with('success','new meeting added successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
     // 
       $groupMeeting = GroupMeeting::where('id',$id)->first();
      // dd($groupMeeting);
        return view('member.meeting.show',compact('groupMeeting'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(GroupMeeting $groupMeeting)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, GroupMeeting $groupMeeting)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(GroupMeeting $groupMeeting)
    {
        //
    }
}
