
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
                              <a href="{{asset('uploads/member-documents/' .$data->document_one)}}">                         
                                <img src="{{ asset('uploads/member-documents/' .$data->document_one) }}" style="height:100px;width:100px;">
                              </a>
                          <a href="{{asset('uploads/member-documents/' .$data->document_one)}}" download>
                          <button class="btn btn-primary">Download Profile Photo</button>
                          </a>
                         
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
                          <h4 class="p-2">
                            Pan Number : <span style="font-size: 15px;">{{$data->pan_num}}</span>
                          </h4>
                          <h4 class="p-2">
                          Pan Document :
<a   href="{{ asset('uploads/member/pan_doc/' . $data->pan_doc) }}">
<img src="{{ asset('uploads/member/pan_doc/' . $data->pan_doc) }}" style="height:100px;width:100px;">

</a>
                          <a href="{{ asset('uploads/member/pan_doc/' . $data->pan_doc) }}" download>
    <button class="btn btn-primary">Download Pan Document </button>
</a>
                          </h4>
                          <h4 class="p-2">
                            Aadhaar Number : <span style="font-size: 15px;">{{$data->adhr_num}}</span>
                          

                          </h4>
                          <h4 class="p-2">
                          Aadhaar Document : 
<a  href="{{ asset('uploads/member/adhr_doc/' . $data->adhr_doc) }}" >
<img src="{{ asset('uploads/member/adhr_doc/' . $data->adhr_doc) }}" style="height:100px;width:100px;">

</a>


<a href="{{ asset('uploads/member/adhr_doc/' . $data->adhr_doc) }}" download>
    <button class="btn btn-primary">Download Aadhaar Document</button>
</a>
                          </h4>
                          <hr>
                          <h5 class="text-center">Bank Details</h5>
                          <h4 class="p-2">
                             Bank Account Number : <span style="font-size: 15px;">{{$data->accnt_num}}</span>
                          </h4>
                          <h4 class="p-2">
                          Bank Account IFSC Code Number : <span style="font-size: 15px;">{{$data->accnt_ifsc_num}}</span>
                          </h4>
                          <h4 class="p-2">
                          Bank Account Branch Address : <span style="font-size: 15px;">{{$data->accnt_brnch_dtl}}</span>
                          </h4>
                          <h4 class="p-2">
                             Monhtly Income : <span style="font-size: 15px;">{{$data->monthly_inc}}</span>
                          </h4>

                          <h4 class="p-2">
                             Sadhguru  Member Or Not : <span style="font-size: 15px;">
                            @if(($data->sadh_mem) == 1)
                            <p>Member</p>
                            @else
                            <p>Not a Member</p>
                            @endif
                            </span>
                          </h4>

                          <h4 class="p-2">
                          Sadhguru Membership ID : <span style="font-size: 15px;">{{$data->sadh_mem_id}}</span>
                          </h4>
                          
                        </div>
                      </div>
                    </div>
                 

          <!-- Register form end -->
         




@endsection

@section("script")
@endsection


