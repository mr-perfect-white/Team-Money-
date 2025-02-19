
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
                      <a href="{{route('groups.create')}}" class="btn btn-square bg-primary " > Add
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
                            <td>{{$data->logo}}</td>
                            <td>{{$data->groupmembers_count}}</td>
                            <td>
                               <a href="{{route('groups.show',$data->id)}}"> <button class="btn badge bg-warning fw-bold ">View</button></a>
                               
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





@endsection


@section("script")
@endsection


