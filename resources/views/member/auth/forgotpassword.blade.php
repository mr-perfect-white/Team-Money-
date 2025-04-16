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
                  @if (session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
@endif
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

                        <form method="POST" action="{{route('forgotpassword')}}">
                        @csrf
                        
                        
                                                        <div class="input-style no-borders has-icon validate-field">
                                    <i class="fa fa-phone"></i>
                                    <input type="text" class="form-control validate-phone" name="phone" id="phone"
                                        title="Enter exactly 10 digits" placeholder="Phone Number" oninput="validatePhone()">
                                    <label for="phone" class="color-blue-dark font-10 mt-1">Phone Number</label>
                                    <i class="fa fa-times disabled invalid color-red-dark" id="phoneInvalid" style="display: none;"></i>
                                    <i class="fa fa-check disabled valid color-green-dark" id="phoneValid" style="display: none;"></i>
                                    <em>(required)</em>
                                    <small class="error-message" id="phoneError"></small>
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

                        
                        
                                                        <button type="submit" class="btn btn-m mt-4 mb-4 btn-full bg-blue-dark rounded-sm text-uppercase font-900 text-center btn-center" >  {{ __('Reset Password') }} </button>


                        <input type="hidden" name="token" value="">

                        <!--<div class="row mb-3">-->
                        <!--    <label for="phone" class="col-md-4 col-form-label text-md-end">{{ __('Phone Number') }}</label>-->

                        <!--    <div class="col-md-6">-->
                        <!--        <input id="phone" type="number" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ $phone ?? old('phone') }}" required autocomplete="phone" autofocus>-->

                        <!--        @error('phone')-->
                        <!--            <span class="invalid-feedback" role="alert">-->
                        <!--                <strong>{{ $message }}</strong>-->
                        <!--            </span>-->
                        <!--        @enderror-->
                        <!--    </div>-->
                        <!--</div>-->

                        <!--<div class="row mb-3">-->
                        <!--    <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>-->










                        <!--    <div class="col-md-6">-->
                        <!--        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">-->

                        <!--        @error('password')-->
                        <!--            <span class="invalid-feedback" role="alert">-->
                        <!--                <strong>{{ $message }}</strong>-->
                        <!--            </span>-->
                        <!--        @enderror-->
                        <!--    </div>-->
                        <!--</div>-->

                        <!--<div class="row mb-3">-->
                        <!--    <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label>-->

                        <!--    <div class="col-md-6">-->
                        <!--        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">-->
                        <!--    </div>-->
                        <!--</div>-->

                        <!--<div class="row mb-0">-->
                        <!--    <div class="col-md-6 offset-md-4">-->
                        <!--        <button type="submit" class="btn btn-primary">-->
                                  
                        <!--        </button>-->
                        <!--    </div>-->
                        <!--</div>-->
                    </form>
                    <div class="d-flex">
                            <div class="w-50 font-11 pb-2 color-theme opacity-60 pb-3 text-start"><a href="{{route('register.create')}}" class="color-theme">Registration</a></div>
                            <div class="w-50 font-11 pb-2 color-theme opacity-60 pb-3 text-end"><a href="{{route('memberlogin')}}" class="color-theme">Login Form</a></div>
                        </div>
            </div>

        </div>


        <!-- footer and footer card-->
        @include('member.layouts.footer')
        
    </div>
  


</div>

<script type="text/javascript" src="{{asset('member/scripts/bootstrap.min.js')}}"></script>
<script type="text/javascript" src="{{asset('member/scripts/custom.js')}}"></script>
<script>

  function validatePhone() {
        let phoneInput = document.getElementById("phone");
        let phoneValid = document.getElementById("phoneValid");
        let phoneInvalid = document.getElementById("phoneInvalid");
        let phoneError = document.getElementById("phoneError");
        
        // Allow only digits
        phoneInput.value = phoneInput.value.replace(/[^0-9]/g, '');
    
        if (phoneInput.value.length === 10) {
            phoneValid.style.display = "inline";   // Show green tick
            phoneInvalid.style.display = "none";   // Hide red cross
            phoneError.textContent = "";
        } else if (phoneInput.value.length === 0) {
            phoneValid.style.display = "none";     // Hide green tick
            phoneInvalid.style.display = "none";   // Hide red cross
            phoneError.textContent = "";
        } else {
            phoneValid.style.display = "none";     // Hide green tick
            phoneInvalid.style.display = "inline"; // Show red cross
            phoneError.textContent = "Phone number must be exactly 10 digits.";
              phoneError.style.color = "red";
        }
    }




