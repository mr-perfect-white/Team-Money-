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

                                <div class="input-style no-borders has-icon validate-field">
                                    <i class="fa fa-phone"></i>
                                    <input type="text" class="form-control validate-phone" name="phone" id="phone"
                                        title="Enter exactly 10 digits" placeholder="Phone Number" oninput="validatePhoneNumber()">
                                    <label for="phone" class="color-blue-dark font-10 mt-1">Phone Number</label>
                                    <i class="fa fa-times disabled invalid color-red-dark" id="phoneInvalid" style="display: none;"></i>
                                    <i class="fa fa-check disabled valid color-green-dark" id="phoneValid" style="display: none;"></i>
                                    <em>(required)</em>
                                    <small class="error-message" id="phoneError"></small>
                                </div>


                                <div class="input-style no-borders has-icon validate-field">
                                    <i class="fa fa-envelope"></i>
                                    <input type="email" class="form-control validate-email" name="email" id="email" placeholder="Email" oninput="validateEmail()">
                                    <label for="email" class="color-blue-dark font-10 mt-1">Email</label>
                                    <i class="fa fa-times disabled invalid color-red-dark" id="emailInvalid" style="display: none;"></i>
                                    <i class="fa fa-check disabled valid color-green-dark" id="emailValid" style="display: none;"></i>
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
                                    <i class="fa fa-map-marker"></i>
                                    <textarea class="form-control validate-address" name="temporary_addr" id="address" placeholder="Enter Temporary address"></textarea>
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

                                <div class="text-center mt-5">
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

                                <div class="form-group  mt-2">
                                    <h5 class="mb-2">Are you a Sadhguru Member?</h5>
                                    <div class="d-flex">
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
                                
                                <button type="submit" class="btn btn-m mt-4 mb-4 btn-full bg-blue-dark rounded-sm text-uppercase font-900 text-center btn-center" >Register Now</button>
                                
                            </form>
                          

                         
                          


                            <div class="d-flex">
                                <div class="w-50 font-11 pb-2 color-theme opacity-60 pb-3 text-start"><a href="{{route('member.login')}}" class="color-theme">Already Registered?</a></div>
                                <div class="w-50 font-11 pb-2 color-theme opacity-60 pb-3 text-end">
                                    <a href="{{route('member.login')}}" class="color-theme">
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

    <script>
    // firstname and last name

    function validateName(inputId, errorId) {
    let nameInput = document.getElementById(inputId);
    let nameError = document.getElementById(errorId);

    // Get validation icons
    let parentDiv = nameInput.closest(".input-style"); // Get the parent container
    let validIcon = parentDiv.querySelector(".valid");
    let invalidIcon = parentDiv.querySelector(".invalid");

    // Allow only letters (Remove numbers & special characters)
    nameInput.value = nameInput.value.replace(/[^A-Za-z]/g, '');

    // Name validation regex: Only letters, at least 2 characters
    let namePattern = /^[A-Za-z]{2,}$/;

    if (namePattern.test(nameInput.value)) {
        validIcon.classList.remove("disabled");   // ✅ Show green check
        invalidIcon.classList.add("disabled");    // ❌ Hide red cross
        nameError.textContent = "";
    } else if (nameInput.value.length === 0) {
        validIcon.classList.add("disabled");      // Hide both icons
        invalidIcon.classList.add("disabled");
        nameError.textContent = "";
    } else {
        validIcon.classList.add("disabled");      // ❌ Hide green check
        invalidIcon.classList.remove("disabled"); // ❌ Show red cross
        nameError.textContent = "Only letters allowed (min. 2 characters).";
        nameError.style.color = "red";
    }
}

// Attach event listeners for real-time validation
document.getElementById("firstName").addEventListener("input", function () {
    validateName("firstName", "firstNameError");
});
document.getElementById("lastName").addEventListener("input", function () {
    validateName("lastName", "lastNameError");
});
document.getElementById("branch").addEventListener("input", function () {
    validateName("branch", "branchError");
});

