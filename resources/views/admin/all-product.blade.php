{{View::make('admin.header')}}
{{View::make('admin.sidebar')}}
<style>
    .reponsive-table .table img {
        height: 40px;
        width: 40px;
    }

    .reponsive-table .table td {
        vertical-align: middle !important;
    }
</style>
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
                <h4>All products</h4>
                <a href="{{route('addproduct')}}" class="btn btn-primary">Add New Products</a>
            </div>
            <div class="reponsive-table">
                <table class="table">
                    <thead>
                        <tr>
                            <th><input type="checkbox" /></th>
                            <th>Product Name</th>
                            <th>Category</th>
                            <th>Price</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if(!empty($product))
                        @foreach($product as $product)
                        <tr>
                            <td><input type="checkbox" /></td>
                            <td> <span><img src="{{url('/')}}/images/products/{{$product->image !=null ?$product->image:"40x40.png"}}" /> {{$product->product_name}}</span></td>
                            <td>{{$product->category_name}}</td>
                            <td>{{$product->original_price !=null?$getCurrency->symbol."".$product->original_price:""}}</td>
                            <td><span class="status {{$product->fk_product_status_id ==1 ? 'active' : 'inactive' }}">{{$product->fk_product_status_id==1?"On":"Hidden"}}</span></td>
                            <td class="actions"><a href="{{route('editproduct',$product->pid)}}" class="edit"><i class="fa fa-edit"></i></a> <a onclick="return confirm('Are you sure you want to delete this item?')" href="{{route('deleteproduct',$product->pid)}}"  class="delete"><i class="fa fa-trash"></i></a></td>
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
<!-- <td><span class="status inactive">Hidden</td> https://via.placeholder.com/40x40 -->