
@extends('member.layouts.app')
@section('title')  @endsection
@section('style')

@endsection
@section('content')


<div class="content">
            <div class="row mt-4 mb-0">
                <div class="col-12 pe-2">
                    <div class="card card-style mx-0 p-3 mb-0">
                        <h5 class="mb-2 font-16 line-height-s font-600 color-theme">Group &nbsp; Meetings</h5>
                        @foreach($meeting as $member)
                                <li> Meeting Name &nbsp; : &nbsp;{{ $member->gp_mtng_nm }}</li>
                                <li> <a href="{{route('groupmeeting.show',$member->id)}}" class="btn btn-sm btn-primary"> view details</a></li>

                                <!-- <li>Meeting Purpose&nbsp; : &nbsp{{ $member->gp_mtng_purpose}}</li>
                                <li>Meeting Details&nbsp; : &nbsp{{ $member->gp_mtng_details}}</li>
                                <li>Meeting Date&nbsp; : &nbsp{{ $member->gp_mtng_date}}</li>
                                <li>Scheduled Time of Meeting &nbsp; : &nbsp{{ $member->gp_mtng_time}}</li>
                                <li>Mode of Meeting&nbsp; : &nbsp{{ $member->gp_mtng_mode}}</li> -->
                            @endforeach
                    </div>
                  
                <div>
               
                </div>
                </div>
            </div>
</div>
@endsection
@section("script")
@endsection


