{{View::make('account.header')}}
{{View::make('account.sidebar')}}
<style>
  body {
    background: #fff !important;
  }

  .support .btn,
  .info-right-side .btn {
    line-height: inherit;
  }

  .info-right-side form ul [class*="col"] {
    padding: 15px;
  }
</style>
<section class="main_container">
  <div class="container">
    <div class="info-right-side">
      <div class="tab-content" id="nav-tabContent">
        <div class="tab-pane active" id="list-home" role="tabpanel" aria-labelledby="list-home-list">
          <div class="my-info-head">
            <h1>Edit My Info</h1>
            <a href="{{route('myinfo')}}"><span style="font-weight:500"><i class="fa-solid fa-rotate-left"></i> Back</span></a>
          </div>

          <div>
            <form action="{{route('myinfoupdate')}}" data-parsley-validate="" enctype="multipart/form-data" method="POST">
              @csrf
              <ul class="row">
                <li class="col-md-6">
                  <h4>First Name</h4>
                  <input type="text" id="fname" name="name" value="{{$user->name?$user->name:''}}" required="">
                </li>
                <li class="col-md-6">
                  <h4>Last Name</h4>
                  <input type="text" id="lname" name="last_name" value="{{$user->last_name?$user->last_name:''}}" required="">
                </li>
                <li class="col-md-6">
                  <h4>Company name</h4>
                  <input type="text" id="cname" name="company_name" value="{{$user->company_name?$user->company_name:''}}" required="">
                </li>
                <li class="col-md-6">
                  <h4>Position</h4>
                  <input type="text" id="cname" name="position" value="{{$user->position?$user->position:''}}" required="">
                </li>
                <li class="col-md-12 p-0"></li>
                <li class="col-md-6">
                  <h4>Email</h4>
                  <input type="email" readonly id="mail" name="email" value="{{$user->email?$user->email:''}}" required="">
                </li>
                <li class="col-md-12 p-0"></li>
                <li class="col-md-6">
                  <h4>Phone</h4>
                  <input type="text" id="mobile_code" name="phone_number" value="{{$user->phone_number==''?'+91':$user->phone_number}}" required="">
                  <p></p>
                </li>
                <li class="col-md-12 p-0"></li>
                <li class="col-md-6">
                  <h4>Country</h4>
                  <select name="country" class="form-control mySelect2 country" requiredd="">
                    <option value="">Select Country</option>
                    @foreach($countries as $country)
                    <option value="{{$country->id}}" {{$user->fk_country_id == $country->id?"selected":""}}>{{$country->name}}</option>
                    @endforeach
                  </select>
                </li>
                <li class="col-md-12 p-0"></li>
                <li class="col-md-6">
                  <h4>City</h4>
                  <select name="city" class="form-control mySelect2" id="city-dropdown" requiredd="">
                    @foreach($cities as $city)
                    <option value="{{$city->id}}" {{$user->fk_city_id == $city->id?"selected":""}}>{{$city->name}}</option>
                    @endforeach
                  </select>
                </li>

                <li class="col-md-12">
                  <h4>Address Line 1</h4>
                  <input type="text" id="address" requiredd="" name="address_line1" value="{{$user->address_line1?$user->address_line1:''}}">
                  <p></p>
                </li>
                <li class="col-md-12">
                  <h4>Address Line 2</h4>
                  <input type="text" id="address" name="address_line2" value="{{$user->address_line2?$user->address_line2:''}}" required="">
                  <p></p>
                </li>

              </ul>

              <button type="submit" class="btn btn-primary mr-2">Update</button>
              <button type="submit" class="btn btn-outline-primary">Cancel</button>

            </form>

          </div>
        </div>
      </div>
    </div>
  </div>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.13/css/intlTelInput.css" />
  <script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/intlTelInput.min.js"></script>
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
  });
</script>
</section>
{{View::make('account.footer')}}
