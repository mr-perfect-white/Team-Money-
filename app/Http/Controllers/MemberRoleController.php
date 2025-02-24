<?php

namespace App\Http\Controllers;

use App\Models\MemberRole;
use Illuminate\Http\Request;


class MemberRoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    

    public function index()
    {
        $data =  MemberRole::all();
      
        return view('admin.role.memberrole',compact('data'));
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
         return view('admin.role.role-create');
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       // Validate input
    $request->validate([
        'name' => 'required|string|max:255',
        'status' => 'required|string'
    ]);

    // Debug before inserting
   

    // Insert into the database
    $memberRole = new MemberRole();
    $memberRole->name = $request->name;
    $memberRole->status = $request->status;
    $memberRole->save();

    return redirect()->back()->with('success', 'Member role created successfully!');
    }

    /**
     * Display the specified resource.
     */
    // public function show(MemberRole $memberRole)
    // {
    //     return view('admin.role.role-edit', compact('memberRole'));
    // }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
{
    $role = MemberRole::findOrFail($id); // Fetch the role using the ID
    return view('admin.role.role-edit', compact('role')); // Pass it to the view
}
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id) {
        $request->validate([
            'name' => 'required|string|max:255',
            'status' => 'required|in:0,1',
        ]);
    
        $role = MemberRole::findOrFail($id);
        $role->update([
            'name' => $request->name,
            'status' => $request->status,
        ]);
    
        return redirect()->route('memberrole')->with('success', 'Role updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        // dd($id);
        $role = MemberRole::findOrFail($id); // Find role by ID
        $role->delete(); // Delete the role
    
        return redirect()->route('memberrole')->with('success', 'Role deleted successfully!');
    }
    
}
