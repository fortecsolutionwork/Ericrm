{{View::make('account.header')}}
{{View::make('account.sidebar')}}
<style>
    body {
        background: #fff !important;
    }

    header,
    footer {
        background-color: #120d21 !important;
    }

    .header-left {
        width: 100%;
        left: 0;
        height: 56px;
        background: #f0f0f0;
        justify-content: space-between;
        z-index: 3;
    }

    .support-ticket .side-main-menu {
        top: 56px;
    }

    .header-left .head-bar>div i {
        border: none;
    }

    .header-left .head-bar i {
        padding: 19px;
        color: #ada7a7;
    }

    .header-left .head-bar {
        justify-content: flex-end;
    }

    .container {
        max-width: 920px;
    }

    .support-ticket .side-menu-open {
        width: 200px !important;
        z-index: 3;
    }

    .body-part {
        width: calc(100% - 56px);
        margin-left: 56px;
    }

    .support-ticket {
        max-width: 1440px;
    }

    input[type=number]::-webkit-inner-spin-button {
        opacity: 1
    }

    .fa-minus,
    .fa-plus {
        display: none;
    }

    .website_design_list a[aria-expanded="true"] .fa-minus {
        display: inline-block !important;
    }

    .website_design_list a[aria-expanded="false"] .fa-plus {
        display: inline-block !important;
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

    .header-left .head-bar>div i {
        padding: 15px 19px;
        margin: 0;
    }

    .header-left .head-bar {
        justify-content: space-between !important;
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

    .inline_check input:checked:before {
        font-size: 12px !important;
        line-height: 2;
    }

    .inline_check input#Document:checked:before {
        content: '\f15b' !important;

    }

    .inline_check input#Image:checked:before {
        content: '\f03e' !important;
    }

    .inline_check input#Video:checked:before {
        content: '\f03d' !important;
    }
</style>
<section class="main_container">
    <div class="container website_design_list open_new_ticket">
        <div class="row">
            <div class="col-lg-12">
          
                <div class="ticket_second_box add_asset">
                    <h1>Add New Assets</h1>
                    <form action="http://localhost/ericCrm%20%282%29/account/assets-update" id="demo-form" data-parsley-validate="" method="POST" enctype="multipart/form-data" novalidate="">
                        <input type="hidden" name="_token" value="9XCjeHdlg3Zzqs842Vt5HZwTcmgKWCwqJxojenhh">                        <input type="hidden" id="fname" name="id" required="" value="18" class="form-control"><br>
                        <label for="fname">How do you want to call this asset?</label><br>
                        <input type="text" id="fname" name="assets_name" required="" value="miojnhuiy" class="form-control"><br>
                        <label for="lname">Paste the link of this asset here</label><br>
                        <input type="url" id="lname" name="assets_link" required="" value="buihh.com" class="form-control"><br>
                        <label for="lname">What kind of file(s) is this?</label><br>
                        <div class="inline_check">
                            <div>
                                                                <input type="radio" id="Document" value="1" name="Document" data-parsley-multiple="Document">
                                <label for="vehicle1">Document</label>
                                                                <input type="radio" id="Image" value="2" name="Document" data-parsley-multiple="Document">
                                <label for="vehicle1">Image</label>
                                                                <input type="radio" id="Video" value="3" name="Document" data-parsley-multiple="Document">
                                <label for="vehicle1">Video</label>
                                                                <input checked="" type="radio" id="Other" value="4" name="Document" data-parsley-multiple="Document">
                                <label for="vehicle1">Other</label>
                                                            </div>
                        </div>
                        <input type="submit" value="Save">
                    </form>
                </div>
                <button class="back_to_assets"><a href="/account/assets.html">Back to my assets <i class="fa-solid fa-chevron-right"></i> </a></button>
            </div>
        </div>
    </div>
</section>
{{View::make('account.footer')}}