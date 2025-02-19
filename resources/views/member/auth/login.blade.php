<!DOCTYPE HTML>
<html lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, viewport-fit=cover" />
<title>Team Money</title>

<link rel="stylesheet" type="text/css" href="{{asset('member/styles/bootstrap.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('member/styles/style.css')}}">
<link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900|Roboto:300,300i,400,400i,500,500i,700,700i,900,900i&amp;display=swap" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="{{asset('member/fonts/css/fontawesome-all.min.css')}}">
<link rel="manifest" href="{{asset('member/_manifest.json')}}" data-pwa-version="set_in_manifest_and_pwa_js">
<link rel="apple-touch-icon" sizes="180x180" href="{{asset('member/app/icons/icon-192x192.png')}}">
</head>

<body class="theme-light">

<div id="preloader"><div class="spinner-border color-highlight" role="status"></div></div>

<div id="page">

    <!-- header and footer bar go here-->
    <!-- <div class="header header-fixed header-auto-show header-logo-app">
        <a href="#" data-back-button class="header-title header-subtitle">Back to Pages</a>
        <a href="#" data-back-button class="header-icon header-icon-1"><i class="fas fa-arrow-left"></i></a>
        <a href="#" data-toggle-theme class="header-icon header-icon-2 show-on-theme-dark"><i class="fas fa-sun"></i></a>
        <a href="#" data-toggle-theme class="header-icon header-icon-2 show-on-theme-light"><i class="fas fa-moon"></i></a>
        <a href="#" data-menu="menu-highlights" class="header-icon header-icon-3"><i class="fas fa-brush"></i></a>
        <a href="#" data-menu="menu-main" class="header-icon header-icon-4"><i class="fas fa-bars"></i></a>
    </div> -->
    

    <div class="page-content">

        <div class="card header-card shape-rounded" data-card-height="150">
            <div class="card-overlay bg-highlight opacity-95"></div>
            <div class="card-overlay dark-mode-tint"></div>
            <div class="card-bg preload-img" data-src="images/pictures/20s.jpg"></div>
        </div>

        <div class="card card-style mt-5">
            <div class="content mt-2 mb-0">
            @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

                        <div class="col-12 ps-0">
                    
                            <div class="text-center">
                                <img src="{{asset('member/images/teammoneylogo.png')}}" style="height: 100px; width: 200px;" class="">
                                
                            </div>
                        </div>
                        <form action="{{route('member.login') }}" method="POST">
                             @csrf
                        <div class="input-style no-borders has-icon validate-field mb-4">
                            <i class="fa fa-phone"></i>
                            <input type="number" class="form-control validate-name" name="phone" id="phone" placeholder="Phone" required>
                            <label for="phone" class="color-blue-dark font-10 mt-1">Phone</label>
                            <i class="fa fa-times disabled invalid color-red-dark"></i>
                            <i class="fa fa-check disabled valid color-green-dark"></i>
                            <em>(required)</em>
                        </div>

                        <div class="input-style no-borders has-icon validate-field mb-4">
                            <i class="fa fa-lock"></i>
                            <input type="password" class="form-control validate-password" id="password" name="password" placeholder="Password" required>
                            <label for="password" class="color-blue-dark font-10 mt-1">Password</label>
                            <i class="fa fa-times disabled invalid color-red-dark"></i>
                            <i class="fa fa-check disabled valid color-green-dark"></i>
                            <em>(required)</em>
                        </div>

                        <button  class="btn btn-m mt-4 mb-4 btn-full bg-blue-dark rounded-sm text-uppercase font-900" type="submit">Login</button>

                        </form>


                        <div class="d-flex">
                            <div class="w-50 font-11 pb-2 color-theme opacity-60 pb-3 text-start"><a href="teamregistration.html" class="color-theme">Registration</a></div>
                            <div class="w-50 font-11 pb-2 color-theme opacity-60 pb-3 text-end"><a href="#" class="color-theme">Forgot Password</a></div>
                        </div>
               
            </div>

        </div>


        <!-- footer and footer card-->
        @include('member.layouts.footer')
        
    </div>
    <!-- end of page content-->


    <div id="menu-share"
         class="menu menu-box-bottom menu-box-detached rounded-m"
         data-menu-load="menu-share.html"
         data-menu-height="420"
         data-menu-effect="menu-over">
    </div>

    <div id="menu-highlights"
         class="menu menu-box-bottom menu-box-detached rounded-m"
         data-menu-load="menu-colors.html"
         data-menu-height="510"
         data-menu-effect="menu-over">
    </div>

    <div id="menu-main"
         class="menu menu-box-right menu-box-detached rounded-m"
         data-menu-width="260"
         data-menu-load="menu-main.html"
         data-menu-active="nav-pages"
         data-menu-effect="menu-over">
    </div>


</div>

<script type="text/javascript" src="{{asset('member/scripts/bootstrap.min.js')}}"></script>
<script type="text/javascript" src="{{asset('member/scripts/custom.js')}}"></script>
</body>
