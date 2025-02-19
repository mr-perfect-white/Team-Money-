
@extends('admin.layouts.app')
@section('title') Registration Form @endsection
@section('style')

@endsection

@section('content')

          <div class="container-fluid">
            <div class="page-title">
              <div class="row">
                <div class="col-12 col-sm-6">
                  <h3>Register Details</h3>
                </div>
                <div class="col-12 col-sm-6">
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">     <i data-feather="home"></i></a></li>
                    <li class="breadcrumb-item">Register</li>
                  </ol>
                </div>
              </div>
            </div>
          </div>

          <!-- Register form start-->
          
                    <div class="card">
                      <div class="card-body">
                        <div class="blog-details">
                         
                          <h4 class="p-2">
                            First Name : <span style="font-size: 15px;"> {{$data->firstname}}</span>
                          </h4>
                          <h4 class="p-2">
                            Last Name : <span style="font-size: 15px;"> {{$data->lastname}}</span>
                          </h4>
                          <h4 class="p-2">
                            Mobile : <span style="font-size: 15px;"> {{$data->phone}}</span>
                          </h4>
                          <h4 class="p-2">
                            Email : <span style="font-size: 15px;"> {{$data->email}}</span>
                          </h4>
                          <h4 class="p-2">
                            Permanent Address : <span style="font-size: 15px;">{{$data->permanent_addr}}</span>
                          </h4>
                          <h4 class="p-2">
                            Temporary Address : <span style="font-size: 15px;">{{$data->temporary_addr}}</span>
                          </h4>
                          <h4 class="p-2">
                        Document Uploaded: <span style="font-size: 15px;"></span>
                          </h4>
                          
                        </div>
                      </div>
                    </div>
                 

          <!-- Register form end -->
         




@endsection

@section("script")
@endsection


