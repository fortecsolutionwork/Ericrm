{{View::make('account.header')}}
{{View::make('account.sidebar')}}
<style>
    body {
        background: #fff !important;
    }

    header,
    footer {
        background-color: #120d21 !important;
    }

    .header-left {
        width: 100%;
        left: 0;
        height: 56px;
        background: #f0f0f0;
        justify-content: space-between;
        z-index: 3;
    }

    .support-ticket .side-main-menu {
        top: 56px;
    }

    .header-left .head-bar>div i {
        border: none;
    }

    .header-left .head-bar i {
        padding: 19px;
        color: #ada7a7;
    }

    .header-left .head-bar {
        justify-content: flex-end;
    }

    .container {
        max-width: 920px;
    }

    .support-ticket .side-menu-open {
        width: 200px !important;
        z-index: 3;
    }

    .body-part {
        width: calc(100% - 56px);
        margin-left: 56px;
    }

    .support-ticket {
        max-width: 1440px;
    }

    input[type=number]::-webkit-inner-spin-button {
        opacity: 1
    }

    .fa-minus,
    .fa-plus {
        display: none;
    }

    .website_design_list a[aria-expanded="true"] .fa-minus {
        display: inline-block !important;
    }

    .website_design_list a[aria-expanded="false"] .fa-plus {
        display: inline-block !important;
    }

    .website_design_list .panel-heading span i {
        font-size: 10px;
    }

    .table_sitemap h4 {
        margin: 0;
    }

    .table_sitemap {
        align-items: flex-start;
    }

    .cart_table input[type="number"] {
        height: 30px;
        margin-bottom: 10px;
    }

    .sub_products {
        margin-top: 15px;
    }

    .sub_products span {
        padding-bottom: 15px;
        display: inline-block;
    }
    

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

    .quantity .quantity__minus, .quantity .quantity__minuss {
    top: auto;
    bottom: 0;
    height: 50%;
    width: 50%;
    right: 0;
}

.quantity .quantity__plus, .quantity .quantity__pluss {
    bottom: auto;
    top: 0;
    width: 50%;
    height: 50%;
    right: 0;
}


.quantity .quantity__minus::before, .quantity .quantity__minuss::before {
    right: 8px;
    top: -7px;
    transform: initial;
}

.quantity .quantity__plus::before, .quantity .quantity__pluss::before {
    transform: rotate(180deg);
    bottom: -7px;
    top: auto;
}

table.cart_table.table tr {
    background: #80b8e424;
}

.quantity__input {border: 1px solid gray;border-right: 0px;border-left: 0px;padding: 10px;}


