@extends('layouts.app')
@section('content')
<style>
  .progress {
    display: block;
    width: 100%;
    height: 10px;
    border-radius: 10px;
    overflow: hidden;

    background-color: #f5f5f5;
    background-image: linear-gradient(to right, black, black);
    background-repeat: no-repeat;
    background-size: 0 100%;

    transition: background-size .4s ease-in-out;
  }

  .my-slider-progress {
    background: #ccc;
  }

  .my-slider-progress-bar {
    background: greenyellow;
    height: 2px;
    transition: width 400ms ease;
    width: 0;
  }

  .Questions,
  footer {
    background: #120d21;
  }


  @media only screen and (max-width: 767px) {
    .first-section .Presentation {
      font-size: 28px;
      line-height: 2.6rem;
      text-align: center;
    }

    .location button {
      padding: 14px 25px;
      margin-top: 30px;
      margin-right: 0px;
    }

    .location p {
      text-align: center;
    }

    .location {
      align-items: center;
      padding-right: 15px !important;
    }

    .four-section .visual {
      font-size: 26px;
    }

    .four-section .design {
      padding-left: 0px;
      line-height: 1.9rem;
    }

    .design br {
      display: none;
    }

    section.full-image {
      padding: 60px 15px;
    }

    .four-section {
      padding: 60px 0px 60px 0px;
    }

    .fifth-section {
      background-color: #fff;
      padding: 60px 0px 60px 0px;
    }

    .fifth-section h2 {
      font-size: 25px;
      line-height: 2.2rem;
    }

    .sixth-section h2 {
      font-size: 25px;
      line-height: 2.2rem;
    }

    .seventh-section h2 {
      font-size: 25px;
      line-height: 2.2rem;
    }

  }
</style>

