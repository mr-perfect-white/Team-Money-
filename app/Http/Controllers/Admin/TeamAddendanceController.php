<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\TeamMeeting;

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
    return view('admin.meetings.attendance', compact('meeting'));
}
   


}