</style>
@if(!empty($CurrentUsercart))
<section class="main_container">
    <div class="container website_design_list">
        @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
        @endif
        @if ($message = Session::get('error'))
        <div class="alert alert-danger">
            <p>{{ $message }}</p>
        </div>
        @endif
        <div class="row">
            <div class="col-lg-12">
                <form enctype="multipart/form-data" id="my-form">
                    @csrf
                    <h3 style="font-weight:700">My shopping cart</h3>
                    <div class="table_div">
                        <table class="cart_table table">
                            <tr>
                                <td></td>
                                <td style="font-weight:500">Product</td>
                                <td style="font-weight:500">Unit Price</td>
                                <td style="font-weight:500">Quantity</td>
                                <td style="font-weight:500">Subtotal</td>
                            </tr>
                            <?php $subtotal = 0;
                            $subtotalextra = 0;
                            ?>
                            @foreach($CurrentUsercart as $CurrentUsercart)

                            <tr>
                                <td style="text-align: center;"><a href="{{route('removecart',$CurrentUsercart->OriginalProductCurrentUser->fk_product_id)}}"><i class="fa-solid fa-xmark"></i></a></td>
                                <td>
                                    <div class="table_sitemap">
                                        <img src="../images/front_img.png">
                                        <div>
                                            <h4>{{$CurrentUsercart->OriginalProductCurrentUser->product_name}}</h4>
                                            <p class="mb-0">Low complexity page </p>
                                            @if(!empty($CurrentUsercart->serviceSubService))
                                            <div class="sub_products">
                                                @foreach($CurrentUsercart->serviceSubService as $serviceSubServiceData)
                                                <span>{{ $serviceSubServiceData->product_name}}</span> <br>
                                                @endforeach
                                            </div>
                                            @endif
                                        </div>
                                    </div>
                                </td>
                                <?php
                                $price = $CurrentUsercart->OriginalProductCurrentUser->original_price > $CurrentUsercart->OriginalProductCurrentUser->sale_price && $CurrentUsercart->OriginalProductCurrentUser->sale_price != 0 ? $CurrentUsercart->OriginalProductCurrentUser->sale_price : $CurrentUsercart->OriginalProductCurrentUser->original_price;


                                ?>
                          
                                <?php $subtotal += $price * $CurrentUsercart->OriginalProductCurrentUser->quantity; ?>
                                <input type="hidden" name="originalProductId[]" min="1" value="{{$CurrentUsercart->OriginalProductCurrentUser->fk_product_id}}">

                                <input class="originalProductTotal1{{$CurrentUsercart->OriginalProductCurrentUser->fk_product_id}}"originalProductTotal-id1="{{$CurrentUsercart->OriginalProductCurrentUser->fk_product_id}}" type="hidden" name="originalProductTotal[]" min="1" value="{{$CurrentUsercart->OriginalProductCurrentUser->original_price}}">

                                <input class="originalProductTotal1{{$CurrentUsercart->OriginalProductCurrentUser->fk_product_id}}"originalProductTotal-id1="{{$CurrentUsercart->OriginalProductCurrentUser->fk_product_id}}" type="hidden" name="saleProductTotal[]" min="1" value="{{$CurrentUsercart->OriginalProductCurrentUser->sale_price}}">

                                <input class="originalProductTotal{{$CurrentUsercart->OriginalProductCurrentUser->fk_product_id}}"originalProductTotal-id="{{$CurrentUsercart->OriginalProductCurrentUser->fk_product_id}}" type="hidden" name="" min="1" value="{{$price}}">


                                <?php /*<input class="originalProductTotal{{$CurrentUsercart->OriginalProductCurrentUser->fk_product_id}}" originalProductTotal-id="{{$CurrentUsercart->OriginalProductCurrentUser->fk_product_id}}" type="hidden" name="originalProductTotal[]" min="1" value="{{$CurrentUsercart->OriginalProductCurrentUser->total}}"> */ ?>


                                <td>
                                    @if($CurrentUsercart->OriginalProductCurrentUser->original_price > $CurrentUsercart->OriginalProductCurrentUser->sale_price && $CurrentUsercart->OriginalProductCurrentUser->sale_price != 0)
                                    <div style="text-decoration:line-through;">{{$getCurrency->symbol}}{{$CurrentUsercart->OriginalProductCurrentUser->original_price}} </div><span> {{$getCurrency->symbol}}{{$CurrentUsercart->OriginalProductCurrentUser->sale_price}} </span>
                                    <!-- <div style="height:45px">{{$getCurrency->symbol}}{{$CurrentUsercart->OriginalProductCurrentUser->original_price}}</div> -->
                                    @else
                                    <div style="height:45px">{{$getCurrency->symbol}}{{$CurrentUsercart->OriginalProductCurrentUser->original_price}}</div>
                                    @endif
                                    
                                    @if(!empty($CurrentUsercart->serviceSubService))
                                    <div class="sub_products">
                                        @foreach($CurrentUsercart->serviceSubService as $serviceSubServiceData)
                                        <input type="hidden" name="extaValueProductIdWithOriginal[]" value="{{$CurrentUsercart->OriginalProductCurrentUser->fk_product_id}}">

                                        <input class="subProductUnitPrice1{{$serviceSubServiceData->did}}" subProductUnitPrice-id1="{{$serviceSubServiceData->did}}" type="hidden" name="originalPrice[]" min="1" value="{{$serviceSubServiceData->original_price}}">

                                        <input class="subProductUnitPrice1{{$serviceSubServiceData->did}}" subProductUnitPrice-id1="{{$serviceSubServiceData->did}}" type="hidden" name="sale_Price[]" min="1" value="{{$serviceSubServiceData->sale_price}}">


                                        <!-- <input class="subProductUnitPrice1{{$serviceSubServiceData->did}}" subProductUnitPrice-id1="{{$serviceSubServiceData->did}}" type="hidden" name="salePrice[]" min="1" value="{{$serviceSubServiceData->original_price>$serviceSubServiceData->sale_price&&$serviceSubServiceData->sale_price>0?$serviceSubServiceData->sale_price:$serviceSubServiceData->original_price}}"> -->


                                        <input class="subProductUnitPrice{{$serviceSubServiceData->did}}" subProductUnitPrice-id="{{$serviceSubServiceData->did}}" type="hidden"  min="1" value="{{$serviceSubServiceData->original_price>$serviceSubServiceData->sale_price&&$serviceSubServiceData->sale_price>0?$serviceSubServiceData->sale_price:$serviceSubServiceData->original_price}}">


                                        <input type="hidden" name="extaValueProductId[]" value="{{$serviceSubServiceData->id}}">

                                        @if($serviceSubServiceData->original_price>$serviceSubServiceData->sale_price&&$serviceSubServiceData->sale_price != 0)
                                        <div style="text-decoration:line-through;">{{$getCurrency->symbol}}{{$serviceSubServiceData->original_price}}</div><div>{{$getCurrency->symbol}}{{ $serviceSubServiceData->sale_price}} </div>
                                        @else
                                        <span> {{$getCurrency->symbol}}{{ $serviceSubServiceData->original_price}} </span><br>
                                        @endif
                                        @endforeach
                                    </div>
                                    @endif
                                </td>
                                <td>
                                    <div style="height:45px">
                                        <!-- <input class="originalProductQuantity" originalProductQuantity-id="{{$CurrentUsercart->OriginalProductCurrentUser->fk_product_id}}" type="number" min="1" value="{{$CurrentUsercart->OriginalProductCurrentUser->quantity}}"> -->
                                        <div class="quantity">
                                            <a href="#" class="quantity__minus" data-id="{{$CurrentUsercart->OriginalProductCurrentUser->fk_product_id}}"><span>-</span></a>
                                            <input name="originalProductQuantity[]" class="quantity__input originalProductQuantity{{$CurrentUsercart->OriginalProductCurrentUser->fk_product_id}}" originalProductQuantity-id="{{$CurrentUsercart->OriginalProductCurrentUser->fk_product_id}}" type="text" min="1" value="{{$CurrentUsercart->OriginalProductCurrentUser->quantity}}">
                                            <a href="#" class="quantity__plus" data-id="{{$CurrentUsercart->OriginalProductCurrentUser->fk_product_id}}"><span>+</span></a>
                                        </div>

                                    </div>
                                    @if(!empty($CurrentUsercart->serviceSubService))
                                    <div class="sub_products">
                                        @foreach($CurrentUsercart->serviceSubService as $serviceSubServiceData)
                                        <?php // print_r($serviceSubServiceData) 
                                        ?>
                                        <!-- <input type="number" min="1" value="{{ $serviceSubServiceData->quantity}}"> <br> -->
                                        <div class="quantity">
                                            <a href="#" class="quantity__minuss" data-id="{{$serviceSubServiceData->did}}"><span>-</span></a>
                                            <input class="quantity__input subProductQuantity{{$serviceSubServiceData->did}}" subProductQuantity-id="{{ $serviceSubServiceData->did}}" type="text" name="subProductQuantity[]" min="1" value="{{ $serviceSubServiceData->quantity}}">
                                            <a href="#" class="quantity__pluss" data-id="{{$serviceSubServiceData->did}}"><span>+</span></a>
                                        </div>
                                        @endforeach
                                    </div>
                                    @endif
                                </td>
                                <td>
                                    <div style="height:45px"> {{$getCurrency->symbol}}<span class="orignailSubTotal{{$CurrentUsercart->OriginalProductCurrentUser->fk_product_id}}">{{$price*$CurrentUsercart->OriginalProductCurrentUser->quantity}}</span></div>
                                    @if(!empty($CurrentUsercart->serviceSubService))
                                    <div class="sub_products">
                                        @foreach($CurrentUsercart->serviceSubService as $serviceSubServiceData)
                                        @php $dprice = $serviceSubServiceData->original_price>$serviceSubServiceData->sale_price&&$serviceSubServiceData->sale_price>0?$serviceSubServiceData->sale_price:$serviceSubServiceData->original_price; @endphp
                                        <span style="padding-bottom:0;">{{$getCurrency->symbol}}<span class="extraSubTotal{{$serviceSubServiceData->did}}">{{ $dprice*$serviceSubServiceData->quantity}}</span></span><br>
                                        <?php if($serviceSubServiceData->original_price > $serviceSubServiceData->sale_price && $serviceSubServiceData->sale_price > 0){
                                            $subtotalextra =  $subtotalextra+$serviceSubServiceData->sale_price * $serviceSubServiceData->quantity; 
                                        }else{
                                            $subtotalextra =  $subtotalextra+$serviceSubServiceData->original_price * $serviceSubServiceData->quantity; 
                                        } 
                                        ?>
                                        @endforeach
                                    </div>
                                    @endif
                                </td>
                            </tr>
                            @endforeach
                            <tfoot>
                                <tr>
                                    <td colspan="3"></td>
                                    <td style="text-align: right; padding-right: 30px;"> Subtotal</td>
                                    <td> {{$getCurrency->symbol}}<span class="getCurrentTotal">{{$subtotal+$subtotalextra}}</span></td>
                                </tr>
                                <tr>
                                    <td colspan="3"></td>
                                    <td style="text-align: right; padding-right: 30px;"> Discount</td>
                                    <td> -$000 </td>
                                </tr>
                                <tr>
                                    <td colspan="3"></td>
                                    <td style="text-align: right; padding-right: 30px;"> Total</td>
                                    <td> {{$getCurrency->symbol}}<span class="total_product">{{$subtotal+$subtotalextra}}</span></td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>

                    <div class="cart_buttons">
                        <div>
                            <input type="text" placeholder="Coupon code" style="background:#fff;color:#0065f2;border:1px solid">
                            <button>Apply code</button>
                        </div>
                        <div>
                            <button id="update">Update cart</button>
                            <button id="checkout">Checkout</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
