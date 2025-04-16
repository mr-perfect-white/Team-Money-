<?php

namespace App\Http\Controllers\Member;

use App\Http\Controllers\Controller;
use App\Models\Groupmember;
use Illuminate\Http\Request;

class GroupController extends Controller
{
    public function index(){
        $member = auth()->guard('member')->user();
    
      
        $groupmember = Groupmember::where('member_id', $member->id)->first(); 
    
        if ($groupmember) {
          
            $groupMembers = Groupmember::where('group_id', $groupmember->group_id)->get();
    
           
            $membersInGroup = $groupMembers->map(function($groupMember) {
                return $groupMember->member; 
            });
    
            return view('member.group.index', compact( 'membersInGroup'));
        } else {
          
            $dataForNonGroupMember = 'You are not registered in any Team Money Group';
    
            return view('member.dashboard', compact('dataForNonGroupMember'));
        }
     
    }

    public function show(){

        return view('member.group.show');
    }
    public function dashboard(){

        return view('member.group.dashboard');
    }
}
