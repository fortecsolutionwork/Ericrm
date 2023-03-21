@extends('layouts.app')
@section('content')
<style>
    body{
        background: #fff!important;
    }
    header , footer {
  background-color: #120d21!important;
    }
    .login-button span a{
margin-right:10px;
color:dodgerblue;
font-size: 16px;
font-weight: 500;
}

.home-header {
border-bottom: 1px solid #f0f0f0!important;
padding: 10px 0px;
}
.home-header .logo-text {
color:dodgerblue;
font-weight: 700;
}
.login-button button:hover {
box-shadow: 0px 0px 6px #00000057;
}

</style>



    <section>
        <div class="container work-section-1">
            <h1>Celebrate Women in Business.<br>
                Discover Website Examples<br>
                Powered by Inspiring Women.</h1>
            <div class="filter">
                <ul>
                    <li> Everything</li>
                    <li>Technology</li>
                    <li>Not for Profit</li>
                    <li>Living</li>
                    <li>Sports & Ent.</li>
                    <li>Education</li>
                    <li>Travel</li>
                </ul>
            </div>
            <div class="row mb-5">
                <div class="col-lg-6 bg" >
                    <p style="background:#000;height:20px;margin:0;color:#fff;">
                        <i class="fa-solid fa-ellipsis"></i>
                    </p>
                    <div style="background-image: url(https://via.placeholder.com/500x325);">
                       </div>
                    <p class="title"> <span>Personal Wellness</span>Jolaubi Osho  </p>
                </div>

                <div class="col-lg-6 bg" >
                    <p style="background:#000;height:20px;margin:0;color:#fff;">
                        <i class="fa-solid fa-ellipsis"></i>
                    </p>
                    <div style="background-image: url(https://via.placeholder.com/500x325);">
                      </div>
                      <p class="title"> <span>Personal Wellness</span>Jolaubi Osho  </p>
                </div>
                 </div>

               <div class="row mb-5">     
                <div class="col-lg-6 bg" >
                    <p style="background:#000;height:20px;margin:0;color:#fff;">
                        <i class="fa-solid fa-ellipsis"></i>
                    </p>
                    <div style="background-image: url(https://via.placeholder.com/500x325);">
                       </div>
                       <p class="title"> <span>Personal Wellness</span>Jolaubi Osho  </p>
                </div>

                <div class="col-lg-6 bg" >
                    <p style="background:#000;height:20px;margin:0;color:#fff;">
                        <i class="fa-solid fa-ellipsis"></i>
                    </p>
                    <div style="background-image: url(https://via.placeholder.com/500x325);">
                       </div>
                       <p class="title"> <span>Personal Wellness</span>Jolaubi Osho  </p>
                </div>
               </div>

               <div class="row mb-5">     
                <div class="col-lg-6 bg" >
                    <p style="background:#000;height:20px;margin:0;color:#fff;">
                        <i class="fa-solid fa-ellipsis"></i>
                    </p>
                    <div style="background-image: url(https://via.placeholder.com/500x325);">
                        </div>
                        <p class="title"> <span>Personal Wellness</span>Jolaubi Osho  </p>
                </div>

                <div class="col-lg-6 bg" >
                    <p style="background:#000;height:20px;margin:0;color:#fff;">
                        <i class="fa-solid fa-ellipsis"></i>
                    </p>
                    <div style="background-image: url(https://via.placeholder.com/500x325);">
                       </div>
                       <p class="title"> <span>Personal Wellness</span>Jolaubi Osho  </p>
                </div>
               </div>

               <div class="row mb-5">     
                <div class="col-lg-6 bg" >
                    <p style="background:#000;height:20px;margin:0;color:#fff;">
                        <i class="fa-solid fa-ellipsis"></i>
                    </p>
                    <div style="background-image: url(https://via.placeholder.com/500x325);">
                      </div>
                      <p class="title"> <span>Personal Wellness</span>Jolaubi Osho  </p>
                </div>

                <div class="col-lg-6 bg" >
                    <p style="background:#000;height:20px;margin:0;color:#fff;">
                        <i class="fa-solid fa-ellipsis"></i>
                    </p>
                    <div style="background-image: url(https://via.placeholder.com/500x325);">
                     </div>
                     <p class="title"> <span>Personal Wellness</span>Jolaubi Osho  </p>
                </div>
               </div>

               <div class="row mb-5">     
                <div class="col-lg-6 bg" >
                    <p style="background:#000;height:20px;margin:0;color:#fff;">
                        <i class="fa-solid fa-ellipsis"></i>
                    </p>
                    <div style="background-image: url(https://via.placeholder.com/500x325);">
                     </div>
                     <p class="title"> <span>Personal Wellness</span>Jolaubi Osho  </p>
                </div>

                <div class="col-lg-6 bg" >
                    <p style="background:#000;height:20px;margin:0;color:#fff;">
                        <i class="fa-solid fa-ellipsis"></i>
                    </p>
                    <div style="background-image: url(https://via.placeholder.com/500x325);">
                      </div>
                      <p class="title"> <span>Personal Wellness</span>Jolaubi Osho  </p>
                </div>
               </div>
                
    
            <div style="text-align:center">
                <button class="button" style="border-color:#fff;margin-top:40px;">Load more</button>
            </div>
        </div>
        
    </section>
    
    <section class="work-section-2">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h2>Start a conversation</h2>
                    <p>0207 494 3554 or newbiz@catchdigital.com</p>
                </div>
            </div>
        </div>
    </section>
{{View::make('master.footer')}}