<section class="container first-section">
         <div class="row align-items-center">
            <div class="col-md-6">
               <p class="Presentation"> We create stunning
                PowerPoint
               <span>Presentations</span> </p>
            </div>
            <div class="col-md-6 location"  style ="color:#fff">
             <p>
                Slidor is a presentation<br>
                design agency located in Paris.
             </p>
             <button>Start a project<i class="fa-sharp fa-solid fa-arrow-right"></i></button>
            </div>
         </div>
     </section>
     <section>
        <div class="second-section">
            <div class="animated-card">
                <div class="single_card" style="text-align:center">
                  <img src="https://via.placeholder.com/500x250">
                </div>
                <div class=" single_card" style="text-align:center">
                   <img src="https://via.placeholder.com/500x250">
                </div>
                <div class=" single_card" style="text-align:center">
                  <img src="https://via.placeholder.com/500x250">
               </div>
               <div class=" single_card" style="text-align:center">
                <img src="https://via.placeholder.com/500x250">
                </div>
                <div class=" single_card" style="text-align:center">
                  <img src="https://via.placeholder.com/500x250">
                  </div>
                  <div class=" single_card" style="text-align:center">
                    <img src="https://via.placeholder.com/500x250">
                        </div>
                        <div class=" single_card" style="text-align:center">
                          <img src="https://via.placeholder.com/500x250">
                            </div>
                        <div class=" single_card" style="text-align:center">
                          <img src="https://via.placeholder.com/500x250">
                      </div>
                      <div class=" single_card" style="text-align:center">
                        <img src="https://via.placeholder.com/500x250">
                    </div>
                    <div class="single_card" style="text-align:center">
                      <img src="https://via.placeholder.com/500x250">
                  </div>
                  <div class=" single_card" style="text-align:center">
                    <img src="https://via.placeholder.com/500x250">
                        </div>
                        <div class=" single_card" style="text-align:center">
                          <img src="https://via.placeholder.com/500x250">
                      </div> 
                      <div class=" single_card" style="text-align:center">
                        <img src="https://via.placeholder.com/500x250">
                    </div>
                    <div class=" single_card" style="text-align:center">
                      <img src="https://via.placeholder.com/500x250">
                  </div>
                  <div class=" single_card" style="text-align:center">
                    <img src="https://via.placeholder.com/500x250">
                </div>
                <div class=" single_card" style="text-align:center">
                  <img src="https://via.placeholder.com/500x250">
                </div>
                <div class=" single_card" style="text-align:center">
                  <img src="https://via.placeholder.com/500x250">
                </div>
                <div class=" single_card" style="text-align:center">
                  <img src="https://via.placeholder.com/500x250">
                </div>
            </div>
            
          </div>
     </section>

     <section class="third-section">
        <marquee width="60%" direction="left" height="90px" loop="10">
            <img src="https://via.placeholder.com/100x60">
            <img src="https://via.placeholder.com/100x60">
            <img src="https://via.placeholder.com/100x60">
            <img src="https://via.placeholder.com/100x60">
            <img src="https://via.placeholder.com/100x60">
            <img src="https://via.placeholder.com/100x60">
            <img src="https://via.placeholder.com/100x60">
            <img src="https://via.placeholder.com/100x60">
            <img src="https://via.placeholder.com/100x60">
            <img src="https://via.placeholder.com/100x60">
            <img src="https://via.placeholder.com/100x60">
          </marquee>

     </section>

     <section class="four-section">
        <div class="container ">
            <div class="row">
                <div class="col-md-6">
                   <p class="visual">
                    Since 2013,<span> we have been creating tailor-made visual and impactful presentations</span> to better convey your messages and convince your audience
                   </p>
                </div>
                <div class="col-md-6">
                  <p class="design">
                    Every day, we renew the codes of presentation design and PowerPoint for more than 1000 clients to offer unequaled renderings.
                  </p>
                </div>
            </div>
        </div>
     </section>
     
     <section class="full-image">
         <div class="container">
             <div class="row justify-content-center">
              <img src="images/full-width.png">
                 <!-- <img src="https://via.placeholder.com/1200x600"> -->
             </div>
         </div>
     </section>

     <section class="fifth-section">
        <div class="container">
            <h2>Explore all our <span>presentation<br> design</span> services</h2>
            <div class="row">
                <div class="col-lg-3 col-md-6 py-3">
                    <div class="sales">
                  <img src="images/shopping-bag.svg">
                  <h5>Sales<br>
                    presentations</h5>
                    <p>Dynamic and impactful sales material</p>
                </div>
                </div>
                <div class="col-lg-3 col-md-6 py-3">
                    <div class="powerpoint">
                    <img src="images/layer.svg">
                  <h5>PowerPoint<br>
                    templates</h5>
                    <p>Powerful and visual slide banks</p>
                </div>
                </div>
                <div class="col-lg-3 col-md-6 py-3">
                    <div class="pitchdecks">
                    <img src="images/dollar.svg">
                  <h5>Pitchdecks<br>
                    and fundraising
                    </h5>
                    <p>Decks that help entrepreneurs raise funds</p>
                </div>
                </div>
                <div class="col-lg-3 col-md-6 py-3">
                    <div class="financial">
                    <img src="images/bar-chart.svg">
                  <h5>Financial <br>
                    reports</h5>
                    <p>Readable and better understood strategic documents</p>
                </div>
                </div>
                <div class="container">
                <div class="row second-card">
                <div class="col-lg-3 col-md-6 py-3">
                    <div class="Event">
                    <img src="images/loader.svg">
                  <h5>Event <br>
                    presentations</h5>
                    <p>Spectacular PowerPoint presentations that convey emotion</p>
                </div>
                </div>
                <div class="col-lg-3 col-md-6 py-3">
                    <div class="urgent">
                    <img src="images/clock.svg">
                  <h5>Urgent <br>
                    presentations</h5>
                    <p>High quality presentations delivered quickly</p>
                </div>
                </div>
                <div class="col-lg-3 col-md-6 py-3">
                    <div class="interactive">
                    <img src="images/shuffle.svg">
                  <h5>Interactive <br>
                    presentations</h5>
                    <p>Non-linear and dynamic PowerPoint</p>
                </div>
                </div>
                <div class="col-lg-3 col-md-6 py-3">
                    <div class="training">
                    <img src="images/mic.svg">
                  <h5>PowerPoint <br>
                    training</h5>
                    <p>Learn how to create impactful presentations</p>
                </div>
                </div>
            </div>
            </div>
        </div>
    </div>
     </section>

     <section class="sixth-section">
        <div class="container">
            <h2>Discover <span>our latest projects</span> on<br> PowerPoint</h2>
            <div class="row project-card">
                <div class="py-3">
                    <div class="Hyperlooptt">
                     <h2>HyperloopTT</h2>
                     <h5>Corporate presentation</h5>
                     <p>Discover case →</p>
                    </div>
                </div>
                <div class="py-3">
                    <div class="Criteo">
                        <h2>Criteo</h2>
                        <h5>Innovations</h5>
                        <p>Discover case →</p>
                       </div>
                </div>
                <div class="py-3">
                    <div class="LFP">
                        <h2>LFP</h2>
                        <h5>Sponsorship presentations</h5>
                        <p>Discover case →</p>
                       </div>
                </div>
                <div class="py-3">
                    <div class="Slidor">
                        <h2>Slidor</h2>
                        <h5>Showcase 2019</h5>
                        <p>Discover case →</p>
                       </div>
                </div>
                <div class="py-3">
                  <div class="Slidor">
                      <h2>Slidor</h2>
                      <h5>Showcase 2019</h5>
                      <p>Discover case →</p>
                     </div>
              </div>
              <div class="py-3">
                <div class="Slidor">
                    <h2>Slidor</h2>
                    <h5>Showcase 2019</h5>
                    <p>Discover case →</p>
                   </div>
            </div>
            
            </div>
            <div class="progress" role="progressbar" aria-valuemin="0" aria-valuemax="100">
         </div>
         
     </section>

     <section class="seventh-section">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <h2>More than <span>1000 customers</span></h2>
                    <p>We are fortunate to have produced presentation materials for all sectors of activity and company sizes, in all graphic universes.<br>
                        37 companies listed in the CAC40 have placed their trust in us.</p>
                </div>
                <div class="col-md-6 customer-img">
                     <div class="container">
                        <div class="row">
                            <div class="col-md-4 first-list">
                                <img src="https://via.placeholder.com/140x90">
                                <img src="https://via.placeholder.com/140x90">
                                <img src="https://via.placeholder.com/140x90">
                                <img src="https://via.placeholder.com/140x90">
                                <img src="https://via.placeholder.com/140x90" style="margin-bottom:0;">
                              </div>
                            <div class="col-md-4 second-list">
                                <img src="https://via.placeholder.com/140x90">
                                <img src="https://via.placeholder.com/140x90">
                                <img src="https://via.placeholder.com/140x90">
                                <img src="https://via.placeholder.com/140x90">
                                <img src="https://via.placeholder.com/140x90" style="margin-bottom:0;">
                          </div>
                            <div class="col-md-4 third-list">
                                <img src="https://via.placeholder.com/140x90">
                                <img src="https://via.placeholder.com/140x90">
                                <img src="https://via.placeholder.com/140x90">
                                <img src="https://via.placeholder.com/140x90">
                                <img src="https://via.placeholder.com/140x90" style="margin-bottom:0;">
                            </div>
                        </div>
                     </div>
                </div>
            </div>
        </div>
     </section>

     <section class="eight-section">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="container">
                        <div class="row py-5">
                            <div class="col-md-6">
                              <h2><span>100% in-house</span> production <span>in France</span> </h2>
                            </div>
                            <div class="col-md-6">
                                <p>Our structure is unique. We are the only French PowerPoint agency that internalises 100% of its production on more than 20 in-house designers in France.</p>
                               <p>
                                    In order to offer the best rendering while guaranteeing the highest level of confidentiality, we never use freelancers, neither in France nor abroad.</p>
                            </div>
                          </div>
                    </div>
                    
                </div>
                <div class="col-md-12 d-flex justify-content-center">
                    <img src="images/Riggs-Video-Placeholder.jpg">
                </div>
            </div>
        </div>
     </section>

     <section class="ninth-section">

         <div class="container">
            <div class="row">
                <div class="col-md-6">
                  <h2> <span>In all graphic styles,</span> for all<br> needs</h2>
                </div>
                <div class="col-md-6 px-4 graphic-colors">
                    <span class="tag-1">corporate</span> <span class="tag-2">luxury</span><span class="tag-3">luxury</span><span class="tag-4">car</span><span class="tag-5">finance</span><span class="tag-6">industry</span><span class="tag-7">transport</span><span class="tag-8">sport</span><span class="tag-9">events</span><span class="tag-10">bank</span><span class="tag-11">insurance</span><span class="tag-12">tech</span><span class="tag-13">energy</span><span class="tag-14">pharma</span><span class="tag-15">advice</span>
                </div>
            </div>
         </div>
 </section>
  
  <section class="graphic-slides">
    <div class="container-fluid">
           <div class="row graphic-list-1">
            <div class="col-md-4">
                <img src="https://via.placeholder.com/400x200">
            </div>
            <div class="col-md-4">
                <img src="https://via.placeholder.com/400x200">
            </div>
            <div class="col-md-4">
                <img src="https://via.placeholder.com/400x200">
            </div>
            <div class="col-md-4">
              <img src="https://via.placeholder.com/400x200">
          </div>
           </div>
           <div class="row py-5 graphic-list-2">
            <div class="col-md-4">
                <img src="https://via.placeholder.com/400x200">
            </div>
            <div class="col-md-4">
                <img src="https://via.placeholder.com/400x200">
            </div>
            <div class="col-md-4">
                <img src="https://via.placeholder.com/400x200">
            </div>
            <div class="col-md-4">
              <img src="https://via.placeholder.com/400x200">
          </div>
           </div>
    </div>
        
  </section>

  <section class="eight-section">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="container">
                    <div class="row py-5">
                        <div class="col-md-6">
                          <h2> Presentations delivered <br> <span>on time</span> </h2>
                        </div>
                        <div class="col-md-6">
                            <p>Our agency provides you with powerful tools to monitor the progress of production. We adapt to your intermediate deadlines and commit to delivery dates. Our standardized work processes and our experience in production allow us to deliver on time.</p>
                        </div>
                      </div>
                </div>
                
            </div>
            <div class="col-md-12 d-flex justify-content-center">
                <img src="images/Riggs-Video-Placeholder.jpg">
            </div>
        </div>
    </div>
 </section>

 <section class="presentations">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-6">
             <h2>Join the hundreds of companies transforming their presentations</h2>
             <button>Contact us
            </button>
            </div>
            <div class="col-md-6">
                <img src="https://via.placeholder.com/620x380">
            </div>
        </div>
    </div>
 </section>

