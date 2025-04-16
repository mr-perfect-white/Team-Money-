
@extends('admin.layouts.app')
@section('title') Registration Form @endsection
@section('style')

@endsection

@section('content')

<div class="">
    <div class="container-fluid">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-sm-6">
                    <!-- <h3>Default</h3> -->
                </div>
                <div class="col-12 col-sm-6">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"> <a class="home-item" href="#"><i
                                    data-feather="home"></i></a>
                        </li>
                        <li class="breadcrumb-item"> Dashboard</li>
                        <!-- <li class="breadcrumb-item active"> Default</li> -->
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <!-- Container-fluid starts-->
    <div class="container-fluid default-dash">
        <div class="d-flex flex-column gap-3">
            <div class="d-flex row flex-wrap">
                <div class="col-md-3 col-12">
                    <div class="card br">
                        <div class="card-body">
                            <div class="d-flex flex-row justify-content-between align-items-center">
                                <div class="d-flex flex-column gap-2">
                                    <h5>Total</h5>
                                    <span class="fs-6 fw-800 text-danger"></span>
                                </div>
                                <div>
                                    <span class="fs-2"><i class="fa-sharp fa-regular fa-dumpster-fire"></i></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-12">
                    <div class="card br">
                        <div class="card-body">
                            <div class="d-flex flex-row justify-content-between align-items-center">
                                <div class="d-flex flex-column gap-2">
                                    <h5>Approved</h5>
                                    <span class="fs-6 fw-800 text-danger"></span>
                                </div>
                                <div>
                                     <span class="fs-2"><i class="fa-sharp fa-solid fa-check text-success"></i></span> 
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-12">
                    <div class="card br">
                        <div class="card-body">
                            <div class="d-flex flex-row justify-content-between align-items-center">
                                <div class="d-flex flex-column gap-2">
                                    <h5>Rejected</h5>
                                    <span class="fs-6 fw-800 text-danger"></span>
                                </div>
                                <div>
                                    <span class="fs-2"><i class="fa-sharp fa-solid fa-xmark text-danger"></i></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-12">
                    <div class="card br">
                        <div class="card-body">
                            <div class="d-flex flex-row justify-content-between align-items-center">
                                <div class="d-flex flex-column gap-2">
                                    <h5>Pending</h5>
                                    <span class="fs-6 fw-800 text-danger"></span>
                                </div>
                                <div>
                                     <span class="fs-2"><i class="fa-regular fa-hourglass-half"></i></span> 
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </div>
    <!-- Container-fluid Ends-->
</div>




@endsection

@section("script")
@endsection


