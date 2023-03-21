{{View::make('admin.header')}}
{{View::make('admin.sidebar')}}
<style>
    body {
    background: #fff !IMPORTANT;
}
.container {
    overflow: visible;
}
.info-right-side .btn {
    line-height: inherit;
    padding: 5px 15px;
}
 </style>
<section class="body-part main_container">
    <div class="container px-0 ">
    {{View::make('admin.user-details.customer-info-nav')}}
        <div class="info-right-side">
            <ul class="web_tab_head">
                <li class="label">History:</li>
                <li>
                    <select name="Last 30 days" id="last_days" class="form-control inline">
                        <option value="10days">Last 10 days</option>
                        <option value="20days">Last 20 days</option>
                        <option value="30days">Last 30 days</option>
                    </select>
                </li>
                <li><select name="All transaction types" id="transaction_type" class="form-control inline">
                        <option value="transaction">All transaction types</option>
                        <option value="Debit">Debit</option>
                        <option value="Credit">Credit</option>
                    </select></li>
                <li><button class="btn btn-primary">Update</button></li>
            </ul>

            <div class="table_div">
                <table class="cart_table table">
                    <tbody>
                        <tr>
                            <td style="font-weight:500;white-space: nowrap;">Date </td>
                            <td style="font-weight:500;white-space: nowrap;">Transaction ID</td>
                            <td style="font-weight:500;" class="detail_tab">Detail</td>
                            <td style="font-weight:500">Type</td>
                            <td style="font-weight:500;white-space: nowrap;">Credit balance</td>
                        </tr>
                        <tr>
                            <td style="text-align: center;white-space: nowrap;vertical-align: middle;" class="wrap_date">30 Jan 2020</td>
                            <td style="vertical-align: middle;"> 1234567890 </td>
                            <td style="vertical-align: middle;">
                                <h4 style="font-size:14px;font-weight:500;">Webzolution credits x 40 </h4>
                                <p style="font-size:14px;font-weight:400;" class="wrap_text">40 hours work for www.test.com website update for homepage, product page, services page and 40 hours work for www.test.com website update for homepage, product page, services page and 40 hours work for www.test.com website update for homepage, product page, services page and</p>
                            </td>
                            <td style="vertical-align: middle;"> Debit </td>
                            <td style="vertical-align:middle;text-align: center;"> 44 </td>
                        </tr>
                        <tr>
                            <td style="text-align: center;vertical-align: middle;">11 Jan 2020</td>
                            <td style="vertical-align:middle"> 1234567890 </td>
                            <td style="vertical-align: middle;">
                                <h4 style="font-size:14px;font-weight:500; ">Webzolution credits x 16</h4>
                                <p style="font-size:14px;font-weight:400;" class="wrap_text">16 hours work for www.test.com website update for homepage, product page, services page and 16 hours work for www.test.com website update for homepage, product page, services page and 16 hours work for www.test.com website update for homepage, product page, services page and </p>
                            </td>

                            <td style="vertical-align: middle;"> Debit </td>
                            <td style="vertical-align:middle;text-align: center;"> 84 </td>
                        </tr>
                        <tr>
                            <td style="text-align:center;vertical-align: middle;">01 Jan 2020</td>
                            <td style="vertical-align:middle"> 1234567890 </td>
                            <td style="vertical-align: middle;">
                                <h4 style="font-size:14px;font-weight:500;">Webzolution credits x 100</h4>

                            </td>
                            <td style="vertical-align: middle;"> Credit </td>
                            <td style="vertical-align:middle;text-align: center;"> 100 </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

    </div>

</section>

{{View::make('admin.footer')}}