<section class="Questions">
    <div class="container">
        <h2>Frequently asked questions</h2>
        <div class="row">
            <div class="col-md-4">
                <div class="accordion" id="accordionExample">
                    <div class="card">
                      <div class="card-header" id="headingOne">
                        <h2 class="mb-0">
                          <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                           <span>Collapsible Group Item #</span> <i class="fa-regular fa-plus"></i><i class="fa-solid fa-minus"></i>
                          </button>
                        </h2>
                      </div>
                  
                      <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
                        <div class="card-body">
                          Some placeholder content for the first accordion panel. This panel is shown by default, thanks to the <code>.show</code> class.
                        </div>
                      </div>
                    </div>
                    <div class="card">
                      <div class="card-header" id="headingTwo">
                        <h2 class="mb-0">
                          <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                            <span>Collapsible Group Item #2</span> <i class="fa-regular fa-plus"></i><i class="fa-solid fa-minus"></i>
                          </button>
                        </h2>
                      </div>
                      <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                        <div class="card-body">
                          Some placeholder content for the second accordion panel. This panel is hidden by default.
                        </div>
                      </div>
                    </div>
                    <div class="card">
                      <div class="card-header" id="headingThree">
                        <h2 class="mb-0">
                          <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                           <span> Collapsible Group Item #3</span> <i class="fa-regular fa-plus"></i><i class="fa-solid fa-minus"></i>
                          </button>
                        </h2>
                      </div>
                      <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
                        <div class="card-body">
                          And lastly, the placeholder content for the third and final accordion panel. This panel is hidden by default.
                        </div>
                      </div>
                    </div>
                  </div>
            </div>
            <div class="col-md-4">
                <div class="accordion" id="accordionExample">
                    <div class="card">
                      <div class="card-header" id="headingfour">
                        <h2 class="mb-0">
                          <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse" data-target="#collapsefour" aria-expanded="true" aria-controls="collapsefour">
                           <span>Collapsible Group Item #1 </span>  <i class="fa-regular fa-plus"></i><i class="fa-solid fa-minus"></i>
                          </button>
                        </h2>
                      </div>
                  
                      <div id="collapsefour" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
                        <div class="card-body">
                          Some placeholder content for the first accordion panel. This panel is shown by default, thanks to the <code>.show</code> class.
                        </div>
                      </div>
                    </div>
                    <div class="card">
                      <div class="card-header" id="headingFive">
                        <h2 class="mb-0">
                          <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                            <span>Collapsible Group Item #2 </span><i class="fa-regular fa-plus"></i><i class="fa-solid fa-minus"></i>
                          </button>
                        </h2>
                      </div>
                      <div id="collapseFive" class="collapse" aria-labelledby="headingFive" data-parent="#accordionExample">
                        <div class="card-body">
                          Some placeholder content for the second accordion panel. This panel is hidden by default.
                        </div>
                      </div>
                    </div>
                    <div class="card">
                      <div class="card-header" id="headingSix">
                        <h2 class="mb-0">
                          <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseSix" aria-expanded="false" aria-controls="collapseSix">
                            <span>Collapsible Group Item #3</span> <i class="fa-regular fa-plus"></i><i class="fa-solid fa-minus"></i>
                          </button>
                        </h2>
                      </div>
                      <div id="collapseSix" class="collapse" aria-labelledby="headingSix" data-parent="#accordionExample">
                        <div class="card-body">
                          And lastly, the placeholder content for the third and final accordion panel. This panel is hidden by default.
                        </div>
                      </div>
                    </div>
                  </div>
            </div>
            <div class="col-md-4">
                <div class="accordion" id="accordionExample">
                    <div class="card">
                      <div class="card-header" id="headingSeven">
                        <h2 class="mb-0">
                          <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse" data-target="#collapseSeven" aria-expanded="true" aria-controls="collapseSeven">
                            <span>Collapsible Group Item #1 </span> <i class="fa-regular fa-plus"></i><i class="fa-solid fa-minus"></i>
                          </button>
                        </h2>
                      </div>
                  
                      <div id="collapseSeven" class="collapse show" aria-labelledby="headingSeven" data-parent="#accordionExample">
                        <div class="card-body">
                          Some placeholder content for the first accordion panel. This panel is shown by default, thanks to the <code>.show</code> class.
                        </div>
                      </div>
                    </div>
                    <div class="card">
                      <div class="card-header" id="headingeight">
                        <h2 class="mb-0">
                          <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseeight" aria-expanded="false" aria-controls="collapseeight">
                            <span>Collapsible Group Item #2 </span> <i class="fa-regular fa-plus"></i><i class="fa-solid fa-minus"></i>
                          </button>
                        </h2>
                      </div>
                      <div id="collapseeight" class="collapse" aria-labelledby="headingeight" data-parent="#accordionExample">
                        <div class="card-body">
                          Some placeholder content for the second accordion panel. This panel is hidden by default.
                        </div>
                      </div>
                    </div>
                    <div class="card">
                      <div class="card-header" id="headingnine">
                        <h2 class="mb-0">
                          <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapsenine" aria-expanded="false" aria-controls="collapsenine">
                           <span>Collapsible Group Item #3</span>  <i class="fa-regular fa-plus"></i><i class="fa-solid fa-minus"></i>
                          </button>
                        </h2>
                      </div>
                      <div id="collapsenine" class="collapse" aria-labelledby="headingnine" data-parent="#accordionExample">
                        <div class="card-body">
                          And lastly, the placeholder content for the third and final accordion panel. This panel is hidden by default.
                        </div>
                      </div>
                    </div>
                  </div>
            </div>
        </div>
    </div>
