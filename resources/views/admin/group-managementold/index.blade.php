
@extends('admin.layouts.app')
@section('title') Registration Form @endsection
@section('style')
@endsection
@section('content')


          <div class="container-fluid">
            <div class="page-title">
              <div class="row">
                <div class="col-12 col-sm-6">
                  <h3>Groups List View</h3>
                </div>
                <div class="col-12 col-sm-6">
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">     <i data-feather="home"></i></a></li>
                    <li class="breadcrumb-item">Groups</li>
                  </ol>
                </div>
              </div>
            </div>
          </div>

          
          <div class="container-fluid">
            <div class="row">
              <div class="col-sm-12">
                <div class="card">
                  <div class="card-body">

                    <div class="mb-3 text-end">
                      <a href="{{route('group.create')}}" class="btn btn-square bg-primary " > Add
                     Group </a>
                  </div>
                    <div class="table-responsive">
                      <table class="display" id="advance-1">
                        <thead>
                          <tr>
                          <th> Sl no</th>
                            <th>Group Name</th>
                            <th>Group Logo</th>
                            <th>Group Members count</th>
                            <!-- <th>status</th> -->
                            <th>Action</th>
                          </tr>
                        </thead>
                        <tbody>
                       @foreach($data as $key => $data)
                       <tr>
                       <td>{{$key+1}}</td>
                            <td>{{$data->name}}</td>
                      <td>
                <a href="{{asset('uploads/group-logos/' .$data->logo)}}" target="_blank"> <img src="{{asset('uploads/group-logos/' .$data->logo)}}" style="height:100px;width:100px;"></a>

                          </td>
                            <td>{{$data->groupmembers_count}}</td>
                            <td>
                               <a href="{{route('group.show',$data->id)}}"> <button class="btn badge bg-secondary fw-bold ">View</button></a>
                               <a href="{{route('group.edit',['group'=>$data->id])}}"> <button class="btn badge bg-warning fw-bold ">edit</button></a>

                               <button class="btn badge bg-danger fw-bold" type="button" data-bs-toggle="modal" data-bs-target="#deleteModal" data-id="{{ $data->id }}" data-name="{{ $data->name }}">
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
                <p>Do you really want to delete <strong id="memberName"></strong>? This action cannot be undone.</p>
            </div>
            <div class="modal-footer">
                <form id="deleteForm" method="POST" action="">
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

<!-- <script>
    $('#deleteModal').on('show.bs.modal', function(event) {
        var button = $(event.relatedTarget); // Button that triggered the modal
        var memberId = button.data('id'); // Extract info from data-* attributes
        var memberName = button.data('name'); // Extract info from data-* attributes

        var modal = $(this);
    
        modal.find('#memberName').text(memberName); // Set the member name in modal
        modal.find('#deleteForm').attr('action', '/registers/' + memberId); // Set the action URL dynamically
        console.log(memberId);
    });
</script> -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<script>
    $('#deleteModal').on('show.bs.modal', function(event) {
        var button = $(event.relatedTarget);
        var memberId = button.data('id');
        var memberName = button.data('name');

        var modal = $(this);

        modal.find('#memberName').text(memberName);
        modal.find('#deleteForm').attr('action', '/group/' + memberId);
        console.log('Deleting group ID:', memberId);
    });
</script>



@section("script")
@endsection


