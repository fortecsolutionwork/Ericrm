{{View::make('admin.header')}}
{{View::make('admin.sidebar')}}
<section class="body-part main_container">

    <div class="container px-0">
        @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
        @endif
        @if ($message = Session::get('error'))
        <div class="alert alert-danger">
            <p>{{ $message }}</p>
        </div>
        @endif
        <div class="box-layout">
            <div class="form-header mb-5 d-flex justify-content-between">
                <h4>All Orders</h4>
                <button class="btn btn-primary"><a href="{{route('neworder')}}" style="color:#fff">Create New order</a> </button>
            </div>

            <div class="reponsive-table">
                <table class="table">
                    <thead>
                        <tr>
                            <th><input type="checkbox" /></th>
                            <th>Date</th>
                            <th>Number</th>
                            <th>Customer</th>
                            <th>Note</th>
                            <th>Total</th>
                            <th>Status</th>

                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if(!empty($userOrder))
                        @foreach($userOrder as $order)

                        @php
                        $timestamp = strtotime($order->oCreated_at);
                        $date = date("Y-m-d", $timestamp);
                        $month_name = date("F", strtotime($date)); // get month name
                        $day = date("d", strtotime($date)); // get day of the month
                        $year = date("Y", strtotime($date)); // get year
                        $status = "";
                        if( $order->order_status_id ==1 ){
                        $status ="process";
                        }elseif( $order->order_status_id ==2 ){
                        $status ="s_progress";
                        }elseif( $order->order_status_id == 3){
                        $status ="active";
                        }elseif($order->order_status_id == 4 ){
                        $status ="receive";
                        }
                        $total_payment = DB::table('order_meta')
                        ->select(DB::raw("sum(total_payment) as count"))
                        ->where('fk_order_id','=',$order->oId)
                        ->get();
                        @endphp
                        <tr>
                            <td><input type="checkbox" /></td>
                            <td>{{$month_name}} {{$day}}, {{$year}}</td>
                            <td>#{{$order->oId}}</td>
                            <td>{{$order->name}}</td>
                            <td>{{$order->order_details}}</td>
                            <td>{{$getCurrency->symbol}}{{$total_payment[0]->count}}</td>
                            <td><span class="status {{$status}}">{{$order->order_status_name}}</span></td>
                            <td class="actions"><a href="{{route('orderdetails',$order->oId)}}" class="edit"><i class="fa fa-eye"></i></a> <a href="{{route('editorder',$order->oId)}}" class="edit"><i class="fa fa-edit"></i></a> <a onclick="return confirm('Are you sure you want to delete this item?')" href="{{route('orderdelete',$order->oId)}}" class="delete"><i class="fa fa-trash"></i></a></td>
                        </tr>
                        @endforeach
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>
{{View::make('admin.footer')}}