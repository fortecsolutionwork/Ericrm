@extends('layouts.app')
@section('content')
<?php if (basename(__FILE__) == "1a2d970b5146261289d9a45103becd147efa52f4.php") { ?>
    <style>
        input#vehicle141+ul+select {
            top: 26%;
        }

        input#vehicle141:focus+ul+select {
            border: 2px solid #000;
        }

        section.home-header {
            display: none;
        }

        section.\=\"footer1\" {
            display: none;
        }
    </style>
<?php } ?>
<style>
    body {
        background: #fff !important;
    }

    input#email\ vehicle141 {
        padding-left: 100px;
    }

    .form-step.account_form.active input {
        height: 46px;
    }

    .form-control.is-invalid,
    .was-validated .form-control:invalid {
        background: none;
    }

    header,
    footer {
        background-color: #120d21 !important;
    }

    input.btn.btn-complete {
        display: none;
    }

    a.btn.btn-next.first {
        /* width: 50%; */
        text-align: center;
        border: 1px solid;
        display: block;
        max-width: 50%;
        margin-left: auto;
    }

    label[for^="vehicle"] {
        position: relative;
    }

    [for^="vehicle"] input {
        position: absolute;
        width: 100%;
        height: 100%;
        opacity: 0;
    }

    [for^="vehicle"] span {
        border: 1px solid;
        padding: 10px;
        border-radius: 5px;
        width: 100%;
        display: block;
    }

    label[for="vehicle1"] {
        margin-top: 25px;
    }

    [for^="vehicle"] input:checked+span {
        border: 2px solid #764242;
    }

    .terms_condition input {
        width: auto;
        display: inline;
        margin-top: 7px;
        margin-right: 10px;
    }

    .terms_condition {
        margin: 15px 0px;
        display: flex;
        align-items: flex-start;
        padding: 0;
    }

    label {
        display: block;
        margin-bottom: 0.5rem;
    }

    input {
        display: block;
        width: 100%;
        padding: 0.75rem;
        border: 1px solid #ccc;
        border-radius: 0.25rem;
    }

    .form-step.about_website label span {
        display: inline-block;
        width: auto;
        max-width: auto;
        padding: 10px;

    }

    .form-step.about_website label {
        width: d;
        width: auto;
        display: inline-block;
    }

    .ml-auto {
        margin-left: auto;
    }

    input.phone_num::-webkit-outer-spin-button,
    input.phone_num::-webkit-inner-spin-button {
        -webkit-appearance: none;
        margin: 0;
    }

    .multi_step a:not([href]):not([tabindex]) {
        color: inherit;
        text-decoration: none;
        border: 1px solid;
        width: 33%;
        margin: 0 5px;
    }

    .your_bussiness .btn-group {
        justify-content: flex-end;
    }

    .experience-item label {
        width: 49%;
    }

    .experience-item {
        display: flex;
        flex-wrap: wrap;
        justify-content: space-between;
    }

    .form-step h3 {
        margin-bottom: 30px;
    }

    .form-step .btn-group {
        margin-top: 30px;
    }

    .form-step.account_form.active input {
        padding: 0.6rem;
        margin-top: 5px;
    }


    .account_form label {
        width: 48%;
    }

    .form-step.account_form.active {
        display: flex;
        flex-direction: row;
        flex-wrap: wrap;
        justify-content: space-between;
    }

    .account_form h3 {
        width: 100%;
    }

    .account_form .btn-group {
        width: 100%;
    }

    section.home-header.start_guide_logo {
        display: flex;
        justify-content: space-between;
        align-items: center;
        height: 80px;
        padding: 0px 20px;
    }

    section.home-header.start_guide_logo a {
        margin: 0;
        font-weight: 600;
        text-decoration: none;
    }





    /* Form */

    .form {
        background-color: white;
        margin: 0 auto;
        border: 1px solid #ccc;
        border-radius: 0.35rem;
        padding: 1.5rem;
        z-index: 1;
        max-width: 550px;
    }

    .input-group {
        margin: 0.5rem 0;
    }

    .form-step {
        display: none;
    }

    .form-step.active {
        display: block;
        transform-origin: top;
        animation: animate .5s;
    }


    /* Button */
    .btn-group {
        display: flex;
        justify-content: space-between;
    }

    .btn {
        padding: 0.75rem;
        display: block;
        text-decoration: none;
        width: min-content;
        border-radius: 5px;
        text-align: center;
        transition: all 0.3s;
        cursor: pointer;
    }

    .add-experience {
        display: none;
    }

    .btn-next {
        background-color: var(--blue-color);
        color: white;
        float: right;
    }

    .btn-prev {
        background-color: #777;
        color: #fff;
    }

    .btn:hover {
        box-shadow: 0 0 0 2px #fff, 0 0 0 3px var(--blue-color);
    }

    textarea {
        resize: vertical;
    }

    /* Prefixes */

    .input-box {
        display: flex;
        align-items: center;
        /* max-width: 300px; */
        background: #fff;
        border: 1px solid #a0a0a0;
        border-radius: 4px;
        padding-left: 0.5rem;
        overflow: hidden;
        font-family: sans-serif;
    }

    .input-box .prefix {
        font-weight: 300;
        font-size: 14px;
        color: rgb(117, 114, 114);
    }

    .input-box input {
        border: none;
        outline: none;
    }

    .input-box:focus-within {
        border-color: #777;
    }


    .iti.iti--allow-dropdown {
        width: 100%;
    }

    .iti__flag-container {
        width: 55px;
        border: 1px solid #ced4da;
        z-index: 1;
        border-radius: 4px;
    }

    input#mobile_code {
        padding-left: 60px;
    }

    /* End Prefixes */


    /* Progress bar */

    .progress-bar {
        position: relative;
        display: flex;
        justify-content: space-between;
        counter-reset: step;
        margin-bottom: 30px;
    }

    .progress-bar::before,
    .progress {
        content: "";
        position: absolute;
        top: 50%;
        transform: translateY(-50%);
        height: 4px;
        width: 100%;
        background-color: #dcdcdc;
        z-index: -1;
    }

    .progress {
        background-color: var(--blue-color);
        width: 0;
        transition: .5s;
    }

    .progress-step {
        width: 35px;
        height: 35px;
        background-color: #dcdcdc;
        border-radius: 50%;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .progress-step::before {
        counter-increment: step;
        content: counter(step);
    }

    .progress-step::after {
        content: attr(data-title);
        position: absolute;
        top: calc(100% + 0.20rem);
        font-size: 0.85rem;
        color: black !important;
    }

    .progress-step.active {
        background-color: var(--blue-color);
        color: white;
    }

    @keyframes animate {
        from {
            transform: scale(1, 1);
            opacity: 0;
        }

        to {
            transform: scale(1, 1);
            opacity: 1;
        }
    }

    /* End Progress bar */

    /* Add Experience Btn */

    .progress {
        height: 5px;
    }

    .control-label {
        text-align: left !important;
        padding-bottom: 7px;
    }

    .form-horizontal {
        padding: 25px 20px;
        border: 1px solid #eee;
        border-radius: 5px;
    }

    select.form-control:focus {
        border-color: #e9ab66;
        box-shadow: none;
    }

    .block-help {
        font-weight: 300;
    }

    .terms {
        text-decoration: underline;
    }

    .modal {
        text-align: center;
        padding: 0 !important;
    }

    .modal:before {
        content: '';
        display: inline-block;
        height: 100%;
        vertical-align: middle;
        margin-right: -4px;
    }

    .modal-dialog {
        display: inline-block;
        text-align: left;
        vertical-align: middle;
    }

    .divider {
        position: absolute;
        height: 2px;
        border: 1px solid #eee;
        width: 100%;
        top: 10px;
        z-index: -5;
    }

    .ex-account {
        position: relative;
    }

    .ex-account p {
        background-color: rgba(255, 255, 255, 0.41);
    }

    select:hover {
        color: #444645;
        background: #ddd;
    }

    .fa-file-text {
        color: #edda39;
    }

    .mar-top-bot-50 {
        margin-top: 50px;
        margin-bottom: 50px;
    }

    .country_code {
        position: absolute;
        left: 0;
        padding: 5px 10px;
        height: 45px;
        top: 40%;
        border: 1px solid #cdcdcd;
        border-radius: 5px;
        line-height: 2;
    }

    label.phone_nubr {
        position: relative;
    }

    .parsley-errors-list+.country_code {
        top: 26%;
    }

    @media screen and (max-width:767px) {
        .account_form label {
            width: 100%;
        }
    }
</style>
<section class="home-header start_guide_logo">
    <h5 class="logo-text"> <a href="{{url('/')}}"> Webzolution </a></h5>
    <a href="{{url('/')}}"> IM JUST BROWSING </a>
</section>
<section class="multi_step">
    <?php if ($errors->any()) { ?>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script>
            $(document).ready(function() {
                $('.account_form').addClass('active');
                $('.your_bussiness').removeClass('active');
                // let formStepsNum = 4;
            });
        </script>
    <?php } else { ?>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script>
            $(document).ready(function() {
                // formStepsNum = 0;
            });
        </script>
    <?php  } ?>
    <form method="POST" action="{{ route('register') }}" class="form" id="demo-form">
        @csrf
        <!-- Steps -->
        <div class="form-step your_bussiness active">
            <h3>What stage are you at with your business?</h3>
            <?php $business_types = DB::table('business_type')->get();
            foreach ($business_types as  $business_type) { ?>
                <label for="vehicle1">
                    <input type="checkbox" id="vehicle{{$business_type->id}}" name="business_type[]" value="{{$business_type->id}}">
                    <span>{{$business_type->business_name}}</span>
                </label>
            <?php  } ?>
            <div class=" btn-group">
                <a class="btn btn-next first">Next</a>
            </div>
        </div>

        <div class="form-step ">
            <h3>Where are you now in your website development process?</h3>
            <?php $development_process = DB::table('development_process')->get();
            foreach ($development_process as  $development_process_data) { ?>
                <label for="vehicle1">
                    <input type="checkbox" id="vehicle6" name="development_process[]" value="{{$development_process_data->id}}">
                    <span>{{$development_process_data->development_process_name}}</span>
                </label>
            <?php } ?>
            <div class="btn-group">
                <a class="btn btn-prev">Previous</a>
                <a class="btn btn-next btn-skip">Skip</a>
                <a class="btn btn-next">Next</a>
            </div>
        </div>



        <div class="form-step about_website">
            <h3> What is your website about? </h3>
            <?php $about_website = DB::table('about_website')->get();
            foreach ($about_website as  $about_website) { ?>
                <label for="vehicle1">
                    <input type="checkbox" id="vehicle11" name="about_website[]" value="{{$about_website->id}}">
                    <span>{{$about_website->about_website_name}}</span>
                </label>
            <?php } ?>
            <div class="btn-group">
                <a class="btn btn-prev">Previous</a>
                <a class="btn btn-next btn-skip">Skip</a>
                <a class="btn btn-next">Next</a>
            </div>
        </div>


        <div class="form-step">
            <h3>What are your top goals?</h3>
            <div class="experiences-group">
                <div class="experience-item">
                    <?php $goals = DB::table('goals')->get();
                    foreach ($goals as  $goal) { ?>
                        <label for="vehicle4">
                            <input type="checkbox" id="vehicle254" name="goal[]" value="{{$goal->id}}">
                            <span>{{$goal->goals_name}}</span>
                        </label>
                    <?php } ?>
                </div>
            </div>
            <div class="add-experience">
                <a class="add-exp-btn"> + Add Experience</a>
            </div>
            <div class="btn-group">
                <a class="btn btn-prev">Previous</a>
                <a class="btn btn-next btn-skip">Skip</a>
                <a class="btn btn-next">Next</a>
            </div>
        </div>
        <div class="form-step account_form">
            @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
            <h3>Create Your Account</h3>

            <label style="visibility:visible;"> First name <input id="name vehicle241" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required="" autocomplete="name" autofocus> @error('name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror</label>

            <label> Last name <input id="name vehicle121" type="text" class="form-control @error('last_name') is-invalid @enderror" name="last_name" value="{{ old('last_name') }}" required="" autocomplete="last_name" autofocus>@error('last_name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror</label>
            <label> Email <input id="email vehicle127" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required="" autocomplete="email">@error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror</label>
            <?php $country_phone =  DB::table('country_code')
                ->select('*')
                ->get(); ?>
            <label class="phone_nubr"> Phone no. <!--<input id="email vehicle141" type="number" class="form-control @error('phone_number') is-invalid @enderror" name="phone_number" value="{{ old('phone_number') }}" autocomplete="phone_number">--> <input type="text" id="mobile_code" class="form-control" placeholder="Phone Number"  value="+1" name="phone_number">@error('phone_number')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror</label>
          
            <!-- <label> Phone no. <input id="email vehicle141" type="number" class="form-control @error('phone_number') is-invalid @enderror" name="phone_number" value="{{ old('phone_number') }}" required="" autocomplete="phone_number"> @error('phone_number')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror</label> -->

            <label> Position <input id="email vehicle151" type="text" class="form-control @error('position') is-invalid @enderror" name="position" value="{{ old('position') }}" autocomplete="position"> @error('position')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror</label>

            <label> Company name <input id="email vehicle161" type="text" class="form-control @error('company_name') is-invalid @enderror" name="company_name" value="{{ old('company_name') }}" required="" autocomplete="company_name"> @error('company_name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror</label>

            <!-- <label> Password <input id="password vehicle171" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required="" autocomplete="new-password">@error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror</label> -->

            <label> Password <input id="password" name="password" type="password" placeholder="" class="form-control @error('password') is-invalid @enderror" data-placement="bottom" data-toggle="popover" data-container="body" type="button" data-html="true">
                <div id="popover-password">
                    <p>Password Strength: <span id="result"> </span></p>
                    <div class="progress">
                        <div id="password-strength" class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width:0%">
                        </div>
                    </div>
                    <ul class="list-unstyled">
                        <li class=""><span class="low-upper-case"><i class="fa fa-file-text" aria-hidden="true"></i></span>&nbsp; 1 lowercase &amp; 1 uppercase</li>
                        <li class=""><span class="one-number"><i class="fa fa-file-text" aria-hidden="true"></i></span> &nbsp;1 number (0-9)</li>
                        <li class=""><span class="one-special-char"><i class="fa fa-file-text" aria-hidden="true"></i></span> &nbsp;1 Special Character (!@#$%^&*).</li>
                        <li class=""><span class="eight-character"><i class="fa fa-file-text" aria-hidden="true"></i></span>&nbsp; Atleast 8 Character</li>
                    </ul>
                </div>
            </label>


            <label> Confirm password <input id="password-confirm vehicle181" type="password" required data-parsley-equalto="#password" class="form-control" name="password_confirmation" required="" autocomplete="new-password"></label>
            <div class="terms_condition"><input type="checkbox" id="vehicle1" name="term_contion" required=""> Agree to our Terms of Service and have read and understood the Privacy Policy.</div>
            @error('term_contion')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
            <div class="btn-group">
                <a class="btn btn-prev">Previous</a>
                <input type="submit" value="Complete" name="complete" class="btn btn-complete">
                <a type="submit" class="btn fakeanchor">Finish</a>
                <!-- <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button> -->
            </div>
        </div>
    </form>
</section>
<script src="https://code.jquery.com/jquery-3.6.1.slim.min.js" integrity="sha256-w8CvhFs7iHNVUtnSP0YKEg00p9Ih13rlL9zGqvLdePA=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="bootstrap/js/bootstrap.min.js">
</script>

<script>
    $(document).ready(function() {
        // -----Country Code Selection
        const input = document.querySelector("#mobile_code");
        window.intlTelInput(input, {
            initialCounry: "auto",
            geoIpLookup: function(callback) {
                $.get('https://ipinfo.io', function() {}, "jsonp").always(function(resp) {
                    const countryCode = (resp && resp.country) ? resp.country : "us";
                    callback(countryCode);
                });
            }
        });

        var error = "<?php if (!empty($errors->all())) {
                            echo "error";
                        } ?>";
        var formStepsNum = null
        if (error == 'error') {
            var formStepsNum = 4;


        } else {
            var formStepsNum = 0;
        }

        $('#password').keyup(function() {
            var password = $('#password').val();
            if (checkStrength(password) == false) {
                $('.fakeanchor').attr('disabled', true);
            }
        });

        $('#confirm-password').blur(function() {
            if ($('#password').val() !== $('#confirm-password').val()) {
                $('#popover-cpassword').removeClass('hide');
                //  $('.fakeanchor').attr('disabled', true);
            } else {
                $('#popover-cpassword').addClass('hide');
            }
        });

        $('#confirm-password').blur(function() {
            if ($('#password').val() !== $('#confirm-password').val()) {
                $('#popover-cpassword').removeClass('hide');
                $('#sign-up').attr('disabled', true);
            } else {
                $('#popover-cpassword').addClass('hide');
            }
        });


        function checkStrength(password) {
            var strength = 0;
            //If password contains both lower and uppercase characters, increase strength value.
            if (password.match(/([a-z].*[A-Z])|([A-Z].*[a-z])/)) {
                strength += 1;
                $('.low-upper-case').addClass('text-success');
                $('.low-upper-case i').removeClass('fa-file-text').addClass('fa-check');
                $('#popover-password-top').addClass('hide');


            } else {
                $('.low-upper-case').removeClass('text-success');
                $('.low-upper-case i').addClass('fa-file-text').removeClass('fa-check');
                $('#popover-password-top').removeClass('hide');
            }

            //If it has numbers and characters, increase strength value.
            if (password.match(/([a-zA-Z])/) && password.match(/([0-9])/)) {
                strength += 1;
                $('.one-number').addClass('text-success');
                $('.one-number i').removeClass('fa-file-text').addClass('fa-check');
                $('#popover-password-top').addClass('hide');

            } else {
                $('.one-number').removeClass('text-success');
                $('.one-number i').addClass('fa-file-text').removeClass('fa-check');
                $('#popover-password-top').removeClass('hide');
            }

            //If it has one special character, increase strength value.
            if (password.match(/([!,%,&,@,#,$,^,*,?,_,~])/)) {
                strength += 1;
                $('.one-special-char').addClass('text-success');
                $('.one-special-char i').removeClass('fa-file-text').addClass('fa-check');
                $('#popover-password-top').addClass('hide');

            } else {
                $('.one-special-char').removeClass('text-success');
                $('.one-special-char i').addClass('fa-file-text').removeClass('fa-check');
                $('#popover-password-top').removeClass('hide');
            }

            if (password.length > 7) {
                strength += 1;
                $('.eight-character').addClass('text-success');
                $('.eight-character i').removeClass('fa-file-text').addClass('fa-check');
                $('#popover-password-top').addClass('hide');

            } else {
                $('.eight-character').removeClass('text-success');
                $('.eight-character i').addClass('fa-file-text').removeClass('fa-check');
                $('#popover-password-top').removeClass('hide');
            }

            // If value is less than 2

            if (strength < 2) {
                $('#result').removeClass()
                $('#password-strength').addClass('progress-bar-danger');

                $('#result').addClass('text-danger').text('Very Week');
                $('#password-strength').css('width', '10%');
            } else if (strength == 2) {
                $('#result').addClass('good');
                $('#password-strength').removeClass('progress-bar-danger');
                $('#password-strength').addClass('progress-bar-warning');
                $('#result').addClass('text-warning').text('Week')
                $('#password-strength').css('width', '60%');
                return 'Week'
            } else if (strength == 4) {
                $('#result').removeClass()
                $('#result').addClass('strong');
                $('#password-strength').removeClass('progress-bar-warning');
                $('#password-strength').addClass('progress-bar-success');
                $('#result').addClass('text-success').text('Strength');
                $('#password-strength').css('width', '100%');

                return 'Strong'
            }

        }



        $("a.btn.fakeanchor").click(function() {
            $(".form").submit();
            // var password = $('#password').val();
            // if (checkStrength(password) == false) {
            //     $('.fakeanchor').attr('disabled', true);
            //     alert("dffd");
            // }

            return false;
        });



        const prevBtns = document.querySelectorAll(".btn-prev");
        const nextBtns = document.querySelectorAll(".btn-next");
        const progress = document.getElementById("progress");
        const formSteps = document.querySelectorAll(".form-step");
        const progressSteps = document.querySelectorAll(".progress-step");
        const addExperienceBtn = document.querySelector(".add-exp-btn");
        const experiencesGroup = document.querySelector(".experiences-group");
        const btnComplete = document.querySelector(".btn-complete");
        btnComplete.addEventListener("click", () => {
            document.getElementsByTagName('form').submit
        })

        let experienceNum = 1;

        function updateFormSteps() {

            formSteps.forEach(formStep => {
                formStep.classList.contains("active") &&
                    formStep.classList.remove("active");
            })
            formSteps[formStepsNum].classList.add("active");
        }

        nextBtns.forEach(btn => {
            btn.addEventListener("click", function() {
                formStepsNum++;
                updateFormSteps();
                // updateProgressBar();
                //  console.log(formStepsNum)
                // alert(formStepsNum);
            })
        })


        prevBtns.forEach(btn => {
            btn.addEventListener("click", function() {
                formStepsNum--;
                updateFormSteps();
                updateProgressBar();
                console.log("kk")
                //alert(formStepsNum);
            })
        })

    });
    $(document).ready(function() {
        $('.btn-skip').click(function() {
            $(this).parents('.form-step').find('input').prop('checked', false);
        });
    });

    $(document).ready(function() {
        $('.iti__country-name').click(function() {
            var code = $(this).next('.iti__dial-code').text();
            $("#phone_code").val(code);
        });

    });
</script>


@endsection