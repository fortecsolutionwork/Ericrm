{{View::make('admin.header')}}
{{View::make('admin.sidebar')}}
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
        <br />

        <div class="table-controls">
            <div class="filters">
                <input type="text" name="" id="" placeholder="Search Ticket" class="form-control">
                <select class="form-control" name="department" onchange="this.form.submit()">
                    <option value="" selected="" disabled="">Select Department</option>
                    <option value="all">All</option>
                    @if(!empty($department))
                    @foreach ($department as $department)
                    <option {{Request::get('type') == $UserType->id?'selected':''}} value="{{$UserType->id}}">{{$department->department_name}}</option>
                    @endforeach
                    @endif
                </select>
                <select class="form-control" name="department" onchange="this.form.submit()">
                    <option value="" selected="" disabled="">Select Department</option>
                    <option value="all">All</option>
                    @if(!empty($department))
                    @foreach ($department as $department)
                    <option {{Request::get('type') == $UserType->id?'selected':''}} value="{{$UserType->id}}">{{$department->department_name}}</option>
                    @endforeach
                    @endif
                </select>
            </div>
            <a href="/admin/new-ticket.html" class="btn btn-primary">Open New Ticket</a>
        </div>

        <div class="table_div">
            <table class="cart_table table mt-0">
                <tbody>
                    <tr>
                        <td style="font-weight:500; white-space: nowrap;">Ticket No. </td>
                        <td style="font-weight:500;">Last updated </td>
                        <td style="font-weight:500;white-space: nowrap;">Detail</td>
                        <td style="font-weight:500;width:18%;" class="detail_tab">Type</td>
                        <td style="font-weight:500;width:18%;" class="mobile_width">Status</td>
                        <td style="font-weight:500;" class="mobile_width">Actions</td>
                    </tr>
                    @if(count($support)>1)
                    @foreach($support as $support)
                    @php
                    $timestamp = strtotime($support->updated_at);
                    $date = date("Y-m-d", $timestamp);
                    $month_name = date("F", strtotime($date)); // get month name
                    $day = date("d", strtotime($date)); // get day of the month
                    $year = date("Y", strtotime($date)); // get year
                    @endphp
                    <tr>
                        <td style="text-align: center;white-space: nowrap;vertical-align: middle;">#{{$support->id}}</td>
                        <td style="text-align: center;white-space: nowrap;vertical-align: middle;">{{$day}} {{$month_name}} {{$year}} (18:33)</td>
                        <td>
                            <h4 style="font-size:14px;font-weight:500;">{{$support->subject}}</h4>
                            <p style="font-size:14px;font-weight:400;margin:0;" class="wrap_text">{{$support->message}}</p>
                        </td>

                        <td style="vertical-align:middle;"> {{$support->department_name}} </td>
                        <td style="vertical-align:middle;"> {{$support->statusname}} </td>
                        <td class="actions" style="vertical-align:middle;"><a href="{{route('editticket',$support->id)}}" class="view"><i class="fa fa-eye"></i></a><a href="{{route('editticket',$support->id)}}" class="edit"><i class="fa fa-edit"></i></a> <a href="" class="delete"><i class="fa fa-trash"></i></a></td>
                    </tr>
                    @endforeach
                    @else
                    <tr>
                        <td colspan="6" style="text-align: center;white-space: nowrap;vertical-align: middle;">Not Available</td>
                    <tr>
                        @endif

                </tbody>
            </table>
        </div>

    </div>

</section>
{{View::make('admin.footer')}}