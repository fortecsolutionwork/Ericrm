<style>
    body {
        background: #fff !important;
    }

    .pages .main-pages {
        justify-content: center;
        margin: 0;
    }

    /* .login-button button {
    padding: 10px 20px;
    border: none;
    background: dodgerblue; 
  } */

    .login-button button:hover {
        background: dodgerblue;
        color: #fff;
    }

    .login-button button:hover a {
        text-decoration: none;
        color: #fff !important;
    }

    .login-button a {
        color: #fff;
    }

    /* .login-button span a{
    margin-right:10px;
    color:dodgerblue;
    font-size: 16px;
    font-weight: 500;
} */

    .home-header {
        border-bottom: 1px solid #f0f0f0;
        padding: 10px 0px;
    }

    .home-header .logo-text {
        color: dodgerblue;
        font-weight: 700;
    }

    .home-header .logo-text a {
        text-decoration: none;
    }

    .login-button button:hover {
        box-shadow: 0px 0px 6px #00000057;
    }
</style>

<body>
    <section class="home-header">
        <!-- <nav class="navbar navbar-expand-lg navbar-light"></nav> -->
        <div class="container-fluid" style="overflow: visible;overflow-x:clip;">
            <div class="row align-items-center">

                <div class="col-lg-2 col-md-2 text-left">
                    <!-- <img src="https://via.placeholder.com/140x50"> -->
                    <h5 class="logo-text"> <a href="{{url('/')}}"> Webzolution </a></h5>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="fa-solid fa-list"></span>
                    </button>
                </div>
                <div class="col-lg-8 col-md-7 pages collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="main-pages navbar-nav">
                        <li class="customers nav-item"><a href="#">Customers <i class="fa-solid fa-sort-down"></i></a>
                            <ul class="sub-pages main">
                                <li><a href="{{route('gallary')}}">Customers Gallery</a></li>
                                <li><a href="#">Customer Stories</a></li>
                            </ul>
                        </li>
                        <li class="products nav-item"><a href="#">Products and services <i class="fa-solid fa-sort-down"></i></a>
                            <ul class="products-sub-pages main">
                                <li><a href="{{route('services')}}">Extra value starter pack</a></li>
                                <li><a href="{{route('uniquewebsite')}}">Unique website</a></li>
                                <li><a href="{{route('presentationtemplatedesign')}}">Branded presentation template</a></li>
                                <li><a href="#">Virtual Business Card</a></li>
                                <li><a href="{{route('nfcbusinesscard')}}">NFC Business Card (coming soon)</a></li>
                                <li><a href="#">Print Business Card</a></li>
                                <li><a href="#">Logo design / Brand ID development</a></li>
                            </ul>
                        </li>
                        <li class="about-pages nav-item"><a href="#">About Us <i class="fa-solid fa-sort-down"></i> </a>
                            <ul class="about-sub-pages main">
                                <li><a href="#">Why pick us, not others</a></li>
                                <li><a href="#">Webzolution is not for you if ...</a></li>
                                <li><a href="#">The company</a></li>
                            </ul>
                        </li>
                        <li class="resources nav-item"><a href="/guides-and-insights.html">Resources <i class="fa-solid fa-sort-down"></i> </a>
                            <ul class="resources-sub-pages main">
                                <li><a href="#">FAQs</a></li>
                                <li><a href="#">Guides and Insights</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
                <div class="col-lg-2 col-md-3 text-right login-button">
                    @guest
                    @if (Route::has('login'))

                    @auth
                    <!-- <a href="{{ url('/home') }}" class="text-sm text-gray-700 underline">Home</a> -->
                    @else
                    <span><a href="{{ route('login') }}">Log in</a></span>
                    <!-- <a href="{{ route('login') }}" class="text-sm text-gray-700 underline">Login</a> -->
                    @if (Route::has('register'))
                    <button><a href="{{ route('register') }}">Start for free</a></button>
                    <!-- <a href="" class="ml-4 text-sm text-gray-700 underline">Register</a> -->
                    @endif
                    @endif
                </div>
                @endif
                @else
                @php
                $user = Auth::user();

                @endphp
                <button><a href="{{ $user->fk_role_id ==1?route('dashboardadmin'):route('dashboard') }}"> {{ __('My dashboard') }}</a></button>
                <!-- <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form> -->
                @endguest
            </div>

        </div>
        </div>
        <!-- </nav> -->
    </section>