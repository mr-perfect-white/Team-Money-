
@extends('member.layouts.app')
@section('title')  @endsection
@section('style')

@endsection
@section('content')


<div class="content">
            <div class="row mt-4 mb-0">
                <div class="col-12 pe-2">
                    <div class="card card-style mx-0 p-3 mb-0">
                        <h5 class="mb-2 font-16 line-height-s font-600 color-theme">Add New&nbsp; Meeting</h5>
                     <form action="{{route('groupmeeting.store')}}" method="POST">
                        @csrf
                        <input class="" type="hidden" name="group_id" id="" placeholder="" value="{{$grp_id->group_id}}" required>
                        <input class="" type="text" name="gp_mtng_nm" id="" placeholder="meeting name" required>
                        <input class="" type="text"  name="gp_mtng_purpose" id="" placeholder="meeting purpose" required>
                        <input class="" type="text" name="gp_mtng_details" id="" placeholder="meeting details" required>
                        <input class="" type="date" name="gp_mtng_date" id="" placeholder="meeting date" required>
                  
                        <input class="" type="time" name="gp_mtng_time" id="" placeholder="meeting time" required>
                        <input class="" type="text" name="gp_mtng_mode" id="" placeholder="meeting mode" required>
                        <button type="submit" class="btn btn-primary"></button>
                     </form>
                    </div>
                 
                <div>
                </div>
                </div>
            </div>
</div>
@endsection
@section("script")
@endsection




