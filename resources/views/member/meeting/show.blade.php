
@extends('member.layouts.app')
@section('title')  @endsection
@section('style')

@endsection
@section('content')


<div class="content">
            <div class="row mt-4 mb-0">
                <div class="col-12 pe-2">
                    <div class="card card-style mx-0 p-3 mb-0">
                        <h5 class="mb-2 font-16 line-height-s font-600 color-theme">Group &nbsp; Meeting Details</h5>
                     
                           <div class="">
                           <ul class="">
                                <li class=""> Meeting Name &nbsp; : &nbsp;{{ $groupMeeting->gp_mtng_nm }}</li>
                                    <li>Meeting Purpose &nbsp; : &nbsp{{ $groupMeeting->gp_mtng_purpose}}</li>
                                    <li>Meeting Details &nbsp; : &nbsp{{ $groupMeeting->gp_mtng_details}}</li>
                                    <li>Meeting Date &nbsp; : &nbsp{{ $groupMeeting->gp_mtng_date}}</li>
                                    <li>Scheduled Time of Meeting &nbsp; : &nbsp{{ $groupMeeting->gp_mtng_time}}</li>
                                    <li>Mode of Meeting&nbsp; : &nbsp{{ $groupMeeting->gp_mtng_mode}}</li>
                            </ul>
                           </div>
                        
                    </div>
                  
                <div>
               
                </div>
                </div>
            </div>
</div>
@endsection
@section("script")
@endsection