// Aadhar and PAN  file Validation

    function validateFile(inputId, errorId, requiredTextId) {
        let fileInput = document.getElementById(inputId);
        let fileError = document.getElementById(errorId);
        let requiredText = document.getElementById(requiredTextId);

        // Get validation icons
        let parentDiv = fileInput.closest(".input-style");
        let validIcon = parentDiv.querySelector(".valid");
        let invalidIcon = parentDiv.querySelector(".invalid");

        // Allowed file extensions
        let allowedExtensions = /(\.pdf|\.jpg|\.jpeg|\.png)$/i;
        let file = fileInput.files[0]; // Get selected file

        if (file) {
            if (!allowedExtensions.test(file.name)) {
                validIcon.classList.add("disabled");      // Hide green check
                invalidIcon.classList.remove("disabled"); // Show red cross
                fileError.textContent = "Only PDF, JPG, JPEG, PNG files are allowed.";
                fileError.style.color = "red";
                requiredText.style.display = "inline"; // Show required text
                fileInput.value = ""; // Clear invalid file
            } else if (file.size > 2 * 1024 * 1024) { // 2MB limit
                validIcon.classList.add("disabled");      // Hide green check
                invalidIcon.classList.remove("disabled"); // Show red cross
                fileError.textContent = "File size must be less than 2MB.";
                fileError.style.color = "red";
                requiredText.style.display = "inline"; // Show required text
                fileInput.value = ""; // Clear invalid file
            } else {
                validIcon.classList.remove("disabled");   // Show green check
                invalidIcon.classList.add("disabled");    // Hide red cross
                fileError.textContent = "";
                requiredText.style.display = "none"; // Hide required text
            }
        } else {
            validIcon.classList.add("disabled");      // Hide both icons
            invalidIcon.classList.add("disabled");
            fileError.textContent = "";
            requiredText.style.display = "inline"; // Show required text if empty
        }
    }

    // Attach event listeners for real-time validation
    document.getElementById("aadhaarFile").addEventListener("change", function () {
        validateFile("aadhaarFile", "aadhaarFileError", "aadhaarRequired");
    });
    document.getElementById("panFile").addEventListener("change", function () {
        validateFile("panFile", "panFileError", "panRequired");
    });
    document.getElementById("photoFile").addEventListener("change", function () {
        validateFile("photoFile", "photoFileError", "photoRequired");
    });




    // phone number
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
        }
    }

    // email
    
    function validateEmail() {
    let emailInput = document.getElementById("email");
    let emailValid = document.getElementById("emailValid");
    let emailInvalid = document.getElementById("emailInvalid");
    let emailError = document.getElementById("emailError");
    
    let emailPattern = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/; // Email regex

    if (emailPattern.test(emailInput.value)) {
        emailValid.style.display = "inline";  
        emailInvalid.style.display = "none";  
        emailError.textContent = "";
    } else if (emailInput.value.length === 0) {
        emailValid.style.display = "none";    
        emailInvalid.style.display = "none";  
        emailError.textContent = "";
    } else {
        emailValid.style.display = "none";    
        emailInvalid.style.display = "inline";
        emailError.textContent = "Enter a valid email address.";
    }
}

// PAN validation


function validatePAN() {
    let panInput = document.getElementById("pan");
    let panError = document.getElementById("panError");

    // Get validation icons
    let parentDiv = panInput.closest(".input-style"); // Get the parent container
    let validIcon = parentDiv.querySelector(".valid");
    let invalidIcon = parentDiv.querySelector(".invalid");

    // Allow only uppercase letters and numbers
    panInput.value = panInput.value.toUpperCase().replace(/[^A-Z0-9]/g, '');

    // PAN format regex: 5 letters, 4 digits, 1 letter (ABCDE1234F)
    let panPattern = /^[A-Z]{5}[0-9]{4}[A-Z]$/;

    if (panInput.value.match(panPattern)) {
        validIcon.classList.remove("disabled");   // Show green check
        invalidIcon.classList.add("disabled");    // Hide red cross
        panError.textContent = "";
    } else if (panInput.value.length === 0) {
        validIcon.classList.add("disabled");      // Hide both icons
        invalidIcon.classList.add("disabled");
        panError.textContent = "";
    } else {
        validIcon.classList.add("disabled");      // Hide green check
        invalidIcon.classList.remove("disabled"); // Show red cross
        panError.textContent = "PAN must be in the format: ABCDE1234F";
        panError.style.color = "red";
    }
}

// Attach event listener for real-time validation
document.getElementById("pan").addEventListener("input", validatePAN);

