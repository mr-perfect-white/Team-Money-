
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
                        </ol>
                        </div>
              </div>
            </div>
</div>

          <!-- Group form start-->
          <div class="card">
            <div class="card-body">
                <form id="groupForm"  action="{{route('teamMeeting.store')}}" method="POST" >
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
                        <div class="col-md-6 ">
                            <label class="form-label" for="mode">Mode</label>
                            <div class="mt-4 m-checkbox-inline custom-radio-ml">
                                <div class="form-check form-check-inline radio radio-primary" id="">
                                <input class="form-check-input memberYes" id="radioinline1" type="radio" name="tm_mtng_mode" value="1">
                                <label class="form-check-label mb-0" for="radioinline1">Online Meeting<span class="digits"> </span></label>
                                </div>
                                <div class="form-check form-check-inline radio radio-primary" id="">
                                <input class="form-check-input memberNo" id="radioinline2" type="radio" name="tm_mtng_mode" value="0">
                                <label class="form-check-label mb-0" for="radioinline2">Offline Meeting<span class="digits"> </span></label>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6 mb-3 meetingurl" id="" style="display:none;">
                            <label class="form-label" for="mtng_url">Meeting URL</label>
                            <input class="form-control" id="mtng_url" type="url" name="mtng_url" placeholder="Enter Meeting URL">
                        </div>
                        <div class="col-md-6 mb-3 meetingaddress" id="" style="display:none;">
                                <label class="form-label" for="mtng_aadr">Meeting Address</label>
                                <textarea class="form-control" id="mtng_aadr" type="text" name="mtng_aadr" placeholder="Enter Meeting Address"></textarea>
                        </div>

                    </div>   
                    <button class="btn btn-primary" type="submit">Submit</button>
                </form>
            </div>
        </div>
    
@endsection

@section("script")
<script>
    document.querySelector(".memberYes").addEventListener("click", function () {
        document.querySelector(".meetingurl").style.display = "block";
        document.querySelector(".meetingaddress").style.display = "none";
    });

    document.querySelector(".memberNo").addEventListener("click", function () {
        document.querySelector(".meetingurl").style.display = "none";
        document.querySelector(".meetingaddress").style.display = "block";
    });
</script>
@endsection


