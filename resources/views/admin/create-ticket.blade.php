{{View::make('admin.header')}}
{{View::make('admin.sidebar')}}
<section class="main_container">
  <div class="container website_design_list open_new_ticket">
    <div class="row">
      <div class="col-lg-12">
        <div class="table_div_form">
          <h1 style="font-weight:700">Open New Support Ticket</h1>
          <form action="http://localhost/ericCrm%20%282%29/admin/store-ticket" id="demo-form" data-parsley-validate="" enctype="multipart/form-data" method="POST" novalidate="">
            <input type="hidden" name="_token" value="m47iNh1IiRUsi21G4iedD3FsgcwTcXSQcfhfNwJA">
            <div class="inner_fields">
              <div>
                <label for="fname">Name </label><br>
                <input type="text" id="fname" name="fname" placeholder="Webzolution" class="form-control" disabled="">
              </div>
              <div>
                <label for="lname">Email </label><br>
                <input type="text" id="lname" name="lname" placeholder="karan.fortec@gmail.com" class="form-control" disabled="">
              </div>
            </div>
            <div class="department">
              <label for="lname">Department</label><br>
              <select name="department_id" id="mySelect2" class="form-control select2-hidden-accessible" required="" data-select2-id="select2-data-mySelect2" tabindex="-1" aria-hidden="true">
                <option value="" data-select2-id="select2-data-2-5e0f">Select Department</option>
                <option value="1">Technical Support</option>
                <option value="2">Billing</option>
                <option value="3">Sales</option>
              </select><span class="select2 select2-container select2-container--default" dir="ltr" data-select2-id="select2-data-1-vlpp" style="width: 364.797px;"><span class="selection"><span class="select2-selection select2-selection--single" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="0" aria-disabled="false" aria-labelledby="select2-mySelect2-container" aria-controls="select2-mySelect2-container"><span class="select2-selection__rendered" id="select2-mySelect2-container" role="textbox" aria-readonly="true" title="Select Department">Select Department</span><span class="select2-selection__arrow" role="presentation"><b role="presentation"></b></span></span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span>
            </div>
            <div class="form-group">
              <label for="">Select Customer</label>
              <select name="user_id" id="" class="form-control mySelect2 select2-hidden-accessible" required="" data-select2-id="select2-data-3-iup2" tabindex="-1" aria-hidden="true">
                <option value="" data-select2-id="select2-data-5-9weh">Select Customer</option>
                <option value="46" data-select2-id="select2-data-7-v9pw">Rajeev</option>
                <option value="47" data-select2-id="select2-data-8-9dfg">karn</option>
                <option value="48" data-select2-id="select2-data-9-qwcp">Hera</option>
                <option value="49" data-select2-id="select2-data-10-v202">Pannaji</option>
                <option value="50" data-select2-id="select2-data-11-n7nv">rajeev</option>
                <option value="51" data-select2-id="select2-data-12-0aqm">fortec</option>
                <option value="52" data-select2-id="select2-data-13-px75">fortec</option>
                <option value="53" data-select2-id="select2-data-14-upam">karn</option>
                <option value="54" data-select2-id="select2-data-15-5ydo">fortecx</option>
                <option value="55" data-select2-id="select2-data-16-mfkd">Nitin</option>
                <option value="56" data-select2-id="select2-data-17-oi64">Test</option>
                <option value="57" data-select2-id="select2-data-18-j94c">te</option>
                <option value="58" data-select2-id="select2-data-19-ioid">te</option>
                <option value="59" data-select2-id="select2-data-20-hqn3">sadsad</option>
                <option value="60" data-select2-id="select2-data-21-br2l">karn</option>
                <option value="61" data-select2-id="select2-data-22-11ty">Number Three</option>
                <option value="62" data-select2-id="select2-data-23-dbe6">Eric</option>
                <option value="63" data-select2-id="select2-data-24-mgyb">Facilities And Services</option>
                <option value="64" data-select2-id="select2-data-25-8dha">England</option>
                <option value="65" data-select2-id="select2-data-26-mbt6">asd</option>
                <option value="66" data-select2-id="select2-data-27-wez4">American</option>
                <option value="68" data-select2-id="select2-data-28-1sgj">Honker</option>
                <option value="69" data-select2-id="select2-data-29-g877">7707995210</option>
                <option value="70" data-select2-id="select2-data-30-6r13">te</option>
                <option value="71" data-select2-id="select2-data-31-0ytj">te</option>
                <option value="72" data-select2-id="select2-data-32-og98">fsdf</option>
                <option value="73" data-select2-id="select2-data-33-hkas">77007995210</option>
                <option value="74" data-select2-id="select2-data-34-60ld">te</option>
                <option value="75" data-select2-id="select2-data-35-khxv">te</option>
                <option value="76" data-select2-id="select2-data-36-z248">fortec</option>
                <option value="77" data-select2-id="select2-data-37-e11p">Nipon</option>
                <option value="79" data-select2-id="select2-data-38-q7bf">Japanese</option>
                <option value="80" data-select2-id="select2-data-39-wt9e">Japanese</option>
                <option value="81" data-select2-id="select2-data-40-nav3">Man</option>
                <option value="82" data-select2-id="select2-data-41-utdv">tanuj</option>
                <option value="83" data-select2-id="select2-data-42-bm4h">shivam</option>
              </select><span class="select2 select2-container select2-container--default select2-container--below" dir="ltr" data-select2-id="select2-data-4-x55s" style="width: 760px;"><span class="selection"><span class="select2-selection select2-selection--single" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="0" aria-disabled="false" aria-labelledby="select2--container" aria-controls="select2--container"><span class="select2-selection__rendered" id="select2--container" role="textbox" aria-readonly="true" title="Select Customer">Select Customer</span><span class="select2-selection__arrow" role="presentation"><b role="presentation"></b></span></span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span>
            </div>
            <div class="subject">
              <label for="lname">Subject </label><br>
              <input type="text" id="Subject" name="Subject" class="form-control" required="">
            </div>
            <button class="record_btn"> <a href="#"> Record a screencast with Loom </a> </button>
            <div>
              <label for="lname">Message </label><br>
              <textarea name="message" class="form-control" rows="10" placeholder="Message" required="">                                    </textarea>
            </div>
            <div>
              <label for="Attachment">Attachment </label><br>
              <div class="upload_file">
                <input type="file" id="myFile" name="file[]" class="form-control" multiple="">
                <h5><i class="fa-solid fa-plus"></i> Add more</h5>
              </div>
            </div>
            <div class="submit_cancel">
              <input type="submit" value="Submit" class="form-control">
              <a class="form-control buttonanchor" href="http://localhost/ericCrm%20%282%29/admin/create-ticket">Cancel</a>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</section>
{{View::make('admin.footer')}}