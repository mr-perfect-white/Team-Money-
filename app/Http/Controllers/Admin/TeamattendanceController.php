<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\TeamMeeting;
use App\Models\MemberRegister;
use App\Models\Groupmember;
use App\Models\Teamattendance;
use Illuminate\Http\Request;

class TeamattendanceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $meetingid = $request->meeting;
        $meeting = TeamMeeting::select('id','tm_mtng_nm')->where('id',$meetingid)->first();
        $attendances = Teamattendance::select('id','meeting_id','member_id')
        ->with([
            'meetingmember' => function ($query) {
                $query->where('status', 2)->select('id', 'firstname', 'lastname');
            },
        ])->where('meeting_id',$meeting->id)->get();
    // dd($attendances);
        return view('admin.meetings.attendance.index',compact('attendances','meeting'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $meeting = $request->meeting;
        $meeting_name = TeamMeeting::select('id','tm_mtng_nm')->where('id',$meeting)->first();
        return view('admin.meetings.attendance.create',compact('meeting_name'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
      //  dd($request->all());

        $data = $request->only([
            'meeting_id',
            'member_id'
        ]);
        Teamattendance::create($data);

        return redirect()->back()->with('success','Attendance added successfully');

    }

    /**
     * Display the specified resource.
     */
    public function show(Teamattendance $teamattendance)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Teamattendance $teamattendance)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Teamattendance $teamattendance)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Teamattendance $teamattendance)
    {
       
        $teamattendance->delete();

        return redirect()->back()->with('success','member deleted from the meeting attendance successfully!');
    }

   
    public function member()
    {
        // $groupmembers = Groupmember::whereIn('role', [1, 2])
        //     ->with([
        //         'member' => function ($query) {
        //             $query->where('status', 2)->select('id', 'firstname', 'lastname');
        //         },
        //         'roleRelation' => function ($query) {
        //             $query->select('id', 'name'); // Make sure 'name' exists in member_roles table
        //         }
        //     ])
        //     ->get();
    
        // $members = [];
    
        // foreach ($groupmembers as $gm) {
        //     if ($gm->member) {
        //         $roleName = $gm->role ? $gm->role->name : 'No Role';
        //         $members[] = [
        //             'id' => $gm->member->id,
        //             'text' => $gm->member->firstname . ' ' . $gm->member->lastname . ' (' . $roleName . ')'
        //         ];
        //     }
        // }
    
        // return response()->json([
        //     'members' => $members
        // ]);

        $groupmembers = Groupmember::whereIn('role', [1, 2])
        ->with([
        'member' => function ($query) {
            $query->where('status', 2)->select('id', 'firstname', 'lastname');
        },
        'roleRelation' => function ($query) {
            $query->select('id', 'name');
        },
        'group' => function($query){
            $query->select('id','name');
        }
    ])
    ->get();

    $members = [];

        foreach ($groupmembers as $gm) {
            if ($gm->member) {
                $roleName = $gm->roleRelation ? $gm->roleRelation->name : 'No Role';
                $groupName = $gm->group ? $gm->group->name : 'No group';
                $members[] = [
                    'id' => $gm->member->id,
                  //  'text' => $gm->member->firstname . ' ' . $gm->member->lastname . '  (' . $groupName . ')(' . $roleName . ')'
                  $text = $gm->member->firstname . ' ' . $gm->member->lastname . ' - Group: ' . $groupName . ' (' . $roleName . ')'

                ];
            }
        }

        return response()->json([
            'members' => $members
        ]);

    }
    

}
