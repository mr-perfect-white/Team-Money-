
@extends('member.layouts.app')
@section('title')  @endsection
@section('style')

@endsection
@section('content')
 @if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

@if(session('error'))
<div class="alert alert-danger">
        {{ session('error') }}
    </div>

@endif

    <div class="container">
    @if(isset($dataForGroupMember))
          
    <div class="splide single-slider slider-no-arrows slider-no-dots" id="single-slider-1">
            <div class="splide__track">
                <div class="splide__list">
                    <div class="splide__slide">
                        <div class="card card-style bg-20" data-card-height="180">
                            <div class="card-top ps-3 pt-3">
                                <h1 class="color-white font-19">MasterCard</h1>
                            </div>
                            <div class="card-center pe-3">
                                <h4 class="color-white text-end">** ** ** 6345</h4>
                            </div>
                            <div class="card-bottom ps-3 pb-2">
                                <h5 class="color-white">Jack Singer</h5>
                            </div>
                            <div class="card-bottom pe-3 pb-2">
                                <h5 class="color-white float-end">01/26</h5>
                            </div>
                            <div class="card-overlay bg-gradient"></div>
                        </div>
                    </div>
                    <div class="splide__slide">
                        <div class="card card-style bg-1" data-card-height="180">
                            <div class="card-top ps-3 pt-3">
                                <h1 class="color-white">AMEX</h1>
                            </div>
                            <div class="card-center pe-3">
                                <h4 class="color-white text-end">** ** ** 3415</h4>
                            </div>
                            <div class="card-bottom ps-3 pb-2">
                                <h5 class="color-white">John Runner</h5>
                            </div>
                            <div class="card-bottom pe-3 pb-2">
                                <h5 class="color-white float-end">03/25</h5>
                            </div>
                            <div class="card-overlay bg-gradient"></div>
                        </div>
                    </div>
                    <div class="splide__slide">
                        <div class="card card-style bg-6" data-card-height="180">
                            <div class="card-top ps-3 pt-3">
                                <h1 class="color-white">Visa</h1>
                            </div>
                            <div class="card-center pe-3">
                                <h4 class="color-white text-end">** ** ** 3456</h4>
                            </div>
                            <div class="card-bottom ps-3 pb-2">
                                <h5 class="color-white">Jane Louder</h5>
                            </div>
                            <div class="card-bottom pe-3 pb-2">
                                <h5 class="color-white float-end">05/24</h5>
                            </div>
                            <div class="card-overlay bg-gradient"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
            
       

        <div class="content">
            <div class="text-center mb-2">
                <h2>Group</h2>
            </div>
            <div class="row text-center">
                <a href="#" class="col-4">
                    <div class="card card-style mx-0 py-4 mb-0 text-center d-flex flex-column align-items-center justify-content-center">
                    <i data-feather="grid" 
                    data-feather-line="1"
                    data-feather-size="50"
                    data-feather-color="blue-dark"
                    data-feather-bg="blue-fade-light">
                    </i>
                        <p class="font-15">Dashboard</p>
                    </div>
                </a>
                <a href="#" class="col-4">
                    <div class="card card-style mx-0 py-4 mb-0 text-center d-flex flex-column align-items-center justify-content-center">
                    <i data-feather="credit-card" 
                        data-feather-line="1"
                        data-feather-size="50"
                        data-feather-color="green-dark"
                        data-feather-bg="green-fade-light">
                        </i>
                        <p class="font-15">Finance</p>
                    </div>
                </a>
                <a href="#" class="col-4">
                    <div class="card card-style mx-0 py-4 mb-0 text-center d-flex flex-column align-items-center justify-content-center">
                        <i data-feather="clock" 
                        data-feather-line="1"
                        data-feather-size="50"
                        data-feather-color="purple-dark"
                        data-feather-bg="purple-fade-light">
                        </i>
                        <p class="font-15">Meetings</p>
                    </div>
                </a>

                <a href="#" class="float-end text-end mt-2" data-menu="menu-language" >
                                <strong>view more</strong>
                                <i class="fa fa-angle-right me-2"></i>
                  </a>
            </div>
        </div>

        <div class="content">
            <div class="text-center mb-2">
                <h2>My Details</h2>
            </div>
            <div class="row text-center">
                <a href="#" class="col-4">
                    <div class="card card-style mx-0 py-4 mb-0 text-center d-flex flex-column align-items-center justify-content-center">
                    <i data-feather="grid" 
                    data-feather-line="1"
                    data-feather-size="50"
                    data-feather-color="blue-dark"
                    data-feather-bg="blue-fade-light">
                    </i>
                        <p class="font-15">Dashboard</p>
                    </div>
                </a>
                <a href="#" class="col-4">
                    <div class="card card-style mx-0 py-4 mb-0 text-center d-flex flex-column align-items-center justify-content-center">
                    <i data-feather="credit-card" 
                    data-feather-line="1"
                    data-feather-size="50"
                    data-feather-color="green-dark"
                    data-feather-bg="green-fade-light">
                    </i>
                        <p class="font-15">Finance</p>
                    </div>
                </a>
                <a href="#" class="col-4">
                    <div class="card card-style mx-0 py-4 mb-0 text-center d-flex flex-column align-items-center justify-content-center">
                    <i data-feather="activity" 
                    data-feather-line="1"
                    data-feather-size="50"
                    data-feather-color="orange-dark"
                    data-feather-bg="orange-fade-light">
                    </i>
                        <p class="font-15">Activity</p>
                    </div>
                </a>
                <a href="#" class="float-end text-end mt-2" data-menu="menu-tips-1" >
                                <strong>view more</strong>
                                <i class="fa fa-angle-right me-2"></i>
                  </a>
            </div>
        </div>

        <div class="content">
            <div class="text-center mb-2">
                <h2>Group Finance</h2>
            </div>
            <div class="row text-center">
                <a href="#" class="col-4">
                    <div class="card card-style mx-0 py-4 mb-0 text-center d-flex flex-column align-items-center justify-content-center">
                    <i data-feather="grid" 
                    data-feather-line="1"
                    data-feather-size="50"
                    data-feather-color="blue-dark"
                    data-feather-bg="blue-fade-light">
                    </i>
                        <p class="font-15">Dashboard</p>
                    </div>
                </a>
               
                <a href="#" class="float-end text-end mt-2" data-menu="" >
                                <strong>view more</strong>
                                <i class="fa fa-angle-right me-2"></i>
                  </a>
            </div>
        </div>
      




        @elseif(isset($dataForNonGroupMember))
            <div class="alert alert-warning">
                {{ $dataForNonGroupMember }}
            </div>
          
            <div>
                <h3>Non-Group Member Dashboard</h3>
               
            </div>
        @else
            <div class="alert alert-danger">
                You are not a registered member.
            </div>
        @endif
    </div>













        
      

       

@endsection
      
@section("script")
@endsection


