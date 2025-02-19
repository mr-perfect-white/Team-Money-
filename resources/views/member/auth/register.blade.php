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
<style>
    .member-register-form .input-style{
        padding: 10px;
    }
</style>
<body class="theme-light">

    <div id="preloader">
        <div class="spinner-border color-highlight" role="status"></div>
    </div>

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
                  
                        <div class="content mt-2 mb-0">
                            
                            <div class="text-center mt-2 p-3">
                                <h4>Member Register</h4>
                            </div>

                            @if(session('success'))
                            <p style="color: green;">{{ session('success') }}</p>
                            @endif


                            <form action="{{route('registers.store')}}" method="POST" class="member-register-form" id="memberRegisterForm">
                                @csrf

                                <div class="input-style no-borders has-icon validate-field">
                                    <i class="fa fa-user"></i>
                                    <input type="text" class="form-control validate-name" name="firstname" id="firstName" placeholder="First Name">
                                    <label for="firstName" class="color-blue-dark font-10 mt-1">First Name</label>
                                    <i class="fa fa-times disabled invalid color-red-dark"></i>
                                    <i class="fa fa-check disabled valid color-green-dark"></i>
                                    <em>(required)</em>
                                    <small class="error-message" id="firstNameError"></small>
                                </div>

                                <div class="input-style no-borders has-icon validate-field">
                                    <i class="fa fa-user"></i>
                                    <input type="text" class="form-control validate-name" name="lastname" id="lastName" placeholder="Last Name">
                                    <label for="lastName" class="color-blue-dark font-10 mt-1">Last Name</label>
                                    <i class="fa fa-times disabled invalid color-red-dark"></i>
                                    <i class="fa fa-check disabled valid color-green-dark"></i>
                                    <em>(required)</em>
                                    <small class="error-message" id="lastNameError"></small>
                                </div>

                                <div class="input-style no-borders has-icon">
                                    <i class="fa fa-phone"></i>
                                    <input type="text" class="form-control validate-phone" name="phone" id="phone"
                                        title="Enter exactly 10 digits" placeholder="Phone Number">
                                    <label for="phone" class="color-blue-dark font-10 mt-1">Phone Number</label>
                                    <i class="fa fa-times disabled invalid color-red-dark" id="phoneInvalid" ></i>
                                    <i class="fa fa-check disabled valid color-green-dark" id="phoneValid" ></i>
                                    <em>(required)</em>
                                    <small class="error-message" id="phoneError"></small>
                                </div>


                                <div class="input-style no-borders has-icon validate-field">
                                    <i class="fa fa-envelope"></i>
                                    <input type="email" class="form-control validate-email" name="email" id="email" placeholder="Email">
                                    <label for="email" class="color-blue-dark font-10 mt-1">Email</label>
                                    <i class="fa fa-times disabled invalid color-red-dark" id="emailInvalid" ></i>
                                    <i class="fa fa-check disabled valid color-green-dark" id="emailValid" ></i>
                                    <em>(required)</em>
                                    <small class="error-message" id="emailError"></small>
                                </div>


                                <div class="input-style no-borders has-icon validate-field">
                                    <i class="fa fa-map-marker"></i>
                                    <textarea class="form-control validate-address" name="permanent_addr" id="address" placeholder="Enter your address"></textarea>
                                    <label for="address" class="color-blue-dark font-10 mt-1">Address</label>
                                    <i class="fa fa-times disabled invalid color-red-dark"></i>
                                    <i class="fa fa-check disabled valid color-green-dark"></i>
                                    <em id="addressRequired">(required)</em>
                                    <small class="error-message" id="addressError"></small>
                                </div>


                                <div class="input-style no-borders has-icon validate-field">
                                    <i class="fa fa-id-card"></i>
                                    <input type="text" class="form-control validate-pan" name="pan_num" id="pan" placeholder="PAN number">
                                    <label for="pan" class="color-blue-dark font-10 mt-1">PAN number</label>
                                    <i class="fa fa-times disabled invalid color-red-dark"></i>
                                    <i class="fa fa-check disabled valid color-green-dark"></i>
                                    <em>(required)</em>
                                    <small class="error-message" id="panError"></small>
                                </div>

                                <div class="input-style no-borders has-icon validate-field">
                                    <i class="fa fa-file"></i>
                                    <input type="file" class="form-control validate-file" name="pan_doc" id="panFile">
                                    <label for="panFile" class="color-blue-dark font-10 mt-1">Upload PAN</label>
                                    <i class="fa fa-times disabled invalid color-red-dark"></i>
                                    <i class="fa fa-check disabled valid color-green-dark"></i>
                                    <em id="panRequired">(required)</em>
                                    <small class="error-message" id="panFileError"></small>
                                </div>

                                <div class="input-style no-borders has-icon validate-field">
                                    <i class="fa fa-id-card"></i>
                                    <input type="text" class="form-control validate-aadhaar" name="adhr_num" id="aadhaar" placeholder="Aadhaar number" maxlength="12">
                                    <label for="aadhaar" class="color-blue-dark font-10 mt-1">Aadhaar number</label>
                                    <i class="fa fa-times disabled invalid color-red-dark"></i>
                                    <i class="fa fa-check disabled valid color-green-dark"></i>
                                    <!-- <em>(required)</em> -->
                                    <small class="error-message" id="aadhaarError"></small>
                                </div>


                                <div class="input-style no-borders has-icon validate-field">
                                    <i class="fa fa-file"></i>
                                    <input type="file" class="form-control validate-file" name="adhr_doc" id="aadhaarFile">
                                    <label for="aadhaarFile" class="color-blue-dark font-10 mt-1">Upload Aadhaar</label>
                                    <i class="fa fa-times disabled invalid color-red-dark"></i>
                                    <i class="fa fa-check disabled valid color-green-dark"></i>
                                    <em id="aadhaarRequired">(required)</em>
                                    <small class="error-message" id="aadhaarFileError"></small>
                                </div>


                                <hr>

                                <div class="text-center mt-2">
                                    <h4>Bank Details</h4>
                                </div>

                                <div class="input-style no-borders has-icon validate-field">
                                    <i class="fa fa-credit-card"></i>
                                    <input type="text" class="form-control validate-account" name="accnt_num" id="account" placeholder="Account Number" maxlength="18">
                                    <label for="account" class="color-blue-dark font-10 mt-1">Account Number</label>
                                    <i class="fa fa-times disabled invalid color-red-dark"></i>
                                    <i class="fa fa-check disabled valid color-green-dark"></i>
                                    <em id="accountRequired">(required)</em>
                                    <small class="error-message" id="accountError"></small>
                                </div>

                                <div class="input-style no-borders has-icon validate-field">
                                    <i class="fa fa-bank"></i>
                                    <input type="text" class="form-control validate-ifsc" name="accnt_ifsc_num" id="ifsc" placeholder="IFSC Code" maxlength="11">
                                    <label for="ifsc" class="color-blue-dark font-10 mt-1">IFSC Code</label>
                                    <i class="fa fa-times disabled invalid color-red-dark"></i>
                                    <i class="fa fa-check disabled valid color-green-dark"></i>
                                    <em id="ifscRequired">(required)</em>
                                    <small class="error-message" id="ifscError"></small>
                                </div>

                                <div class="input-style no-borders has-icon validate-field">
                                    <i class="fa fa-map-marker-alt"></i>
                                    <input type="text" class="form-control validate-branch" name="accnt_brnch_dtl" id="branch" placeholder="Branch">
                                    <label for="branch" class="color-blue-dark font-10 mt-1">Branch</label>
                                    <i class="fa fa-times disabled invalid color-red-dark"></i>
                                    <i class="fa fa-check disabled valid color-green-dark"></i>
                                    <em>(required)</em>
                                    <small class="error-message" id="branchError"></small>
                                </div>

                                <!-- Monthly Income -->
                                <div class="input-style no-borders has-icon validate-field">
                                    <i class="fa fa-rupee"></i>
                                    <input type="text" class="form-control validate-income" name="monthly_inc" id="income" placeholder="Enter Monthly (Rupees)">
                                    <label for="income" class="color-blue-dark font-10 mt-1">Monthly Income</label>
                                    <i class="fa fa-times disabled invalid color-red-dark"></i>
                                    <i class="fa fa-check disabled valid color-green-dark"></i>
                                    <em id="incomeRequired">(required)</em>
                                    <small class="error-message" id="incomeError"></small>
                                </div>

                                <div class="form-group text-center mt-2">
                                    <h5 class="mb-2">Are you a Sadhguru Member?</h5>
                                    <div class="d-flex justify-content-center">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="sadh_mem" id="memberYes" value="yes">
                                            <label class="form-check-label" for="memberYes"><i class="fa fa-user-check"></i> Member</label>
                                            <i class="fa fa-times disabled invalid color-red-dark"></i>
                                            <i class="fa fa-check disabled valid color-green-dark"></i>

                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="sadh_mem" id="memberNo" value="no">
                                            <label class="form-check-label" for="memberNo"><i class="fa fa-user-times"></i> Not a Member</label>
                                            <i class="fa fa-times disabled invalid color-red-dark"></i>
                                            <i class="fa fa-check disabled valid color-green-dark"></i>

                                        </div>
                                    </div>
                                </div>

                                <div class="input-style no-borders has-icon validate-field" id="memberIdField">
                                    <i class="fa fa-id-badge"></i>
                                    <input type="text" class="form-control validate-member" name="sadh_mem_id" id="memberid" placeholder="Sadhguru Member ID">
                                    <label for="memberid" class="color-blue-dark font-10 mt-1">Sadhguru Membership ID</label>
                                    <i class="fa fa-times disabled invalid color-red-dark"></i>
                                    <i class="fa fa-check disabled valid color-green-dark"></i>
                                    <em id="memberIdRequired">(required)</em>
                                    <small class="error-message" id="memberidError"></small>
                                </div>

                                <div class="input-style no-borders has-icon validate-field">
                                    <i class="fa fa-file"></i>
                                    <input type="file" class="form-control validate-file" name="document_one" id="photoFile">
                                    <label for="photo" class="color-blue-dark font-10 mt-1">Upload Photo</label>
                                    <i class="fa fa-times disabled invalid color-red-dark"></i>
                                    <i class="fa fa-check disabled valid color-green-dark"></i>
                                    <em id="photoRequired">(required)</em>
                                    <small class="error-message" id="photoFileError"></small>
                                </div>

                                <div class="input-style no-borders has-icon validate-field">
                                    <i class="fa fa-lock"></i>
                                    <input type="password" class="form-control validate-password" name="password" id="password" placeholder="Enter Password">
                                    <label for="password" class="color-blue-dark font-10 mt-1">Password</label>
                                    <i class="fa fa-times disabled invalid color-red-dark"></i>
                                    <i class="fa fa-check disabled valid color-green-dark"></i>
                                    <em id="passwordRequired">(required)</em>
                                    <small class="error-message" id="passwordError"></small>
                                </div>

                                <div class="input-style no-borders has-icon validate-field">
                                    <i class="fa fa-lock"></i>
                                    <input type="password" class="form-control validate-password" name="cnf_password" id="confirmPassword" placeholder="Confirm Password">
                                    <label for="confirmPassword" class="color-blue-dark font-10 mt-1">Confirm Password</label>
                                    <i class="fa fa-times disabled invalid color-red-dark"></i>
                                    <i class="fa fa-check disabled valid color-green-dark"></i>
                                    <em id="confirmPasswordRequired">(required)</em>
                                    <small class="error-message" id="confirmPasswordError"></small>
                                </div>
                                <button type="submit">Register Now</button>
                                
                            </form>
                          

                         
                            <a href="#" class="btn btn-m mt-4 mb-4 btn-full bg-blue-dark rounded-sm text-uppercase font-900">Register</a>


                            <div class="d-flex">
                                <div class="w-50 font-11 pb-2 color-theme opacity-60 pb-3 text-start"><a href="{{route('member.login')}}" class="color-theme">Already Registered?</a></div>
                                <div class="w-50 font-11 pb-2 color-theme opacity-60 pb-3 text-end">
                                    <a href="teammoneylogin.html" class="color-theme">
                                        <button class="bg-primary text-white p-2" style="border-radius: 10px;">Go to Login</button>
                                    </a>
                                </div>
                            </div>
                        </div>

                   


                  
                </div>

            </div>


            <!-- footer and footer card-->
            @include('member.layouts.footer')

        </div>
        <!-- end of page content-->


        <div id="menu-share" class="menu menu-box-bottom menu-box-detached rounded-m" data-menu-load="menu-share.html" data-menu-height="420" data-menu-effect="menu-over">
        </div>

        <div id="menu-highlights" class="menu menu-box-bottom menu-box-detached rounded-m" data-menu-load="menu-colors.html" data-menu-height="510" data-menu-effect="menu-over">
        </div>

        <div id="menu-main" class="menu menu-box-right menu-box-detached rounded-m" data-menu-width="260" data-menu-load="menu-main.html" data-menu-active="nav-pages" data-menu-effect="menu-over">
        </div>


    </div>

    <script type="text/javascript" src="{{asset('member/scripts/bootstrap.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('member/scripts/custom.js')}}"></script>
</body>