function validatePassword() {
    let passwordInput = document.getElementById("password");
    let passwordError = document.getElementById("passwordError");
    let passwordRequired = document.getElementById("passwordRequired");

    // Get validation icons
    let parentDiv = passwordInput.closest(".input-style");
    let validIcon = parentDiv.querySelector(".valid");
    let invalidIcon = parentDiv.querySelector(".invalid");

    // Password format regex: Minimum 8 characters, at least 1 uppercase, 1 lowercase, 1 number, and 1 special character
    let passwordPattern = /^(?=.[a-z])(?=.[A-Z])(?=.\d)(?=.[@$!%?&])[A-Za-z\d@$!%?&]{8,}$/;

    if (passwordPattern.test(passwordInput.value)) {
        validIcon.classList.remove("disabled");   // ✅ Show green check
        invalidIcon.classList.add("disabled");    // ❌ Hide red cross
        passwordError.textContent = "";
        passwordRequired.style.display = "none"; // Hide required text
    } else if (passwordInput.value.length === 0) {
        validIcon.classList.add("disabled");      // Hide both icons
        invalidIcon.classList.add("disabled");
        passwordError.textContent = "";
        passwordRequired.style.display = "inline"; // Show required text
    } else {
        validIcon.classList.add("disabled");      // ❌ Hide green check
        invalidIcon.classList.remove("disabled"); // ❌ Show red cross
        passwordError.textContent = "Password must be at least 8 characters, include uppercase, lowercase, a number, and a special character.";
        passwordError.style.color = "red";
        passwordRequired.style.display = "inline"; // Show required text
    }

    // Also validate confirm password in case it's already entered
    validateConfirmPassword();
}



    function validateConfirmPassword() {
    let passwordInput = document.getElementById("password");
    let confirmPasswordInput = document.getElementById("confirmPassword");
    let confirmPasswordError = document.getElementById("confirmPasswordError");
    let confirmPasswordRequired = document.getElementById("confirmPasswordRequired");

    // Get validation icons
    let parentDiv = confirmPasswordInput.closest(".input-style");
    let validIcon = parentDiv.querySelector(".valid");
    let invalidIcon = parentDiv.querySelector(".invalid");

    if (confirmPasswordInput.value === passwordInput.value && confirmPasswordInput.value !== "") {
        validIcon.classList.remove("disabled");   // ✅ Show green check
        invalidIcon.classList.add("disabled");    // ❌ Hide red cross
        confirmPasswordError.textContent = "";
        confirmPasswordRequired.style.display = "none"; // Hide required text
    } else if (confirmPasswordInput.value.length === 0) {
        validIcon.classList.add("disabled");      // Hide both icons
        invalidIcon.classList.add("disabled");
        confirmPasswordError.textContent = "";
        confirmPasswordRequired.style.display = "inline"; // Show required text
    } else {
        validIcon.classList.add("disabled");      // ❌ Hide green check
        invalidIcon.classList.remove("disabled"); // ❌ Show red cross
        confirmPasswordError.textContent = "Passwords do not match.";
        confirmPasswordError.style.color = "red";
        confirmPasswordRequired.style.display = "inline"; // Show required text
    }
}

// Attach event listeners for real-time validation
document.getElementById("password").addEventListener("input", validatePassword);
document.getElementById("confirmPassword").addEventListener("input", validateConfirmPassword);
</script>
</body>
