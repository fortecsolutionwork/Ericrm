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

    wrapper-1 {
        width: 100%;
        height: 100vh;
        display: flex;
        flex-direction: column;
    }

    .wrapper-2 {
        padding: 30px;
        text-align: center;
    }

    h1 {
        font-family: 'Kaushan Script', cursive;
        font-size: 4em;
        letter-spacing: 3px;
        color: #5892FF;
        margin: 0;
        margin-bottom: 20px;
    }

    .wrapper-2 p {
        margin: 0;
        font-size: 1.3em;
        color: #aaa;
        font-family: 'Source Sans Pro', sans-serif;
        letter-spacing: 1px;
    }

    .go-home {
        color: #fff;
        background: #5892FF;
        border: none;
        padding: 10px 50px;
        margin: 30px 0;
        border-radius: 30px;
        text-transform: capitalize;
        box-shadow: 0 10px 16px 1px rgba(174, 199, 251, 1);
    }

    .footer-like {
        margin-top: auto;
        background: #D7E6FE;
        padding: 6px;
        text-align: center;
    }

    .footer-like p {
        margin: 0;
        padding: 4px;
        color: #5892FF;
        font-family: 'Source Sans Pro', sans-serif;
        letter-spacing: 1px;
    }

    .footer-like p a {
        text-decoration: none;
        color: #5892FF;
        font-weight: 600;
    }

    @media (min-width:360px) {
        h1 {
            font-size: 4.5em;
        }

        .go-home {
            margin-bottom: 20px;
        }
    }

    @media (min-width:600px) {
        .content {
            max-width: 1000px;
            margin: 0 auto;
        }

        .wrapper-1 {
            height: initial;
            max-width: 620px;
            margin: 0 auto;
            /* margin-top: 50px; */
            box-shadow: 4px 8px 40px 8px rgba(88, 146, 255, 0.2);
        }

    }
</style>
<section class="main_container">
    <script src='https://js.stripe.com/v2/' type='text/javascript'></script>
    <div class="container checkout website_design_list">
        <div class="row ">
            <div class="col-lg-7">
                <div class=content>
                    <div class="wrapper-1">
                        <div class="wrapper-2">
                            <h1>Thank you !</h1>
                            <p>Thanks for buy  our products. </p>
                            <p>you should receive a confirmation email soon </p>
                            <button class="go-home">
                               Order Again
                            </button>
                        </div>
                        <!-- <div class="footer-like">
                            <p>Email not received?
                                <a href="#">Click here to send again</a>
                            </p>
                        </div> -->
                    </div>
                </div>
            </div>
            <div class="col-lg-5">

                <div class="table_div">
                    <table class="cart_table table checkout_table">
                        <tr>
                            <td colspan="2">
                                <h4 style="font-weight:700"> Order summary </h4>
                            </td>
                        </tr>
                        <?php $subtotal = 0;
                        $subtotalextra = 0;

                        ?>
                        @if(!empty($CurrentUsercart))
                        @foreach($CurrentUsercart as $CurrentUsercart)
                        <tr>
                            <td>
                                <div class="table_sitemap">
                                    <img src="{{url('/')}}/images/front_img.png">
                                    <div>
                                        <input type="hidden" name="originalProductId[]" min="1" value="{{$CurrentUsercart->OriginalProductCurrentUser->fk_product_id}}">
                                        <input name="originalProductQuantity[]" class="quantity__input originalProductQuantity{{$CurrentUsercart->OriginalProductCurrentUser->fk_product_id}}" originalProductQuantity-id="{{$CurrentUsercart->OriginalProductCurrentUser->fk_product_id}}" type="hidden" min="1" value="{{$CurrentUsercart->OriginalProductCurrentUser->quantity}}">
                                        <input class="originalProductTotal{{$CurrentUsercart->OriginalProductCurrentUser->fk_product_id}}" originalProductTotal-id="{{$CurrentUsercart->OriginalProductCurrentUser->fk_product_id}}" type="hidden" name="originalProductTotal[]" min="1" value="{{$CurrentUsercart->OriginalProductCurrentUser->total_payment}}">

                                        <p class="mb-0">{{$CurrentUsercart->OriginalProductCurrentUser->product_name}}</p>
                                        @php
                                        $total = 0;
                                        $quan =0;

                                        @endphp
                                        @if(!empty($CurrentUsercart->serviceSubService))
                                        @foreach($CurrentUsercart->serviceSubService as $serviceSubServiceData)
                                        <input class="quantity__input subProductQuantity{{$serviceSubServiceData->did}}" subProductQuantity-id="{{ $serviceSubServiceData->did}}" type="hidden" name="subProductQuantity[]" min="1" value="{{ $serviceSubServiceData->quantity}}">

                                        <input type="hidden" name="extaValueProductIdWithOriginal[]" value="{{$CurrentUsercart->OriginalProductCurrentUser->fk_product_id}}">
                                        <input class="subProductUnitPrice{{$serviceSubServiceData->did}}" subProductUnitPrice-id="{{$serviceSubServiceData->did}}" type="hidden" name="subProductUnitPrice[]" min="1" value="{{$serviceSubServiceData->total_payment}}">
                                        <input type="hidden" name="extaValueProductId[]" value="{{$serviceSubServiceData->id}}">
                                        <h4>{{$serviceSubServiceData->product_name}}</h4>
                                        @php $total += $serviceSubServiceData->total_payment*$serviceSubServiceData->quantity; @endphp
                                        @php $quan += $serviceSubServiceData->quantity; @endphp
                                        @endforeach
                                        @endif
                                    </div>
                                </div>
                            </td>
                            <td style="text-align: center; vertical-align: middle;">{{ $quan+$CurrentUsercart->OriginalProductCurrentUser->quantity}}</td>
                        </tr>
                        @php
                        $subtotal += $CurrentUsercart->OriginalProductCurrentUser->total_payment+$total;
                        @endphp
                        <tr>
                            <td></td>
                            <td style="text-align:right;">{{$getCurrency->symbol}}{{$total+$CurrentUsercart->OriginalProductCurrentUser->total_payment}}</td>
                        </tr>
                        @endforeach
                        @endif
                        <input type="hidden" name="totalAmount" value="{{$subtotal}}" />
                        <tfoot>
                            <tr>
                                <td style="text-align: right; padding-right: 30px;"> Total</td>
                                <td style="text-align:right;"> {{$getCurrency->symbol}}{{$subtotal}}</td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>
{{View::make('account.footer')}}