{{View::make('admin.header')}}
{{View::make('admin.sidebar')}}
<section class="body-part main_container">
    <div class="container px-0 admin_page">
        <div class="row box-layout mb-4">
            <div class="col-lg-12">
                <div class="d-flex justify-space-between dash_head">
                    <h4>Order report </h4>
                    <button class="btn btn-primary"><a href="/admin/all-orders.html" style="color:#fff;">See all Orders</a></button>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <h6 class="mb-3">Date Range</h6>
                        <select class="form-control">
                            <option> 7 days </option>
                            <option> 30 days </option>
                            <option> 3 months </option>
                            <option> 1 year</option>
                        </select>
                    </div>
                    <div class="col-md-8 custom_calendar">
                        <h6 class="mb-3">Custom Range</h6>
                        <label for="from">From</label>
                        <input type="text" id="from" name="from" class="form-control" autocomplete="off">
                        <label for="to">to</label>
                        <input type="text" id="to" name="to" class="form-control" autocomplete="off">
                    </div>
                </div>
                <div class="row mt-5">
                    <div class="col-md-3">
                        <ul class="stats">
                            <li><span>$31,075.00</span>gross sales in this period</li>
                            <li><span>$1,035.83</span>average gross daily sales</li>
                            <li><span>9</span>Orders placed</li>
                        </ul>
                    </div>
                    <div class="col-md-9">
                        <canvas id="bar-chart" width="800" height="450"></canvas>
                    </div>
                </div>
            </div>

        </div>

        <div class="row ">
            <div class="col-lg-6 ticket_table">
                <div class="box-layout pt-3 px-4 pb-4">
                    <div class="d-flex justify-space-between dash_head">
                        <h4> Latest support tickets </h4>
                        <button class="btn btn-primary"><a href="/admin/all-tickets.html" style="color:#fff;">See all Tickets</a></button>
                    </div>

                    <div>

                        <table class="table">
                            <tr>
                                <td> <b>Last Update </b> </td>
                                <td> <b>Subject</b> </td>
                            </tr>
                            <tr>
                                <td> June 26, 2021 21:00 </td>
                                <td> Lorem Ipsum is simply dummy text </td>
                            </tr>
                            <tr>
                                <td> June 26, 2021 21:00 </td>
                                <td> Lorem Ipsum is simply dummy text </td>
                            </tr>
                            <tr>
                                <td> June 26, 2021 21:00 </td>
                                <td> Lorem Ipsum is simply dummy text </td>
                            </tr>
                        </table>

                    </div>
                </div>
            </div>
            <div class="col-lg-6 ticket_table">
                <div class="box-layout pt-3 px-4 pb-4">
                    <div class="d-flex justify-space-between dash_head">
                        <h4> Latest Users </h4>
                        <button class="btn btn-primary"><a href="/admin/all-users.html" style="color:#fff;">See all Users</a></button>
                    </div>

                    <div>

                        <table class="table">
                            <tr>
                                <td> <b>Created </b> </td>
                                <td> <b>Name</b> </td>
                                <td> <b>Company Name</b> </td>
                            </tr>
                            <tr>
                                <td> June 26, 2021 21:00 </td>
                                <td> Jhone Doe </td>
                                <td> Webzolution </td>
                            </tr>
                            <tr>
                                <td> June 26, 2021 21:00 </td>
                                <td> Jhone Doe </td>
                                <td> Webzolution </td>
                            </tr>
                            <tr>
                                <td> June 26, 2021 21:00 </td>
                                <td> Jhone Doe </td>
                                <td> Webzolution </td>
                            </tr>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
{{View::make('admin.footer')}}