@else
<section class="main_container">
    <div class="container empty_cart" style="text-align:center">
        <img src="../images/tokri.png">
        <h2>Your Cart is <span style="color:#007bff;">Empty !</span></h2>
        <p>Must add items on cart before you proceed for checkout.</p>
        <a href="{{route('manageproducts')}}">Back to Shop</a>
    </div>
</section>
@endif
{{View::make('account.footer')}}
<script>
    $(document).ready(function() {
        const minus = $('.quantity__minus');
        const plus = $('.quantity__plus');

        minus.click(function(e) {
            e.preventDefault();
            dataId = $(this).attr("data-id");
            var value = Number($(".originalProductQuantity" + dataId + "").val());
            if (value > 1) {
                value--;
                var getQuantity = value;    
                var productPrice = $(".originalProductTotal" + dataId + "").val();
                var total = productPrice * getQuantity;
                var single = productPrice;
                $(".orignailSubTotal" + dataId + "").text(Number(total));
                var getCurrentTotal = $(".getCurrentTotal").text();
                $(".getCurrentTotal").text(Number(getCurrentTotal) - Number(single));
                $(".originalProductQuantity" + dataId + "").val(value);

                //var total_product = Number($(".total_product").text());
              
                $(".total_product").text(Number(getCurrentTotal)-Number(single));
                



            }
        });

        plus.click(function(e) {
            e.preventDefault();
            dataId = $(this).attr("data-id");
            var value = Number($(".originalProductQuantity" + dataId + "").val());
            value++
            var getQuantity = value;
            var productPrice = $(".originalProductTotal" + dataId + "").val();
            var total = productPrice * getQuantity;
            var single = productPrice;
            $(".orignailSubTotal" + dataId + "").text(Number(total));
            var getCurrentTotal = $(".getCurrentTotal").text();
            $(".getCurrentTotal").text(Number(getCurrentTotal) + Number(single));
            $(".originalProductQuantity" + dataId + "").val(value);
            $(".total_product").text(Number(getCurrentTotal)+ Number(single));
        })

        /*subProductQuantity*/
        const minuss = $('.quantity__minuss');
        const pluss = $('.quantity__pluss');
        minuss.click(function(e) {
            e.preventDefault();
            dataId = $(this).attr("data-id");
            var value = Number($(".subProductQuantity" + dataId + "").val());
            if (value > 1) {
                value--;
                var getQuantity = value;
                var productPrice = $(".subProductUnitPrice" + dataId + "").val();
                var total = productPrice * getQuantity;
                var single = productPrice;
                $(".extraSubTotal" + dataId + "").text(Number(total));
                var getCurrentTotal = $(".getCurrentTotal").text();
                $(".getCurrentTotal").text(Number(getCurrentTotal) - Number(single));
                $(".subProductQuantity" + dataId + "").val(value);
                 
                $(".total_product").text(Number(getCurrentTotal)-Number(single));
            }

        });

        pluss.click(function(e) {
            e.preventDefault();
            dataId = $(this).attr("data-id");
            var value = Number($(".subProductQuantity" + dataId + "").val());
            value++
            var getQuantity = value;
            var productPrice = $(".subProductUnitPrice" + dataId + "").val();
            var total = productPrice * getQuantity;
            var single = productPrice;
            $(".extraSubTotal" + dataId + "").text(Number(total));
            var getCurrentTotal = $(".getCurrentTotal").text();
            $(".getCurrentTotal").text(Number(getCurrentTotal) + Number(single));
            $(".subProductQuantity" + dataId + "").val(value);
            $(".total_product").text(Number(getCurrentTotal)+Number(single));
        })

        /*action*/
        // get a reference to the form and the button
        var form = document.getElementById('my-form');
        var update = document.getElementById('update');
        var checkout = document.getElementById('checkout');
        var backToShop = document.getElementById('backtoshop');

        // add a click event listener to the button
        update.addEventListener('click', function() {
            form.setAttribute('action', '{{route("updatecart")}}');
            form.setAttribute("method", "POST");
            form.submit();
        });

        checkout.addEventListener('click', function() {
            form.setAttribute('action', '{{route("checkout")}}');
            form.setAttribute("method", "GET");
            form.submit();
        });



    });
</script>