</section>
<script src="https://code.jquery.com/jquery-3.6.1.slim.min.js" integrity="sha256-w8CvhFs7iHNVUtnSP0YKEg00p9Ih13rlL9zGqvLdePA=" crossorigin="anonymous"></script>
<script src="bootstrap/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.js"></script>
<script src="https://unpkg.co/gsap@3/dist/gsap.min.js"></script>
<script src="https://unpkg.com/gsap@3/dist/ScrollTrigger.min.js"></script>




<script>
  gsap.set(".full-image img", {xPercent: 0, yPercent: 0}),
  gsap.to(".full-image img", {scale3d: 1.8, scaleX: 1.8, scaleY: 1.5, x: "0%", rotateZ: 30, rotateX: 15, rotateY:-5,skewX: -5,skewY: -5, scrollTrigger: {
      trigger: ".full-image img",
      start: "top 20%",
      end: "+=2000",
      markers:false,
      pin:false,
      scrub: true
      }})

    $('.animated-card').slick({
		rows: 2,
    autoplay: true,
		dots: false,
		arrows: false,
		infinite: true,
		speed: 300,
    centerMode: true,
    centerPadding: '60px',
    slidesToShow: 2,
		slidesToScroll: 2
});

$('.project-card').slick({
		dots: false,
		arrows: false,
		infinite: true,
		speed: 300,
    slidesToShow: 4,
		slidesToScroll: 1,
    responsive: [
      {
        breakpoint: 991,
        settings: {
          slidesToShow: 3,
        }
      },
      {
        breakpoint: 767,
        settings: {
          slidesToShow: 1,
        }
      }
    ]
});


