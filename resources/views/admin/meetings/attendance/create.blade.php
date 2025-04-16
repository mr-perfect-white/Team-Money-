
@extends('admin.layouts.app')
@section('title') Registration Form @endsection
@section('style')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

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
                <form id="groupForm"  action="{{route('teamattendance.store')}}" method="POST" >
                    @csrf
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label" for="mname">Meeting Name</label>
                            <input class="form-control" id="mname" type="text" value="{{$meeting_name->tm_mtng_nm}}" readonly required>
                            <input  name="meeting_id" type="hidden" value="{{$meeting_name->id}}" >
                           
                        </div>

                      <div class="col-md-6 mb-3">
                          <label class="form-label" for="memberSelect">Member List</label>
                          <select class="form-control" id="memberSelect" name="member_id">
                              <option value="">Select Member</option>
                          </select>
                      </div>

                      
                    </div>
                    
                    <button class="btn btn-primary" type="submit">Submit</button>
                </form>
            </div>
        </div>
    
@endsection

@section("script")
<!-- Include Select2 CDN -->

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<script>
  $(document).ready(function () {

    $('#memberSelect').select2({
      placeholder: "Select Member",
      allowClear: true
    });

    $.ajax({
        url: "{{ route('memberlist') }}",
        type: "GET",
        dataType: "json",
        success: function (response) {
            let members = response.members;
            let $dropdown = $('#memberSelect');

            $dropdown.empty();
            $dropdown.append('<option value="">Select Member</option>');

            $.each(members, function (index, member) {
                $dropdown.append(
                    $('<option>', {
                        value: member.id,
                        text: member[0]
                       // text: member.text
                    })
                );
            });
        },
        error: function (xhr) {
            console.error("Failed to load members:", xhr);
        }
    });
  });
</script>

@endsection


