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
     
        $data = $request->validate([
                    'tm_mtng_nm' => 'required|string|max:255',
                    'tm_mtng_purpose' =>'required|string|max:255',
                    'tm_mtng_details' =>'required|string|max:255',
                    'tm_mtng_date' => 'required|string|max:255',
                    'tm_mtng_time' => 'required|string|max:255',
                    'tm_mtng_mode'  =>'required|string|max:255',
                    'mtng_url'  =>'nullable|string|max:255',
                    'mtng_aadr'  =>'nullable|string|max:255',
                ]);

        TeamMeeting::create($data);

    return   redirect()->route('teamMeeting.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(TeamMeeting $teamMeeting)
    {
      
        return view('admin.meetings.show',compact('teamMeeting'));
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
      
        $data = $request->only([
            'tm_mtng_nm',
            'tm_mtng_purpose',
            'tm_mtng_details',
             'tm_mtng_date',
              'tm_mtng_time',
              'tm_mtng_mode',
        ]);

//         if($request->input('mtng_url') && $request->input('tm_mtng_mode') == 1 ){ 
//         $teamMeeting->update([
//             'mtng_url' => $request->input('mtng_url'),
//             'mtng_aadr' => '',
//         ]);
// }
//     elseif($request->input('mtng_aadr'))
//     {
//        $teamMeeting->update([
//             'mtng_aadr' => $request->input('mtng_aadr'),
//             'mtng_url' => '',
//         ]);

// }


if ($request->filled('mtng_url') && $request->input('tm_mtng_mode') == 1) {
    $data['mtng_url'] = $request->input('mtng_url');
    $data['mtng_aadr'] = '';
} else {
    $data['mtng_aadr'] = $request->input('mtng_aadr');
    $data['mtng_url'] = '';
}

$teamMeeting->update($data);
        return redirect()->back()->with('success','meting updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(TeamMeeting $teamMeeting)
    {
   
        try {
        
            $teamMeeting->delete();

            return redirect()->route('teamMeeting.index')->with('success', 'Meeting deleted successfully.');
    
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
      
            return redirect()->route('teamMeeting.index')->with('error', 'Meeting not found.');
        }
    }
}
