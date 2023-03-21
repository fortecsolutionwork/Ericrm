{{View::make('admin.header')}}
{{View::make('admin.sidebar')}}
<section class="body-part main_container">
  <style>
    /* .quantity {
      display: flex;
      align-items: center;
      justify-content: center;
      padding: 0;
    }

    .quantity__minus,
    .quantity__plus {
      display: block;
      width: 22px;
      height: 23px;
      margin: 0;
      background: #dee0ee;
      text-decoration: none;
      text-align: center;
      line-height: 23px;
    }

    .quantity__minuss,
    .quantity__pluss {
      display: block;
      width: 22px;
      height: 23px;
      margin: 0;
      background: #dee0ee;
      text-decoration: none;
      text-align: center;
      line-height: 23px;
    }

    .quantity__minus:hover,
    .quantity__plus:hover {
      background: #575b71;
      color: #fff;
    }

    .quantity__minuss:hover,
    .quantity__pluss:hover {
      background: #575b71;
      color: #fff;
    }

    .quantity__minus {
      border-radius: 3px 0 0 3px;
    }

    .quantity__minuss {
      border-radius: 3px 0 0 3px;
    }

    .quantity__plus {
      border-radius: 0 3px 3px 0;
    }

    .quantity__pluss {
      border-radius: 0 3px 3px 0;
    }

    .quantity__input {
      width: 32px;
      height: 23px;
      margin: 0;
      padding: 0;
      text-align: center;
      border-top: 2px solid #dee0ee;
      border-bottom: 2px solid #dee0ee;
      border-left: 1px solid #dee0ee;
      border-right: 2px solid #dee0ee;
      background: #fff;
      color: #8184a1;
    }

    .quantity__minus:link,
    .quantity__plus:link {
      color: #8184a1;
    }

    .quantity__minuss:link,
    .quantity__plus:link {
      color: #8184a1;
    }

    .quantity__minus:visited,
    .quantity__plus:visited {
      color: #fff;
    }

    .quantity__minuss:visited,
    .quantity__pluss:visited {
      color: #fff;
    }

    .sub_products .quantity {
      padding-bottom: 15px;
    }

    .quantity a {
      text-decoration: none;
    } */
    /*inc desc */
    .quantity {
      position: relative;
      height: 40px;
      width: 60px;
      background: #f0f0f1;
    }

    .quantity .quantity__minus,
    .quantity .quantity__minuss {
      top: 0;
      visibility: hidden;
      position: absolute;
      right: 8px;
      height: 16px;
    }

    .quantity .quantity__plus,
    .quantity .quantity__pluss {
      visibility: hidden;
      position: absolute;
      right: 0;
      bottom: 0;
      height: 16px;
    }

    .quantity__input {
      height: 100%;
      width: 100%;
      top: 0;
      position: absolute;
    }


    .quantity .quantity__plus::before,
    .quantity .quantity__pluss::before {
      content: "\f0d7";
      position: absolute;
      top: -10px;
      right: 8px;
      color: #007bff;
      height: 10px;
      width: 10px;
      font-family: 'FontAwesome';
      visibility: visible;
      z-index: 1;
    }

    .quantity .quantity__minus::before,
    .quantity .quantity__minuss::before {
      content: "\f0d7";
      position: absolute;
      bottom: -10px;
      right: 0px;
      color: #007bff;
      height: 10px;
      width: 10px;
      font-family: 'FontAwesome';
      visibility: visible;
      z-index: 1;
      transform: rotate(180deg);
    }

    .quantity .quantity__minus,
    .quantity .quantity__minuss {
      top: auto;
      bottom: 0;
      height: 50%;
      width: 50%;
      right: 0;
    }

    .quantity .quantity__plus,
    .quantity .quantity__pluss {
      bottom: auto;
      top: 0;
      width: 50%;
      height: 50%;
      right: 0;
    }


    .quantity .quantity__minus::before,
    .quantity .quantity__minuss::before {
      right: 8px;
      top: -7px;
      transform: initial;
    }

    .quantity .quantity__plus::before,
    .quantity .quantity__pluss::before {
      transform: rotate(180deg);
      bottom: -7px;
      top: auto;
    }

    table.cart_table.table tr {
      background: #80b8e424;
    }

    .quantity__input {
      border: 1px solid gray;
      border-right: 0px;
      border-left: 0px;
      padding: 10px;
    }
  </style>
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
        <h4>Edit Order #{{$UserOrder->oId}}</h4>
        <a href="{{route('orders')}}" class="btn btn-primary">Back to Orders</a>
      </div>

      <form action="{{route('storeeditorder')}}" id="demo-form" data-parsley-validate="" enctype="multipart/form-data" method="POST">
        @csrf
        <input type="hidden" value="{{$UserOrder->oId}}" name="oId" />
        <div class="product_info">
          <span>{{$month_name}} {{ $day}}, {{$year}} at {{$time_str}} &nbsp;|&nbsp; {{$count[0]->count}} items &nbsp;|&nbsp; Total ${{$total_payment[0]->total_payment}} .00</span>
          <div>
            <label class="mr-3"><strong>Status</strong></label>
            <select class="form-control inline" name="order_status">
              @if(!empty($order_status))
              @foreach($order_status as $order_status_name)
              <option {{$UserOrder->order_status == $order_status_name->id?"selected":""}} value="{{ $order_status_name->id}}">{{$order_status_name->order_status_name}}</option>
              @endforeach
              @endif
            </select>
          </div>
        </div>
        <div>
          <span><b>Name :</b></span>
          <sapn> {{$UserOrder->name}} </sapn><br>
          <span><b>Company name :</b></span>
          <sapn> {{$UserOrder->company_name}} </sapn>
          <input type="text" name="order_details" id="" placeholder="Add order note" value="{{$UserOrder->order_details}}" class="form-control" required="">
        </div>

        <div class="admin_edit_ticket">
          <div class="container p-0">
            <div class="card mt-3">
              <div class="card-body p-3 text-right">
                <button type="button" class="add_items btn btn-primary"> <i class="fa-solid fa-plus"></i> Add Item </button>
              </div>
              <div class="table-responsive">
                <table class="table orders_table">
                  <thead>
                    <tr>
                      <th>Items</th>
                      <th>Price</th>
                      <th>Qty</th>
                      <th>Subtotal</th>
                      <th></th>
                    </tr>
                  </thead>
                  <tbody>
                    @php
                    $subTotal = 0;
                    $i= 1;
                    $myArray = array();
                    @endphp
                    @if(!empty($order_meta))
                    @foreach($order_meta as $order_meta)
                    <tr class="order_row order_row{{$i}}">
                      <td><select required="" class="form-control mySelect2 extravalueproduct" name="extravalueproduct[]" extravalueproduct-id="{{$i}}" id="extravalueproduct{{$i}}">
                          <option value="" disabled="" selected="">Select Service</option>
                          @if(!empty($product))
                          @foreach($product as $products)
                          <option {{$products->id ==  $order_meta->fk_product_id?"selected":""}} value="{{ $products->id }}">{{ $products->product_name}}</option>
                          @endforeach
                          @endif
                        </select></td>
                      <td><input class="priceUnit{{$i}}" name="priceUnit[]" type="hidden" value="{{ $order_meta->price}}">
                        <div class="sa-price" price-id="{{$i}}" id="sa-price4">{{$currency->symbol}}<span id="sa-price1{{$i}}">{{ $order_meta->price}}</span></div>
                      </td>
                      <td>
                        <div class="quantity"><a href="#" class="quantity__minuss" data-id="{{$i}}"><span>-</span></a><input class="quantity__input subProductQuantity{{$i}}" subproductquantity-id="{{$i}}" type="text" name="subProductQuantity[]" min="1" value="{{$order_meta->quantity}}"><a href="#" class="quantity__pluss" data-id="{{$i}}"><span>+</span></a></div>
                      </td>
                      <td>
                        <div class="sa-price" subprice-id="{{$i}}" id="sub-price{{$i}}">{{$currency->symbol}}<span id="sub-price1{{$i}}">{{$order_meta->price*$order_meta->quantity}}</span></div>
                      </td>
                      <td class="hide_tab"><span data-id="{{$i}}" data-order="{{$order_meta->fk_order_id}}" class="remove_item remove_item{{$i}}"><i class="fa-solid fa-minus"></i></span></td>
                    </tr>
                    @php
                    $subTotal = $subTotal + $order_meta->price*$order_meta->quantity;
                    $i++;
                    array_push($myArray,$order_meta->fk_product_id);
                    @endphp
                    @endforeach
                    @endif
                    <tr class="total_row">
                      <td colspan="2"></td>
                      <td>Total</td>
                      <td class="text-end">
                        <div class="sa-price">{{$currency->symbol}}<span class="sa-pric1">{{$subTotal}}.00</span></div>
                      </td>
                      <td></td>
                    </tr>
                  </tbody>
                </table>

              </div>
            </div>
            <div class="btns_update">
              <button type="submit" class="btn btn-primary mr-2"> Update </button>
              <a href="{{route('orders')}}" class="btn" style="border:1px solid #dbdbdb"> Cancel </a>
            </div>
          </div>
        </div>
      </form>
    </div>
  </div>
