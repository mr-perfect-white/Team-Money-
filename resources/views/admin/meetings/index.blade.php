
@extends('admin.layouts.app')
@section('title') Registration Form @endsection
@section('style')

@endsection

@section('content')


          <div class="container-fluid">
            <div class="page-title">
              <div class="row">
                <div class="col-12 col-sm-6">
                  <h3>Meeting List View</h3>
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
                      <a href="{{route('teamMeeting.create')}}" class="btn btn-square bg-primary " > Add
                     New Meeting </a>
                  </div>
                    <div class="table-responsive">
                      <table class="display" id="advance-1">
                        <thead>
                          <tr>
                            <th>Sl no</th>
                            <th>Meeting Name</th>
                            <th>Date</th>
                            <th>Time</th>
                            <th>Mode</th>
                          
                            <th>Action</th>
                          </tr>
                        </thead>
                        <tbody>
                        @foreach($data as $key => $meeting)
                          <tr>
                          <td>{{$key+1}}</td>
                            <td>{{$meeting->tm_mtng_nm}}</td>
                            <td>{{$meeting->tm_mtng_date}}</td>
                            <td>{{$meeting->tm_mtng_time}}</td>
                            <td>@if($meeting->tm_mtng_mode == 1)
                              Online
                              @else
                              Offline
                              @endif
                            </td>
                            <td>
                               <a href="{{route('teamMeeting.show',$meeting->id)}}"> <button class="btn badge bg-primary fw-bold ">View</button></a>
                                <a href="{{route('teamMeeting.edit',$meeting->id)}}"><button class="btn badge btn-warning fw-bold">Edit</button></a>
                                <a href="{{route('teamattendance.index',['meeting' => $meeting->id])}}"><button class="btn badge btn-secondary fw-bold">Attendance</button></a>

                                <button class="btn badge bg-danger fw-bold" type="button" data-bs-toggle="modal" data-bs-target="#deleteModal" data-id="{{ $meeting->id }}" data-name="{{ $meeting->tm_mtng_nm }}">
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
        const meetingId = button.getAttribute('data-id');
        const meetingName = button.getAttribute('data-name');

        // Update modal text
        deleteModal.querySelector('#meetingName').textContent = meetingName;

        // Update form action
        const form = deleteModal.querySelector('#deleteForm');
        form.action = '/admin/teamMeeting/' + meetingId; // Adjust the route as needed
    });
});
</script>
@endsection


