<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use App\Models\GroupMeeting;
use Illuminate\Http\Request;

class GroupMeetingController extends Controller
{
    /**
     * Display a listing of the resource.
     */

     public function dashboard()
     {
         return view('member.dashboard');
     }
    public function index()
    {
        return view('member.meeting.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(GroupMeeting $groupMeeting)
    {
        //
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
