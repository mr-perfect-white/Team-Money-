
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
                           <td>{{$key+1}}</td>
                            <td>{{$memberlist->FullName}}</td>
                            <td>{{$memberlist->phone}}</td>
                            <td>{{$memberlist->email}}</td>
                            <td><span class="btn btn-square badge badge-light-info">{{$memberlist->is_active}}</span></td>
                            <td>
                               <a href="{{route('registers.show',$memberlist->id)}}"> <button class="btn badge bg-warning fw-bold ">View</button></a>
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


