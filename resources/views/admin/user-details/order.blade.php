{{View::make('admin.header')}}
{{View::make('admin.sidebar')}}
<section class="body-part main_container">
  <div class="container px-0">
    {{View::make('admin.user-details.customer-info-nav')}}
    <div class="row">
      <div class="col-md-6">
        <p>{{$user->name}}</p>
        <p>{{$user->company_name}}</p>
        <p>Country: {{$user->countries_name}}</p>
      </div>
      <div class="col-md-6">
        <p>Phone: {{$user->phone_number}}</p>
        <p>Email: {{$user->email}}</p>
        <p>User type: {{$user->role_name}}</p>
      </div>
    </div>
    <hr />
    <br />

    <div class="custom_calendar mb-4">
      <label for="from">From</label>
      <input type="text" id="from" name="from" class="form-control" autocomplete="off">
      <label for="to">to</label>
      <input type="text" id="to" name="to" class="form-control" autocomplete="off">
    </div>
    <div class="order_table info-right-side">
      <table class="table">
        <tbody>
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
            <td style="padding:20px 10px;font-size:14px"><span>1234567890</span></td>
            <td style="padding:20px 10px;font-size:14px"><span>Webzolution credits x 20</span></td>
            <td style="padding:20px 10px;font-size:14px;text-align: center;"><span>1</span></td>
            <td style="padding:20px 10px;font-size:14px"><span>$200</span></td>
            <td style="padding:20px 10px;font-size:14px"><span>$200</span></td>
          </tr>
          <tr>
            <td style="padding:20px 10px;font-size:14px"><span>11 Jan 2020</span></td>
            <td style="padding:20px 10px;font-size:14px"><span>1234567890</span></td>
            <td style="padding:20px 10px;font-size:14px"><span>Added 4 pages of medium complexity for www.domain.com</span></td>
            <td style="padding:20px 10px;font-size:14px;text-align: center;"><span>1</span></td>
            <td style="padding:20px 10px;font-size:14px"><span>16 credits</span></td>
            <td style="padding:20px 10px;font-size:14px;white-space: nowrap;"><span>16 credits</span></td>
          </tr>
          <tr>
            <td style="padding:20px 10px;font-size:14px"><span>01 Jan 2020</span></td>
            <td style="padding:20px 10px;font-size:14px"><span>1234567890</span></td>
            <td style="padding:20px 10px;font-size:14px"><span>
                <p>Website design and build pack</p>
                <p style="margin:0;">Extra page design and build: $200/page</p>
              </span></td>
            <td style="padding:20px 10px;font-size:14px;text-align: center;"><span>
                <p>1</p>
                <p style="margin:0;">10</p>
              </span></td>
            <td style="padding:20px 10px;font-size:14px"><span>
                <p>$1500</p>
                <p style="margin:0;">$2000</p>
              </span></td>
            <td style="padding:20px 10px;font-size:14px;vertical-align: middle;"><span>
                <p style="margin:0;">$3500</p>
              </span></td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>

</section>
{{View::make('admin.footer')}}