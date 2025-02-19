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
    
<div id="page">
    
    <!-- header and footer bar go here-->
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
                    <a class="dropdown-item" href="{{ route('member.logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-memberform').submit();"><i data-feather="log-in"> </i>
                                        {{ __('Logout') }}
                                    </a>
 <form id="logout-memberform" action="{{ route('member.logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                    <a href="#" data-menu="menu-main" class="bg-fade-highlight-light shadow-xl preload-img" data-src="{{asset('member/images/avatars/5s.png')}}"></a>
                </div>
                <div class="card header-card shape-rounded" data-card-height="210">
                    <div class="card-overlay bg-highlight opacity-95"></div>
                    <div class="card-overlay dark-mode-tint"></div>
                    <div class="card-bg preload-img" data-src="images/pictures/20s.jpg"></div>
                </div>
                
                
                @yield('content')

            
            </div>    
            
            @include('member.layouts.footer')

          
    
    <div id="menu-tips-1" 
         class="menu menu-box-bottom menu-box-detached rounded-m" 
         data-menu-height="350" 
         data-menu-effect="menu-over">

        <div class="card header-card shape-rounded" data-card-height="100">
            <div class="card-overlay bg-highlight opacity-95"></div>
            <div class="card-overlay dark-mode-tint"></div>
            <div class="card-bg preload-img" data-src="images/pictures/20s.jpg"></div>
        </div>

        <div class="mt-3 pt-1 pb-1" style="position:relative; z-index:22;">
            <h1 class="text-center">
                <i data-feather="smartphone" 
                   data-feather-line="1" 
                   data-feather-size="60" 
                   data-feather-color="gray-dark" 
                   data-feather-bg="none"></i>
            </h1>
            <h1 class="text-center color-white font-22 font-700">PWA Ready</h1>
            <p class="text-center mt-n3 mb-3 font-11 color-white">Just add it to your home screen and Enjoy!</p>
        </div>
        <div class="card card-style">
            <p class="boxed-text-xl pt-3 mb-3">
                Azures is a Mobile Webite, but it is also a PWA! You can add it to your home screen and navigate it 
                like you would navigate an application.
            </p>
        </div>       
        <div class="row mb-0">
            <div class="col-6">
                <a href="#" class="btn btn-border btn-sm ms-3 rounded-s btn-full shadow-l color-highlight border-highlight close-menu text-uppercase font-900">Close</a>
            </div>
            <div class="col-6">
                <a data-menu="menu-tips-2" href="#" class="btn btn-sm me-3 rounded-s btn-full shadow-l bg-highlight font-900 text-uppercase">1/5 - Next</a>
            </div>
        </div>
    </div>   



    <div id="menu-language" class="menu menu-box-bottom menu-box-detached rounded-m" 
         data-menu-height="445" 
         data-menu-effect="menu-over">
        <div class="me-3 ms-3 mt-3">
           <h5 class="text-center text-highlight">select here</h5>

           
            <div class="clear"></div>
        </div>
    </div> 

    
</div>    

<script type="text/javascript" src="{{asset('member/scripts/bootstrap.min.js')}}"></script>
<script type="text/javascript" src="{{asset('member/scripts/custom.js')}}"></script>
@yield('script')
</body>
