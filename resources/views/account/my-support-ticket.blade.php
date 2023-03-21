{{View::make('account.header')}}
{{View::make('account.sidebar')}}
<style>
  p.wrap_text {
    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis;
    max-width: 200px;
  }

  @media screen and (max-width: 767px) {
    .cart_table tr td {
      width: 150px !important;
    }
    .header_form select {
      flex-basis: 50%;
    }
  }
</style>
<section class="main_container">
  <div class="container website_design_list open_new_ticket">

    <div class="my-info-head custom_desin px-0">
      <h1>My Support Tickets</h1>
      <span style="font-weight:500"> <button> <a href="http://localhost/ericCrm%20%282%29/account/open-new-support-ticket" style="color: #fff">+ Create ticket </a></button> </span>
    </div>
    <form action="" enctype="multipart/form-data" method="GET" id="formsub">
      <div class="header_form new">
        <select class="form-control" name="status" onchange="this.form.submit()">
          <option value="">All</option>
                              <option value="1">Active</option>
                    <option value="2">closed</option>
                    <option value="3">In Progress</option>
                            </select>
        <select class="form-control" name="Category" onchange="this.form.submit()">
          <option value="" selected="" disabled="">Select Category</option>
                              <option value="1">Technical Support</option>
                    <option value="2">Billing</option>
                    <option value="3">Sales</option>
                            </select>
        <!-- <button class="btn">Update</button> -->
      </div>
    </form>

    <div class="table_div">
      <table class="cart_table table">
        <tbody><tr>
          <td style="font-weight:500;">Last updated </td>
          <td style="font-weight:500; white-space: nowrap;">Ticket No. </td>
          <td style="font-weight:500;white-space: nowrap;">Detail</td>
          <td style="font-weight:500;width:18%;" class="detail_tab">Type</td>
          <td style="font-weight:500;width:18%;" class="mobile_width">Status</td>
        </tr>
                                <tr>
          <td style="text-align: center;white-space: nowrap;vertical-align: middle;">March 21, 2023</td>
          <td style="text-align: center;white-space: nowrap;vertical-align: middle;"><a href="http://localhost/ericCrm%20%282%29/account/support/ticket/17">#17

          </a></td><td>
            <h4 style="font-size:14px;font-weight:500;"><a href="http://localhost/ericCrm%20%282%29/account/support/ticket/17">dsfdsfsdf</a> </h4>
            <p style="font-size:14px;font-weight:400;margin:0;" class="wrap_text">asas</p>
          </td>

          <td style="vertical-align:middle;"> Technical Support </td>
          <td style="vertical-align:middle;"> Active </td>
        </tr>
                        <!-- <tr>
          <td style="text-align: center;vertical-align: middle;">11 Jan 2020 (12:34)</td>
          <td style="text-align: center;white-space: nowrap;vertical-align: middle;"><a href="/account/support/ticket.html">#13</a< /td>

          <td>
            <h4 style="font-size:14px;font-weight:500;"><a href="/account/support/ticket.html">This is the title subject line</a> </h4>
            <p style="font-size:14px;font-weight:400;margin:0;" class="wrap_text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque vitae aliquet leo, at malesuada justo. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Integer lacinia nec nulla at elementum. Nulla nunc purus, ultrices quis venenatis ullamcorper, tristique non lorem. Fusce elementum et massa eu condimentum. Morbi sodales mattis nunc id posuere. Vestibulum feugiat dolor pharetra, tincidunt velit in, aliquet arcu. Nulla tristique sodales elit, vel auctor velit ultricies ultricies. Vestibulum nec eleifend massa, vel volutpat arcu. </p>
          </td>
          <td style="vertical-align:middle;"> Billing </td>
          <td style="vertical-align:middle;"> In progress </td>
        </tr> -->
        <!-- <tr>
          <td style="text-align: center;vertical-align: middle;">01 Jan 2020 (09:50)</td>
          <td style="text-align: center;white-space: nowrap;vertical-align: middle;"><a href="/account/support/ticket.html">#14</a< /td>

          <td>
            <h4 style="font-size:14px;font-weight:500;"><a href="/account/support/ticket.html">This is the title subject line</a> </h4>
            <p style="font-size:14px;font-weight:400;margin:0;" class="wrap_text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque vitae aliquet leo, at malesuada justo. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Integer lacinia nec nulla at elementum. Nulla nunc purus, ultrices quis venenatis ullamcorper, tristique non lorem. Fusce elementum et massa eu condimentum. Morbi sodales mattis nunc id posuere. Vestibulum feugiat dolor pharetra, tincidunt velit in, aliquet arcu. Nulla tristique sodales elit, vel auctor velit ultricies ultricies. Vestibulum nec eleifend massa, vel volutpat arcu. </p>
          </td>
          <td style="vertical-align:middle;"> Sales </td>
          <td style="vertical-align:middle;"> Closed </td>
        </tr> -->
      </tbody></table>
    </div>


  </div>
</section>
<script>
  function submitOnEnter(e) {
    if (e.which == 13) {
      document.getElementById("formsub").submit()
    }
  }
</script>
{{View::make('account.footer')}}