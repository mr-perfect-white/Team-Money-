
@extends('admin.layouts.app')
@section('title') Registration Form @endsection
@section('style')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/choices.js/public/assets/styles/choices.min.css" />

@endsection

@section('content')


<div class="container-fluid">
            <div class="page-title">
              <div class="row">
                <div class="col-12 col-sm-6">
                  <h3>Create New Role </h3>
                </div>
                <div class="col-12 col-sm-6">
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">     <i data-feather="home"></i></a></li>
                    <li class="breadcrumb-item">Role</li>
                    <!-- <li class="breadcrumb-item active">Register</li> -->
                  </ol>
                </div>
              </div>
            </div>
          </div>

          <!-- Group form start-->
          <div class="card">
            <div class="card-body">
            <form id="groupForm" action="{{ route('memberrole.update', $role->id) }}" method="POST">
    @csrf
    @method('PUT') <!-- Laravel requires this for update requests -->
    <div class="row">
        <div class="col-md-6 mb-3">
            <label class="form-label" for="name">Role Name</label>
            <input class="form-control" id="name" name="name" type="text"
                value="{{ old('name', $role->name ?? '') }}" placeholder="Enter Role Name" required>
            <div class="invalid-feedback">Please enter a role name.</div>
        </div>
        <div class="col-md-6 mb-3">
            <label class="form-label" for="roleStatus">Role Status</label>
            <select class="form-control" id="status" name="status" required>
                <option value="1" {{ $role->status == 1 ? 'selected' : '' }}>Active</option>
                <option value="0" {{ $role->status == 0 ? 'selected' : '' }}>Inactive</option>
            </select>
            <div class="invalid-feedback">Please select a role status.</div>
        </div>
    </div>
    <button type="submit" class="btn btn-primary">Update</button>
</form>


            </div>
        </div>
    
@endsection

@section("script")
@endsection


