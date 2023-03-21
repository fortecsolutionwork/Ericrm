    <div class="user_nav_wrap">
            <ul class="user_nav">
                <li  class="active"><a href="{{route('userdetails',Route::current()->parameter('id'))}}">Customer info</a></li>
                <li><a href="{{route('supporttickets',Route::current()->parameter('id'))}}">Support tickets</a></li>
                <li><a href="{{route('userdetailsorders',Route::current()->parameter('id'))}}">Orders</a></li>
                <li><a href="{{route('paymentscard',Route::current()->parameter('id'))}}">Payment cards</a></li>
                <li><a href="{{route('credits',Route::current()->parameter('id'))}}">Credits</a></li>
                <li><a href="{{route('passwordadmin',Route::current()->parameter('id'))}}">Password</a></li>
            </ul>
        </div>