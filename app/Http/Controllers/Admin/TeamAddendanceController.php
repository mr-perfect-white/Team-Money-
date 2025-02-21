<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\TeamMeeting;
use App\Models\Groupmember;
use Illuminate\Support\Facades\DB;
use App\Models\MemberRegister;
class TeamAddendanceController extends Controller
{
    // public function index(){
    //     //  dd($teamMeeting);

    //     $data =  TeamMeeting::all();
    //      return view('admin.meetings.attendance',compact('data'));
             
    // }
    public function index($meeting_id)
{
    $meeting = TeamMeeting::findOrFail($meeting_id); // Fetch meeting by ID

    $members = MemberRegister::whereHas('groupMembers', function ($query) {
        $query->whereIn('role', [1, 2]);
    })
    ->with(['groupMembers' => function ($query) {
        $query->select('member_id', 'group_id', 'role')->with('group'); // Fetch related group
    }])
    ->select('id', 'firstname') // Selecting only necessary columns from `member_registers`
    ->get();

    return view('admin.meetings.attendance', compact('meeting','members'));
}
public function store(Request $request)
{
   dd($request);

    return view('admin.meetings.attendance');
} 


}
