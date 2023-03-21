@extends('layouts.app')
@section('content')
<style>
    body{
        background: #fff!important;
        color:#0065F2;
    }
    header , footer {
  background-color: #120d21!important;
    }
   
    .slick-slide img {
      width:100%;
    }
      
   .customer_gallary button.slick-next.slick-arrow {
    position: absolute;
    bottom: -100px;
    right: 45%;
    visibility: hidden;
    height: 50px;
}

 .customer_gallary button.slick-next.slick-arrow:before {
    content: '';
    position: absolute;
    height: 100%;
    width: 100%;
    background: url(images/right-arrow.png);
    background-repeat: no-repeat;
    visibility: visible;
}

 .customer_gallary button.slick-prev.slick-arrow {
    position: absolute;
    bottom: -100px;
    z-index: 1;
    left: 45%;
    visibility: hidden;
    height: 50px;
}

.customer_gallary button.slick-prev.slick-arrow:before {
    content: '';
    position: absolute;
    height: 100%;
    width: 100%;
    background: url(images/left-arrow.png);
    background-repeat: no-repeat;
    visibility: visible;
}
.customer_gallary .slick-slide h4 {
    margin-top: 15px;
    color:#0065F2;
    font-size: 24px;
    font-weight: 700;
}
</style>
<section class="portfolio">
  <div class="container">
      <div class="row Flexible">
          <div class="col-lg-12 ">
              <h2>Get your unique website that sets you apart from your compeitors</h2>
              <p>Your business needs you, don't waste time DIY website.<br>
                Let us do it for you and make you stand out online.</p>
              <button>Start for free <i class="fa-solid fa-angle-right"></i> </button>
          </div>
           </div>
           <div class="row">
              <div class="col-lg-12">
                  <div class="portfolio-content">
                    <img src="https://via.placeholder.com/1110x410">
                      <!-- <img src="images/Riggs-Video-Placeholder.jpg" height="520px"> -->
                  </div>
                  
              </div>
           </div>
           <div class="row premium_website">
            <div class="col-lg-5">
              <img src="https://via.placeholder.com/615x385">
           </div>
              <div class="col-lg-7 premium-look">
               <h3 style="text-align:left">"You get a premium look on your website without struggling to create it."</h3>
             </div>
            
           </div>
  </div>
</section>


<section class="web-design">
  <div class="award">
      <h2>Customers gallery</h2>
      <p> See our collection of work that are generating real business results for our clients. All can be done without breaking the bank.</p>
      <button>View more work</button>
  </div>
  <div>
      <div class="container-fluid">
          <div class="row customer_gallary">
              <div class="col-lg-4">
                  <img src="https://via.placeholder.com/520x330">
                  <h4>This is the project name</h4>
              </div>
              <div class="col-lg-4">
                  <img src="https://via.placeholder.com/520x330">
                  <h4>This is the project name</h4>
              </div>
              <div class="col-lg-4">
                  <img src="https://via.placeholder.com/520x330">
                  <h4>This is the project name</h4>
              </div>
              <div class="col-lg-4">
                <img src="https://via.placeholder.com/520x330">
                <h4>This is the project name</h4>
            </div>
            <div class="col-lg-4">
              <img src="https://via.placeholder.com/520x330">
              <h4>This is the project name</h4>
          </div>
          </div>
      </div>
  </div>
