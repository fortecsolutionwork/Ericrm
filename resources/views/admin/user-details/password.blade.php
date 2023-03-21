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

        <form>
            <div class="form-group">
                <p class="mb-5 Password">abcd********</p>
            </div>
            <button type="submit" class="btn btn-primary">Reset Password</button>

        </form>
    </div>

</section>
{{View::make('admin.footer')}}