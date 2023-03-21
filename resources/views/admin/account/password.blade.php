{{View::make('admin.header')}}
{{View::make('admin.sidebar')}}
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

    .header-left>div {
        flex-basis: 50% !important;
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
        max-width: 1110px;
    }

    .support-ticket .side-menu-open {
        width: 200px !important;
        z-index: 3;
    }

    .body-part {
        width: calc(100% - 56px);
        margin-left: 56px;
        padding-bottom: 70px;
    }

    .support-ticket {
        max-width: 1440px;
    }

    .customer p {
        bottom: 0;
        margin-bottom: 0;
    }

    .support .btn,
    .info-right-side .btn {
        line-height: inherit;
    }
</style>
<section class="main_container">
    <div class="container">
        <div class="row">
        {{View::make('admin.account.common')}}
            <div class="col-lg-9 info-right-side">
                <div class="tab-pane active" id="list-settings" role="tabpanel" aria-labelledby="list-settings-list">
                    <h2> Password </h2>
                    <form>
                        <div class="form-group">
                            <p class="mt-3 mb-5">abcd********</p>
                        </div>
                        <button type="submit" class="btn btn-primary">Reset Password</button>

                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

{{View::make('admin.footer')}}