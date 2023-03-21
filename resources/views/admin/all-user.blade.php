{{View::make('admin.header')}}
{{View::make('admin.sidebar')}}
<section class="body-part main_container">
    @if ($message = Session::get('success'))
    <div class="alert alert-success">
        <p>{{ $message }}</p>
    </div>
    @endif
    <div class="container px-0">
        <div class="box-layout">
            <div class="form-header mb-5">
                <h4>Users</h4>
                <a href="{{route('adduser')}}" class="btn btn-primary">Add New User</a>
            </div>
            <div class="table-controls">
                <form action="" enctype="multipart/form-data" method="GET" id="formsub">

                    <div class="filters">
                        <input type="text" name="name" id="" placeholder="Search User" value="{{Request::get('name')}}" class="form-control" onkeypress="submitOnEnter(event)">
                        <select class="form-control" name="type" onchange="this.form.submit()">
                            <option value="" selected disabled>User Type</option>
                            <option value="all">All</option>
                            @if(!empty($allUsers))
                            @foreach ($UserTypes as $UserType)
                            <option {{Request::get('type') == $UserType->id?'selected':''}} value="{{$UserType->id}}">{{$UserType->name}}</option>
                            @endforeach
                            @endif
                        </select>
                    </div>
                </form>
            </div>
            <div class="reponsive-table">
                <table class="table">
                    <thead>
                        <tr>
                            <th><input type="checkbox" /></th>
                            <th>Full Name</th>
                            <th>User Type</th>
                            <th>Email</th>
                            <th>Date Created</th>
                            <th>Last Updated</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if(!empty($allUsers))
                        @foreach ($allUsers as $allUser)
                        <?php
                        $timestamp =  strtotime($allUser->created_at);
                        $date = date("Y-m-d", $timestamp);
                        $month_name = date("F", strtotime($date)); // get month name
                        $day = date("d", strtotime($date)); // get day of the month
                        $year = date("Y", strtotime($date)); // get year

                        $timestampUpdated =  strtotime($allUser->updated_at);
                        // dd($timestampUpdated );
                        $dateUpdated = date("Y-m-d", $timestampUpdated);
                        $month_nameUpdated = date("F", strtotime($dateUpdated)); // get month name
                        $dayUpdated = date("d", strtotime($dateUpdated)); // get day of the month
                        $yearUpdated = date("Y", strtotime($dateUpdated)); // get year
                        ?>
                        <tr>
                            <td><input type="checkbox" /></td>
                            <td>{{$allUser->name}} {{$allUser->last_name}}</td>
                            <td>@foreach($UserTypes as $userType)<span>{{$userType->id == $allUser->fk_role_id?$userType->name:""}}</span>@endforeach</td>
                            <td>{{$allUser->email}}</td>
                            <td>{{$month_name}} {{$day}}, {{ $year}}</td>
                            <td>{{$month_nameUpdated}} {{$dayUpdated}}, {{$yearUpdated}}</td>
                            <td class="actions"><a href="{{route('userdetails',$allUser->id)}}" class="edit"><i class="fa fa-eye"></i></a><a href="{{route('edituser',$allUser->id)}}" class="edit"><i class="fa fa-edit"></i></a> <a onclick="return confirm('Are you sure you want to delete this item?')" href="{{route('deleteuser',$allUser->id)}}" class="delete"><i class="fa fa-trash"></i></a></td>
                        </tr>
                        @endforeach
                        @else
                        <tr>
                            <td colspan="7" style="text-align:center;white-space:nowrap;">No user available</td>
                        </tr>
                        @endif
                    </tbody>
                </table>
            </div>
            <div class="table_footer">
                <!-- <span class="page_number">Showing <strong>1 of 7</strong></span>
               <ul class="pagination">
                    <li><a href="#" class="prev">Previous</a></li>
                    <li><a href="#" class="current">1</a></li>
                    <li><a href="#">2</a></li>
                    <li><span>...</span></li>
                    <li><a href="#">10</a></li>
                    <li><a href="#" class="next">Next</a></li>
                </ul>  -->
                {{ $allUsers->appends(request()->query())->links() }}

            </div>
        </div>
    </div>

</section>
{{View::make('admin.footer')}}
<script>
    function submitOnEnter(e) {
        if (e.which == 13) {
            document.getElementById("formsub").submit()
        }
    }
</script>