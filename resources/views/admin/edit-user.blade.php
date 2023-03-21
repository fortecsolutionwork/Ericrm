{{View::make('admin.header')}}
{{View::make('admin.sidebar')}}
<style>
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
    .select2 + .input-group-addon {
    position: absolute;
    right: -30px;
    top: 45px;
}

.form-group {
    position: relative;
}

span#select2-city-dropdown-container {
    width: 100%!important;
}
@media screen and (max-width:767px) {
    .select2 + .input-group-addon {
        right: -0px;
     }
     .form-header {
        align-items:center;
    }

.form-header a {
    flex-basis: 50%;
}
}
</style>
<section class="body-part main_container">
    <div class="container px-0">
        <div class="box-layout">
            <div class="form-header mb-5">
                <h4>Edit user</h4>
                <a href="{{ route('alluser') }}" class="btn btn-primary">Back to Users</a>
            </div>
            <form action="{{route('updateuser')}}" id="formFilter" data-parsley-validate="" enctype="multipart/form-data" method="POST">
                @csrf
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>First Name</label>
                            <input id="first_name" type="text" class="form-control" required="" name="name" value="{{$user->name}}">
                        </div>
                    </div>
                    <input id="id" type="hidden" class="form-control" value="{{$user->id}}" required="" name="id">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Last Name</label>
                            <input id="last_name" type="text" class="form-control" value="{{$user->last_name}}" name="last_name" value="">
                        </div>
                    </div>
                    <div class="col-md-12"></div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Company Name</label>
                            <input id="company_name" type="text" class="form-control" required="" name="company_name" value="{{$user->company_name}}">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Position</label>
                            <input id="company_name" type="text" class="form-control" required="" name="position" value="{{$user->position}}">
                        </div>
                    </div>
                    <div class="col-md-12"></div>
                    <div class="col-md-12"></div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Email</label>
                            <input readonly id="email" type="email" class="form-control" required="" name="email" value="{{$user->email}}">
                        </div>
                    </div>
                    <div class="col-md-12"></div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Phone</label>
                
                            <input type="text" id="mobile_code" class="form-control" placeholder="Phone Number"  name="phone_number" value="{{$user->phone_number==''?'+1':$user->phone_number}}">
                        </div>
                    </div>
                    
            
                    <div class="col-md-12"></div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Country</label>
                            <select name="country" class="form-control mySelect2 country" required="">
                                <option value="">Select Country</option>
                                @foreach($countries as $country)
                                <option value="{{$country->id}}" {{$user->fk_country_id == $country->id?"selected":""}}>{{$country->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md-12"></div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>City</label>
                            <select name="city" class="form-control mySelect2" id="city-dropdown" required="">
                                @foreach($cities as $city)
                                <option value="{{$city->id}}" {{$user->fk_city_id == $city->id?"selected":""}}>{{$city->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Address Line 1</label>
                            <input type="text" id="address" name="address_line1" class="form-control" required="" value="{{$user->address_line1}}">
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Address Line 2</label>
                            <input type="text" id="address" name="address_line2" value="{{$user->address_line2}}" class="form-control" required="">
                        </div>
                    </div>
                    <div class="col-md-12 mt-3">
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary mr-2">Submit</button>
                            <a href="{{route('alluser')}}" class="btn btn-primary">Cancel</a>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>
<script src="https://code.jquery.com/jquery-3.6.0.js"></script>
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
