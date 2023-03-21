{{View::make('admin.header')}}
{{View::make('admin.sidebar')}}

<style>
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

    .select2+.input-group-addon {
        position: absolute;
        right: -30px;
        top: 45px;
    }

    .form-group {
        position: relative;
    }

    span#select2-city-dropdown-container {
        width: 100% !important;
    }

    @media screen and (max-width:767px) {
        .select2+.input-group-addon {
            right: -0px;
        }

        .form-header {
            align-items: center;
        }

        .form-header a {
            flex-basis: 50%;
        }
    }
</style>
<section class="body-part main_container">
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    <div class="container px-0">
        <div class="box-layout">
            <div class="form-header mb-5">
                <h4>Add User</h4>
                <a href="{{ url()->previous() }}" class="btn btn-primary">Back to Users</a>
            </div>
            <form action="{{route('storeuser')}}" id="demo-form" data-parsley-validate="" enctype="multipart/form-data" method="POST">
                @csrf
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>User Type</label>
                            <select class="form-control" name="fk_role_id">
                                @foreach ($UserTypes as $UserType)
                                <option value="{{$UserType->id}}">{{$UserType->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>First Name</label>
                            <input id="full_name" type="text" class="form-control" required name="name">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Last Name</label>
                            <input id="full_name" type="text" class="form-control" required name="last_name">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Company Name</label>
                            <input id="company_name" type="text" class="form-control" required="" name="company_name">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Email</label>
                            <input id="email" type="email" name="email" class="form-control" required="">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Phone</label>
                            <input type="text" id="mobile_code" class="form-control" value="+1" placeholder="Phone Number" name="phone_number">
                        </div>
                    </div>
                    <!-- <input type="hidden" id="phone_code" name="phone_code" value="+1" /> -->
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Country</label>
                            <select name="country" class="form-control mySelect2 country" required="">
                                <option value="">Select Country</option>
                                @foreach($countries as $country)
                                <option value="{{$country->id}}">{{$country->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>City</label>
                            <select name="city" class="form-control mySelect2" id="city-dropdown" required="">
                            </select>
                            <span class="input-group-addon">
                                <i class="loader"></i>
                            </span>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Address Line 1</label>
                            <input type="text" id="address" name="address_line1" class="form-control" required="" value="">
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Address Line 2</label>
                            <input type="text" id="address" name="address_line2" value="" class="form-control" required="">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Password</label>
                            <input id="password" name="password" type="password" placeholder="" class="form-control @error('password') is-invalid @enderror" data-placement="bottom" data-toggle="popover" data-container="body" type="button" data-html="true">
                            <div id="popover-password">
                                <p>Password Strength: <span id="result"> </span></p>
                                <div class="progress">
                                    <div id="password-strength" class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width:0%">
                                    </div>
                                </div>
                            </div>
                            <ul class="list-unstyled">
                                <li class=""><span class="low-upper-case"><i class="fa fa-file-text" aria-hidden="true"></i></span>&nbsp; 1 lowercase &amp; 1 uppercase</li>
                                <li class=""><span class="one-number"><i class="fa fa-file-text" aria-hidden="true"></i></span> &nbsp;1 number (0-9)</li>
                                <li class=""><span class="one-special-char"><i class="fa fa-file-text" aria-hidden="true"></i></span> &nbsp;1 Special Character (!@#$%^&*).</li>
                                <li class=""><span class="eight-character"><i class="fa fa-file-text" aria-hidden="true"></i></span>&nbsp; Atleast 8 Character</li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Confirm Password</label>
                            <input id="c_password password-confirm" data-parsley-equalto="#password" type="password" name="password_confirmation" class="form-control" required="" data-equalto="#password">
                        </div>
                    </div>
                    <div class="col-md-12 mt-3">
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary btn-lg">Submit</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>
<script src="https://code.jquery.com/jquery-3.6.1.slim.min.js" integrity="sha256-w8CvhFs7iHNVUtnSP0YKEg00p9Ih13rlL9zGqvLdePA=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>

<script>
    $(document).ready(function() {
       
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


        $('.iti__country-name').click(function() {
            var code = $(this).next('.iti__dial-code').text();
            $("#phone_code").val(code);
        });
    });
</script>
{{View::make('admin.footer')}}