// Aadhar  Validation

function validateAadhaar() {
    let aadhaarInput = document.getElementById("aadhaar");
    let aadhaarError = document.getElementById("aadhaarError");

    // Get validation icons
    let parentDiv = aadhaarInput.closest(".input-style"); // Get the parent container
    let validIcon = parentDiv.querySelector(".valid");
    let invalidIcon = parentDiv.querySelector(".invalid");

    // Allow only digits (remove non-numeric characters)
    aadhaarInput.value = aadhaarInput.value.replace(/[^0-9]/g, '');

    // Aadhaar format regex: Exactly 12 digits
    let aadhaarPattern = /^[0-9]{12}$/;

    if (aadhaarPattern.test(aadhaarInput.value)) {
        validIcon.classList.remove("disabled");   //  Show green check
        invalidIcon.classList.add("disabled");    //  Hide red cross
        aadhaarError.textContent = "";
    } else if (aadhaarInput.value.length === 0) {
        validIcon.classList.add("disabled");      // Hide both icons
        invalidIcon.classList.add("disabled");
        aadhaarError.textContent = "";
    } else {
        validIcon.classList.add("disabled");      //  Hide green check
        invalidIcon.classList.remove("disabled"); //  Show red cross
        aadhaarError.textContent = "Aadhaar must be exactly 12 digits.";
        aadhaarError.style.color = "red";
    }
}

// Attach event listener for real-time validation
document.getElementById("aadhaar").addEventListener("input", validateAadhaar);

// account number and IFSC Code validation

function validateIFSC() {
    let ifscInput = document.getElementById("ifsc");
    let ifscError = document.getElementById("ifscError");
    let ifscRequired = document.getElementById("ifscRequired");

    // Get validation icons
    let parentDiv = ifscInput.closest(".input-style");
    let validIcon = parentDiv.querySelector(".valid");
    let invalidIcon = parentDiv.querySelector(".invalid");

    // Allow only uppercase letters and numbers
    ifscInput.value = ifscInput.value.toUpperCase().replace(/[^A-Z0-9]/g, '');

    // IFSC format regex: 4 letters, 0, 6 digits (e.g., HDFC0123456)
    let ifscPattern = /^[A-Z]{4}0[0-9]{6}$/;

    if (ifscPattern.test(ifscInput.value)) {
        validIcon.classList.remove("disabled");   // ✅ Show green check
        invalidIcon.classList.add("disabled");    // ❌ Hide red cross
        ifscError.textContent = "";
        ifscRequired.style.display = "none"; // Hide required text
    } else if (ifscInput.value.length === 0) {
        validIcon.classList.add("disabled");      // Hide both icons
        invalidIcon.classList.add("disabled");
        ifscError.textContent = "";
        ifscRequired.style.display = "inline"; // Show required text
    } else {
        validIcon.classList.add("disabled");      // ❌ Hide green check
        invalidIcon.classList.remove("disabled"); // ❌ Show red cross
        ifscError.textContent = "IFSC Code must be 11 characters (e.g., HDFC0123456).";
        ifscError.style.color = "red";
        ifscRequired.style.display = "inline"; // Show required text
    }
}

function validateAccountNumber() {
    let accInput = document.getElementById("account");
    let accError = document.getElementById("accountError");
    let accRequired = document.getElementById("accountRequired");

    // Get validation icons
    let parentDiv = accInput.closest(".input-style");
    let validIcon = parentDiv.querySelector(".valid");
    let invalidIcon = parentDiv.querySelector(".invalid");

    // Allow only numbers
    accInput.value = accInput.value.replace(/[^0-9]/g, '');

    // Account number validation: 9 to 18 digits
    let accPattern = /^[0-9]{9,18}$/;

    if (accPattern.test(accInput.value)) {
        validIcon.classList.remove("disabled");   // ✅ Show green check
        invalidIcon.classList.add("disabled");    // ❌ Hide red cross
        accError.textContent = "";
        accRequired.style.display = "none"; // Hide required text
    } else if (accInput.value.length === 0) {
        validIcon.classList.add("disabled");      // Hide both icons
        invalidIcon.classList.add("disabled");
        accError.textContent = "";
        accRequired.style.display = "inline"; // Show required text
    } else {
        validIcon.classList.add("disabled");      // ❌ Hide green check
        invalidIcon.classList.remove("disabled"); // ❌ Show red cross
        accError.textContent = "Account Number must be between 9 to 18 digits.";
        accError.style.color = "red";
        accRequired.style.display = "inline"; // Show required text
    }
}

