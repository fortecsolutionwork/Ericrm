{{View::make('admin.header')}}
{{View::make('admin.sidebar')}}
<style>
    body {
    background: #fff !IMPORTANT;
}
.container {
    overflow: visible;
}
 </style>
<section class="body-part main_container">
    <div class="container px-0">
        {{View::make('admin.user-details.customer-info-nav')}}
        <div class="row">
            <div class="col-md-6">
                <p>{{$user->name}}</p>
                <p>{{$user->company_name}}</p>
                <p>Country: {{$user->countries_name}}</p>
            </div>
            <div class="col-md-6">
                <p>Phone: {{$user->phone_number}}</p>
                <p>Email: {{$user->email}}</p>
                <p>User type: {{$user->role_name}}</p>
            </div>
        </div>
        <hr />

        <div class="order_table info-right-side">
            <ul class="mt-0">
                <li>
                    <div class="row align-items-center">
                        <div class="col-lg-10">
                            <h4>Visa **** 1234</h4>
                            <p>123 Street Name, Gotham City, United States</p>
                        </div>
                        <div class="col-lg-2">
                            <div class="dropdown text-right">
                                <button class="btn btn-secondary dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false">
                                    <i class="fa-solid fa-ellipsis"></i>
                                </button>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="/account/payment-and-billing/edit.html">Edit</a>
                                    <a class="dropdown-item" href="#">Delete</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
                <li>
                    <div class="row align-items-center">
                        <div class="col-lg-10">
                            <h4>Visa **** 1234</h4>
                            <p>123 Street Name, Gotham City, United States</p>
                        </div>
                        <div class="col-lg-2">
                            <div class="dropdown text-right">
                                <button class="btn btn-secondary dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false">
                                    <i class="fa-solid fa-ellipsis"></i>
                                </button>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="/account/payment-and-billing/edit.html">Edit</a>
                                    <a class="dropdown-item" href="#">Delete</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
    </div>

</section>

{{View::make('admin.footer')}}