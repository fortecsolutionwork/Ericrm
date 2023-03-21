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

    .custome-icon i {
        font-size: 20px;
    }

    .customer p {
        bottom: 0;
        margin-bottom: 0;
    }

    .container.support {
        overflow: initial;
    }
</style>
<section class="main_container">
    <div class="container support">
        <div class="row">
            <div class="col-lg-12">
                <div class="my-info-head new_desin">
                    <h1 style="font-weight:700">Assets</h1>
                    <a href="http://localhost/ericCrm%20%282%29/account/add-assets"> <span style="font-weight:500"> <i class="fa-solid fa-plus"></i> Add new</span> </a>
                </div>
                                                <ul>
                    <li>
                    </li>
                  
                                                                                <li>
                        <div class="row align-items-center sitemap_assets">
                            <div class="col-lg-10">
                                <div class="d-flex justify-content-between sitemap">
                                    <div class="custome-icon"><i class="fa-solid fa-file"></i>
                                        <h4>miojnhuiy</h4>
                                    </div>
                                    <p class="mb-0">Last updated: 20 March 2023 </p>
                                </div>
                            </div>
                            <div class="col-lg-2">
                                <div class="dropdown text-right">
                                    <button class="btn btn-secondary dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false">
                                        <i class="fa-solid fa-ellipsis"></i>
                                    </button>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item" href="http://localhost/ericCrm%20%282%29/account/assets-edit/18">Edit</a>
                                        <a class="dropdown-item"  href="#">Delete</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                                    </ul>
                            </div>
        </div>
    </div>
</section>
{{View::make('account.footer')}}