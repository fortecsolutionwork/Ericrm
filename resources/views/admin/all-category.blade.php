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
            <div class="form-header mb-5">
                <h4>All Category </h4>
                <a href="{{route('addcategory')}}" class="btn btn-primary">Add New Category </a>
            </div>
            <div class="reponsive-table">
                <table class="table">
                    <thead>
                        <tr>
                            <th><input type="checkbox" /></th>
                            <th>Category Name</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody id="container">
                        
                            @if(!empty($category))
                            @foreach($category as $category)
                            <tr>
                            <td><input type="checkbox" /></td>
                            <td>{{$category->category_name}}</td>
                            <td><span class="status {{$category->fk_category_status ==1 ? 'active' : 'inactive' }}">{{$category->fk_category_status==1?"On":"Hidden"}}</span></td>
                            <td class="actions"><a href="{{route('editcategory',$category->id)}}" class="edit"><i class="fa fa-edit"></i></a> <a href="{{route('deletecategory',$category->id)}}" onclick="return confirm('Are you sure you want to delete this item?')" class="delete"><i class="fa fa-trash"></i></a></td> 
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
