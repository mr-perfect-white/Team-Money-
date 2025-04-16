
@extends('admin.layouts.app')
@section('title') Registration Form @endsection
@section('style')

@endsection

@section('content')

<div class="modal fade" id="exampleModalfat" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel2">New message</h5>
                            <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                          </div>
                          <div class="modal-body">
                          <form id="groupForm"  action="{{route('teamattendance.store')}}" method="POST" >
                    @csrf
                    <div class="row">
                        <div class="col-md-12 mb-3">
                            <label class="form-label" for="mname">Meeting Name</label>
                            <input class="form-control" id="mname" type="text" value="{{$meeting->tm_mtng_nm}}" readonly required>
                            <input  name="meeting_id" type="hidden" value="{{$meeting->id}}" >
                           
                        </div>

                      <div class="col-md-12 mb-3">
                          <label class="form-label" for="memberSelect">Member List</label>
                          <select class="form-control" id="memberSelect" name="member_id">
                              <option value="">Select Member</option>
                          </select>
                      </div>

                      
                    </div>
                    
                    <button class="btn btn-primary" type="submit">Submit</button>
                </form>
                          </div>
                          <div class="modal-footer">
                            <button class="btn btn-secondary" type="button" data-bs-dismiss="modal">Close</button>
                           
                          </div>
                        </div>
                      </div>
                    </div>








          <div class="container-fluid">
            <div class="page-title">
              <div class="row">
                <div class="col-12 col-sm-6">
                  <h3>Meeting Attendance View</h3>
                </div>
                <div class="col-12 col-sm-6">
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">     <i data-feather="home"></i></a></li>
                    <li class="breadcrumb-item">Meeting</li>
                    <!-- <li class="breadcrumb-item active">Register</li> -->
                  </ol>
                </div>
              </div>
            </div>
          </div>

          <!-- Register list view form start-->
          <div class="container-fluid">
            <div class="row">
              <div class="col-sm-12">
                <div class="card">
                  <div class="card-body">
                  <div class="mb-3 text-end">
                  <button class="btn btn-primary" type="button" data-bs-toggle="modal" data-bs-target="#exampleModalfat" data-whatever="@mdo">Add new member</button>
                  </div>
                    <div class="table-responsive">
                      <table class="display" id="advance-1">
                        <thead>
                          <tr>
                            <th>Sl no</th>
                            <th>Members Attended</th>
                          
                            <th>Action</th>
                          </tr>
                        </thead>
                        <tbody>
                        @foreach($attendances as $key => $attendance)
                          <tr>
                          <td>{{$key+1}}</td>
                          <td>{{ $attendance->meetingmember->firstname ?? '' }} {{ $attendance->meetingmember->lastname ?? '' }}</td>
                          <td>
                                <button class="btn badge bg-danger fw-bold" type="button" data-bs-toggle="modal" data-bs-target="#deleteModal" data-id="{{ $attendance->id }}" data-name="{{ $attendance->meetingmember->firstname ?? '' }}">
                Delete
            </button>
                              </td>
                           
                          </tr>
                          @endforeach
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
              <!-- DOM / jQuery  Ends-->
             
            </div>
          </div>

          <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteModalLabel">Are you sure you want to delete?</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>Do you really want to delete <strong id="meetingName"></strong>? This action cannot be undone.</p>
            </div>
            <div class="modal-footer">
                <form id="deleteForm" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn badge bg-danger fw-bold">Delete</button>
                </form>
                <button type="button" class="btn badge bg-secondary fw-bold" data-bs-dismiss="modal">Cancel</button>
            </div>
        </div>
    </div>
</div>

@endsection


@section("script")
<script>
document.addEventListener('DOMContentLoaded', function () {
    const deleteModal = document.getElementById('deleteModal');
    deleteModal.addEventListener('show.bs.modal', function (event) {
        const button = event.relatedTarget;
        const attendanceId = button.getAttribute('data-id');
        const meetingName = button.getAttribute('data-name');

        // Update modal text
        deleteModal.querySelector('#meetingName').textContent = meetingName;

        // Update form action
        const form = deleteModal.querySelector('#deleteForm');
        form.action = '/admin/teamattendance/' + attendanceId; // Adjust the route as needed
    });
});
</script>

script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
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















