{{View::make('admin.header')}}
{{View::make('admin.sidebar')}}
<style>
    input.vehicle11 ,.vehicle12,.vehicle13,.vehicle14 {
        height: 20px;
        width: 20px;
    }

    .side_widget.enble_product {
        display: flex;
        align-items: center;
    }

    .side_widget.enble_product label {
        margin: 0 0 0 10px;
    }

    /* .Product_price {
    display: flex;
    align-items: center;
} */

    /* .Product_price select {
    flex-basis: 60%;
    max-width: 60%;
}

.Product_price span {
    text-align: center;
    max-width: 20%;
    flex-basis: 20%;
}*/


    .high_price tr td i {
        padding: 5px 8px;
        background: red;
        color: #fff;
        border-radius: 5px;
    }

    .Product_price {
        margin-top: 15px;
    }

    .high_price table {
        width: 100%;
    }

    .high_price tr td {
        padding: 5px;
    }

    .high_price tr td .fa-plus {
        background: #007bff;
    }



    /* .high_price1 {
        display: none;
    } */

    .high_price1 tr td i {
        padding: 5px 8px;
        background: red;
        color: #fff;
        border-radius: 5px;
    }

    .Product_price1 {
        margin-top: 15px;
    }

    .high_price1 table {
        width: 100%;
    }

    .high_price1 tr td {
        padding: 5px;
    }

    .high_price1 tr td .fa-plus {
        background: #007bff;
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
                <h4>Edit Product</h4>
                <a href="{{ url()->previous() }}" class="btn btn-primary">Back to Products</a>
            </div>
            <form action="{{route('updateproduct')}}" id="demo-form" data-parsley-validate="" enctype="multipart/form-data" method="POST">
                @csrf
                <div class="row">
                    <div class="col-md-8">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Product Name</label>
                                    <input id="product_name" value="{{$product->product_name}}" type="text" name="product_name" class="form-control" required="">
                                </div>
                            </div>
                            <input id="product_name" value="{{$product->id}}" type="hidden" name="pid" class="form-control" required="">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Description</label>
                                    <textarea class="form-control" id="description mytextarea" rows="6" name="description" required="">{{$product->description}}</textarea>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Original Price</label>
                                    <input id="price" type="number" class="form-control" min="1" required="" value="{{$product->original_price}}" name="original_price">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Sale Price</label>
                                    <input id="old_price" type="number" value="{{$product->sale_price}}" min="0" class="form-control" name="sale_price">
                                </div>
                            </div>

                            <div class="col-md-12 mt-3">
                                <table class="high_price1" style="width:100%;">

                                    @if(count($prooduct_accordion) == 0)
                                    <tr>
                                        <td> <label>Accordation content</label></td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td style="width:90%" class="Product_price1">
                                            <input placeholder="Title" type="text" class="form-control" name="accord_title[]" accord_title-id="1" id="accord_title1" style="margin-bottom:10px;">
                                            <textarea class="form-control" placeholder="Description" name="accord_description[]" accord_description-id="1" id="accord_description1"></textarea>
                                        </td>

                                        <td style="width:10%;text-align: center;vertical-align: top;">
                                            <i class="fa-solid fa-plus"></i>
                                        </td>
                                    </tr>
                                    @else
                                    <?php $count = null;
                                    foreach ($prooduct_accordion as $key => $prooduct_accordion) {
                                        $count =  $key + 1;
                                    ?>
                                        <tr>
                                            <td> <label>Accordation content</label></td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td style="width:90%" class="Product_price1">
                                                <input value="{{$prooduct_accordion->title}}" placeholder="Title" type="text" class="form-control" name="accord_title[]" accord_title-id="{{$count}}" id="accord_title{{$count}}" style="margin-bottom:10px;">
                                                <textarea class="form-control" placeholder="Description" name="accord_description[]" accord_description-id="{{$count}}" id="accord_description{{$count}}">{{$prooduct_accordion->description}}</textarea>
                                            </td>
                                            <?php if ($count == 1) { ?>
                                                <td style="width:10%;text-align: center;vertical-align: top;" data-delete="{{$count}}">
                                                    <i class="fa-solid fa-plus"></i>
                                                </td>
                                            <?php  } else { ?>
                                                <td style="width:10%;text-align: center;vertical-align: top;" data-delete="{{$count}}">
                                                    <i class="fa-solid fa-minus"></i>
                                                </td>
                                            <?php } ?>
                                        </tr>
                                    <?php  } ?>
                                    @endif
                                </table>
                            </div>
                            <div class="col-md-12 mt-3">
                                @if(count($extra_value_products) == 0)
                                <style>
                                    .high_price {
                                        display: none;
                                    }
                                </style>
                                <table class="high_price">
                                    <tr>
                                        <td> <label>Extra value product</label></td>
                                        <td> <label> Discount(%)</label> </td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td style="width:60%" class="Product_price">
                                            <select class="high_product form-control  extravalueproduct" name="extravalueproduct[]" extravalueproduct-id="1" id="extravalueproduct1">
                                                @if(!empty($productExtra))
                                                @foreach($productExtra as $productExtra1)
                                                <option value="{{$productExtra1->id}}">{{$productExtra1->product_name}}</option>
                                                @endforeach
                                                @endif
                                            </select>

                                        </td>
                                        <td style="width:20%">
                                            <input type="number" value="" min="0" class="form-control discount" name="discount[]" discount-id="1" id="discount1">
                                        </td>
                                        <td style="width:10%;text-align: center;">
                                            <i class="fa-solid fa-plus"></i>
                                        </td>
                                    </tr>
                                </table>
                                @else
                                <table class="high_price">
                                    <?php $count1 = null;
                                    foreach ($extra_value_products as $key => $extra_value_products1) {
                                        $count1 =  $key + 1;
                                    ?>
                                        <tr>
                                            <td style="width:60%" class="Product_price">
                                                <select class="high_product form-control  extravalueproduct" name="extravalueproduct[]" extravalueproduct-id="{{$count1}}" id="extravalueproduct{{$count1}}">
                                                    @if(!empty($productExtra))
                                                    @foreach($productExtra as $productExtra12)
                                                    <option {{$extra_value_products1->fk_extra_value_products  == $productExtra12->id?'selected':'' }} value="{{$productExtra12->id}}">{{$productExtra12->product_name}}</option>
                                                    @endforeach
                                                    @endif
                                                </select>

                                            </td>
                                            <td style="width:20%">
                                                <input type="number" value="{{$extra_value_products1->discount}}" min="0" class="form-control discount" name="discount[]" discount-id="{{$count1}}" id="discount{{$count1}}">
                                            </td>

                                            <?php if ($count1 == 1) { ?>
                                                <td style="width:10%;text-align: center;">
                                                    <i class="fa-solid fa-plus"></i>
                                                </td>
                                            <?php  } else { ?>
                                                <td style="width:10%;text-align: center;">
                                                    <i class="fa-solid fa-minus"></i>
                                                </td>
                                            <?php } ?>
                                        </tr>
                                    <?php } ?>
                                    @endif
                                </table>
                            </div>
                            <input type="hidden" name="hiddenImage" value="{{$product->image}}" id="imagesa" required="required" />
                            <div class="col-md-12 mt-3" id="product_img">
                                <label>Product Images</label>
                                <img src="{{url('/')}}/images/products/{{$product->image !=null ?$product->image:"40x40.png"}}" style="height:50px;width:50px;margin-left:20px;" />
                            </div>
                            <div class="col-md-12 mt-3" id="product_img">
                                <!-- <label>Product Images</label> -->
                                <div class="file">
                                    <input accept="image/png, image/gif, image/jpeg" type="file" name="file" id="images" />
                                    <label for="images" class="dropzone"><i class="fa fa-upload"></i>Drop Files here</label>
                                    <span id="file_data"></span>
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary">Save</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="side_widget">
                            <div class="form-group">
                                <label>Category</label>
                                <select class="form-control mySelect2" name="fk_category_id">
                                    @if(!empty($category))
                                    @foreach($category as $category)
                                    <option {{$category->id == $product->fk_category_id?'selected' : '' }} value="{{$category->id}}">{{$category->category_name}}</option>
                                    @endforeach
                                    @endif
                                </select>
                            </div>
                        </div>
                        <div class="side_widget">
                            <div class="form-group">
                                <label>Status</label>
                                <select class="form-control mySelect2" name="fk_product_status_id">
                                    @if(!empty($category_status))
                                    @foreach($category_status as $category_status)
                                    <option {{$category_status->id == $product->fk_product_status_id?'selected' : '' }} value="{{$category_status->id}}">{{$category_status->name}}</option>
                                    @endforeach
                                    @endif
                                </select>
                            </div>
                        </div>
                        @foreach($product_type as $product_type)
                        <div class="side_widget enble_product">
                            <input type="radio" {{$product_type->id == $product->product_type?"checked":""}}  class="vehicle1{{$product_type->id}}" name="vehicle1" value="{{$product_type->id}}">
                            <label for="vehicle1">{{$product_type->product_type_name}}</label>
                        </div>
                        @endforeach
                        <!-- <div class="side_widget enble_product">
                            <input type="checkbox" id="vehicle1" name="vehicle1" value="1" {{count($extra_value_products) > 0 ?'checked':''}}>
                            <label for="vehicle1"> Enable Extra value product </label>
                        </div> -->
                        <!-- <div class="side_widget enble_product">
                            <input type="radio" checked class="vehicle12" name="vehicle1" value="2">
                            <label for="vehicle1">Standard product </label>
                        </div>
                        <div class="side_widget enble_product">
                            <input type="radio" class="vehicle1" name="vehicle1" value="1">
                            <label for="vehicle1"> Enable Extra value product </label>
                        </div>
                        <div class="side_widget enble_product">
                            <input type="radio" class="vehicle13" name="vehicle1" value="3">
                            <label for="vehicle1">Get a quote</label>
                        </div>
                        <div class="side_widget enble_product">
                            <input type="radio" class="vehicle14" name="vehicle1" value="4">
                            <label for="vehicle1">credits</label>
                        </div> -->
                    </div>
                </div>
            </form>
        </div>
    </div>

</section>
{{View::make('admin.footer')}}
<script>
    $(document).ready(function() {
        $('.vehicle11').click(function() {
            if ($(".vehicle11").prop('checked') == true) {
             
                $('.high_price').css("display", "table");
                $(".high_product ").attr("required", "true");
                $(".discount ").attr("required", "true");
            }
            // } else {
            //     $('.vehicle1').prop('checked', false);
            //     $(".high_product").removeAttr("required");
            //     $(".discount").removeAttr("required");
            //     $('.high_price').css("display", "none");
            // }
        });

        /*simple product */
        $('.vehicle12').click(function() {
            if ($(".vehicle12").prop('checked') == true) {
                $('.high_price').css("display", "none");
                $(".high_product ").attr("required", "false");
                $(".discount ").attr("required", "false");

                $('.sale_price').css("display", "block");
                $('.oprice_price').css("display", "block");
            }
        });
        /* end simple product */

        /* get a quote */
        $('.vehicle13').click(function() {
            if ($(".vehicle13").prop('checked') == true) {
                $('.high_price').css("display", "none");
                $('.sale_price').css("display", "none");
                $('.oprice_price').css("display", "none");
                $(".high_product ").attr("required", "false");
                $(".discount ").attr("required", "false");
            }
        });

        /* End get a quote */
        /* get a quote */
        $('.vehicle14').click(function() {
            if ($(".vehicle13").prop('checked') == true) {
                $('.high_price').css("display", "none");
                $('.sale_price').css("display", "none");
                $('.oprice_price').css("display", "none");
                $(".high_product ").attr("required", "false");
                $(".discount ").attr("required", "false");
            }
        });

        /* End get a quote */
        var i = "<?php echo !empty($count1) ? $count1 : 1 ?>";
        var pro_id = "<?php echo Route::current()->parameter('id'); ?>";
        var my_array = [];
        my_array.push(pro_id);
        $('.high_price td .fa-plus').click(function() {
            $(".high_product").each(function() {
                my_array.push($(this).val());
            })

            i++;
            $('.high_price').append('<tr class="dynamic_row">' +
                '<td style="width:60%"  class="Product_price">' +
                '<select class="high_product form-control" name="extravalueproduct[]" extravalueproduct-id="' + i + '" id="extravalueproduct' + i + '" required=""></select>' +
                '</td>' +
                ' <td style="width:20%">' +
                '<input  required="" type="number" class="form-control" name="discount[]" discount-id="' + i + '" id="discount' + i + '">' +
                '</td>' +
                ' <td style="width:10%;text-align: center;"  id="' +
                i + '">' +
                ' <i class="fa-solid fa-minus"></i>' +
                '</td>' +
                ' </tr>)');


            $.ajax({
                url: "{{ url('admin/get-extra-value-product')}}",
                type: "get",
                data: {
                    id: my_array,
                    _token: '{{ csrf_token() }}'
                },
                dataType: 'json',
                success: function(response) {
                    $.each(response, function(key, value) {
                        var option = $('<option value="' + value.id +
                            '">' + value.product_name +
                            '</option>');
                        $('#extravalueproduct' + i + '').append(option);
                    });
                }
            });

        });

        $(document).on('click', '.high_price td .fa-minus', function() {
            $(this).parents('tr').remove();
        });

        //acco

        var i = "<?php echo !empty($count) ? $count : 1 ?>";

        $('.high_price1 td .fa-plus').click(function() {
            i++;
            $('.high_price1').append('<tr class="dynamic_row">' +
                '<td style="width:90%"  class="Product_price1">' +
                '<input style="margin-bottom:10px";  placeholder="Title"  type="text" class="form-control" name="accord_title[]" accord_title-id="' + i + '" id="accord_title' + i + '">' + '<textarea placeholder="Description" class="form-control" name="accord_description[]" accord_description-id="' + i + '" id="accord_description' + i + '"></textarea>' +
                '</td>' +
                ' <td style="width:10%;text-align: center;vertical-align: top;"  id="' +
                i + '">' +
                ' <i class="fa-solid fa-minus"></i>' +
                '</td>' +
                ' </tr>)');


        });

        $(document).on('click', '.high_price1 td .fa-minus', function() {
            $(this).parents('tr').remove();
        });


        jQuery("input[type=file]").change(function(e) {
            jQuery(this).siblings("span").text(e.target.files[0].name);
        });
        var $dropzone = document.querySelector('.dropzone');
        var input = document.getElementById('images');

        $dropzone.ondragover = function(e) {
            e.preventDefault();
            this.classList.add('dragover');
        };
        $dropzone.ondragleave = function(e) {
            e.preventDefault();
            this.classList.remove('dragover');
        };
        $dropzone.ondrop = function(e) {
            e.preventDefault();
            this.classList.remove('dragover');
            input.files = e.dataTransfer.files;
            if (document.getElementById("images").files.length == 1) {
                // alert(input.files[0].name);
                document.getElementById("file_data").innerHTML = input.files[0].name
            }
        }
    });
</script>