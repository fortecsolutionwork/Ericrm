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
                <div class="tab-pane active" id="list-profile" role="tabpanel" aria-labelledby="list-profile-list">
                  
                  <div class="my-info-head custom_desin">
                    <h1>Webzolution Credits</h1>
                    <span style="font-weight:500">Your current credit balance: 44</span>
                  </div>
                  <p class="web_info">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse id dui pretium, imperdiet nisl eu, laoreet purus. Ut lacinia est magna, sed gravida diam viverra malesuada. Etiam commodo sit amet velit quis tristique. Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                   <ul class="web_tab_head">
                    <li class="label">History:</li>
                    <li>
                      <select name="Last 30 days" id="last_days" class="form-control inline">
                      <option value="10days">Last 10 days</option>
                      <option value="20days">Last 20 days</option>
                      <option value="30days">Last 30 days</option>
                    </select></li>
                    <li><select name="All transaction types" id="transaction_type" class="form-control inline">
                      <option value="transaction">All transaction types</option>
                      <option value="Debit">Debit</option>
                      <option value="Credit">Credit</option>
                    </select></li>
                    <li><button>Update</button></li>
                   </ul>
  
                   <div class="table_div">
                    <table class="cart_table table">
                       <tr>
                           <td>Date </td>
                           <td style="font-weight:500;white-space: nowrap;">Transaction ID</td>
                           <td style="font-weight:500;" class="detail_tab">Detail</td>
                           <td style="font-weight:500">Type</td>
                           <td style="font-weight:500;white-space: nowrap;">Credit balance</td>
                       </tr>
                       <tr>
                           <td style="text-align: center;white-space: nowrap;vertical-align: middle;" class="wrap_date">30 Jan 2020</td>
                           <td style="vertical-align:middle;"> 1234567890 </td>
                           <td style="vertical-align:middle;"> 
                              <h4 style="font-size:14px;font-weight:500;">Webzolution credits x 40 </h4>
                                 <p style="font-size:14px;font-weight:400;" class="wrap_text">40 hours work for www.test.com website update for homepage, product page, services page and 40 hours work for www.test.com website update for homepage, product page, services page and 40 hours work for www.test.com website update for homepage, product page, services page and</p>
                              </td>
                            <td style="vertical-align:middle;"> Debit </td>
                           <td style="vertical-align:middle;text-align: center;"> 44 </td>
                       </tr>
                       <tr>
                        <td style="text-align: center;vertical-align: middle;">11 Jan 2020</td>
                        <td style="vertical-align:middle"> 1234567890 </td>
                        <td style="vertical-align:middle;"> 
                          <h4 style="font-size:14px;font-weight:500;">Webzolution credits x 16</h4>
                           <p style="font-size:14px;font-weight:400;" class="wrap_text">16 hours work for www.test.com website update for homepage, product page, services page and 16 hours work for www.test.com website update for homepage, product page, services page and 16 hours work for www.test.com website update for homepage, product page, services page and </p> 
                        </td>
                       
                        <td style="vertical-align:middle;"> Debit </td>
                        <td style="vertical-align:middle;text-align: center;"> 84 </td>
                    </tr>
                    <tr>
                      <td style="text-align:center;vertical-align: middle;">01 Jan 2020</td>
                      <td style="vertical-align:middle"> 1234567890 </td>
                      <td style="vertical-align:middle;"> 
                         <h4 style="font-size:14px;font-weight:500;">Webzolution credits x 100</h4>  
                           
                       </td>
                     <td style="vertical-align:middle;"> Credit </td>
                      <td style="vertical-align:middle;text-align: center;"> 100 </td>
                  </tr>
                    </table>
                   </div>
  
  
  
                </div>
              </div>
            </div>
          </div>
        </div>
</section>
{{View::make('account.footer')}}