{{View::make('account.header')}}
{{View::make('account.sidebar')}}
<style>
    body{
        background: #fff!important;
    }
    header , footer {
  background-color: #120d21!important;
    }
    .header-left {
        width:100%;
        left:0;
        height: 56px;
        background:#f0f0f0;
        justify-content: space-between;
        z-index: 3;
    }
    .header-left > div {
        flex-basis: 50%!important;
    }
    .support-ticket .side-main-menu {
        top:56px;
    }
    .header-left .head-bar > div i {
        border:none;
    }
    .header-left .head-bar i {
      padding:19px;
      color:#ada7a7;
     }
    .header-left .head-bar {
        justify-content: flex-end;
    }
    .container {
        max-width: 1110px;
    }
    .support-ticket .side-menu-open {
        width:200px !important;
        z-index: 3;
   }
   .body-part {
    width:calc(100% - 56px);
    margin-left:56px;
    padding-bottom: 70px;
   }
   .support-ticket {
    max-width:1440px;
   }
   .customer p{
    bottom:0;
    margin-bottom:0;
   }
   .support .btn, .info-right-side .btn {
    line-height: inherit;
}
</style>
<section class="main_container">
 <div class="container">
        <div class="row">
{{View::make('account.common')}}

        <div class="col-lg-9 info-right-side">
              <div class="tab-content" id="nav-tabContent">
                <div class="tab-pane active" id="list-setting" role="tabpanel" aria-labelledby="list-setting-list">
                  <h2>My referral code</h2>
                  <p class="refrl_content">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse id dui pretium, imperdiet nisl eu, laoreet purus. Ut lacinia est magna, sed gravida diam viverra malesuada. Etiam commodo sit amet velit quis tristique. Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                  <p class="refrl_code">{{$users->referral_code}}<a href="https://api.whatsapp.com/send?text=Your%20message%20here%20http://www.yourlinkhere.com" data-action="share/whatsapp/share" target="_blank"> <i class="fa-solid fa-share-from-square"></i> </a> </p>
              </div>
              </div>
            </div>
          </div>
        </div>
</section>
{{View::make('account.footer')}}