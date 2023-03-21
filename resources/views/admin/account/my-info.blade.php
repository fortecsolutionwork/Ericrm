{{View::make('admin.header')}}
{{View::make('admin.sidebar')}}
<style>
  body {
    background: #fff !important;
  }

  .support .btn,
  .info-right-side .btn {
    line-height: inherit;
  }
</style>
<section class="main_container">
  <div class="container">
    <div class="row">
      {{View::make('admin.account.common')}}
      <div class="col-lg-9 info-right-side">
        @if ($message = Session::get('success'))
        <div class="alert alert-success">
          <p>{{ $message }}</p>
        </div>
        @endif
        <div class="tab-content" id="nav-tabContent">
          <div class="tab-pane active" id="list-home" role="tabpanel" aria-labelledby="list-home-list">
            <div class="my-info-head">
              <h1>My Info</h1>
              <a href="{{route('myinfoeditadmin')}}"><span style="font-weight:500"><i class="fa fa-pen-to-square"></i> Edit</span></a>
            </div>
            <ul>
              <li style="border-top:1px solid">
                <h4>Full name</h4>
                <p>{{$user->name}} {{$user->last_name}}</p>
              </li>
              <li>
                <h4>Company name</h4>
                <p>{{$user->company_name?$user->company_name:"N/A"}}</p>
              </li>
              <li>
                <h4>Email</h4>
                <p>{{$user->email?$user->email:""}}</p>
              </li>
              <li>
                <h4>Phone</h4>
                <p>{{$user->phone_code}}{{$user->phone_number?$user->phone_number:"N/A"}}</p>
              </li>
              <li>
                <h4>Country</h4>
                <p>{{$user->fk_country_id ==""?"N/A":$countries->name}}</p>
              </li>
              <li>
                <h4>City</h4>
                <p>{{$user->fk_city_id ==""?"N/A":$cities->name}}</p>
              </li>
              <li>
                <h4>Address Line1</h4>
                <!-- <p>48764 Howard Forge Apt.<br/> PSC 4115, Box 7815<br/> Alaska, USA </p> -->

                <p>{{$user->address_line1?$user->address_line1:"N/A"}}</p>
              </li>

              <li>
                <h4>Address Line2</h4>
                <!-- <p>48764 Howard Forge Apt.<br/> PSC 4115, Box 7815<br/> Alaska, USA </p> -->

                <p>{{$user->address_line2?$user->address_line2:"N/A"}}</p>
              </li>

            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

{{View::make('admin.footer')}}