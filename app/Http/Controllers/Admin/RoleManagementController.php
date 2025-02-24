<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RoleManagementController extends Controller
{
    
    public function index()
    {
        return view('admin.role.rolemanagement');
    }

    // public function create()
    // {
    //     return view('admin.role-management.create');
    // }

    // public function store(Request $request)
    // {
    //     //
    // }

    // public function show($id)
    // {
    //     return view('admin.role-management.show');
    // }

    // public function edit($id)
    // {
    //     return view('admin.role-management.edit');
    // }

    // public function update(Request $request, $id)
    // {
    //     //
    // }

    public function destroy($id)
    {
        //
    }

}
