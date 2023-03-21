<div class="sidebar">
    <aside>
        <div class="sidebar-brand custom-flex">
            <a href="{{url('/')}}" class="pl-2 text-wrap text-break w-75">Webzolution</a>
            <a href="{{url('/')}}" class="mobile_close"><i class="fa fa-times"></i></a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <div class="d-flex justify-content-center align-items-center h-100 w-100">
                <a href="https://infysupport.infyom.com" class="small-sidebar-text">
                    W
                </a>
            </div>
        </div>
        <ul>
            <li><a href="{{route('dashboardadmin')}}" class="active_ac"><i class="fa-sharp fa-solid fa-house"></i><span>Dashboard</span></a></li>
            <li><a href="{{route('orders')}}"><i class="fa-solid fa-bars-progress"></i><span>Orders</span></a></li>
            <li><a href="{{route('alltickets')}}"><i class="fa-solid fa-envelopes-bulk"></i><span>Support tickets</span></a></li>
            <li><a href="{{route('alluser')}}"><i class="fa-solid fa-user"></i><span>User</span></a></li>
            <li><a href="{{route('allcategory')}}"><i class="fa-solid fa-tag"></i><span>Category</span></a></li>
            <li><a href="{{route('allproduct')}}"><i class="fa-solid fa-tag"></i><span>Products</span></a></li>
            <li><a href="{{route('myinfoadmin')}}"><i class="fa-solid fa-gear"></i><span>My account</span></a></li>
        </ul>
    </aside>
</div>


<nav class="top_nav">
    <div class="inner"> 
        <div class="left"> <i class="fa-solid fa-bars toggle_sidebar"></i></div>
        <div class="right">
            <a href=""><i class="fa fa-circle-info"></i></a>
            <span class="dropdown"><a class="dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa-solid fa-user"></i></a>
                <div class="dropdown-menu user_menu" aria-labelledby="dropdownMenuLink"><a href="{{route('myinfoadmin')}}">{{ Auth::user()->name }}</a><a onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();" href="{{ route('logout') }}">Logout</a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </div>
            </span>
            <span class="dropdown">
                <a class="dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fa-solid fa-bell"></i>
                </a>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                    <div class="dropdown-header">
                        <span class="">6 Notifications</span>
                        <a href="#" id="readAllNotification" class="text-decoration-none">Mark All As Read</a>
                    </div>
                    <ul>
                        <li>
                            <a href="">
                                <i class="fas fa-ticket"></i>
                                <p>New Ticket Created. <br /> THANH CAO create ticket Cannot issue VAT billing</p>
                                <p class="text-right"><small>2 weeks ago</small></p>
                            </a>
                        </li>
                        <li>
                            <a href="">
                                <i class="fas fa-ticket"></i>
                                <p>New Ticket Created. <br /> THANH CAO create ticket Cannot issue VAT billing</p>
                                <p class="text-right"><small>2 weeks ago</small></p>
                            </a>
                        </li>
                        <li>
                            <a href="">
                                <i class="fas fa-ticket"></i>
                                <p>New Ticket Created. <br /> THANH CAO create ticket Cannot issue VAT billing</p>
                                <p class="text-right"><small>2 weeks ago</small></p>
                            </a>
                        </li>
                        <li>
                            <a href="">
                                <i class="fas fa-ticket"></i>
                                <p>New Ticket Created. <br /> THANH CAO create ticket Cannot issue VAT billing</p>
                                <p class="text-right"><small>2 weeks ago</small></p>
                            </a>
                        </li>
                        <li>
                            <a href="">
                                <i class="fas fa-ticket"></i>
                                <p>New Ticket Created. <br /> THANH CAO create ticket Cannot issue VAT billing</p>
                                <p class="text-right"><small>2 weeks ago</small></p>
                            </a>
                        </li>
                    </ul>
                </div>
            </span>
        </div>
    </div>
</nav>