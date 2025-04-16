
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
                  <h3>Add  meeting Attendance</h3>
                </div>
                <div class="col-12 col-sm-6">
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">     <i data-feather="home"></i></a></li>
                    <li class="breadcrumb-item">Group meeting</li>
                    <!-- <li class="breadcrumb-item active">Register</li> -->
                  </ol>
                </div>
              </div>
            </div>
          </div>

          <!-- Group form start-->
          <div class="card">
            <div class="card-body">
                <form id="groupForm"  action="" method="POST" >
                    @csrf
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label" for="mname">Meeting Name</label>
                            <input class="form-control" id="mname" name="tm_mtng_nm" type="text" value="{{$meeting_name->tm_mtng_nm}}" readonly required>
                            <div class="invalid-feedback">Please enter a  name.</div>
                        </div>
                      
                    </div>
                    
                    <button class="btn btn-primary" type="submit">Submit</button>
                </form>
            </div>
        </div>
    
@endsection

@section("script")
@endsection


