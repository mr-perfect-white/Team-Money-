<?php

namespace App\Http\Controllers\Member;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Groupmember;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function dashboard()
    {
        // Get the authenticated member
        $member = auth()->guard('member')->user();
    
        // Find the group this member belongs to through the Groupmember table
        $groupmember = Groupmember::where('member_id', $member->id)->first(); // Assuming member_id is stored in the groupmembers table
    
        if ($groupmember) {
            // Fetch all members of the same group
            $groupMembers = Groupmember::where('group_id', $groupmember->group_id)->get();
    
           
            $membersInGroup = $groupMembers->map(function($groupMember) {
                return $groupMember->member; 
            });
    
            // Pass the data to your view
            $dataForGroupMember = 'Looged in as a group member';
    
            return view('member.dashboard', compact('dataForGroupMember', 'membersInGroup'));
        } else {
            // Member is not part of any group
            $dataForNonGroupMember = 'You are not registered in any Team Money Group';
    
            return view('member.dashboard', compact('dataForNonGroupMember'));
        }
    }
    
    public function dashboardold()
{
    $member = auth()->guard('member')->user();
    //dd($member);
    dd($member->registermembers); 

    if ($member->registermembers()->exists()) {
       //dd($member);
        $dataForGroupMember = 'This is data for members in a group';
            $data = Groupmember::get();
            $groupmembers = $data->registermembers();

        return view('member.dashboard', compact('dataForGroupMember','groupmembers'));
    } else {
       
        $dataForNonGroupMember = 'You are not registered in any Team Money  Group';
   
        return view('member.dashboard', compact('dataForNonGroupMember'));
    }
}

}
