{{View::make('admin.header')}}
{{View::make('admin.sidebar')}}
<section class="body-part main_container">

  <div class="container px-0">
    <div class="box-layout">
      <div class="form-header mb-5">
        <h4>Edit Ticket #42</h4>
        <a href="#" class="btn btn-primary">Back to Tickets</a>
      </div>

      <div class="admin_edit_ticket">
        <div class="container p-0">
          <form action="http://localhost/ericCrm%20%282%29/admin/update-ticket" id="demo-form" data-parsley-validate="" enctype="multipart/form-data" method="POST" novalidate="">
            <input type="hidden" name="_token" value="m47iNh1IiRUsi21G4iedD3FsgcwTcXSQcfhfNwJA">
            <div class="user__details mt-0">
              <div class="input__box">
                <span class="details">Customer Names: </span>
                <input type="text" value="shivam" required="" disabled="">
                <input type="hidden" value="42" name="fk_support_ticket_id" required="">
              </div>
              <div class="input__box">
                <span class="details">Email:</span>
                <input type="text" value="shivam@gmail.com" required="" disabled="">
              </div>
              <div class="input__box">
                <span class="details">Subject: </span>
                <input type="text" value="testing" required="" name="subject">
              </div>
              <div class="input__box">
                <span class="details">Status:</span>
                <!-- <input type="tel" pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}" value="In Progress" required> -->
                <select class="mySelect2 select2-hidden-accessible" name="fk_ticket_status_id" data-select2-id="select2-data-1-3qz5" tabindex="-1" aria-hidden="true">
                  <option value="1" selected="" data-select2-id="select2-data-3-cjdv">Active</option>
                  <option value="2">closed</option>
                  <option value="3">In Progress</option>
                </select><span class="select2 select2-container select2-container--default" dir="ltr" data-select2-id="select2-data-2-5q0f" style="width: 449.5px;"><span class="selection"><span class="select2-selection select2-selection--single" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="0" aria-disabled="false" aria-labelledby="select2-fk_ticket_status_id-ia-container" aria-controls="select2-fk_ticket_status_id-ia-container"><span class="select2-selection__rendered" id="select2-fk_ticket_status_id-ia-container" role="textbox" aria-readonly="true" title="Active">Active</span><span class="select2-selection__arrow" role="presentation"><b role="presentation"></b></span></span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span>
              </div>
              <div class="input__box">
                <span class="details">Attachments: </span>
                <input type="file" id="myfile" name="file">
              </div>
              <div style="width:100%">
                <span class="details" style="display:block;margin-bottom:5px;"> <b style="font-weight:500;">Description:</b> </span>
                <textarea rows="5" style="width:100%;border-radius: 5px;" required="" name="message"> testing</textarea>
              </div>
            </div>
            <div class="btns_update">
              <button type="submit" class="btn btn-primary"> Update </button>
              <a href="http://localhost/ericCrm%20%282%29/admin/all-tickets" class=" btn" style="border:1px solid #dbdbdb"> Cancel </a><a>
              </a>
            </div><a>

            </a>
          </form>
        </div><a>

        </a>
      </div><a>
      </a>
    </div><a>
    </a>
  </div><a>


  </a>
</section>
{{View::make('admin.footer')}}