</section>

{{View::make('admin.footer')}}
<script>
  $(document).ready(function() {
    var currency = "<?php echo   $currency->symbol ?>";
    var i = "<?php echo $i ?>";
    var currency = "<?php echo $currency->symbol;  ?>"

    var my_array = [];
    $(".add_items").click(function() {
      i++;
      event.preventDefault();
      var add_row = '<tr class="order_row order_row' + i + '">' +
        '<td><select required class="form-control mySelect2 extravalueproduct"   name="extravalueproduct[]" extravalueproduct-id="' + i + '" id="extravalueproduct' + i + '"></select></td>' +
        '<td><input class="priceUnit' + i + '" name="priceUnit[]" type="hidden"/><div class="sa-price" price-id=' + i + ' id="sa-price' + i + '">' + currency + '<span  id="sa-price1' + i + '">0,000.00</span></div></td>' +
        '<td><div class="quantity"><a href="#" class="quantity__minuss" data-id="' + i + '"><span>-</span></a><input class="quantity__input subProductQuantity' + i + '" subProductQuantity-id="' + i + '" type="text" name="subProductQuantity[]" min="1" value="1"><a href="#" class="quantity__pluss" data-id="' + i + '"><span>+</span></a></div></td>' +
        '<td><div class="sa-price" subprice-id="' + i + '" id="sub-price' + i + '">' + currency + '<span  id="sub-price1' + i + '">0,000.00</span></div></td>' +
        '<td class="hide_tab"><span data-id="' + i + '" class="remove_item remove_item' + i + '"><i class="fa-solid fa-minus"></i></span></td>' +
        '</tr>';
      $('.orders_table .total_row').before(add_row);

      $.ajax({
        url: "{{ url('admin/get-extra-value-product')}}",
        type: "get",
        data: {
          data: 1,
          _token: '{{ csrf_token() }}'
        },
        dataType: 'json',
        success: function(response) {
          // <option value="" disabled selected>Select Service</option>
          $.each(response, function(key, value) {
            var option = $('<option value="' + value.id +
              '">' + value.product_name +
              '</option>');
            $('#extravalueproduct' + i + '').append(option);
            if (key == 1) {
              $('#extravalueproduct' + i + '').prepend('<option value="" disabled selected>Select Service</option>');
            }
          });
        }
      });

    });

    // set value om change 
    var productIdArray = [];

    $(document).on('change', '.extravalueproduct', function() {
      var productId = $(this).val();
      dataId = $(this).attr("extravalueproduct-id");
      if (jQuery.inArray(productId, productIdArray) !== -1) {
        $(".order_row" + dataId).remove();
        alert("Already added");
      } else {
        productIdArray.push(productId);

        $.ajax({
          url: "{{ url('admin/get-extra-value-product-by-id')}}",
          type: "get",
          data: {
            data: productId,
            _token: '{{ csrf_token() }}'
          },
          dataType: 'json',
          success: function(response) {

            $(".priceUnit" + dataId + "").val(Number(response));
            $("#sa-price1" + dataId + "").text(Number(response));
            $("#sub-price1" + dataId + "").text(Number(response));
            myFunctionOnchange(dataId, response);
          }
        });
      }

    });

    $(document).on('click', '.quantity__minuss', function(e) {
      e.preventDefault();
      dataId = $(this).attr("data-id");
      var value = Number($(".subProductQuantity" + dataId + "").val());
      if (value > 1) {
        value--;
        var spric1 = $(".sa-pric1").text();

        var saprice1 = $("#sa-price1" + dataId).text();
        $(".subProductQuantity" + dataId + "").val(value);
        $("#sub-price1" + dataId + "").text(saprice1 * value);

        $(".sa-pric1").text(Number(spric1) - Number(saprice1));
      }

    });

    $(document).on('click', '.quantity__pluss', function(e) {
      e.preventDefault();
      dataId = $(this).attr("data-id");
      var value = Number($(".subProductQuantity" + dataId + "").val());
      value++;
      var saprice1 = $("#sa-price1" + dataId).text();
      $(".subProductQuantity" + dataId + "").val(value);
      $("#sub-price1" + dataId + "").text(saprice1 * value);
      //alert(Number(saprice1) * Number(value));
      var spric1 = $(".sa-pric1").text();
      $(".sa-pric1").text(Number(spric1) + Number(saprice1));


    })

    function myFunctionOnchange(dataId, price) {
      var spric1 = $(".sa-pric1").text();
      //alert(spric1);
      var price = $("#sub-price1" + dataId).text();
      $(".sa-pric1").text(Number(spric1) + Number(price));
    }


    $(document).on('click', '.remove_item', function() {
      var dataId = $(this).attr("data-id");
      var price = $("#sub-price1" + dataId).text();
      var spric1 = $(".sa-pric1").text();
      $(".sa-pric1").text(Number(spric1) - Number(price));
      $(this).parents('tr').remove();

    });
  });
</script>