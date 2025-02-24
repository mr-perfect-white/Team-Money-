
@extends('admin.layouts.app')
@section('title') Registration Form @endsection
@section('style')

@endsection

@section('content')


          <div class="container-fluid">
            <div class="page-title">
              <div class="row">
                <div class="col-12 col-sm-6">
                  <h3>Role Memmber List </h3>
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
                      <a href="{{route('role-create')}}" class="btn btn-square bg-primary " > Add
                     New Role</a>
                  </div>
                    <div class="table-responsive">
                      <table class="display" id="advance-1">
                        <thead>
                          <tr>
                            <th>Sl no</th>
                            <th>Role Name</th>
                            <th>Status</th>
                            <th>Created</th>
                            <th>Updated</th>
                          
                            <th>Action</th>
                          </tr>
                        </thead>
                        <tbody>
                        @foreach($data as $key => $role)
                          <tr>
                          <!-- <td>{{$key+1}}</td> -->
                            <td>{{$role->id}}</td>
                            <td>{{$role->name}}</td>
                            <td>{{$role->status}}</td>
                            <td>{{$role->created_at}}</td>
                            <td>{{$role->updated_at}}</td>
                            <td>
                                <a href="" class="btn btn-square btn-info">View</a>
                                <a href="{{ route('memberrole.role-edit', $role->id) }}" class="btn btn-square btn-warning ">Edit</a>
                                <form action="{{ route('memberrole.destroy', $role->id) }}" method="POST" style="display:inline;">
    @csrf
    @method('DELETE')
    <button type="submit" class="btn btn-square btn-danger" onclick="return confirm('Are you sure you want to delete this role?')">Delete</button>
</form>


                                
                                
                              
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





@endsection


@section("script")
@endsection


