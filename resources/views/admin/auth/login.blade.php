<!DOCTYPE html>
<html lang="en">
 <!DOCTYPE html>
<html lang="en"> 
  
<!-- Mirrored from admin.pixelstrap.com/zeta/theme/ by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 27 Oct 2022 12:12:34 GMT -->
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Zeta admin is super flexible, powerful, clean &amp; modern responsive bootstrap 5 admin template with unlimited possibilities.">
    <meta name="keywords" content="admin template, Zeta admin template, dashboard template, flat admin template, responsive admin template, web app">
    <meta name="author" content="pixelstrap">
    <link rel="icon" href="{{asset('admin/assets/images/logo/favicon-icon.png')}}" type="image/x-icon">
    <link rel="shortcut icon" href="{{asset('admin/assets/images/logo/favicon-icon.png')}}" type="image/x-icon">
    <title>Team Money </title>
    <!-- Google font-->
    <link rel="preconnect" href="https://fonts.googleapis.com/">
    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin="">
    <link href="https://fonts.googleapis.com/css2?family=Rubik:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,300;1,400;1,500;1,600;1,700;1,800;1,900&amp;display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&amp;display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{asset('admin/assets/css/vendors/font-awesome.css')}}">
    <!-- ico-font-->
    <link rel="stylesheet" type="text/css" href="{{asset('admin/assets/css/vendors/icofont.css')}}">
    <!-- Themify icon-->
    <link rel="stylesheet" type="text/css" href="{{asset('admin/assets/css/vendors/themify.css')}}">
    <!-- Flag icon-->
    <link rel="stylesheet" type="text/css" href="{{asset('admin/assets/css/vendors/flag-icon.css')}}">
    <!-- Feather icon-->
    <link rel="stylesheet" type="text/css" href="{{asset('admin/assets/css/vendors/feather-icon.css')}}">
    <!-- Plugins css start-->
    <link rel="stylesheet" type="text/css" href="{{asset('admin/assets/css/vendors/scrollbar.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('admin/assets/css/vendors/animate.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('admin/assets/css/vendors/date-picker.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('admin/assets/css/vendors/photoswipe.css')}}">
    <!-- Plugins css Ends-->
    <!-- Bootstrap css-->
    <link rel="stylesheet" type="text/css" href="{{asset('admin/assets/css/vendors/bootstrap.css')}}">
    <!-- App css-->
    <link rel="stylesheet" type="text/css" href="{{asset('admin/assets/css/style.css')}}">
    <link id="color" rel="stylesheet" href="{{asset('admin/assets/css/color-1.css')}}" media="screen">
    <!-- Responsive css-->
    <link rel="stylesheet" type="text/css" href="{{asset('admin/assets/css/responsive.css')}}">
   
  </head>
  <body>
    <!-- Loader starts-->
    <div class="loader-wrapper">
      <div class="loader">
        <div class="loader-bar"></div>
        <div class="loader-bar"></div>
        <div class="loader-bar"></div>
        <div class="loader-bar"></div>
        <div class="loader-bar"></div>
        <div class="loader-ball"></div>
      </div>
    </div>
    <!-- Loader ends-->
    <!-- page-wrapper Start-->
    <section>
        <div class="container-fluid">
            <div class="row">
                <!-- Logo Section (Hidden on Small Screens) -->
                <div class="col-xl-7 d-none d-xl-flex align-items-center justify-content-center">
                    <img class="img-fluid" src="{{asset('admin/assets/images/login/teammoneylogo.png')}}" 
                         style="max-width: 600px; height: auto;" 
                         alt="loginpage">
                </div>
                
                <!-- Login Form Section -->
                <div class="col-xl-5 col-12 p-0">
                    <div class="login-card" style="background: #fff !important;">
                   
                  
                        <form class="theme-form login-form"  action="{{ route('login') }}" method="POST"
                              style="box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1) !important; background: #d6e4ff; border-radius: 10px;">
                           @csrf
                              <h4 style="color: #003366;">Login</h4>
                            <h6>Welcome back! Log in to your account.</h6>
                            <div class="form-group">
                                <label>Email Address</label>
                                <div class="input-group">
                                    <span class="input-group-text" style="background: #003366; color: #fff;">
                                        <i class="icon-email"></i>
                                    </span>
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                    <!-- <input class="form-control" type="email" required="" placeholder="Test@gmail.com"> -->
                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Password</label>
                                <div class="input-group">
                                    <span class="input-group-text" style="background: #003366; color: #fff;">
                                        <i class="icon-lock"></i>
                                    </span>
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                    <!-- <input class="form-control" type="password" name="login[password]" required="" placeholder="***"> -->
                                    <div class="show-hide"><span class="show"></span></div>
                                </div>
                            </div>
                            <div class="form-group">
                           
                                <div class="checkbox">
                                <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <!-- <input id="checkbox1" type="checkbox"> -->
                                    <label class="text-muted" for="checkbox1"> {{ __('Remember password') }}</label>
                                </div>
                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}"  style="color: #003366;">
                                        {{ __('Forgot  Password?') }}
                                    </a>
                                @endif
                                <!-- <a class="link" href="forget-password.html" style="color: #003366;">Forgot password?</a> -->
                            </div>
                            <div class="form-group">
                                <button class="btn btn-block" type="submit" style="background: #003366; color: white;">Sign in</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        
    
    </section>
    <script src="{{asset('admin/assets/js/jquery-3.5.1.min.js')}}"></script>
    <!-- Bootstrap js-->
    <script src="{{asset('admin/assets/js/bootstrap/bootstrap.bundle.min.js')}}"></script>
    <!-- feather icon js-->
    <script src="{{asset('admin/assets/js/icons/feather-icon/feather.min.js')}}"></script>
    <script src="{{asset('admin/assets/js/icons/feather-icon/feather-icon.js')}}"></script>
    <!-- scrollbar js-->
    <script src="../assets/js/scrollbar/simplebar.js"></script>
    <script src="{{asset('admin/assets/js/scrollbar/custom.js')}}"></script>
    <!-- Sidebar jquery-->
    <script src="{{asset('admin/assets/js/config.js')}}"></script>
    <!-- Plugins JS start-->
    <script src="{{asset('admin/assets/js/sidebar-menu.js')}}"></script>
    <script src="{{asset('admin/assets/js/chart/knob/knob.min.js')}}"></script>
    <script src="{{asset('admin/assets/js/chart/knob/knob-chart.js')}}"></script>
    <script src="{{asset('admin/assets/js/chart/apex-chart/apex-chart.js')}}"></script>
    <script src="{{asset('admin/assets/js/chart/apex-chart/stock-prices.js')}}"></script>
    <script src="{{asset('admin/assets/js/notify/bootstrap-notify.min.js')}}"></script>
    <script src="{{asset('admin/assets/js/dashboard/default.js')}}"></script>
    <script src="{{asset('admin/assets/js/notify/index.js')}}"></script>
    <script src="{{asset('admin/assets/js/datepicker/date-picker/datepicker.js')}}"></script>
    <script src="{{asset('admin/assets/js/datepicker/date-picker/datepicker.en.js')}}"></script>
    <script src="{{asset('admin/assets/js/datepicker/date-picker/datepicker.custom.js')}}"></script>
    <script src="{{asset('admin/assets/js/photoswipe/photoswipe.min.js')}}"></script>
    <script src="{{asset('admin/assets/js/photoswipe/photoswipe-ui-default.min.js')}}"></script>
    <script src="{{asset('admin/assets/js/photoswipe/photoswipe.js')}}"></script>
    <script src="{{asset('admin/assets/js/typeahead/handlebars.js')}}"></script>
    <script src="{{asset('admin/assets/js/typeahead/typeahead.bundle.js')}}"></script>
    <script src="{{asset('admin/assets/js/typeahead/typeahead.custom.js')}}"></script>
    <script src="{{asset('admin/assets/js/typeahead-search/handlebars.js')}}"></script>
    <script src="{{asset('admin/assets/js/typeahead-search/typeahead-custom.js')}}"></script>
    <script src="{{asset('admin/assets/js/height-equal.js')}}"></script>
    <!-- Plugins JS Ends-->
    <!-- Theme js-->
    <script src="{{asset('admin/assets/js/script.js')}}"></script>
    <script src="{{asset('admin/assets/js/theme-customizer/customizer.js')}}"></script>
    <!-- login js-->
    <!-- Plugin used-->
    <!-- login js-->
    <!-- Plugin used-->
  </body>
</html>