// Attach event listeners for real-time validation
document.getElementById("ifsc").addEventListener("input", validateIFSC);
document.getElementById("account").addEventListener("input", validateAccountNumber);

// address validation

function validateAddress() {
    let addressInput = document.getElementById("address");
    let addressError = document.getElementById("addressError");
    let addressRequired = document.getElementById("addressRequired");

    // Get validation icons
    let parentDiv = addressInput.closest(".input-style");
    let validIcon = parentDiv.querySelector(".valid");
    let invalidIcon = parentDiv.querySelector(".invalid");

    // Allow letters, numbers, spaces, commas, periods, etc.
    let addressPattern = /^[A-Za-z0-9\s,.\-#]+$/;

    // Check if address is valid (minimum 10 characters, no empty)
    if (addressInput.value.trim().length >= 10 && addressPattern.test(addressInput.value)) {
        validIcon.classList.remove("disabled");   // ✅ Show green check
        invalidIcon.classList.add("disabled");    // ❌ Hide red cross
        addressError.textContent = "";
        addressRequired.style.display = "none";  // Hide required text
    } else if (addressInput.value.trim().length === 0) {
        validIcon.classList.add("disabled");      // Hide both icons
        invalidIcon.classList.add("disabled");
        addressError.textContent = "";
        addressRequired.style.display = "inline"; // Show required text
    } else {
        validIcon.classList.add("disabled");      // ❌ Hide green check
        invalidIcon.classList.remove("disabled"); // ❌ Show red cross
        addressError.textContent = "Address must be at least 10 characters long and only contain valid characters.";
        addressError.style.color = "red";
        addressRequired.style.display = "inline"; // Show required text
    }
}

// Attach event listener for real-time validation
document.getElementById("address").addEventListener("input", validateAddress);



// Password and Confirm password validation

function validatePassword() {
    let passwordInput = document.getElementById("password");
    let passwordError = document.getElementById("passwordError");
    let passwordRequired = document.getElementById("passwordRequired");

    // Get validation icons
    let parentDiv = passwordInput.closest(".input-style");
    let validIcon = parentDiv.querySelector(".valid");
    let invalidIcon = parentDiv.querySelector(".invalid");

    // Password format regex: Minimum 8 characters, at least 1 uppercase, 1 lowercase, 1 number, and 1 special character
    let passwordPattern = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/;

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

// Monthly Income Validation

function validateIncome() {
    let incomeInput = document.getElementById("income");
    let incomeError = document.getElementById("incomeError");
    let incomeRequired = document.getElementById("incomeRequired");

    // Get validation icons
    let parentDiv = incomeInput.closest(".input-style");
    let validIcon = parentDiv.querySelector(".valid");
    let invalidIcon = parentDiv.querySelector(".invalid");

    // Remove non-numeric characters except digits and commas
    incomeInput.value = incomeInput.value.replace(/[^0-9]/g, '');

    // Convert to number for validation
    let incomeValue = parseInt(incomeInput.value, 10);

    // Minimum income ₹1000, Maximum ₹10 crores
    if (incomeValue >= 1000 && incomeValue <= 1000000000) {
        validIcon.classList.remove("disabled");   // ✅ Show green check
        invalidIcon.classList.add("disabled");    // ❌ Hide red cross
        incomeError.textContent = "";
        incomeRequired.style.display = "none"; // Hide required text
    } else if (incomeInput.value.length === 0) {
        validIcon.classList.add("disabled");      // Hide both icons
        invalidIcon.classList.add("disabled");
        incomeError.textContent = "";
        incomeRequired.style.display = "inline"; // Show required text
    } else {
        validIcon.classList.add("disabled");      // ❌ Hide green check
        invalidIcon.classList.remove("disabled"); // ❌ Show red cross
        incomeError.textContent = "Monthly income must be between ₹1,000 and ₹10,00,00,000.";
        incomeError.style.color = "red";
        incomeRequired.style.display = "inline"; // Show required text
    }
}

// Attach event listener for real-time validation
document.getElementById("income").addEventListener("input", validateIncome);

// Sadhguru member id validation

function validateMemberId() {
    let memberIdInput = document.getElementById("memberid");
    let memberIdError = document.getElementById("memberidError");
    let memberIdRequired = document.getElementById("memberIdRequired");

    // Get validation icons
    let parentDiv = memberIdInput.closest(".input-style");
    let validIcon = parentDiv.querySelector(".valid");
    let invalidIcon = parentDiv.querySelector(".invalid");

    // Remove non-alphanumeric characters
    memberIdInput.value = memberIdInput.value.replace(/[^A-Za-z0-9]/g, '');

    // Member ID pattern: Alphanumeric, exactly 10 characters
    let memberIdPattern = /^[A-Za-z0-9]{10}$/;

    if (memberIdPattern.test(memberIdInput.value)) {
        validIcon.classList.remove("disabled");   // ✅ Show green check
        invalidIcon.classList.add("disabled");    // ❌ Hide red cross
        memberIdError.textContent = "";
        memberIdRequired.style.display = "none";  // Hide required text
    } else if (memberIdInput.value.length === 0) {
        validIcon.classList.add("disabled");      // Hide both icons
        invalidIcon.classList.add("disabled");
        memberIdError.textContent = "";
        memberIdRequired.style.display = "inline"; // Show required text
    } else {
        validIcon.classList.add("disabled");      // ❌ Hide green check
        invalidIcon.classList.remove("disabled"); // ❌ Show red cross
        memberIdError.textContent = "Member ID must be alphanumeric and exactly 10 characters.";
        memberIdError.style.color = "red";
        memberIdRequired.style.display = "inline"; // Show required text
    }
}

// Attach event listener for real-time validation
document.getElementById("memberid").addEventListener("input", validateMemberId);


// Register Validation

document.querySelector('.btn').addEventListener('click', function(event) {
    event.preventDefault();  // Prevent form submission

    let isValid = true; // Flag to track form validity
    let fields = document.querySelectorAll('.validate-field'); // Get all input fields
    let firstInvalidField = null; // To track the first invalid field

    fields.forEach(field => {
        let input = field.querySelector('input');
        let errorMessage = field.querySelector('.error-message');
        let validIcon = field.querySelector('.valid');
        let invalidIcon = field.querySelector('.invalid');
        let requiredText = field.querySelector('em');

        // Reset the error message and validation icons
        errorMessage.textContent = '';
        validIcon.classList.add('disabled');
        invalidIcon.classList.add('disabled');

        if (input && input.value.trim() === '') {
            isValid = false;
            errorMessage.textContent = 'This field is required.';
            invalidIcon.classList.remove('disabled');
            requiredText.style.display = 'inline';
            
            if (!firstInvalidField) {
                firstInvalidField = input;
            }
        } else if (input && input.value.trim() !== '') {
            if (input.id === 'memberid' && !/^[A-Za-z0-9]{10}$/.test(input.value)) {
                isValid = false;
                errorMessage.textContent = 'Member ID must be alphanumeric and exactly 10 characters.';
                invalidIcon.classList.remove('disabled');
                requiredText.style.display = 'inline';
                
                if (!firstInvalidField) {
                    firstInvalidField = input;
                }
            }
            // Add similar validation for other fields like password, income, etc.
            // Example for monthly income:
            if (input.id === 'income' && (parseInt(input.value) < 1000 || parseInt(input.value) > 1000000000)) {
                isValid = false;
                errorMessage.textContent = 'Monthly income must be between ₹1,000 and ₹10,00,00,000.';
                invalidIcon.classList.remove('disabled');
                requiredText.style.display = 'inline';
                
                if (!firstInvalidField) {
                    firstInvalidField = input;
                }
            }
            // Add more conditions based on your field validations
        }
    });

    // Scroll to the first invalid field
    if (firstInvalidField) {
        firstInvalidField.scrollIntoView({ behavior: 'smooth', block: 'center' });
        firstInvalidField.focus();
    }

    // If all fields are valid, you can submit the form
    if (isValid) {
        alert('Form submitted successfully!');
        document.getElementById('memberRegisterForm').submit();
    }
});



</script>
    
</body>