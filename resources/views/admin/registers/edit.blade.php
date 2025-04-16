
@extends('admin.layouts.app')
@section('title') Registration Form @endsection
@section('style')
<style>
        .error-message {
            color: red;
            font-size: 0.875rem;
            display: none;
        }
    </style>
@endsection

@section('content')
@if(session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
@endif

{{-- Display validation errors --}}
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

          <div class="container-fluid">
            <div class="page-title">
              <div class="row">
                <div class="col-12 col-sm-6">
                  <h3>Register Here</h3>
                </div>
                <div class="col-12 col-sm-6">
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">     <i data-feather="home"></i></a></li>
                    <li class="breadcrumb-item">Register</li>
                    <!-- <li class="breadcrumb-item active">Register</li> -->
                  </ol>
                </div>
              </div>
            </div>
          </div>

          <!-- Register form start-->
          <div class="card"> 
            <div class="card-body">
              <form class="" method="POST" id="registerForm" action="{{route('registers.update',$data->id)}}" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="row g-3">
                  <div class="col-md-6">
                    <label class="form-label" for="validationDefault01">First name</label>
                    <input class="form-control" name="firstname"  id="validationDefault01" type="text" value="{{$data->firstname}}" placeholder="First name" required="">
                    <small class="error-message" id="firstNameError">Please enter a valid name.</small>
                  </div>
                  <div class="col-md-6 mb-3">
                    <label class="form-label" for="validationDefault02">Last name</label>
                    <input class="form-control" name="lastname" id="validationDefault02" type="text" value="{{$data->lastname}}" placeholder="Last name" required="">
                    <small class="error-message" id="lastNameError">Please enter a valid name.</small>
                  </div>  
                </div>

                <div class="row g-3">
                    <div class="col-md-6">
                      <label class="form-label" for="validationDefault01">Phone Number</label>
                      <input class="form-control" name="phone" id="validationDefault01" type="number" value="{{$data->phone}}" placeholder="Phone number" required="">
                      <small class="error-message" id="phoneError">Enter a valid 10-digit phone number.</small>
                    </div>
                    <div class="col-md-6 mb-3">
                      <label class="form-label" for="validationDefault02">Email</label>
                      <input class="form-control" name="email" id="validationDefault02" type="email" value="{{$data->email}}" placeholder="Email" required="">
                      <small class="error-message" id="emailError">Enter a valid email address.</small>
                    </div>  
                </div>

                <div class="row g-3">
                    <div class="col-md-6">
                        <label class="form-label" for="validationTextarea">Permanent Address</label>
                        <textarea class="form-control" name="permanent_addr" id="validationTextarea" placeholder="Enter Permanent Address" required="">{{$data->firstname}}</textarea>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label" for="validationTextarea">Temporary Address</label>
                        <textarea class="form-control" name="temporary_addr" id="validationTextarea" placeholder="Enter Temporary Address" required="">{{$data->firstname}}</textarea>
                    </div>  
                </div>

              
                       
               <hr>

                 
               <div class="row g-3">
                    <div class="col-md-6">
                      <label class="form-label" for="validationDefault01">PAN Number</label>
                      <input class="form-control" id="panNumber" name="pan_num" type="text" value="{{$data->pan_num}}" placeholder="Enter Correct PAN number" required="">
                      <small class="error-message" id="panError">PAN must be 10 characters.</small>
                    </div>
                    <div class="col-md-6 mb-3">
                      <label class="form-label" for="validationDefault01">Upload PAN document</label>
                      <input class="form-control" id="panFile" name="old_pan_doc" value="{{$data->pan_doc}}" type="hidden" placeholder="Upload PAN Card" >
                      <input class="form-control" id="" name="pan_doc"  type="file" placeholder="Upload PAN Card" >

                      <!-- <small class="error-message" id="panFileError">Please Upload a PAN Photo </small> -->
                      <small class="error-message text-danger" id="panFileError" style="display: none;"></small>
                    </div>
                    <p >Uploaded Pan Document:
                      <a href="{{asset('uploads/member/pan_doc/'.$data->pan_doc)}}">  <img src="{{asset('uploads/member/pan_doc/'.$data->pan_doc)}}" style="height:100px;width:100px;"></a>
                    </p>
                </div>
                <div class="row g-3">
                  <div class="col-md-6">
                    <label class="form-label" for="validationDefault01">Aadhar Number</label>
                    <input class="form-control" id="aadharNumber" name="adhr_num" type="text" value="{{$data->adhr_num}}" placeholder="Enter Correct Aadhar number" required="">
                    <small class="error-message" id="aadharError">Aadhar must be 12 digits.</small>
                  </div>
                  <div class="col-md-6 mb-3">
                    <label class="form-label" for="validationDefault01">Upload Aadhar card</label>
                    <input class="form-control" id="aadharFile" name="old_adhr_doc" type="hidden" value="{{$data->adhr_doc}}" placeholder="Upload Aadhar Card" >
                    <input class="form-control" id="" name="adhr_doc" type="file"  placeholder="Upload Aadhar Card" >

                    <small class="error-message text-danger" id="aadharFileError" style="display: none;"></small>
                  </div>
                  <p >Uploaded Aadhar  Document:
                      <a href="{{asset('uploads/member/adhr_doc/'.$data->adhr_doc)}}">  <img src="{{asset('uploads/member/adhr_doc/'.$data->adhr_doc)}}" style="height:100px;width:100px;"></a>
                    </p>
              </div>
                <hr>
                <div class="text-center">
                  <h4>Bank Details</h4>
                </div>
                <div class="row g-3 mt-3">
                  <div class="col-md-6">
                    <label class="form-label" for="validationDefault01">Account Number</label>
                    <input class="form-control" id="account" type="number" name="accnt_num" value="{{$data->accnt_num}}" placeholder="Account number" required="">
                    <small class="error-message" id="accountError">Please enter account number.</small>
                  </div>
                  <div class="col-md-6 mb-3">
                    <label class="form-label" for="validationDefault02">IFSC Code</label>
                    <input class="form-control" id="ifsc" type="text" name="accnt_ifsc_num" value="{{$data->accnt_ifsc_num}}" placeholder="IFSC Code" required="">
                    <small class="error-message" id="ifscError">Please enter Valid IFSC code</small>
                  </div>  
                </div>

                <div class="row g-3">
                  <div class="col-md-6">
                      <label class="form-label" for="validationTextarea">Branch Address</label>
                      <textarea class="form-control" id="validationTextarea" name="accnt_brnch_dtl" placeholder="Enter Branch Address" required="">{{$data->accnt_brnch_dtl}}</textarea>
                  </div>
                  <div class="col-md-6 mb-3">
                    <label class="form-label" for="validationDefault01">Monthly Income in Rupees</label>
                    <input class="form-control" id="validationDefault01" name="monthly_inc" type="number" value="{{$data->monthly_inc}}" placeholder="Enter Your Monthly Income" required="">
                  </div>
              </div>

              <div class="row g-3">
                <div class="col-md-6">
                  <div class="mt-4 m-checkbox-inline custom-radio-ml">
                    <div class="form-check form-check-inline radio radio-primary" id="">
                      <input class="form-check-input memberYes" id="radioinline1" type="radio" name="sadh_mem" value="1" {{ $data->sadh_mem == 1 ? 'checked' : '' }} >
                      <label class="form-check-label mb-0" for="radioinline1">Sadhguru Member<span class="digits"> </span></label>
                    </div>
                    <div class="form-check form-check-inline radio radio-primary" id="">
                      <input class="form-check-input memberNo" id="radioinline2" type="radio"  name="sadh_mem" value="2" {{ $data->sadh_mem == 2 ? 'checked' : '' }}>
                      <label class="form-check-label mb-0" for="radioinline2">Not a Sadhguru Member<span class="digits"> </span></label>
                    </div>
                    
                  </div>
                </div>
                <div class="col-md-6 mb-3 memberIdField" id="" style="display:none;">
                  <label class="form-label" for="validationDefault01">Sadhguru membership ID</label>
                  <input class="form-control" id="validationDefault01" type="number" name="sadh_mem_id" value="{{$data->sadh_mem_id}}" placeholder="Enter Your Sadhguru ID">
                </div>
            </div>

            <div class="row g-3">
              <div class="col-md-6 mb-3">
                <label class="form-label" for="validationDefault01">Upload Profile Photo</label>
                <input class="form-control" id="photoFile" name="old_document_one" value="{{$data->document_one}}" type="hidden" placeholder="Upload File" >
                <input class="form-control" id="" name="document_one"  type="file" placeholder="Upload File" >

                <small class="error-message text-danger" id="photoFileError" style="display: none;"></small>
              </div>
              <p >Uploaded Profile  Photo:
                      <a href="{{asset('uploads/member-documents/'.$data->document_one)}}">  <img src="{{asset('uploads/member-documents/'.$data->document_one)}}" style="height:100px;width:100px;"></a>
                    </p>
             
            </div>
           
                
                <button class="btn btn-primary mt-3" type="submit">Submit form</button>
              </form>
            </div>
          </div>

          <!-- Register form end -->
         
      




@endsection
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<!-- JavaScript -->
<script>
  $(document).ready(function () {
      // Show/hide on page load
      toggleMemberField();

      // Show/hide on change
      $('input[name="sadh_mem"]').on('change', function () {
          toggleMemberField();
      });

      function toggleMemberField() {
          var selected = $('input[name="sadh_mem"]:checked').val();
          if (selected == '1') {
              $('.memberIdField').show();
          } else {
              $('.memberIdField').hide();
          }
      }
  });
</script>

<script>
    $(document).ready(function () {
        $("#phoneNumber").on("input", function () {
            let phone = $(this).val();
            let phoneRegex = /^[0-9]{10}$/;

            if (!phoneRegex.test(phone)) {
                $("#phoneError").show();
            } else {
                $("#phoneError").hide();
            }
        });

        $("#firstName, #lastName").on("input", function () {
            let nameRegex = /^[A-Za-z\s]+$/;
            let inputId = $(this).attr("id");
            let errorId = inputId === "firstName" ? "#firstNameError" : "#lastNameError";

            if (!nameRegex.test($(this).val())) {
                $(errorId).show();
            } else {
                $(errorId).hide();
            }
        });

        $("#email").on("input", function () {
            let email = $(this).val();
            let emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

            if (!emailRegex.test(email)) {
                $("#emailError").show();
            } else {
                $("#emailError").hide();
            }
        });

    });


    // new

    $(document).ready(function () {
    function showError(input, errorId, message) {
        $(errorId).text(message).show();
        $(input).addClass("is-invalid");
    }

    function hideError(input, errorId) {
        $(errorId).hide();
        $(input).removeClass("is-invalid");
    }

    // Aadhar Number Validation (12 digits, only numbers)
    $("#aadharNumber").on("input", function () {
        let aadharRegex = /^[0-9]{12}$/;
        if (!aadharRegex.test($(this).val())) {
            showError(this, "#aadharError", "Aadhar must be exactly 12 digits.");
        } else {
            hideError(this, "#aadharError");
        }
    });

    // PAN Number Validation (Format: ABCDE1234F)
    $("#panNumber").on("input", function () {
        let panRegex = /^[A-Z]{5}[0-9]{4}[A-Z]{1}$/;
        if (!panRegex.test($(this).val())) {
            showError(this, "#panError", "PAN must be 10 characters (ABCDE1234F).");
        } else {
            hideError(this, "#panError");
        }
    });

     // IFSC Code Validation (Example: SBIN0001234)
     $("#ifsc").on("input", function () {
        let ifscRegex = /^[A-Z]{4}0[A-Z0-9]{6}$/;
        if (!ifscRegex.test($(this).val())) {
            showError(this, "#ifscError", "Invalid IFSC Code (e.g., SBIN0001234).");
        } else {
            hideError(this, "#ifscError");
        }
    });

    // File Upload Size Validation (Between 2MB and 3MB)
    function validateFileSize(input, errorId) {
        let file = input.files[0];
        if (file) {
            let fileSizeMB = file.size / (1024 * 1024); // Convert to MB
            if (fileSizeMB < 2 || fileSizeMB > 3) {
                showError(input, errorId, "File size must be between 2MB and 3MB.");
            } else {
                hideError(input, errorId);
            }
        }
    }

    // Password Validation (At least 6 chars, 1 uppercase, 1 number, 1 special char)
    $("#password").on("input", function () {
        let passwordRegex = /^(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{6,}$/;
        if (!passwordRegex.test($(this).val())) {
            showError(this, "#passwordError", "Min 6 chars, 1 uppercase, 1 number, 1 special char.");
        } else {
            hideError(this, "#passwordError");
        }
    });

    // Confirm Password Validation (Must match password)
    $("#confirmPassword").on("input", function () {
        if ($(this).val() !== $("#password").val()) {
            showError(this, "#confirmPasswordError", "Passwords do not match.");
        } else {
            hideError(this, "#confirmPasswordError");
        }
    });

    // Required Field Validation on Submit
    $("#registerForm").on("submit", function (event) {
        let isValid = true;

        $("#registerForm input, #registerForm textarea").each(function () {
            if ($(this).val().trim() === "") {
                showError(this, `#${$(this).attr("id")}Error`, "This field is required.");
                isValid = false;
            } else {
                hideError(this, `#${$(this).attr("id")}Error`);
            }
        });

        // Check if passwords match again on submit
        if ($("#password").val() !== $("#confirmPassword").val()) {
            showError("#confirmPassword", "#confirmPasswordError", "Passwords do not match.");
            isValid = false;
        }

        // File Upload Validation
        if ($("#panFile")[0].files.length === 0) {
            showError("#panFile", "#panFileError", "Please upload PAN document.");
            isValid = false;
        } else {
            hideError("#panFile", "#panFileError");
        }

        if ($("#aadharFile")[0].files.length === 0) {
            showError("#aadharFile", "#aadharFileError", "Please upload Aadhar document.");
            isValid = false;
        } else {
            hideError("#aadharFile", "#aadharFileError");
        }

        if ($("#photoFile")[0].files.length === 0) {
            showError("#photoFile", "#photoFileError", "Please upload a profile photo.");
            isValid = false;
        } else {
            hideError("#photoFile", "#photoFileError");
        }

        if (!isValid) {
            event.preventDefault();
            alert("Please correct the errors before submitting.");
        }
    });
});
</script>
@section("script")
@endsection


