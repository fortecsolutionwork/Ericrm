{{View::make('admin.header')}}
{{View::make('admin.sidebar')}}
<section class="body-part main_container">

    <div class="container px-0">
        <div class="box-layout">
            <div class="form-header mb-5">
                <h4>Add Category</h4>
                <a href="{{ route('allcategory') }}" class="btn btn-primary">Back to Category</a>
            </div>
            <form action="{{route('storecategory')}}" id="demo-form" data-parsley-validate=""  data-parsley-validate="" enctype="multipart/form-data" method="POST">
                @csrf
                <div class="row">
                    <div class="col-md-8">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Category Name</label>
                                    <input id="product_name" type="text" class="form-control" required="" name="category_name">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="side_widget">
                            <div class="form-group">
                                <label>Status</label>
                                <select class="form-control mySelect2" name="category_status">
                                @if(!empty($category_status))
                                @foreach($category_status as $category_status)
                                <option value={{$category_status->id}}>{{$category_status->name}}</option>
                                @endforeach
                                @endif
                                </select>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-12 mt-3">
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

</section>

{{View::make('admin.footer')}}