</section>

          

     <section class="creat-website">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-5">
                    
                    <h2>Why you should develop your website with Webzoltion</h2>
                     <button class="button">Ready to start</button>
                </div>
                <div class="col-lg-7">
                    <!-- <i class="fa-solid fa-ellipsis"></i> -->
                    <ol>
                      <li>We handle the design and tech, so you can focus your time in growing your business.</li>
                      <li>Professional and unique looking website developed for you without breaking the bank.</li>
                      <li>Save you months of time from learning how to build a good website that will win you businesses.</li>
                   </ol>
                </div>
            </div>
        </div>
     </section>

    <section class="website_feacture">
      <div class="container">
          <h2>Features of our website service</h2>
        <div class="row">
          <div class="col-lg-3 col-6"><img src="images/pol.png" > <h6>Responsive design</h6> </div>
          <div class="col-lg-3 col-6"><img src="images/cir.png" > <h6>Stunning stock images</h6> </div>
          <div class="col-lg-3 col-6"><img src="images/sqr.png" > <h6>Ai powered visual design</h6> </div>
          <div class="col-lg-3 col-6"><img src="images/hlcir.png" > <h6>Crafted animations</h6> </div>
          <div class="col-lg-3 col-6"><img src="images/pol.png" > <h6>High speed performance</h6> </div>
          <div class="col-lg-3 col-6"><img src="images/cir.png" > <h6>360° high-security systems</h6> </div>
          <div class="col-lg-3 col-6"><img src="images/sqr.png" > <h6>Google Analytics Integration</h6> </div>
          <div class="col-lg-3 col-6"><img src="images/hlcir.png" > <h6>User-friendly backend</h6> </div>
        </div>
      </div>
    </section>


    <section class="about_responsive">
      <div class="container">
        <div class="row">
          <div class="col-lg-6 text-center">
            <img src="images/mobile0.png">
          </div>
          <div class="col-lg-6 reponsive_content right_side">
            <div>
                <h2>Responsive design</h2>
                <p>Research shows that in 2021 close to 70% of total web traffic in Asia is through mobile phones. If your website does not provide a good user experience on mobile, you are really missing out on the chance to win more customers. That's why we have been offering responsive design to all our client's websites by default for the past 4 years.</p>
              </div>
              <ul>
                <li>Article name related to this feature</li>
                <li>Article name related to this feature</li>
                <li>Article name related to this feature</li>
              </ul>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-6 reponsive_content left_side">
            <div>
                <h2>Responsive design</h2>
                <p>Research shows that in 2021 close to 70% of total web traffic in Asia is through mobile phones. If your website does not provide a good user experience on mobile, you are really missing out on the chance to win more customers. That's why we have been offering responsive design to all our client's websites by default for the past 4 years.</p>
              </div>
              <ul>
                <li>Article name related to this feature</li>
                <li>Article name related to this feature</li>
                <li>Article name related to this feature</li>
              </ul>
          </div>
          <div class="col-lg-6 text-center">
            <img src="images/mobile0.png">
          </div>
         
        </div>
        <div class="row">
          <div class="col-lg-6 text-center">
            <img src="images/mobile0.png">
          </div>
          <div class="col-lg-6 reponsive_content right_side">
            <div>
                <h2>Responsive design</h2>
                <p>Research shows that in 2021 close to 70% of total web traffic in Asia is through mobile phones. If your website does not provide a good user experience on mobile, you are really missing out on the chance to win more customers. That's why we have been offering responsive design to all our client's websites by default for the past 4 years.</p>
              </div>
              <ul>
                <li>Article name related to this feature</li>
                <li>Article name related to this feature</li>
                <li>Article name related to this feature</li>
              </ul>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-6 reponsive_content left_side">
            <div>
                <h2>Responsive design</h2>
                <p>Research shows that in 2021 close to 70% of total web traffic in Asia is through mobile phones. If your website does not provide a good user experience on mobile, you are really missing out on the chance to win more customers. That's why we have been offering responsive design to all our client's websites by default for the past 4 years.</p>
              </div>
              <ul>
                <li>Article name related to this feature</li>
                <li>Article name related to this feature</li>
                <li>Article name related to this feature</li>
              </ul>
          </div>
          <div class="col-lg-6 text-center">
            <img src="images/mobile0.png">
          </div>
         </div>
        <div class="row">
          <div class="col-lg-6 text-center">
            <img src="images/mobile0.png">
          </div>
          <div class="col-lg-6 reponsive_content right_side">
            <div>
                <h2>Responsive design</h2>
                <p>Research shows that in 2021 close to 70% of total web traffic in Asia is through mobile phones. If your website does not provide a good user experience on mobile, you are really missing out on the chance to win more customers. That's why we have been offering responsive design to all our client's websites by default for the past 4 years.</p>
              </div>
              <ul>
                <li>Article name related to this feature</li>
                <li>Article name related to this feature</li>
                <li>Article name related to this feature</li>
              </ul>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-6 reponsive_content left_side">
            <div>
                <h2>Responsive design</h2>
                <p>Research shows that in 2021 close to 70% of total web traffic in Asia is through mobile phones. If your website does not provide a good user experience on mobile, you are really missing out on the chance to win more customers. That's why we have been offering responsive design to all our client's websites by default for the past 4 years.</p>
              </div>
              <ul>
                <li>Article name related to this feature</li>
                <li>Article name related to this feature</li>
                <li>Article name related to this feature</li>
              </ul>
          </div>
          <div class="col-lg-6 text-center">
            <img src="images/mobile0.png">
          </div>
         </div>
      </div>
    </section>

<?php
$cpath = explode('@', request()->route()->getAction()['controller'])[0]
?>
<?php if ($cpath == "App\Http\Controllers\PageController") { ?>
    {{View::make('master.footer')}}
    <style>
        section.footer1 {
            display: none !important;
        }
    </style>
<?php } ?>
@endsection