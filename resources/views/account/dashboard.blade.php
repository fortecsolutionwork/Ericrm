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
        z-index: 1;
   }
   .body-part {
    width:calc(100% - 56px);
    margin-left:56px;
   }
   .support-ticket {
    max-width:1440px;
   }
   .customer p {
    bottom: 0;
    margin-bottom: 0;
   }
</style>
<div class="main_container">
 <section class="dash-section-1">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 left-side">
                <h4 class="pb-4">Empowerment Progress</h4>
                <div class="row">
                    <div class="col-lg-6">
                        <a href="/account/website.html">
                        <img src="https://via.placeholder.com/40x40" class="pb-3">
                        <h6>Website</h6> </a>
                        <p>Status: Webzolution team is awaiting content from you.</p>
                    </div>
                    <div class="col-lg-6">
                        <a href="/account/presentation.html">
                        <img src="https://via.placeholder.com/40x40" class="pb-3">
                        <h6>Presentation template</h6> </a>
                        <p>Status: </p>
                    </div>
                </div>
                <div class="row pt-5">
                    <div class="col-lg-6">
                        <a href="/account/virtual-business-card.html">
                        <img src="https://via.placeholder.com/40x40" class="pb-3">
                        <h6>Virtual business card</h6> </a>
                        <p>Status: </p>
                    </div>
                    <div class="col-lg-6">
                        <a href="/account/brand-development.html">
                        <img src="https://via.placeholder.com/40x40" class="pb-3">
                        <h6>Brand development</h6> </a>
                        <p>Status: </p>
                    </div>
                </div>
                <div class="pt-5"><a href="/account/products-and-service.html" style="color: inherit">See all <i class="fa fa-angle-right"></i> </a></div>
            </div>
            <div class="col-lg-6 right-side dash_tickets">
                <h4 class="pb-4"> Support tickets</h4>
                <div class="row">
                    <div class="col-md-8">
                        <h6><a href="/account/support/ticket.html">Medium length headline</a></h6>
                        <p>#12345678 | John Doe, Awesome Company</p>
                    </div>
                    <div class="col-md-4">
                        <p>18 Jun 22 (13:33)</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-8">
                        <h6><a href="/account/support/ticket.html">Medium length headline</a></h6>
                        <p>#12345678 | John Doe, Awesome Company</p>
                    </div>
                    <div class="col-md-4">
                        <p>18 Jun 22 (13:33)</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-8">
                        <h6><a href="/account/support/ticket.html">Medium length headline</a></h6>
                        <p>#12345678 | John Doe, Awesome Company</p>
                    </div>
                    <div class="col-md-4">
                        <p>18 Jun 22 (13:33)</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-8">
                        <h6><a href="/account/support/ticket.html">Medium length headline</a></h6>
                        <p>#12345678 | John Doe, Awesome Company</p>
                    </div>
                    <div class="col-md-4">
                        <p>18 Jun 22 (13:33)</p>
                    </div>
                </div>
                <div class="pt-5"><a href="/account/my-support-ticket.html" style="color: inherit">See all <i class="fa fa-angle-right"></i> </a></div>
            </div>
        </div>
    </div>
 </section>


 <section class="dash-section-2 pt-5">
    <div class="container py-5">
        <h4 class="pb-5">Guides and Insights</h4>
        <div class="row">
            <div class="col-lg-4">
                <div class="card">
                    <img src="https://via.placeholder.com/350x197">
                    <div class="p-4">
                       <h4>Long headline to turn your visitors into users </h4>
                       <p>Harmonious colour themes have built up as the collection has evolved. </p>
                       <button>Action Link <i class="fa fa-angle-right"></i></button>
                   </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="card">
                    <img src="https://via.placeholder.com/350x197">
                    <div class="p-4">
                       <h4>Long headline to turn your visitors into users </h4>
                       <p>Harmonious colour themes have built up as the collection has evolved. </p>
                       <button>Action Link <i class="fa fa-angle-right"></i></button>
                   </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="card">
                    <img src="https://via.placeholder.com/350x197">
                    <div class="p-4">
                       <h4>Long headline to turn your visitors into users </h4>
                       <p>Harmonious colour themes have built up as the collection has evolved. </p>
                       <button>Action Link <i class="fa fa-angle-right"></i></button>
                   </div>
                </div>
            </div>
        </div>
        <div class="row pt-5 mt-3">
            <div class="col-lg-4">
                <div class="card">
                    <img src="https://via.placeholder.com/350x197">
                    <div class="p-4">
                       <h4>Long headline to turn your visitors into users </h4>
                       <p>Harmonious colour themes have built up as the collection has evolved. </p>
                       <button>Action Link <i class="fa fa-angle-right"></i></button>
                   </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="card">
                    <img src="https://via.placeholder.com/350x197">
                    <div class="p-4">
                       <h4>Long headline to turn your visitors into users </h4>
                       <p>Harmonious colour themes have built up as the collection has evolved. </p>
                       <button>Action Link <i class="fa fa-angle-right"></i></button>
                   </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="card">
                    <img src="https://via.placeholder.com/350x197">
                    <div class="p-4">
                       <h4>Long headline to turn your visitors into users </h4>
                       <p>Harmonious colour themes have built up as the collection has evolved. </p>
                       <button>Action Link <i class="fa fa-angle-right"></i></button>
                   </div>
                </div>
            </div>
        </div>
    </div>
 </section>
</div>

{{View::make('account.footer')}}