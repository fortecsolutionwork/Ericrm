<style> 
i.fa-solid.fa-cart-shopping {
        position: relative;
    }
    
    span.product_numbr {
        position: absolute;
        top: -10px;
        font-size: 10px;
        background: #fff;
        border-radius: 50%;
        height: 15px;
        width: 15px;
        color: dodgerblue;
        padding: 3px;
        line-height: 1;
        left:-15px;
    }

</style>
<div class="sidebar">
    <aside>
        <div class="sidebar-brand custom-flex">
            <a href="{{url('/')}}" class="pl-2 text-wrap text-break w-75">Webzolution</a>
            <a href="{{url('/')}}" class="mobile_close"><i class="fa fa-times"></i></a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <div class="d-flex justify-content-center align-items-center h-100 w-100">
                <a href="{{url('/')}}" class="small-sidebar-text">
                    W
                </a>
            </div>
        </div>
       <?php /* <li><a href="{{route('dashboard')}}" class="active_ac"><i class="fa-sharp fa-solid fa-house"></i><span>Dashboard</span></a></li>
            <li><a href="{{route('manageproducts')}}"><i class="fa-solid fa-bars-progress"></i><span>Manage products</span></a></li>
            <li><a href="{{route('myassets')}}"><i class="fa-solid fa-envelopes-bulk"></i><span>My assets</span></a></li>
            <li><a href="{{route('supporttickets')}}"><i class="fa-solid fa-user"></i><span>Support tickets</span></a></li>
            <li><a href="{{route('resources')}}"><i class="fa-solid fa-tag"></i><span>Resources</span></a></li>
            <li><a href="{{route('myinfo')}}"><i class="fa-solid fa-gear"></i><span>My account</span></a></li> */?>
        <ul> 
            <li><a href="{{route('dashboard')}}" class="active_ac"><i class="fa-sharp fa-solid fa-house"></i><span>Dashboard</span></a></li>
            <li><a href="{{route('category')}}"><i class="fa-solid fa-bars-progress"></i><span>Products</span></a></li>
            <li><a href="{{route('myorder')}}"><i class="fa-solid fa-bars-progress"></i><span>My Orders</span></a></li>
            <li><a href="{{route('myassets')}}"><i class="fa-solid fa-envelopes-bulk"></i><span>My assets</span></a></li>
            <li><a href="{{route('mysupportticket')}}"><i class="fa-solid fa-user"></i><span>Support tickets</span></a></li>
            <li><a href=""><i class="fa-solid fa-tag"></i><span>Resources</span></a></li>
            <li><a href="{{route('myinfo')}}"><i class="fa-solid fa-gear"></i><span>My account</span></a></li>
        </ul>
    </aside>
</div>
@php 
$cart = DB::table('cart')
->select(DB::raw('SUM(quantity) as quantity'))
->where('fk_user_id','=',Auth::user()->id)
->get();
@endphp
<nav class="top_nav">
    <div class="inner">
        <div class="left"> <i class="fa-solid fa-bars toggle_sidebar"></i></div>
        <div class="right">
            <a href=""><i class="fa fa-circle-info"></i></a>
            <a href="{{route('cart')}}"> <i class="fa-solid fa-cart-shopping"> <span class="product_numbr">{{$cart[0]->quantity}}</span> </i> </a>
            <span class="dropdown">
                <a class="dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fa-solid fa-user"></i>
                </a>

                <div class="dropdown-menu user_menu" aria-labelledby="dropdownMenuLink">
                    <a href="{{route('myinfo')}}">{{ Auth::user()->name }}</a>
                    <a href="{{ route('logout') }}" onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">Logout</a>
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