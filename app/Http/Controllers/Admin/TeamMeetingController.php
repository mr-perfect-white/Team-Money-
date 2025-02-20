<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\TeamMeeting;
use Illuminate\Http\Request;

class TeamMeetingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data =  TeamMeeting::all();
      
        return view('admin.meetings.index',compact('data'));
    }

 

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.meetings.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
      //  dd($request);
        $data = $request->validate([
                    'tm_mtng_nm' => 'required|string|max:255',
                    'tm_mtng_purpose' =>'required|string|max:255',
                    'tm_mtng_details' =>'required|string|max:255',
                    'tm_mtng_date' => 'required|string|max:255',
                    'tm_mtng_time' => 'required|string|max:255',
                    'tm_mtng_mode'  =>'required|string|max:255',
                ]);

        TeamMeeting::create($data);

    return   redirect()->route('teammeeting.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(TeamMeeting $teamMeeting)
    {
        //dd($teamMeeting->id);
      //  $meeting =  TeamMeeting::where('id',$teamMeeting)->first();
        return view('admin.meetings.view',compact('teamMeeting'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(TeamMeeting $teamMeeting)
    {
      
        return view('admin.meetings.edit', compact('teamMeeting'));
    }

    

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, TeamMeeting $teamMeeting)
    {
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(TeamMeeting $teamMeeting)
    {
        try {
        
          //  $teamMeeting = TeamMeeting::where('id',$teamMeeting);
    
            // Delete the team meeting
            $teamMeeting->delete();
    
         
            return redirect()->route('teammeeting.index')->with('success', 'Meeting deleted successfully.');
    
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
      
            return redirect()->route('teammeeting.index')->with('error', 'Meeting not found.');
        }
    }
    
   


}
