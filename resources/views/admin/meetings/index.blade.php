
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
                      <a href="{{route('teammeeting.create')}}" class="btn btn-square bg-primary " > Add
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
                            <td>{{$meeting->tm_mtng_mode}}</td>
                            <td>
                               <a href="{{route('teammeeting.show',$meeting->id)}}"> <button class="btn badge bg-primary fw-bold ">View</button></a>
                                <a href="{{route('teammeeting.edit',$meeting->id)}}"><button class="btn badge btn-warning fw-bold">Edit</button></a>
                                <a href="{{route('teammeeting.destroy',$meeting->id)}}"><button class="btn badge btn-danger fw-bold">Delete</button></a>
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


