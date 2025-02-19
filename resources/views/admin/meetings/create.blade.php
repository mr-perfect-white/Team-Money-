
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
                  <h3>Add Group meeting</h3>
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
                <form id="groupForm"  action="{{route('teammeeting.store')}}" method="POST" >
                    @csrf
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label" for="mname">Meeting Name</label>
                            <input class="form-control" id="mname" name="tm_mtng_nm" type="text" placeholder="Enter Name" required>
                            <div class="invalid-feedback">Please enter a  name.</div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label" for="groupLogo">Purposes</label>
                            <input class="form-control" id="groupLogo" name="tm_mtng_purpose" type="text" placeholder="Enter purposes" required>
                            <div class="invalid-feedback">Please write purposes.</div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label" for="details">Details</label>
                            <textarea class="form-control" id="details" name="tm_mtng_details" type="text" placeholder="Enter details" rows="3" ></textarea>
                            <div class="invalid-feedback">Please enter details.</div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label" for="date">Date</label>
                            <input class="form-control" id="date" name="tm_mtng_date" type="date" placeholder="Select date"  required>
                            <div class="invalid-feedback">Please select date.</div>
                        </div>
                    </div>
                   
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label" for="time">Time</label>
                            <input class="form-control" id="time" name="tm_mtng_time" type="time" placeholder="Enter Time" required>
                            <div class="invalid-feedback">Please enter Timing.</div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label" for="mode">Mode</label>
                            <select class="form-select" name="tm_mtng_mode" id="mode" required>
                                <option selected disabled value="">Choose...</option>
                                <option value="Online">Online</option>
                                <option value="Offline">Offline</option>
                                
                            </select>
                            <div class="invalid-feedback">Please select one option.</div>
                        </div>
                    </div>
                    <button class="btn btn-primary" type="submit">Submit</button>
                </form>
            </div>
        </div>
    
@endsection

@section("script")
@endsection


