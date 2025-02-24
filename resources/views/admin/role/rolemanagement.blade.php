
@extends('admin.layouts.app')
@section('title') Registration Form @endsection
@section('style')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/choices.js/public/assets/styles/choices.min.css" />

<style>
    .select2-results__option ul {
    border: 1px solid #f4eded;
    margin: 10px 0px 10px 10px;
}
li.select2-results__option {
    margin-bottom: 5px;
}

</style>

@endsection

@section('content')

<div class="container-fluid">
            <div class="page-title">
              <div class="row">
                <div class="col-12 col-sm-6">
                  <h3> Role Management </h3>
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

  <!-- Group form start-->
  <div class="card">
            <div class="card-body">
                <form id="groupForm"  action="" method="POST">
                    @csrf
                    <div class="row">
                  
                        <div class="col-md-12 mb-3">
                            <label class="form-label" for="mname">Role Name</label>
                            <input type="text" class="form-control" id="meeting_name" name="" value="">
                          

                            <div class="invalid-feedback">Please enter a  name.</div>
                        </div>

                        <div class="col-md-12 mb-3">
                            <label class="form-label" for="mname">Group id</label>
                           
                            <div class="invalid-feedback">Please enter a  name.</div>
                        </div>

                     
                       
                        

                    </div>

                 
                    
                    <button class="btn btn-primary" type="submit">Submit</button>
                </form>
            </div>
        </div>
              
                 

       
    
@endsection

@section("script")
@endsection


