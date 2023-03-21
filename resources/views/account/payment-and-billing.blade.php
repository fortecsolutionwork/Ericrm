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
                <div class="tab-pane active" id="list-messages" role="tabpanel" aria-labelledby="list-messages-list">
                    
                      
                  <ul>
                    <li>
                        <div class="my-info-head new_desin">
                            <h2> Payment menthods </h2>
                             <a href="/account/payment-and-billing/add-new.html"> <span style="font-weight:500"> <i class="fa-solid fa-plus"></i> Add new</span> </a>
                          </div>
                    </li>
                    <li>
                        <div class="row align-items-center">
                            <div class="col-lg-10">
                                  <h4>Visa  **** 1234</h4>
                                  <p>123 Street Name, Gotham City, United States</p>
                            </div>
                            <div class="col-lg-2">
                                <div class="dropdown text-right">
                                    <button class="btn btn-secondary dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false">
                                        <i class="fa-solid fa-ellipsis"></i>
                                    </button>
                                    <div class="dropdown-menu">
                                      <a class="dropdown-item" href="/account/payment-and-billing/edit.html">Edit</a>
                                      <a class="dropdown-item" href="#">Delete</a>
                                    </div>
                                  </div>
                            </div>
                        </div>
                       </li>
                       <li>
                        <div class="row align-items-center">
                            <div class="col-lg-10">
                                  <h4>Visa  **** 1234</h4>
                                  <p>123 Street Name, Gotham City, United States</p>
                            </div>
                            <div class="col-lg-2">
                                <div class="dropdown text-right">
                                    <button class="btn btn-secondary dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false">
                                        <i class="fa-solid fa-ellipsis"></i>
                                    </button>
                                    <div class="dropdown-menu">
                                      <a class="dropdown-item" href="/account/payment-and-billing/edit.html">Edit</a>
                                      <a class="dropdown-item" href="#">Delete</a>
                                    </div>
                                  </div>
                            </div>
                        </div>
                    </li>
                  </ul>
                    <div class="order-history"> 
                  <h2> My Order History</h2>
                  <div class="order_table">
                  <table>
                  <tr>
                    <td style="width:15%"><span><b>Date</b></span></td>
                    <td style="width:10%"><span><b>Order no.</b></span></td>
                    <td style="width:40%"><span><b>Detail</b></span></td>
                    <td style="width:10%"><span><b>Quantity</b></span></td>
                    <td style="width:10%"><span><b>Subtotal</b></span></td>
                    <td style="width:10%"><span><b>Total</b></span></td>
                  </tr>
                  <tr>
                    <td style="padding:20px 10px;font-size:14px"><span>28 Jan 2020</span></td>
                    <td style="padding:20px 10px;font-size:14px"><a href="/account/order-detail.html" style="color: inherit">1234567890</a></td>
                    <td style="padding:20px 10px;font-size:14px"><span>Webzolution credits x 20</span></td>
                    <td style="padding:20px 10px;font-size:14px;text-align: center;"><span>1</span></td>
                    <td style="padding:20px 10px;font-size:14px"><span>$200</span></td>
                    <td style="padding:20px 10px;font-size:14px"><span>$200</span></td>
                  </tr>
                  <tr>
                    <td style="padding:20px 10px;font-size:14px"><span>11 Jan 2020</span></td>
                    <td style="padding:20px 10px;font-size:14px"><a href="/account/order-detail.html" style="color: inherit">1234567890</a></td>
                    <td style="padding:20px 10px;font-size:14px"><span>Added 4 pages of medium complexity for www.domain.com</span></td>
                    <td style="padding:20px 10px;font-size:14px;text-align: center;"><span>1</span></td>
                    <td style="padding:20px 10px;font-size:14px"><span>16 credits</span></td>
                    <td style="padding:20px 10px;font-size:14px;white-space: nowrap;"><span>16 credits</span></td>
                  </tr>
                  <tr>
                    <td style="padding:20px 10px;font-size:14px"><span>01 Jan 2020</span></td>
                    <td style="padding:20px 10px;font-size:14px"><a href="/account/order-detail.html" style="color: inherit">1234567890</a></td>
                    <td style="padding:20px 10px;font-size:14px"><span><p >Website design and build pack</p><p style="margin:0;">Extra page design and build: $200/page</p></span></td>
                    <td style="padding:20px 10px;font-size:14px;text-align: center;"><span><p>1</p> <p style="margin:0;">10</p></span></td>
                    <td style="padding:20px 10px;font-size:14px"><span><p >$1500</p> <p style="margin:0;">$2000</p></span></td>
                    <td style="padding:20px 10px;font-size:14px;vertical-align: middle;"><span><p style="margin:0;">$3500</p></span></td>
                  </tr>
                  </table>
                  </div>
                  
                </div>
            </div>
              </div>
            </div>
          </div>
        </div>
</section>
{{View::make('account.footer')}}