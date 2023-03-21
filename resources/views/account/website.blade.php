{{View::make('account.header')}}
{{View::make('account.sidebar')}}
<style>
  body {
    background: #fff !important;
  }

  button.add_to_cart {
    color: white !important;
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
    top: 20px;
    height: calc(100% - 20px);
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

  .sitemap_assets .dropdown select {
    height: 40px;
    width: 80px;
    padding: 8px;
  }

  .header-left {
    background: transparent;
    z-index: 12;
    height: auto;
  }

  .header-left .alert {
    border: none;
    border-radius: 0;
  }

  .header-left .head-bar {
    background: #f0f0f0;
    border: none;
  }

  .header-left .head-bar i:hover {
    border: none;
    background: #0065f2;
    color: #fff;
  }

  .header-left .head-bar>div i {
    padding: 15px 19px;
    margin: 0;
  }

  .header-left .head-bar {
    justify-content: space-between;
  }

  .support-ticket .side-main-menu {
    top: 0;
    height: 100%;
    padding: 100px 0 20px !IMPORTANT;
  }

  .header-left .head-bar .left i {
    font-size: 21px;
    padding: 12px 19px 13px;
  }

  .header-left .head-bar a:hover {
    text-decoration: none;
  }

  .side-menu-open img {
    flex: 0 0 55px;
    max-width: 55px;
  }

  .header-left .head-bar .left {
    align-items: center;
    display: flex;
  }

  span.originalP {
    text-decoration: line-through;
    padding: 0 10px;
  }

  /* input#design_check {
    pointer-events: none;
  } */
</style>
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
    <form action="{{route('storetocart')}}" id="demo-form" enctype="multipart/form-data" method="POST">
      @csrf
      <div class="row">
        <div class="col-lg-12">
          <div class="my-info-head">
            <div class="top_content">
              <h1 style="font-weight:700">{{$product->product_name}}</h1>
              <p>{{$product->description}}</p>
              <ul>
                <li><a href="#">How website can help your business <i class="fa-solid fa-chevron-right"></i> </a></li>
                <li><a href="#">Why you should use our webdesign service <i class="fa-solid fa-chevron-right"></i></a> </li>
              </ul>
            </div>
          </div>
          @php
          $original_price = $product->original_price;
          $sale_price = $product->sale_price;
          if($original_price> $sale_price && $sale_price !=0){
          $price = $sale_price;
          }else{
          $price = $original_price;
          }
          @endphp
          <div class="build_price">
            <div class="design_check">
              <?php if ($original_price > $sale_price && $sale_price != 0) { ?>
                <h3>{{$product->product_name}}: <span class="originalP">{{$getCurrency->symbol}}{{$original_price}}</span>{{$getCurrency->symbol}}{{$sale_price}}</h3>
              <?php   } else { ?>
                <h3>{{$product->product_name}}: {{$getCurrency->symbol}}{{$original_price}}</h3>
              <?php   } ?>
              <input type="checkbox" value="1" id="design_check" name="design_check">
            </div>
            <input type="hidden" name="original_product_id" value="{{$product->id}}" />
            <input type="hidden" name="original_product_price" value="{{$product->original_price}}" />
            <input type="hidden" name="sale_price" value="{{$sale_price}}" />
            <input type="hidden" name="original_product_creadit_value" value="{{$product->credit_value}}" />
            @if(count($prooduct_accordion)>1)
            <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
              @foreach($prooduct_accordion as $prooduct_accordion) 
              <div class="panel panel-default">
                <div class="panel-heading" role="tab" id="headingOne">
                  <h4 class="panel-title">
                    <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                      [ <span> <i class="fa-solid fa-minus"></i> <i class="fa-solid fa-plus"></i></span> ] {{$prooduct_accordion->title}}
                    </a>
                  </h4>
                </div>
                <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                  <div class="panel-body">{{$prooduct_accordion->description}}
                  </div>
                </div>
              </div>
              @endforeach
            </div>
            @endif

          </div>
          <ul class="Price_page">
        
            @if(count($extra_value_products)>0)
            @foreach($extra_value_products as $extra_value_productse)

            <li>
              @if($extra_value_productse->product_type == 1 || $extra_value_productse->product_type == 2 || $extra_value_productse->product_type == 4)
              <div class="row align-items-center sitemap_assets products_content">
                <div class="col-lg-9">
                  <div class="sitemap">
                    @if($extra_value_productse->discount>0)
                    <div>
                      <h4>{{$extra_value_productse->product_name}}:<span class="originalP">{{$getCurrency->symbol}}{{$extra_value_productse->original_price}}</span> {{$getCurrency->symbol}}{{$extra_value_productse->original_price*$extra_value_productse->discount/100}}</h4>
                      <input type="hidden" name="extra_value_products[]" value="{{$extra_value_productse->fk_extra_value_products}}" />
                      <input type="hidden" name="extra_value_products_price[]" value="{{$extra_value_productse->original_price}}"/>
                      <input type="hidden" name="extra_value_products_sale_price[]" value="{{$extra_value_productse->original_price*$extra_value_productse->discount/100}}" />
                      <input type="hidden" name="extra_value_products_creadit_value[]" value="{{$extra_value_productse->credit_value}}" />
                    </div>@else<div>
                      <h4>{{$extra_value_productse->product_name}}:{{$getCurrency->symbol}}{{$extra_value_productse->original_price}}</h4>
                      <input type="hidden" name="extra_value_products[]" value="{{$extra_value_productse->fk_extra_value_products}}" />
                      <input type="hidden" name="extra_value_products_price[]" value="{{$extra_value_productse->original_price}}" />
                     
                      <input type="hidden" name="extra_value_products_creadit_value[]" value="{{$extra_value_productse->credit_value}}" />
                    </div>@endif
                    <p class="mb-0">Low complexity page </p>
                  </div>
                </div>
                <div class="col-lg-3">
                  <div class="dropdown text-right">
                    <input name="quantity[]" type="number" min="1" value="1">
                  </div>
                </div>
              </div>
              @endif
            </li>
            @endforeach
            @endif
            <?php  /*  <li>
                        <div class="row align-items-center sitemap_assets products_content">
                            <div class="col-lg-9">
                                <div class="sitemap">
                                    <div > <h4>Extra page design and build: $200/page</h4> </div>
                                    <p class="mb-0">Medium complexity page</p>
                                </div>
                             </div>
                            <div class="col-lg-3">
                                <div class="dropdown text-right">
                                     <input type="number" value="0">
                                  </div>
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="row align-items-center sitemap_assets products_content">
                            <div class="col-lg-9">
                                <div class="sitemap">
                                    <div > <h4>Extra page(s) design and build: $400/page</h4> </div>
                                    <p class="mb-0">High complexity page</p>
                                </div>
                             </div>
                            <div class="col-lg-3">
                                <div class="dropdown text-right">
                                     <input type="number" value="0">
                                  </div>
                            </div>
                        </div>
                    </li> */ ?>

            @if(count($extra_value_products)>1)
            @foreach($extra_value_products as $extra_value_products)
            @if($extra_value_products->product_type == 3)
            <li>
              <input type="hidden" name="extra_value_products[]" value="{{$extra_value_products->fk_extra_value_products}}" />
              <input type="hidden" name="extra_value_products_price[]" value="{{$extra_value_products->original_price*$extra_value_products->discount/100}}" />
              <div class="row align-items-center sitemap_assets products_content">
                <div class="col-lg-9">
                  <div class="sitemap">
                    <div>
                      <h4>{{$extra_value_products->product_name}}</h4>
                    </div>
                    <p class="mb-0">{{$extra_value_products->description}}</p>
                  </div>
                </div>
                <div class="col-lg-3">
                  <div class="dropdown text-right">
                    <button><a href="#">Discuss with us</a></button>
                  </div>
                </div>
              </div>
            </li>
            @endif
            @endforeach
            @endif
            <!-- <li>
              <div class="row align-items-center sitemap_assets products_content">
                <div class="col-lg-9">
                  <div class="sitemap">
                    <div>
                      <h4>Extra Webzolution Credits</h4>
                    </div>
                    <p class="mb-0">Example of credits usage:<br>
                      1 x credit = enough for updating content of a full page of medium complexity <br>
                      2 x credits = enough for updating content of a full page of high complexity</p>
                  </div>
                </div>
                <div class="col-lg-3">
                  <div class="dropdown text-right">
                    <select name="cars" id="cars">
                      @for($i=0;$i<=$user->credits;$i++)
                        <option value="0">{{$i}}</option>
                        @endfor
                    </select>
                  </div>
                </div>
              </div>
            </li> -->
            <li class="text-right">
              <!-- <button type="submit" class="add_to_cart"><a href="#">Add to Cart</a></button> -->
              <button type="submit" class="add_to_cart">Add to Cart</button>
            </li>
          </ul>
        </div>
      </div>
    </form>
    <section class="limited_offer">
      <div class="container">
        <p>Limited time offer</p>
        <h2>Buy website service now to get presentation and virtual business card for FREE</h2>
        <div>
          <img src="https://via.placeholder.com/90x90">
          <img src="https://via.placeholder.com/90x90">
          <img src="https://via.placeholder.com/90x90">
        </div>
      </div>
    </section>
  </div>
</section>

{{View::make('account.footer')}}