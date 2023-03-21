{{View::make('account.header')}}
{{View::make('account.sidebar')}}
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

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

    .short_width {
        width: 40%;
    }

    .cart_buttons.check_btn {
        display: block;
    }

    .cart_buttons.check_btn button {
        min-width: 150px;
        margin: 5px 0px;
        height: 45px;
        font-weight: 500;
    }

    .cart_table.checkout_table tfoot td {
        border: 1px solid #ced4da !important;
    }

    .date_feild input {
        display: inline;
        width: 48%;
    }

    .date_feild label {
        display: block;
    }

    .checkout input,
    .checkout select {
        height: 48px;
    }

    .checkout .cart_table tr td {
        border: 1px solid #ced4da;
    }

    .checkout h3 {
        font-size: 40px;
        margin-bottom: 20px;
    }

    table.cart_table.table.checkout_table {
        margin-top: 0;
    }

    .cart_buttons {
        margin: 0;
    }

    @media screen and (max-width:767px) {
        .short_width {
            width: 100%;
        }
    }

    
</style>
<section class="main_container">
    <script src='https://js.stripe.com/v2/' type='text/javascript'></script>
    <form action="{{route('process')}}" method="post" accept-charset="UTF-8" class="require-validation" data-cc-on-file="false" data-stripe-publishable-key="pk_test_51Jn0GYSCn9RmGB5DvmMHOu36CbYJFRpRbPpCGRmqUjLsK7DTBiOHdwQw7n1nzUBo4ds9sV1D1TTkmgfIWIjaoCsX0006wPGnYU" id="payment-form">
        @csrf
        <div class="container checkout website_design_list">
            <div class="row ">
                <div class="col-lg-7">
                    <div class='form-row'>
                        <div class='col-md-12 error form-group hide'>
                            <div class='alert-danger alert'>Please correct the errors and try
                                again.</div>
                        </div>
                    </div>
                    <h3 style="font-weight:700"> Secure checkout </h3>
                    <h4 style="font-weight:700">Card detail </h4>
                    <div class="row">
                        <div class="col-md-8">
                            <div class="form-group  required">
                                <label>Card no.*</label>
                                <input autocomplete='off' class='form-control card-number' size='20' type='text' placeholder="Enter Card number">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group date_feild expiration required">
                                <label> Due* </label>
                                <input class='form-control card-expiry-month' placeholder='MM' size='2' type='text'>
                                <input class='form-control card-expiry-year' placeholder='YYYY' size='4' type='text'>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="form-group  required">
                                <label>Name on card*</label>
                                <input class='form-control' size='4' type='text' placeholder="Enter Card Holder Name">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group cvc required">
                                <label>CSV*</label>
                                <input autocomplete='off' class='form-control card-cvc' placeholder='CVV' size='4' type='text'>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <h4 style="font-weight:700"> Secure checkout </h4>
                        </div>
                        <div class="col-md-6 cntry">
                            <div class="form-group">
                                <label>Country*</label>
                                <select class="form-control mySelect2 country" required="" name="country">
                                    @foreach($countries as $country)
                                    <option value="{{$country->id}}" {{$user->fk_country_id == $country->id?"selected":""}}> {{$country->name}} </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>City*</label>
                                <select class="form-control mySelect2" id="city-dropdown" required="" name="city">
                                    @foreach($cities as $city)
                                    <option value="{{$city->id}}" {{$user->fk_city_id == $city->id?"selected":""}}>{{$city->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Address line 1*</label>
                                <input required="" value="{{$user->address_line1?$user->address_line1:''}}" name="address_line1" style="width:100%" id="c_password" type="text" class="form-control short_width">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Address line 2</label>
                                <input value="{{$user->address_line2?$user->address_line2:''}}" name="address_line2" style="width:100%" id="c_password" type="text" class="form-control short_width">
                            </div>
                        </div>
                        <div class="col-md-12 mt-3">
                            <div class="cart_buttons check_btn">
                                <div>
                                    <button id="proceed"> Proceed </button>
                                    <i class="loader"></i>
                                </div>
                                <div>
                                    <button id="backtocart" style="background:#fff;color:#0065f2;border:1px solid  #ced4da">Back to cart </button>
                                </div>

                            </div>

                        </div>
                    </div>
                    @if ((Session::has('success-message')))
                    <div class="alert alert-success col-md-12">{{
          Session::get('success-message') }}</div>
                    @endif @if ((Session::has('fail-message')))
                    <div class="alert alert-danger col-md-12">{{
          Session::get('fail-message') }}</div>
                    @endif
                </div>
                <div class="col-lg-5">

                    <div class="table_div">
                        <table class="cart_table table checkout_table">
                            <tr>
                                <td colspan="2">
                                    <h4 style="font-weight:700"> Order summary </h4>
                                </td>
                            </tr>
                            <?php $suboriginal_price = 0;
                            $suboriginal_priceextra = 0;
                            $res1=0;
                            ?>
                            @if(!empty($CurrentUsercart))
                            @foreach($CurrentUsercart as $CurrentUsercart)
                            <tr>
                                <td>
                                    <div class="table_sitemap">
                                        <img src="../images/front_img.png">
                                        <div>
                                            <input type="hidden" name="originalProductId[]" min="1" value="{{$CurrentUsercart->OriginalProductCurrentUser->fk_product_id}}">
                                            <input name="originalProductQuantity[]" class="quantity__input originalProductQuantity{{$CurrentUsercart->OriginalProductCurrentUser->fk_product_id}}" originalProductQuantity-id="{{$CurrentUsercart->OriginalProductCurrentUser->fk_product_id}}" type="hidden" min="1" value="{{$CurrentUsercart->OriginalProductCurrentUser->quantity}}">
                                            <input class="originalProductTotal{{$CurrentUsercart->OriginalProductCurrentUser->fk_product_id}}" originalProductTotal-id="{{$CurrentUsercart->OriginalProductCurrentUser->fk_product_id}}" type="hidden" name="originalProductTotal[]" min="1" value="{{$CurrentUsercart->OriginalProductCurrentUser->original_price>$CurrentUsercart->OriginalProductCurrentUser->sale_price && $CurrentUsercart->OriginalProductCurrentUser->sale_price !=0?$CurrentUsercart->OriginalProductCurrentUser->sale_price:$CurrentUsercart->OriginalProductCurrentUser->original_price}}">

                                            <input type="hidden" name="originalProductCredit[]" value="{{$CurrentUsercart->OriginalProductCurrentUser->credit_value}}">
                                            <p class="mb-0">{{$CurrentUsercart->OriginalProductCurrentUser->product_name}}</p>
                                            @php
                                            $quan =0;
                                            $original_price = 0;
                                            @endphp
                                            @if(count($CurrentUsercart->serviceSubService)>1)
                                            @foreach($CurrentUsercart->serviceSubService as $serviceSubServiceData)
                                            <input class="quantity__input subProductQuantity{{$serviceSubServiceData->did}}" subProductQuantity-id="{{ $serviceSubServiceData->did}}" type="hidden" name="subProductQuantity[]" min="1" value="{{ $serviceSubServiceData->quantity}}">
                                            <input type="hidden" name="extaValueProductIdWithOriginalCredit[]" value="{{$serviceSubServiceData->credit_value}}">
                                            <input type="hidden" name="extaValueProductIdWithOriginal[]" value="{{$CurrentUsercart->OriginalProductCurrentUser->fk_product_id}}">
                                            <input class="subProductUnitPrice{{$serviceSubServiceData->did}}" subProductUnitPrice-id="{{$serviceSubServiceData->did}}" type="hidden" name="subProductUnitPrice[]" min="1" value="{{$serviceSubServiceData->original_price >$serviceSubServiceData->sale_price && $serviceSubServiceData->sale_price !=0? $serviceSubServiceData->sale_price:$serviceSubServiceData->original_price}}">
                                            <input type="hidden" name="extaValueProductId[]" value="{{$serviceSubServiceData->id}}">
                                            <h4>{{$serviceSubServiceData->product_name}}</h4>
                                            <?php
                                               if($serviceSubServiceData->original_price > $serviceSubServiceData->sale_price && $serviceSubServiceData->sale_price !=0){
                                                $original_price = $original_price+$serviceSubServiceData->sale_price*$serviceSubServiceData->quantity;
                                                $quan += $serviceSubServiceData->quantity;
                                               }
                                            ?>
                                            @endforeach
                                
                                            @endif
                                        </div>
                                    </div>
                                </td>
                                <td style="text-align: center; vertical-align: middle;">{{ $quan+$CurrentUsercart->OriginalProductCurrentUser->quantity}}</td>
                            </tr>
                            <?php


                           if (
                                $CurrentUsercart->OriginalProductCurrentUser->original_price >
                                $CurrentUsercart->OriginalProductCurrentUser->sale_price && $CurrentUsercart->OriginalProductCurrentUser->sale_price != 0
                            ) {
                                $res1 =  $CurrentUsercart->OriginalProductCurrentUser->sale_price;
                            } else {
                                $res1 =  $CurrentUsercart->OriginalProductCurrentUser->original_price;
                            }
                            
                            $suboriginal_price += $original_price + $res1 * $CurrentUsercart->OriginalProductCurrentUser->quantity;
                            $res = $original_price + $res1;
                            ?>
                            <tr>
                                <td></td>
                                <td style="text-align:right;">{{$getCurrency->symbol}}{{$res1*$CurrentUsercart->OriginalProductCurrentUser->quantity+$original_price}}</td>
                            </tr>
                            @endforeach
                            @endif
                            <input type="hidden" name="totalAmount" value="{{$suboriginal_price}}" />
                            <tfoot>
                                <tr>
                                    <td style="text-align: right; padding-right: 30px;">Total</td>
                                    <td style="text-align:right;"> {{$getCurrency->symbol}}{{$suboriginal_price}}</td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </form>
    <script src="https://code.jquery.com/jquery-1.12.3.min.js" integrity="sha256-aaODHAgvwQW1bFOGXMeX+pC4PZIPsvn2h1sArYOhgXQ=" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
    <script>
        $(function() {
            $('form.require-validation').bind('submit', function(e) {
                $(".loader").addClass("fa fa-refresh fa-spin");
                var $form = $(e.target).closest('form'),
                    inputSelector = ['input[type=email]', 'input[type=password]',
                        'input[type=text]', 'input[type=file]',
                        'textarea'
                    ].join(', '),
                    $inputs = $form.find('.required').find(inputSelector),
                    $errorMessage = $form.find('div.error'),
                    valid = true;

                $errorMessage.addClass('hide');
                $('.has-error').removeClass('has-error');
                $inputs.each(function(i, el) {
                    var $input = $(el);
                    if ($input.val() === '') {
                        $input.parent().addClass('has-error');
                        $errorMessage.removeClass('hide');
                        e.preventDefault(); // cancel on first error
                    }
                });
            });
        });

        $(function() {
            var $form = $("#payment-form");
           // $(".loader").addClass("fa fa-refresh fa-spin");
            $form.on('submit', function(e) {
                $(".loader").addClass("fa fa-refresh fa-spin");
                if (!$form.data('cc-on-file')) {
                    //$(".loader").removeClass("fa fa-refresh fa-spin");
                    e.preventDefault();
                    Stripe.setPublishableKey($form.data('stripe-publishable-key'));
                    Stripe.createToken({
                        number: $('.card-number').val(),
                        cvc: $('.card-cvc').val(),
                        exp_month: $('.card-expiry-month').val(),
                        exp_year: $('.card-expiry-year').val()
                    }, stripeResponseHandler);
                }
            });

            function stripeResponseHandler(status, response) {
                if (response.error) {
                    $(".loader").removeClass("fa fa-refresh fa-spin");
                    $("html, body").animate({
                        scrollTop: 0
                    }, "slow");
                    $('.error')
                        .removeClass('hide')
                        .find('.alert')
                        .text(response.error.message);
                } else {
                    // token contains id, last4, and card type
                    var token = response['id'];
                    // insert the token into the form so it gets submitted to the server
                    $form.find('input[type=text]').empty();
                    $form.append("<input type='hidden' name='stripeToken' value='" + token + "'/>");
                    console.log(token);
                    $form.get(0).submit();
                }
            }
        })

        var form = document.getElementById('payment-form');
        var proceed = document.getElementById('proceed');
        var backtocart = document.getElementById('backtocart');

        // add a click event listener to the button

        backtocart.addEventListener('click', function() {
            form.setAttribute('action', '{{route("cart")}}');
            form.setAttribute("method", "GET");
            form.submit();
        });
    </script>
</section>
{{View::make('account.footer')}}