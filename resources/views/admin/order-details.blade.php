{{View::make('admin.header')}}
{{View::make('admin.sidebar')}}
<section class="body-part main_container">
  @php
  $timestamp = strtotime($UserOrder->order_created_at);
  $date = date("Y-m-d", $timestamp);
  $month_name = date("F", strtotime($date)); // get month name
  $day = date("d", strtotime($date)); // get day of the month
  $year = date("Y", strtotime($date)); // get year
  $time_str = date('H:i:s', $timestamp);
  $count = DB::table('order_meta')
  ->select(DB::raw("count(id) as count"),DB::raw("sum(total_payment) as total_payment"))
  ->where('fk_order_id','=',$UserOrder->oId)
  ->get();

  $total_payment = DB::table('order_meta')
  ->select(DB::raw("sum(total_payment) as total_payment"))
  ->where('fk_order_id','=',$UserOrder->oId)
  ->get();
  @endphp
  <div class="container px-0">
    <div class="box-layout">
      <div class="form-header mb-3">
        <h4>Order #{{$UserOrder->oId}}</h4>
        <div>
          <a href="{{route('editorder',$UserOrder->oId)}}" class="btn btn-outline-primary mr-2">Edit Order</a>
          <a href="{{route('orders')}}" class="btn btn-primary">Back to All Orders</a>
        </div>
      </div>
      <p class="product_info"><span>{{$month_name}} {{ $day}}, {{$year}} at {{$time_str}}  &nbsp;|&nbsp; {{$count[0]->count}} items &nbsp;|&nbsp; Total ${{$total_payment[0]->total_payment}}</span> <span><strong>Status : </strong>{{$UserOrder->order_status_name}}</span></p>
      <div>
        <span><b>Name :</b></span>
        <sapn> {{$UserOrder->name}} </sapn><br>
        <span><b>Company name :</b></span>
        <sapn> {{$UserOrder->company_name}} </sapn>
      </div>

      <div class="card mt-5">
        <div class="table-responsive">
          <table class="table">
            <thead>
              <tr>
                <th>Items</th>
                <th>Price</th>
                <th>Qty</th>
                <th>Subtotal</th>
              </tr>
            </thead>
            <tbody>
              @php
              $subTotal = 0;
              @endphp
              @if(!empty($order_meta))
              @foreach($order_meta as $order_meta)
              <tr>
                <td class="min-w-20x">
                  <div class="d-flex align-items-center">
                    <img src="https://via.placeholder.com/40x40" class="me-4" width="40" height="40" alt="">
                    <a href="" class="text-reset">{{ $order_meta->product_name}}</a>
                  </div>
                </td>
                <td class="text-end" style="vertical-align:middle">
                  <div class="sa-price">
                    <span class="sa-price__symbol">$</span>
                    <span class="sa-price__integer">{{$order_meta->price}}</span>
                    <span class="sa-price__decimal">.00</span>
                  </div>
                </td>
                <td class="text-end" style="vertical-align:middle">{{$order_meta->quantity}}</td>
                <td class="text-end" style="vertical-align:middle">
                  <div class="sa-price">
                    <span class="sa-price__symbol">$</span>
                    <span class="sa-price__integer">{{$order_meta->price*$order_meta->quantity}}</span>
                    <span class="sa-price__decimal">.00</span>
                  </div>
                </td>
              </tr>
              @php
              $subTotal = $subTotal + $order_meta->price*$order_meta->quantity;
              @endphp
              @endforeach
              @endif
            </tbody>
            <tbody>
              <tr>
                <td colspan="2"></td>
                <td>Total</td>
                <td class="text-end">
                  <div class="sa-price">
                    <span class="sa-price__symbol">$</span>
                    <span class="sa-price__integer">{{$subTotal}}</span>
                    <span class="sa-price__decimal">.00</span>
                  </div>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
      <div class="text-right mt-4">
        <a href="{{route('editorder',$UserOrder->oId)}}" class="btn btn-outline-primary mr-2">Edit Order</a>
        <a href="{{route('orders')}}" class="btn btn-primary">Back to All Orders</a>
      </div>
    </div>
  </div>

</section>
{{View::make('admin.footer')}}