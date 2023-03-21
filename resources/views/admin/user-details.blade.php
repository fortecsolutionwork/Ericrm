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
        <form action="" class="boxed_form">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>First Name</label>
                        <input id="first_name" type="text" class="form-control" disabled value="{{$user->name}}">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Last Name</label>
                        <input id="last_name" type="text" class="form-control" disabled value="{{$user->last_name}}">
                    </div>
                </div>
                <div class="col-md-12"></div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Company Name</label>
                        <input id="company_name" type="text" class="form-control" disabled value="{{$user->company_name}}">
                    </div>
                </div>
                <div class="col-md-12"></div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Position</label>
                        <input id="position" type="text" class="form-control" disabled value="{{$user->position}}">
                    </div>
                </div>
                <div class="col-md-12"></div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Email</label>
                        <input id="email" type="email" class="form-control" disabled value="{{$user->email}}">
                    </div>
                </div>
                <div class="col-md-12"></div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Phone</label>
                        <input id="phone" type="text" class="form-control" disabled value="{{$user->phone_number}}">
                    </div>
                </div>
                <div class="col-md-12"></div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Country</label>
                        <select class="form-control" disabled>
                            <option>{{$user->countries_name}}</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-12"></div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>City</label>
                        <select class="form-control" disabled>
                            <option>{{$user->cities_name}}</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <label>Address Line 1</label>
                        <input type="text" id="address" name="address" value="{{$user->address_line1}}" class="form-control" disabled>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <label>Address Line 2</label>
                        <input type="text" id="address" name="address" value="{{$user->address_line2}}" class="form-control" disabled>
                    </div>
                </div>
                <div class="col-md-12 mt-3">
                    <div class="form-group">
                        <a href="{{route('edituser',Route::current()->parameter('id'))}}" class="btn btn-primary mr-2">Edit</a>
                        <a onclick="return confirm('Are you sure you want to delete this item?')"  href="{{route('deleteuser',Route::current()->parameter('id'))}}" class="btn btn-primary">Delete</a>
                        <!-- <button  onclick="return confirm('Are you sure you want to delete this item?')" type="submit" class="btn btn-primary">Delete</button> -->
                    </div>
                </div>
            </div>
        </form>
    </div>

</section>

{{View::make('admin.footer')}}