gsap.set(".customer-img .second-list", {xPercent: 0, yPercent: 0}),
  gsap.to(".customer-img .second-list", {translateY: -400, x: "0%",y: "10%",  scrollTrigger: {
      trigger: ".customer-img .second-list",
      start: "top 70%",
      end: "+=2000",
      markers:false,
      pin:false,
      scrub: true
      }})

      gsap.set(".customer-img .first-list", {xPercent: 0, yPercent: 0}),
      gsap.to(".customer-img .first-list", {translateY: -200, x: "0%",y: "10%",  scrollTrigger: {
      trigger: ".customer-img .first-list",
      start: "top 70%",
      end: "+=2000",
      markers:false,
      pin:false,
      scrub: true
      }})      
   
      gsap.set(".customer-img .third-list", {xPercent: 0, yPercent: 0}),
      gsap.to(".customer-img .third-list", {translateY: -200, x: "0%",y: "10%",  scrollTrigger: {
      trigger: ".customer-img .third-list",
      start: "top 70%",
      end: "+=2000",
      markers:false,
      pin:false,
      scrub: true
      }})  
      
      gsap.set(".graphic-list-1", {xPercent: 0, yPercent: 0}),
      gsap.to(".graphic-list-1", {translateX: -300, x: "0%",y: "10%",  scrollTrigger: {
      trigger: ".graphic-list-1",
      start: "top 70%",
      end: "+=2000",
      markers:false,
      pin:false,
      scrub: true
      }})     
      
      gsap.set(".graphic-list-2", {xPercent: -20, yPercent: 0}),
      gsap.to(".graphic-list-2", {translateX: 300, x: "0%",y: "10%",  scrollTrigger: {
      trigger: ".graphic-list-2",
      start: "top 70%",
      end: "+=2000",
      markers:false,
      pin:false,
      scrub: true
      }})    

// Progress bar with slider

$(document).ready(function() {
  var $slider = $('.slider');
  var $progressBar = $('.progress');
  var $progressBarLabel = $( '.slider__label' );
  
  $slider.on('beforeChange', function(event, slick, currentSlide, nextSlide) {   
    var calc = ( (nextSlide) / (slick.slideCount-1) ) * 100;
    
    $progressBar
      .css('background-size', calc + '% 100%')
      .attr('aria-valuenow', calc );
    
    $progressBarLabel.text( calc + '% completed' );
  });
  
  $slider.slick({
    slidesToShow: 3,
    slidesToScroll: 1,
    speed: 400
  });  
});
  // Progress bar end.
</script>
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