{{View::make('account.header')}}
{{View::make('account.sidebar')}}
<style>
    body{
        background: #fff!important;
    }
    header , footer {
  background-color: #120d21!important;
    }
    .header-left {
        width:100%;
        left:0;
        height: 56px;
        background:#f0f0f0;
        justify-content: space-between;
        z-index: 3;
    }
    .support-ticket .side-main-menu {
        top:56px;
    }
 
    .header-left .head-bar > div i {
        border:none;
    }
    .header-left .head-bar i {
      padding:19px;
      color:#ada7a7;
     }
    .header-left .head-bar {
        justify-content: flex-end;
    }
    .container {
        max-width: 920px;
    }
    .support-ticket .side-menu-open {
        width:200px !important;
        z-index: 3;
   }
   .body-part {
    width:calc(100% - 56px);
    margin-left:56px;
   }
   .support-ticket {
    max-width:1440px;
   }
   input[type=number]::-webkit-inner-spin-button {
    opacity: 1
}
.fa-minus , .fa-plus {
    display:none;
}
.website_design_list a[aria-expanded="true"] .fa-minus {
    display: inline-block!important;
}

.website_design_list a[aria-expanded="false"] .fa-plus {
    display: inline-block!important;
}
.website_design_list .panel-heading span i {
    font-size: 10px;
}
/*header*/
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
.header-left .head-bar > div i {
    padding: 15px 19px;
    margin: 0;
}
.header-left .head-bar {
    justify-content: space-between!important;
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
.left {
    align-items: center;
    display: flex;
}
/*header fixed*/

</style>
<section class="main_container">
    <div class="container website_design_list open_new_ticket">
    <div class="row">
            <div class="col-lg-12">
                <div class="ticket_suport">
                    <h1 style="font-weight:700">{{ !empty($support->subject)?$support->subject:""}}</h1>

                    <div class="ticket_nmbr">
                        <h5>Ticket #{{!empty($support->id)?$support->id:""}} | Status: {{!empty($support->statusname)?$support->statusname:""}}</h5>

                    </div>  
                    <div id="accordion">

                        <div class="card">
                            <div class="card-header">
                                <button  class="full_width_btn"> <a class="card-link" data-toggle="collapse" href="#collapseOne" aria-expanded="false"> Reply <i class="fa-solid fa-plus"></i> <i class="fa-solid fa-minus"></i> </a> </button>
                            </div>
                            <div id="collapseOne" class="collapse" data-parent="#accordion">
                                <div class="card-body">
                                    <div class="table_div_form reply_acco">
                                        <form action="{{route('ticketreplayuser')}}" id="demo-form" data-parsley-validate="" enctype="multipart/form-data" method="POST">
                                            @csrf
                                            <div class="inner_fields">
                                                <div>
                                                    <label for="fname">Name </label><br>
                                                    <input type="text" id="fname" name="fname" placeholder="{{ Auth::user()->name}}" class="form-control" required="">
                                                </div>
                                                <input type="hidden" id="fk_user_id" name="fk_user_id" placeholder="Eric Fung" class="form-control" value="{{Route::current()->parameter('userId')}}" />
                                                <input type="hidden" id="fk_user_id" name="ticketId" placeholder="Eric Fung" class="form-control" value="{{Route::current()->parameter('id')}}" />
                                                <div>
                                                    <label for="lname">Email </label><br>
                                                    <input type="text" id="lname" name="lname" placeholder="eric.fung@edgeupstudio.com" class="form-control" required="">
                                                </div>
                                            </div>
                                            <button class="record_btn"> <a href="#"> Record a screencast with Loom </a> </button>
                                            <div>
                                                <label for="lname">Message </label><br>
                                                <textarea name="message" class="form-control" rows="10" placeholder="Message" required="">
                                              </textarea>
                                            </div>
                                            <div>
                                                <label for="Attachment">Attachment </label><br>
                                                <div class="upload_file">
                                                    <input multiple type="file" id="myFile" name="file[]" class="form-control">
                                                    <h5><i class="fa-solid fa-plus"></i> Add more</h5>
                                                </div>
                                            </div>
                                            <div class="submit_cancel">
                                                <input type="submit" value="Submit" class="form-control">
                                                <button class="form-control">Cancel</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @if(!empty($support_tickets_replay))
                    @foreach($support_tickets_replay as $support_tickets_replay)
                    
                    <?php
                    $timestamp =  strtotime($support_tickets_replay->tcreated_at);
                    $date = date("Y-m-d", $timestamp);
                    $month_name = date("F", strtotime($date)); // get month name
                    $day = date("d", strtotime($date)); // get day of the month
                    $year = date("Y", strtotime($date)); // get year
                    $time = date('H:i:s', $timestamp);
                          
                 
                    ?>

                    <div class="ticket_second_box">
                        <div>
                            <div class="team_web">
                                <div>
                                    <img src="https://via.placeholder.com/65x65">
                                    <h5>{{$support_tickets_replay->fk_role_id ==1?"Admin":$support_tickets_replay->name}}</h5>
                                </div>
                                <p>{{$day}} {{$month_name}} {{$year}} ({{$time}})</p>
                            </div>
                        </div>

                        <p class="ticket_para">
                            <a href="#">https://www.loom.com/share/8a17c2034b194261b7764c6702fada2c</a><br>
                            {{$support_tickets_replay->message}}
                        </p>
                        <?php
                        $ticket_images =  DB::table('ticket_images')
                            ->select('*')
                            ->where('fk_support_replay_id', '=', $support_tickets_replay->support_tickets_replay_id)
                            ->get();
                        ?>
                        <div class="attac_ment">
                            <p> Attachment ({{count($ticket_images)}}) </p>
                            <ul>
                                @if(!empty($ticket_images))
                                @foreach($ticket_images as $key=>$ticket_images)
                                <li> <a href="#"> <i class="fa-solid fa-file"></i>{{ $ticket_images->file }}</a> </li>
                                @endforeach
                                @endif
                            </ul>
                        </div>
                    </div>
                    @endforeach
                    @endif
                    <!-- <div class="ticket_second_box">
                        <div>
                            <div class="team_web">
                                <div>
                                    <img src="https://via.placeholder.com/65x65">
                                    <h5>John Doe</h5>
                                </div>
                                <p>12 Dec 2019 (16:25)</p>
                            </div>
                        </div>

                        <p class="ticket_para">
                            <a href="#">https://www.loom.com/share/8a17c2034b194261b7764c6702fada2c</a><br>
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean gravida mattis eros, sed condimentum orci congue eget. Nunc euismod interdum enim ut commodo. Nam vitae tristique tortor. Vestibulum non enim tempor, tempor velit at, mollis ipsum. Pellentesque dignissim enim nulla.
                        </p>

                        <div class="attac_ment">
                            <p> Attachment (2) </p>
                            <ul>
                                <li> <a href="#"> <i class="fa-solid fa-file"></i> abcdefg.jpg </a> </li>
                                <li> <a href="#"> <i class="fa-solid fa-file"></i> abcdefg.jpg </a> </li>
                            </ul>
                        </div>
                    </div> -->
                </div>
            </div>
        </div>
    </div>
 </section>
{{View::make('account.footer')}}