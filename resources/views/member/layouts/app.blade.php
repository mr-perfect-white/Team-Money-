<!DOCTYPE HTML>
<html lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, viewport-fit=cover" />
<title> Team Money</title>
<link rel="stylesheet" type="text/css" href="{{asset('member/styles/bootstrap.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('member/styles/style.css')}}">
<link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900|Roboto:300,300i,400,400i,500,500i,700,700i,900,900i&amp;display=swap" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="{{asset('member/fonts/css/fontawesome-all.min.css')}}">    
<link rel="manifest" href="{{asset('member/_manifest.json')}}" data-pwa-version="set_in_manifest_and_pwa_js">
<link rel="apple-touch-icon" sizes="180x180" href="{{asset('member/app/icons/icon-192x192.png')}}">

@yield('style')
</head>
    
<body class="theme-light" data-highlight="blue2">
    
<div id="preloader"><div class="spinner-border color-highlight" role="status"></div></div>
@if(auth()->guard('member')->user())
<div id="page">
    
        <div class="header header-fixed header-auto-show header-logo-app">
            <a href="index.html" class="header-title">Team Money</a>
            <a href="#" data-menu="menu-main" class="header-icon header-icon-1"><i class="fas fa-bars"></i></a>
            <a href="#" data-toggle-theme class="header-icon header-icon-2 show-on-theme-dark"><i class="fas fa-sun"></i></a>
            <a href="#" data-toggle-theme class="header-icon header-icon-2 show-on-theme-light"><i class="fas fa-moon"></i></a>
            <a href="#" data-menu="menu-highlights" class="header-icon header-icon-3"><i class="fas fa-brush"></i></a>
        </div>
            @include('member.layouts.memberfooter')
    
            <div class="page-content">
             
                <div class="page-title page-title-large">
                            <h2 data-username="Enabled!" class="greeting-text"></h2>
                                
                    <a href="#" data-menu="menu-main" class="bg-fade-highlight-light shadow-xl preload-img" data-src="{{asset('member/images/avatars/5s.png')}}"></a>
                </div>
                <div class="card header-card shape-rounded" data-card-height="120">
                    <div class="card-overlay bg-highlight opacity-95"></div>
                    <div class="card-overlay dark-mode-tint"></div>
                    <div class="card-bg preload-img" data-src="images/pictures/20s.jpg"></div>
                </div>
                
                
                @yield('content')

            
            </div>    
            
            @include('member.layouts.footer')

            <div id="menu-meeting" class="menu menu-box-bottom menu-box-detached rounded-m" 
                data-menu-height="155" 
                data-menu-effect="menu-over">
                        <div class="row me-3 ms-3 mt-3">
                                <div class="col-4 pe-2">
                                    <a href="{{route('groupmeeting.index')}}">
                                    <span class="icon icon-l"><i class="fa fa-file rounded-m bg-yellow-dark d-block mb-3"></i></span>
                                    <h5 class="mb-n1 font-12 line-height-s font-600 color-theme">Meeting<br>List</h5>
                                    </a>
                                </div>
                                <div class="col-4 pe-2">
                                    <a href="{{route('groupmeeting.create')}}">
                                    <span class="icon icon-l"><i class="fa fa-file rounded-m bg-yellow-dark d-block mb-3"></i></span>
                                    <h5 class="mb-n1 font-12 line-height-s font-600 color-theme">Create<br>Meeting</h5>
                                    </a>
                                </div>
                                <div class="col-4 pe-2">
                                    <a href="{{route('groupmeeting.create')}}">
                                    <span class="icon icon-l"><i class="fa fa-person rounded-m bg-yellow-dark d-block mb-3"></i></span>
                                    <h5 class="mb-n1 font-12 line-height-s font-600 color-theme">Attendance<br>Details</h5>
                                    </a>
                                </div>
                                <div class="clear"></div>
                        </div>
            </div>       
            <div id="menu-language" class="menu menu-box-bottom menu-box-detached rounded-m" 
                data-menu-height="245" 
                data-menu-effect="menu-over">
                <div class="row me-3 ms-3 mt-3">
                <div class="col-4 pe-2">
                                <a href="">
                                <span class="icon icon-l"><i class="fa fa-file rounded-m bg-yellow-dark d-block mb-3"></i></span>
                                <h5 class="mb-n1 font-12 line-height-s font-600 color-theme">Group<br>Dashboard</h5>
                                </a>
                                </div>
                                <div class="col-4 pe-2">
                                <a href="">
                                <span class="icon icon-l"><i class="fa fa-file rounded-m bg-yellow-dark d-block mb-3"></i></span>
                                <h5 class="mb-n1 font-12 line-height-s font-600 color-theme">Group<br>Protocols</h5>
                                </a>
                                </div>
                                <div class="col-4 pe-2">
                                <a href="{{route('membergroup.index')}}">
                                <span class="icon icon-l"><i class="fa fa-person rounded-m bg-yellow-dark d-block mb-3"></i></span>
                                <h5 class="mb-n1 font-12 line-height-s font-600 color-theme">Group<br>Members</h5>
                                </a>
                                </div>
                                <div class="col-4 pe-2">
                                <a href="">
                                <span class="icon icon-l"><i class="fa fa-users  rounded-m bg-yellow-dark d-block mb-3"></i></span>
                                <h5 class="mb-n1 font-12 line-height-s font-600 color-theme">Group<br>Meetings</h5>
                                </a>
                                </div>
                                <div class="col-4 pe-2">
                                <a href="">
                                <span class="icon icon-l"><i class="fa fa-users  rounded-m bg-yellow-dark d-block mb-3"></i></span>
                                <h5 class="mb-n1 font-12 line-height-s font-600 color-theme">Group<br>Finance</h5>
                                </a>
                                </div>
                                <div class="col-4 pe-2">
                                <a href="">
                                <span class="icon icon-l"><i class="fa fa-users  rounded-m bg-yellow-dark d-block mb-3"></i></span>
                                <h5 class="mb-n1 font-12 line-height-s font-600 color-theme">Group<br>Activity</h5>
                                </a>
                                </div>
                    <div class="clear"></div>
                </div>
            </div> 

            <div id="menu-tips-1" 
                class="menu menu-box-bottom menu-box-detached rounded-m" 
                data-menu-height="350" 
                data-menu-effect="menu-over"> 

                    <div class="card-body row me-3 ms-3 mt-5">
                         <div class="col-3 pe-2">
                            <a href="{{route('groupmeeting.index')}}">
                            <span class="icon icon-l"><i class="fa fa-file rounded-m bg-yellow-dark d-block mb-3"></i></span>
                            <h5 class="mb-n1 font-12 line-height-s font-600 color-theme">Group<br>meetings</h5>
                            </a>
                        </div>
                        <div class="col-3 pe-2">
                            <a href="{{route('groupmeeting.create')}}">
                            <span class="icon icon-l"><i class="fa fa-file rounded-m bg-yellow-dark d-block mb-3"></i></span>
                            <h5 class="mb-n1 font-12 line-height-s font-600 color-theme">Schedule<br>New Meeting</h5>
                            </a>
                        </div>
                        <div class="col-3 pe-2">
                            <a href="{{route('groupmeeting.index')}}">
                            <span class="icon icon-l"><i class="fa fa-users rounded-m bg-yellow-dark d-block mb-3"></i></span>
                            <h5 class="mb-n1 font-12 line-height-s font-600 color-theme">Members <br>Attendance</h5>
                            </a>
                        </div>
                        <div class="col-3 pe-2">
                            <a href="">
                            <span class="icon icon-l"><i class="fa fa-person  rounded-m bg-yellow-dark d-block mb-3"></i></span>
                            <h5 class="mb-n1 font-12 line-height-s font-600 color-theme">My<br>Attendance</h5>
                            </a>
                        </div>
                        <div class="clear"></div>
                    </div>
            </div>   


            <div id="menu-main"
         class="menu menu-box-right menu-box-detached rounded-m"
         data-menu-width="260"
       
         data-menu-active="nav-features"
         data-menu-effect="menu-over">

        <div class="text-start mt-5">
        <a href="#" class="bg-fade-highlight-light shadow-xl preload-img" data-src="{{asset('member/images/avatars/5s.png')}}"></a>


        <a class="text-dark fs-5 text-start m-3" style="text-decoration:none;" href="{{ route('memberlogout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-memberform').submit();">
                                        {{ __('Logout') }}
                                    </a>
                                    <form id="logout-memberform" action="{{ route('memberlogout') }}" method="POST" class="d-none">
                                        @csrf
                                  
                                    </form>
        </div>
    </div>
   

    
</div>    
@endif
<script type="text/javascript" src="{{asset('member/scripts/bootstrap.min.js')}}"></script>
<script type="text/javascript" src="{{asset('member/scripts/custom.js')}}"></script>
@yield('script')
</body>
