{{View::make('admin.header')}}
{{View::make('admin.sidebar')}}
<style>
    input.vehicle11,
    .vehicle12,
    .vehicle13,
    .vehicle14 {
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
    .high_price {
        display: none;
    }

    /* 
    .credit_value{
        display: none;
    } */

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
                <h4>Add Product</h4>
                <a href="{{ url()->previous() }}" class="btn btn-primary">Back to Products</a>
            </div>
            <form action="{{route('storeproduct')}}" id="demo-form" data-parsley-validate="" enctype="multipart/form-data" method="POST">
                @csrf
                <div class="row">
                    <div class="col-md-8">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Product Name</label>
                                    <input id="product_name" type="text" name="product_name" class="form-control" required="">
                                </div>
                            </div>
                            <div class="col-md-12 credit_value" style="display:none">
                                <div class="form-group">
                                    <label>Credit Value</label>
                                    <input data-parsley-min="1" value="1" id="credit_value1" type="number" name="credit_value" class="form-control" min="1">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Description</label>
                                    <textarea class="form-control" id="description mytextarea" rows="6" name="description" required=""></textarea>
                                </div>
                            </div>

                            <div class="col-md-6 oprice_price">
                                <div class="form-group">
                                    <label>Original Price</label>
                                    <input id="price" type="number" class="form-control price" min="1" required="" name="original_price">
                                </div>
                            </div>
                            <div class="col-md-6 sale_price">
                                <div class="form-group">
                                    <label>Sale Price</label>
                                    <input id="old_price" type="number" value="0" min="0" class="form-control" name="sale_price">
                                </div>
                            </div>

                            <div class="col-md-12 mt-3">
                                <table class="high_price1" style="width:100%;">
                                    <tr>
                                        <td> <label>Additional Features</label></td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td style="width:90%" class="Product_price1">
                                            <input placeholder="Title" type="text" class="form-control" name="accord_title[]" accord_title-id="1" id="accord_title1" style="margin-bottom:10px;">
                                            <textarea class="form-control" placeholder="Description" name="accord_description[]" accord_description-id="1" id="accord_description1"></textarea>
                                        </td>

                                        <td style="width:10%;text-align: center;vertical-align:top;">
                                            <i class="fa-solid fa-plus"></i>
                                        </td>
                                    </tr>
                                </table>
                            </div>

                            <div class="col-md-12 mt-3">
                                <table class="high_price">
                                    <tr>
                                        <td> <label>Extra value product</label></td>
                                        <td> <label> Discount(%)</label> </td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td style="width:60%" class="Product_price">
                                            <select class="high_product form-control  extravalueproduct" name="extravalueproduct[]" extravalueproduct-id="1" id="extravalueproduct1">
                                                @if(!empty($product))
                                                @foreach($product as $product)
                                                <option value="{{$product->id}}">{{$product->product_name}}</option>
                                                @endforeach
                                                @endif
                                            </select>

                                        </td>
                                        <td style="width:30%">
                                            <input type="number" value="0" min="0" class="form-control discount" name="discount[]" discount-id="1" id="discount1">
                                        </td>
                                        <td style="width:10%;text-align: center;vertical-align:top;padding-top:14px;">
                                            <i class="fa-solid fa-plus"></i>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                            <div class="col-md-12 mt-3" id="product_img">
                                <label>Product Images</label>
                                <div class="file">
                                    <input accept="image/png, image/gif, image/jpeg" type="file" name="file" id="images" />
                                    <label for="images" class="dropzone"><i class="fa fa-upload"></i>Drop Files here</label>
                                    <span id="file_data"></span>
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="side_widget">
                            <div class="form-group">
                                <label>Category</label>
                                <select class="form-control mySelect2" name="fk_category_id" required>
                                    <option value="">Select Category</option>
                                    @if(!empty($category))
                                    @foreach($category as $category)
                                    <option value="{{$category->id}}">{{$category->category_name}}</option>
                                    @endforeach
                                    @endif
                                </select>
                            </div>
                        </div>

                        <div class="side_widget">
                            <div class="form-group">
                                <label>Status</label>
                                <select class="form-control mySelect2" name="fk_product_status_id" required>
                                    <option value="">Select Status</option>
                                    @if(!empty($category_status))
                                    @foreach($category_status as $category_status)
                                    <option value="{{$category_status->id}}">{{$category_status->name}}</option>
                                    @endforeach
                                    @endif
                                </select>
                            </div>
                        </div>
                        @foreach($product_type as $product_type)
                        <div class="side_widget enble_product">
                            <input type="radio" {{$product_type->id ==2?"checked":""}} class="vehicle1{{$product_type->id}}" name="vehicle1" value="{{$product_type->id}}">
                            <label for="vehicle1">{{$product_type->product_type_name}}</label>
                        </div>
                        @endforeach
                        <!-- <div class="side_widget enble_product">
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
        //$('.credit_value').css("display", "none");
        $('.vehicle11').click(function() {
            $("html, body").animate({
                scrollTop: 0
            }, "slow");
            if ($(".vehicle11").prop('checked') == true) {
                $('.high_price').css("display", "table");
                $(".high_product ").attr("required", "true");
                $('.credit_value').css("display", "none");
                $("#credit_value1").attr("required", "false");
                $(".discount ").attr("required", "true");
            } else {
                $('.vehicle11').prop('checked', false);
                $(".high_product").removeAttr("required");
                $(".discount").removeAttr("required");
                $('.high_price').css("display", "none");
                $('.credit_value').css("display", "none");
                $("#credit_value1").removeAttr("required");
            }
        });

        /*simple product */
        $('.vehicle12').click(function() {
            $("html, body").animate({
                scrollTop: 0
            }, "slow");
            if ($(".vehicle12").prop('checked') == true) {
                $('.high_price').css("display", "none");
                $('.credit_value').css("display", "none");
                $(".high_product ").attr("required", "false");
                $(".discount ").attr("required", "false");
                $("#credit_value1").removeAttr("required");
                $('.sale_price').css("display", "block");
                $('.oprice_price').css("display", "block");
            }
        });
        /* end simple product */

        /* get a quote */
        $('.vehicle13').click(function() {
            // if ($(".vehicle13").prop('checked') == true) {
            $("html, body").animate({
                scrollTop: 0
            }, "slow");
            $('.high_price').css("display", "none");
            $('.sale_price').css("display", "none");
            $('.credit_value').css("display", "none");
            $('.oprice_price').css("display", "none");
            $(".high_product ").attr("required", "false");
            $("#credit_value1").removeAttr("required");
            $(".price").prop("required", false);
            //  $(".price").attr("required", "false");
            $(".discount ").attr("required", "false");
            // }
        });

        /* End get a quote */
        /* get a quote */
        $('.vehicle14').click(function() {
            if ($(".vehicle14").prop('checked') == true) {
                $("html, body").animate({
                    scrollTop: 0
                }, "slow");
                $('.high_price').css("display", "none");
                $('.sale_price').css("display", "block");
                $('.credit_value').css("display", "block");
                $('.oprice_price').css("display", "block");
                $(".high_product ").attr("required", "false");
                $(".discount ").attr("required", "false");
                $("#credit_value1").addAttr("required");
            }
        });

        /* End get a quote */
        var i = 1;
        var my_array = [];
        $('.high_price td .fa-plus').click(function() {
            $(".high_product").each(function() {
                my_array.push($(this).val());

            })

            i++;
            $('.high_price').append('<tr class="dynamic_row">' +
                '<td style="width:60%"  class="Product_price">' +
                '<select class="high_product form-control" name="extravalueproduct[]" extravalueproduct-id="' + i + '" id="extravalueproduct' + i + '" required=""></select>' +
                '</td>' +
                ' <td style="width:30%">' +
                '<input  required="" value="0" min="0" type="number" class="form-control" name="discount[]" discount-id="' + i + '" id="discount' + i + '">' +
                '</td>' +
                ' <td style="width:10%;text-align: center;vertical-align:top;padding-top:14px;"  id="' +
                i + '">' +
                ' <i class="fa-solid fa-minus"></i>' +
                '</td>' +
                ' </tr>)');

          console.log(my_array);
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

        var i = 1;
        var my_array = [];
        $('.high_price1 td .fa-plus').click(function() {

            i++;
            $('.high_price1').append('<tr class="dynamic_row">' +
                '<td style="width:90%"  class="Product_price1">' +
                '<input style="margin-bottom:10px;"  placeholder="Title"   type="text" class="form-control" name="accord_title[]" accord_title-id="' + i + '" id="accord_title' + i + '">' + '<textarea placeholder="Description"  class="form-control" name="accord_description[]" accord_description-id="' + i + '" id="accord_description' + i + '"></textarea>' +
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