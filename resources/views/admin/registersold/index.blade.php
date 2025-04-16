
@extends('admin.layouts.app')
@section('title') Registration Form @endsection
@section('style')

@endsection

@section('content')


          <div class="container-fluid">
            <div class="page-title">
              <div class="row">
                <div class="col-12 col-sm-6">
                  <h3>Register List View</h3>
                </div>
                <div class="col-12 col-sm-6">
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">     <i data-feather="home"></i></a></li>
                    <li class="breadcrumb-item">Register</li>
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
                      <a href="{{route('registers.create')}}" class="btn btn-square bg-primary " > Add
                     Member </a>
                  </div>
                    <div class="table-responsive">
                      <table class="display" id="advance-1">
                        <thead>
                          <tr>
                          <th> Sl no</th>
                            <th>Member Name</th>
                            <th>Phone Number</th>
                            <th>Email</th>
                            <th>status</th>
                            <th>Action</th>
                          </tr>
                        </thead>
                        <tbody>
                        @foreach($data as $key => $memberlist)
    <tr>
        <td>{{ $key + 1 }}</td>
        <td>{{ $memberlist->FullName }}</td>
        <td>{{ $memberlist->phone }}</td>
        <td>{{ $memberlist->email }}</td>
        <td><span class="btn btn-square badge badge-light-info">{{ $memberlist->is_active }}</span></td>
        <td>
            <a href="{{ route('registers.show', $memberlist->id) }}">
                <button class="btn badge bg-warning ">View</button>
            </a>
            <a href="{{ route('registers.edit', $memberlist->id) }}">
                <button class="btn badge bg-secondary ">Edit</button>
            </a>
            <button class="btn badge bg-danger " type="button" data-bs-toggle="modal" data-bs-target="#deleteModal" data-id="{{ $memberlist->id }}" data-name="{{ $memberlist->FullName }}">
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

<!-- Modal HTML (this will be the same modal for all items) -->
<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteModalLabel">Are you sure you want to delete?</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>Do you really want to delete <strong id="memberName"></strong>? This action cannot be undone.</p>
            </div>
            <div class="modal-footer">
                <form id="deleteForm" method="POST" action="{{ route('registers.destroy', $memberlist->id) }}">
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

<!-- JavaScript to handle the dynamic modal population -->
<script>
    // When the delete button is clicked, set the appropriate member's ID in the modal form
    $('#deleteModal').on('show.bs.modal', function(event) {
        var button = $(event.relatedTarget); // Button that triggered the modal
        var memberId = button.data('id'); // Extract info from data-* attributes
        var memberName = button.data('name'); // Extract info from data-* attributes

        var modal = $(this);
    
        modal.find('#memberName').text(memberName); // Set the member name in modal
        modal.find('#deleteForm').attr('action', '/registers/' + memberId); // Set the action URL dynamically
        console.log(memberId);
    });
</script>

@section("script")
@endsection


