{{View::make('admin.header')}}
{{View::make('admin.sidebar')}}
<section class="main_container">
    <div class="container website_design_list open_new_ticket">
        <div class="row">
            <div class="col-lg-12">
                <div class="ticket_suport">
                    <h1 style="font-weight:700"></h1>

                    <div class="ticket_nmbr">
                        <h5>Ticket # | Status: </h5>

                    </div>  
                    <div id="accordion">

                        <div class="card">
                            <div class="card-header">
                                <button class="full_width_btn"> <a class="card-link" data-toggle="collapse" href="#collapseOne" aria-expanded="true"> Reply <i class="fa-solid fa-plus"></i> <i class="fa-solid fa-minus"></i> </a> </button>
                            </div>
                            <div id="collapseOne" class="collapse show" data-parent="#accordion" style="">
                                <div class="card-body">
                                    <div class="table_div_form reply_acco">
                                        <form action="#" id="demo-form" data-parsley-validate="" enctype="multipart/form-data" method="POST" novalidate="">
                                            <input type="hidden" name="_token" value="m47iNh1IiRUsi21G4iedD3FsgcwTcXSQcfhfNwJA">                                            <div class="inner_fields">
                                                <div>
                                                    <label for="fname">Name </label><br>
                                                    <input type="text" id="fname" name="fname" placeholder="Webzolution" class="form-control" readonly="">
                                                </div>
                                                <input type="hidden" id="fk_user_id" name="fk_user_id" placeholder="Eric Fung" class="form-control" value="67">
                                                <input type="hidden" id="fk_user_id" name="ticketId" placeholder="Eric Fung" class="form-control" value="41">
                                                <div>
                                                    <label for="lname">Email </label><br>
                                                    <input type="text" id="lname" name="lname" placeholder="eric.fung@edgeupstudio.com" class="form-control" readonly="">
                                                </div>
                                            </div>
                                            <button class="record_btn"> <a href="#"> Record a screencast with Loom </a> </button>
                                            <div>
                                                <label for="lname">Message </label><br>
                                                <textarea name="message" class="form-control" rows="10" placeholder="Message" required="">                                              </textarea>
                                            </div>
                                            <div>
                                                <label for="Attachment">Attachment </label><br>
                                                <div class="upload_file">
                                                    <input multiple="" type="file" id="myFile" name="file[]" class="form-control">
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
{{View::make('admin.footer')}}