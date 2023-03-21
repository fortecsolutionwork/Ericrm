{{View::make('admin.header')}}
{{View::make('admin.sidebar')}}
<style>
    body{
        background: #fff!important;
    }
   .support .btn, .info-right-side .btn {
    line-height: inherit;
}
</style>
<section class="main_container">
 <div class="container">
        <div class="row">
          <div class="col-lg-3 info-sidebar">
            <div class="list-group" id="list-tab" role="tablist">
              <a class="list-group-item list-group-item-action active" id="list-home-list"  href="/account/my-info.html"  aria-controls="home">My info</a>
             
              <a class="list-group-item list-group-item-action" id="list-messages-list"  href="/account/payment-and-billing.html"  aria-controls="messages">Payment and billing</a>
              <a class="list-group-item list-group-item-action" id="list-settings-list"  href="/account/password.html"  aria-controls="settings">Password</a>
              <a class="list-group-item list-group-item-action" id="list-profile-list"  href="/account/webzolution-credits.html"  aria-controls="profile">Webzolution Credits</a>
              <a class="list-group-item list-group-item-action" id="list-setting-list"  href="/account/referrel.html"  aria-controls="settings">Referral</a>
              <a class="list-group-item list-group-item-action" id="list-setting-list"  href="/account/preferences.html"  aria-controls="settings">Preferences</a>
            </div>
          </div>
            <div class="col-lg-9 info-right-side">
              <div class="tab-content" id="nav-tabContent">
                <div class="tab-pane active" id="list-home" role="tabpanel" aria-labelledby="list-home-list">
                  <div class="my-info-head">
                      <h1>My Info</h1>
                      <a href="{{route('myinfoedit')}}"><span style="font-weight:500"><i class="fa fa-pen-to-square"></i> Edit</span></a>
                    </div>
                    <ul>
                      <li style="border-top:1px solid">
                          <h4>Full name</h4>
                          <p>John Doe</p>
                      </li>
                      <li>
                          <h4>Company name</h4>
                          <p>Awesome Company Limited</p>
                      </li>
                      <li>
                          <h4>Email</h4>
                          <p>john@awesome.com</p>
                      </li>
                      <li>
                          <h4>Phone</h4>
                          <p>John Doe</p>
                      </li>
                      <li>
                          <h4>Address</h4>
                          <p>48764 Howard Forge Apt.<br/> PSC 4115, Box 7815<br/> Alaska, USA </p>
                      </li>
                      
                    </ul>
              </div>
              </div>
            </div>
          </div>
        </div>
</section>

{{View::make('admin.footer')}}