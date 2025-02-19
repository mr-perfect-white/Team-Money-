
@extends('admin.layouts.app')
@section('title') Registration Form @endsection
@section('style')

@endsection

@section('content')


<div class="container-fluid">
            <div class="page-title">
              <div class="row">
                <div class="col-12 col-sm-6">
                  <h3>Group Detailed View</h3>
                </div>
                <div class="col-12 col-sm-6">
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">     <i data-feather="home"></i></a></li>
                    <li class="breadcrumb-item">Group</li>
                  </ol>
                </div>
              </div>
            </div>
          </div>

          
          <div class="container-fluid">
            <div class="row">
              <div class="col-sm-6">
                <div class="card">
                  <div class="card-body">
              
                    <div class="mb-3 text-center">
                      <h5>Group members list</h5>
                    </div>
                    <div class="table-responsive">
                        <table class="display" id="group-member">
                            <thead>
                           <tr>
                           <th>Sl no</th>
                            <th>Member Name</th>
                           </tr>
                            </thead>
                      
                            <tbody>
                                @foreach($members as $key => $member)
                                <tr>
                                <td>{{$key+1}}</td>
                                <td>{{$member->firstname}}&nbsp;{{$member->lastname}}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                  </div>
                </div>
              </div>

              <div class="col-sm-6">
                <div class="card">
                  <div class="card-body">

                  <div class="mb-3 text-center">
                      <h5>Group  Details</h5>
                    </div>

                    <p class="fs-6">{{$group->name}}</p>
                    <p class="fs-6">{{$group->created_at}}</p>
                  </div>
                </div>
              </div>

              <div class="col-sm-6">
                <div class="card">
                  <div class="card-body">

                  <div class="mb-3 text-center">
                      <h5>Group  Meetings Details</h5>
                    </div>

                    <p class="fs-6">{{$group->name}}</p>
                    <p class="fs-6">{{$group->created_at}}</p>
                  </div>
                </div>
              </div>
             
            </div>
          </div>


@endsection

@section("script")
@endsection


