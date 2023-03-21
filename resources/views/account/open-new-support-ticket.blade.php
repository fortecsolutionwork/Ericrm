{{View::make('account.header')}}
{{View::make('account.sidebar')}}
<section class="main_container">
  <div class="container website_design_list open_new_ticket">
    <div class="row">
      <div class="col-lg-12">

        <div class="table_div_form">
          <h1 style="font-weight:700">Open New Support Ticket</h1>
          <form action="{{route('userstoreticket')}}" id="demo-form" data-parsley-validate="" enctype="multipart/form-data" method="POST">
            @csrf
            <div class="inner_fields">
              <div>
                <label for="fname">Name </label><br>
                <input type="text" id="fname" name="fname" placeholder="{{ Auth::user()->name}}" class="form-control" disabled>
              </div>
              <div>
                <label for="lname">Email </label><br>
                <input type="text" id="lname" name="lname" placeholder="{{ Auth::user()->email}}" class="form-control" disabled>
              </div>
            </div>
            <div class="department">
              <label for="lname">Department</label><br>
              <select name="department_id" id="mySelect2" class="form-control" required="">
                <option value="">Select Department</option>
                @foreach($departments as $department)
                <option value="{{$department->id}}">{{$department->department_name}}</option>
                @endforeach
              </select>
            </div>

            <div class="subject">
              <label for="lname">Subject </label><br>
              <input type="text" id="Subject" name="Subject" class="form-control" required="">
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
                <input type="file" id="myFile" name="file[]" class="form-control" multiple>
                <h5><i class="fa-solid fa-plus"></i> Add more</h5>
              </div>
            </div>
            <div class="submit_cancel">
              <input type="submit" value="Submit" class="form-control">
              <a class="form-control buttonanchor" href="{{ url()->previous() }}">Cancel</a>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</section>
{{View::make('account.footer')}}