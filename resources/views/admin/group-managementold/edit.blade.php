
@extends('admin.layouts.app')
@section('title') Registration Form @endsection
@section('style')
@endsection
@section('content')

<div class="col-sm-12">
                <div class="card">
                  <div class="card-body">

                  <div class="mb-3 text-center">
                      <h5>Edit/Update Group  Details</h5>
                    </div>
<form action="{{route('group.update',['group'=>$group->id])}}" method="POST">
    @csrf
    @method('PUT')
                            <div class="mb-3">
                                <label class="col-form-label" for="recipient-name">Group Name:</label>
                                <input class="form-control" type="text" name="name" value="{{$group->name}}">
                                <input class="form-control" type="hidden" name="group_id" value="{{$group->id}}">
                              </div>

                              <div class="mb-3">
                                <label class="col-form-label" for="recipient-name">Group logo:</label>
                                <input class="form-control" type="file" name="logo">
                                <img>
                              
                              </div>

                              <button class="btn btn-primary" type="submit">Add</button>
</form>
                  
                  </div>
                </div>
              </div>
          


                    <div class="modal fade" id="exampleModalfat" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel2">New Member</h5>
                            <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                          </div>
                          <div class="modal-body">
                            <form id="addmember" action="{{route('groupmember.store')}}" method="POST">
                              @csrf
                              <div class="mb-3">
                                <label class="col-form-label" for="recipient-name">Group Name:</label>
                                <input class="form-control" type="text" value="{{$group->name}}" readonly>
                                <input class="form-control" type="hidden" name="group_id" value="{{$group->id}}">
                              </div>
                              <div class="mb-3">
                                <label class="col-form-label" for="message-text">Members List:</label>
                                <label class="form-label" for="members">Members</label>
                                    <select class="form-select" id="members" name="member_id">
                                    <option > select member </option>
                                    @foreach($newmembers as $key => $member)
                                            <option value="{{$member->id}}">{{$member->FullName}}</option>
                                        @endforeach
                                    </select>
                                    <div class="invalid-feedback">Please select one option.</div>
                              </div>
                              <div class="mb-3">
                                <label class="col-form-label" for="message-text">Role:</label>
                                <label class="form-label" for="role">Members</label>
                                    <select class="form-select" id="role" name="role">
                                    <option > select Role </option>
                                    @foreach($roles as $key => $role)
                                            <option value="{{$role->id}}">{{$role->name}}</option>
                                        @endforeach
                                    </select>
                                    <div class="invalid-feedback">Please select one option.</div>
                              </div>
                              <button class="btn btn-primary" type="submit">Add</button>
                            </form>
                            <div id="responseMessage" style="display:none;"></div>
                          </div>
                          <div class="modal-footer">
                            <button class="btn btn-secondary" type="button" data-bs-dismiss="modal">Close</button>
                          </div>
                        </div>
                      </div>
                    </div>



                    <div class="container-fluid">
            <div class="row">
              <div class="col-sm-12 col-md-12 col-xl-12">
                <div class="card">
                  <div class="card-body">
                  <div class="mb-3 text-end">
                  <a  class="btn btn-primary text-end" type="button" data-bs-toggle="modal" data-bs-target="#exampleModalfat" data-whatever="@mdo">Add New member</a>
                    </div>
                    <div class="mb-3 text-center">
                      <h5>Add/remove Group members </h5>
                    </div>
                    <div class="table-responsive col-sm-12 col-md-12 col-xl-12">
                        <table class="display" id="group-member">
                            <thead>
                           <tr>
                           <th>Sl no</th>
                            <th>Member Name</th>
                           
                            <th>Action</th>
                           </tr>
                            </thead>
                      
                            <tbody>
                                @foreach($members as $key => $member)
                                <tr>
                               <td>{{$key+1}}</td>
                                <td>{{$member->firstname}}&nbsp;{{$member->lastname}}</td>
                              
                                <td>
                                    @php
                                    $group_id= DB::table('groupmembers')->select('id')->where('member_id',$member->id)->first();
                                    @endphp
                               <button class="btn badge bg-danger fw-bold" type="button" data-bs-toggle="modal" data-bs-target="#deleteModal" data-id="{{ $group_id->id }}" data-name="{{ $member->firstname }}">
                Remove member 
            </button>
                            </td>
                                </tr>
                                <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-sm" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="deleteModalLabel">Are you sure you want to delete?</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <p>Do you really want to delete <strong id="memberName"></strong>? This action cannot be undone.</p>
                                                </div>
                                                <div class="modal-footer">
                                                    <form id="deleteForm" method="POST" action="{{ route('groupmember.destroy', $group_id->id) }}">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn badge bg-danger fw-bold">Delete</button>
                                                    </form>
                                                    <button type="button" class="btn badge bg-secondary fw-bold" data-bs-dismiss="modal">Cancel</button>
                                                </div>
                                            </div>
                                        </div>
                              </div>
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


