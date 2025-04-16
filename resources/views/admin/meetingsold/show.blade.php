
@extends('admin.layouts.app')
@section('title') Registration Form @endsection
@section('style')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/choices.js/public/assets/styles/choices.min.css" />

@endsection

@section('content')

<div class="container-fluid">
            <div class="page-title">
              <div class="row">
                <div class="col-12 col-sm-6">
                  <h3>Team Meeting Details</h3>
                </div>
                <div class="col-12 col-sm-6">
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">     <i data-feather="home"></i></a></li>
                    <li class="breadcrumb-item">Team Meeting </li>
                    <!-- <li class="breadcrumb-item active">Register</li> -->
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
                           Meeting Name : <span style="font-size: 15px;color:black;"> {{$teamMeeting->tm_mtng_nm}}</span>
                          </h4>
                          <h4 class="p-2">
                          Meeting Purposes : <span style="font-size: 15px;">  {{$teamMeeting->tm_mtng_purpose}}</span>
                          </h4>
                          <h4 class="p-2">
                          Meeting Details : <span style="font-size: 15px;">  {{$teamMeeting->tm_mtng_details}}</span>
                          </h4>
                          <h4 class="p-2">
                          Meeting   Date : <span style="font-size: 15px;"> {{$teamMeeting->tm_mtng_date}}</span>
                          </h4>
                          <h4 class="p-2">
                          Meeting   Time: <span style="font-size: 15px;"> {{$teamMeeting->tm_mtng_time}}</span>
                          </h4>
                          <h4 class="p-2">
                          Meeting  Mode : <span style="font-size: 15px;"> {{$teamMeeting->tm_mtng_mode}}</span>
                          </h4>
                          @if($teamMeeting->tm_mtnmtng_urlg_mode)
                          <h4 class="p-2">
                          Meeting  URL : <span style="font-size: 15px;"> 
                          {{$teamMeeting->mtng_url}}
                          </span>
                          </h4>
                          @else
                          <h4 class="p-2">
                          Meeting  Location : <span style="font-size: 15px;"> 
                          {{$teamMeeting->mtng_aadr}}
                          </span>
                          </h4>
                          
                            @endif
                          
                        </div>
                      </div>
                    </div>
                 

       
    
@endsection

@section("script")
@endsection


