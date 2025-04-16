
@extends('member.layouts.app')
@section('title')  @endsection
@section('style')

@endsection
@section('content')


<div class="content">
            <div class="row mt-4 mb-0">
                <div class="col-12 pe-2">
                    <div class="card card-style mx-0 p-3 mb-0">
                        <h5 class="mb-2 font-16 line-height-s font-600 color-theme">Group &nbsp; Members</h5>
                        <ul>
                            @foreach($membersInGroup as $member)
                                <li>{{ $member->firstname }} &nbsp;{{ $member->lastname }}</li>
                            @endforeach
                        </ul>
                    </div>
                <div>
                </div>
                </div>
            </div>
</div>

@endsection
@section("script")
@endsection


