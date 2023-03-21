{{View::make('account.header')}}
{{View::make('account.sidebar')}}
<style>
    body {
        background: #fff !IMPORTANT;
    }

    .container {
        overflow: visible;
    }

    .custom_calendar input {
        width: auto;
        display: inline-block;
    }

    .order_form {
        padding: 0 !important;
        box-shadow: none !important;
        margin: 0 !important;
        width: 100%;
    }

    .table-controls {
        margin-bottom: 0;
        min-width: 60%;
        margin-right: 20px;
    }

    .table-controls .filters select {
        flex-basis: 50%;
        max-width: 50%;
    }

    .info-right-side form input,
    .info-right-side form select {
        height: 41px;
    }

    @media screen and (max-width:767px) {
        .info-right-side .web_tab_head {
            flex-direction: row;
        }

        .update_btn {
            height: 38px;
        }
    }

    @media screen and (min-width:768px) and (max-width:1024px) {
        .order_table.info-right-side {
            overflow: auto;
        }
    }

    form#formsub {
        display: flex;
        justify-content: flex-start;
    }

    form#formsub .table-controls {
        /* flex-basis: 40%; */
        max-width: 40%;
        min-width: auto;
    }

    @media screen and (max-width:767px) {
        form#formsub {
            justify-content: space-between;
        }

        form#formsub .table-controls {
            flex-basis: 70%;
            max-width: 70%;
            min-width: auto;
        }
    }
</style>
<section class="body-part main_container">
    <div class="container px-0">
        <h2> My Orders </h2>
        <div class="info-right-side">
            <ul class="web_tab_head">
                <form action="" class="order_form" enctype="multipart/form-data" method="GET" id="formsub">

                    <div class="table-controls">
                        <div class="filters">
                            <input type="text" name="productName" id="" placeholder="Search" value=" {{Request::get('productName') }}" class="form-control">
                            <select class="form-control" name="orderStatus">
                                <option value="all">All Status</option>
                                @foreach($orderStatus as $orderStatus)
                                <option {{Request::get('orderStatus') == $orderStatus->id?'selected':''}} value="{{$orderStatus->id}}">{{$orderStatus->order_status_name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <button class="btn btn-primary update_btn" style="line-height: initial;">Update</button>
                </form>
            </ul>
        </div>
        <div class="order_table info-right-side">
            <table class="table">
                <tbody>
                    <tr>
                        <td style="width:15%"><span><b>Date</b></span></td>
                        <td style="width:10%"><span><b>Order no.</b></span></td>
                        <td style="width:40%"><span><b>Detail</b></span></td>
                        <td style="width:40%"><span><b>Status</b></span></td>
                        <td style="width:10%"><span><b>Quantity</b></span></td>
                        <td style="width:10%"><span><b>Subtotal</b></span></td>
                        <td style="width:10%"><span><b>Total</b></span></td>
                    </tr>

                    @if(!empty($CurrentUsercart))
                    @foreach($CurrentUsercart as $CurrentUsercart)
                    @if(!empty($CurrentUsercart->OriginalProductCurrentUser))
                    <?php
                    $timestamp = strtotime($CurrentUsercart->OriginalProductCurrentUser->created_at);
                    $date = date("Y-m-d", $timestamp);
                    $month_name = date("F", strtotime($date)); // get month name
                    $day = date("d", strtotime($date)); // get day of the month
                    $year = date("Y", strtotime($date)); // get year

                    //dd($CurrentUsercart->OriginalProductCurrentUser);

                    $category = DB::table('order_status')
                        ->select('order_status_name')
                        ->where('id', '=', $CurrentUsercart->OriginalProductCurrentUser->order_status)
                        ->first();

                    ?>
                    <tr>
                        <td style="padding:20px 10px;font-size:14px"><span>{{$day}} {{$month_name}} {{$year}}</span></td>
                        <td style="padding:20px 10px;font-size:14px"><span>{{$CurrentUsercart->OriginalProductCurrentUser->fk_order_id}}</span></td>
                        <td style="padding:20px 10px;font-size:14px"><span>
                                <p>{{$CurrentUsercart->OriginalProductCurrentUser->product_name}}</p>
                                @foreach($CurrentUsercart->serviceSubService as $serviceNameExtrat)
                                <p style="margin:0;">{{$serviceNameExtrat->product_name}}</p>
                                @endforeach
                            </span></td>
                        <td style="padding:20px 10px;font-size:14px;"><span>
                                <p style="margin:0;">{{$category->order_status_name}}</p>
                            </span></td>
                        <td style="padding:20px 10px;font-size:14px;text-align: center;"><span>
                                <p>{{$CurrentUsercart->OriginalProductCurrentUser->quantity}}</p>
                                @foreach($CurrentUsercart->serviceSubService as $serviceQuantityExtra)
                                <p style="margin:0;">{{$serviceQuantityExtra->quantity}}</p>
                                @endforeach
                            </span></td>
                        <td style="padding:20px 10px;font-size:14px"><span>
                                @php
                                $serviceProductPrice = 0;
                                @endphp
                                <p>{{$getCurrency->symbol}}{{$CurrentUsercart->OriginalProductCurrentUser->price}}</p>
                                @foreach($CurrentUsercart->serviceSubService as $serviceExtarPrice)
                                @php
                                $serviceProductPrice += $serviceExtarPrice->total_payment;
                                @endphp
                                <p style="margin:0;">{{ $getCurrency->symbol}}{{$serviceExtarPrice->total_payment}}</p>
                                @endforeach
                            </span></td>
                        <td style="padding:20px 10px;font-size:14px;vertical-align: middle;"><span>
                                <p style="margin:0;">{{ $getCurrency->symbol}}{{$CurrentUsercart->OriginalProductCurrentUser->total_payment+$serviceProductPrice}}</p>
                            </span></td>
                    </tr>
                    @endif
                    @endforeach
                    @endif
                    <!-- <tr>
                        <td style="padding:20px 10px;font-size:14px"><span>11 Jan 2020</span></td>
                        <td style="padding:20px 10px;font-size:14px"><span>1234567890</span></td>
                        <td style="padding:20px 10px;font-size:14px"><span>Added 4 pages of medium complexity for www.domain.com</span></td>
                        <td style="padding:20px 10px;font-size:14px;"><span>Work in progress</span></td>
                        <td style="padding:20px 10px;font-size:14px;text-align: center;"><span>1</span></td>
                        <td style="padding:20px 10px;font-size:14px"><span>16 credits</span></td>
                        <td style="padding:20px 10px;font-size:14px;white-space: nowrap;"><span>16 credits</span></td>
                    </tr> -->

                </tbody>
            </table>
        </div>
    </div>

</section>
{{View::make('account.footer')}}