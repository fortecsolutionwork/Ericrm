{{View::make('account.header')}}
{{View::make('account.sidebar')}}
<section class="main_container">
    <div class="container website_design_list">
        <div class="row">
            <div class="col-lg-12">
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
                <div class="my-info-head">
                    <h1 style="font-weight:700">Products and services</h1>
                    <span style="font-weight:500"> <i class="fa-solid fa-bars"></i> Filter</span>
                </div>
                <ul class="Price_page product_and_service">
                    @if(!empty($category ))
                    @foreach($category as $category)
                    @php

                    @endphp
                    <li>
                        <div class="row align-items-center sitemap_assets products_content">
                            <div class="col-lg-9">
                                <div class="sitemap">
                                    <img src="../images/front_img.png">
                                    <div>
                                        <h4><a href="{{route('manageproducts',$category->id)}}">{{$category->category_name}}</a></h4>
                                        <!-- <p class="mb-0">Status: Webzolution team is awaiting content from you. </p> -->
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="dropdown text-right">
                                    <button><a href="{{route('manageproducts',$category->id)}}">Manage</a></button>
                                </div>
                            </div>
                        </div>
                    </li>
                    @endforeach
                    @endif
                    <?php /*<li>
                        <div class="row align-items-center sitemap_assets products_content">
                            <div class="col-lg-9">
                                <div class="sitemap">
                                        <img src="../images/front_img.png">
                                        <div > 
                                        <h4><a href="{{route('website')}}">Presentation template</a></h4> 
                                        <p class="mb-0">Status: Webzolution team is awaiting content from you. </p>
                                     </div>
                                </div>
                             </div>
                            <div class="col-lg-3">
                                <div class="dropdown text-right">
                                    <button><a href="{{route('website')}}">Manage</a></button>
                                  </div>
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="row align-items-center sitemap_assets products_content">
                            <div class="col-lg-9">
                                <div class="sitemap">
                                        <img src="../images/front_img.png">
                                        <div > 
                                        <h4><a href="/account/virtual-business-card.html">Virtual business card</a></h4> 
                                        <p class="mb-0">Status: Webzolution team is awaiting content from you. </p>
                                     </div>
                                </div>
                             </div>
                            <div class="col-lg-3">
                                <div class="dropdown text-right">
                                    <button><a href="/account/virtual-business-card.html">Manage</a></button>
                                  </div>
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="row align-items-center sitemap_assets products_content">
                            <div class="col-lg-9">
                                <div class="sitemap">
                                        <img src="../images/front_img.png">
                                        <div > 
                                        <h4>Chatbot integration</h4> 
                                        <p class="mb-0">Status: Not yet purchased</p>
                                     </div>
                                </div>
                             </div>
                            <div class="col-lg-3">
                                <div class="dropdown text-right">
                                    <button><a href="#">Find out more</a></button>
                                  </div>
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="row align-items-center sitemap_assets products_content">
                            <div class="col-lg-9">
                                <div class="sitemap">
                                        <img src="../images/front_img.png">
                                        <div > 
                                        <h4>Online advertising</h4> 
                                        <p class="mb-0">Status: Not yet purchased</p>
                                     </div>
                                </div>
                             </div>
                            <div class="col-lg-3">
                                <div class="dropdown text-right">
                                    <button><a href="#">Find out more</a></button>
                                  </div>
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="row align-items-center sitemap_assets products_content">
                            <div class="col-lg-9">
                                <div class="sitemap">
                                        <img src="../images/front_img.png">
                                        <div > 
                                        <h4>SEO</h4> 
                                        <p class="mb-0">Status: Not yet purchased</p>
                                     </div>
                                </div>
                             </div>
                            <div class="col-lg-3">
                                <div class="dropdown text-right">
                                    <button><a href="#">Find out more</a></button>
                                  </div>
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="row align-items-center sitemap_assets products_content">
                            <div class="col-lg-9">
                                <div class="sitemap">
                                        <img src="../images/front_img.png">
                                        <div > 
                                        <h4><a href="/account/brand-development.html">Brand development</a></h4> 
                                        <p class="mb-0">Status: Not yet purchased</p>
                                     </div>
                                </div>
                             </div>
                            <div class="col-lg-3">
                                <div class="dropdown text-right">
                                    <button><a href="/account/brand-development.html">Find out more</a></button>
                                  </div>
                            </div>
                        </div>
                    </li> */ ?>

                </ul>
            </div>
        </div>
    </div>
</section>
{{View::make('account.footer')}}