{{View::make('admin.header')}}
{{View::make('admin.sidebar')}}
<style>
        .quantity {
        position: relative;
        height: 40px;
        width: 60px;
        background: #f0f0f1;
    }

    .quantity .quantity__minus,
    .quantity .quantity__minuss {
        top: 0;
        visibility: hidden;
        position: absolute;
        right: 8px;
        height: 16px;
    }

    .quantity .quantity__plus,
    .quantity .quantity__pluss {
        visibility: hidden;
        position: absolute;
        right: 0;
        bottom: 0;
        height: 16px;
    }

    .quantity__input {
        height: 100%;
        width: 100%;
        top: 0;
        position: absolute;
    }


    .quantity .quantity__plus::before,
    .quantity .quantity__pluss::before {
        content: "\f0d7";
        position: absolute;
        top: -10px;
        right: 8px;
        color: #007bff;
        height: 10px;
        width: 10px;
        font-family: 'FontAwesome';
        visibility: visible;
        z-index: 1;
    }

    .quantity .quantity__minus::before,
    .quantity .quantity__minuss::before {
        content: "\f0d7";
        position: absolute;
        bottom: -10px;
        right: 0px;
        color: #007bff;
        height: 10px;
        width: 10px;
        font-family: 'FontAwesome';
        visibility: visible;
        z-index: 1;
        transform: rotate(180deg);
    }

    .quantity .quantity__minus, .quantity .quantity__minuss {
    top: auto;
    bottom: 0;
    height: 50%;
    width: 50%;
    right: 0;
}

.quantity .quantity__plus, .quantity .quantity__pluss {
    bottom: auto;
    top: 0;
    width: 50%;
    height: 50%;
    right: 0;
}


.quantity .quantity__minus::before, .quantity .quantity__minuss::before {
    right: 8px;
    top: -7px;
    transform: initial;
}

.quantity .quantity__plus::before, .quantity .quantity__pluss::before {
    transform: rotate(180deg);
    bottom: -7px;
    top: auto;
}

table.cart_table.table tr {
    background: #80b8e424;
}

.quantity__input {border: 1px solid gray;border-right: 0px;border-left: 0px;padding: 10px;}
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
                <h4>Create New Order</h4>
                <a href="{{ url()->previous() }}" class="btn btn-primary">Back to Orders</a>
            </div>

            <form action="{{route('storeneworder')}}" id="demo-form" data-parsley-validate="" enctype="multipart/form-data" method="POST">
                @csrf
                <div class="form-group">
                    <label for="">Select account</label>
                    <select name="user_id" class="form-select form-control mySelect2" id="prepend-text-single-field" data-placeholder="Type to search with name" required>
                        <option></option>
                        @if(!empty($user))
                        @foreach($user as $user)
                        <option value="{{$user->id}}">{{$user->name}} {{$user->last_name}}</option>
                        @endforeach
                        @endif
                    </select>
                    <!-- <input type="text" name="" id="" placeholder="Type to search with name or email" class="form-control" required=""> -->
                </div>
                <div class="form-group">
                    <label for="">Note</label>
                    <input type="text" name="order_details" id="" placeholder="Add order note" class="form-control" required="">
                </div>
                <div class="container p-0">
                    <div class="card mt-3">
                        <div class="card-body p-3 text-right">
                            <button type="button" class="add_items btn btn-primary"> <i class="fa-solid fa-plus"></i> Add Item </button>
                        </div>
                        <div class="table-responsive">
                            <table class="table orders_table">
                                <thead>
                                    <tr>
                                        <th>Items</th>
                                        <th>Price</th>
                                        <th>Qty</th>
                                        <th>Subtotal</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <tr class="total_row">
                                        <td colspan="2"></td>
                                        <td>Total</td>
                                        <td class="text-end">
                                            <div class="sa-price">{{$getCurrency->symbol}}<span class="sa-pric1">00</span></div>
                                        </td>
                                        <td></td>
                                    </tr>
                                </tbody>
                            </table>

                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group mt-4 col-md-5">
                            <label>Status: </label>
                            <select class="form-control" name="order_status">
                                @if(!empty($order_status))
                                @foreach($order_status as $order_status)
                                <option value="{{$order_status->id}}">{{$order_status->order_status_name}}</option>
                                @endforeach
                                @endif
                            </select>
                        </div>
                    </div>
                    <div class="btns_update">
                        <button type="submit" class="btn btn-primary mr-2"> Create </button>
                        <a href="{{ url()->previous() }}" class="btn" style="border:1px solid #dbdbdb">Cancel </a>
                    </div>
                </div>
            </form>

        </div>
    </div>
</section>
{{View::make('admin.footer')}}
<script>
    $(document).ready(function() {

        var getCurrency = "<?php echo   $getCurrency->symbol ?>";
        var i = 0;
        var currency = "<?php echo $getCurrency->symbol;  ?>"
        var my_array = [];
        $(".add_items").click(function() {
            i++;
            event.preventDefault();
            var add_row = '<tr class="order_row order_row' + i + '">' +
                '<td><select required class="form-control mySelect2 extravalueproduct"   name="extravalueproduct[]" extravalueproduct-id="' + i + '" id="extravalueproduct' + i + '"></select></td>' +
                '<td><input class="priceUnit'+i+'" name="priceUnit[]" type="hidden"/><div class="sa-price" price-id=' + i + ' id="sa-price' + i + '">' + getCurrency + '<span  id="sa-price1' + i + '">0,000.00</span></div></td>' +
                '<td><div class="quantity"><a href="#" class="quantity__minuss" data-id="' + i + '"><span>-</span></a><input class="quantity__input subProductQuantity' + i + '" subProductQuantity-id="' + i + '" type="text" name="subProductQuantity[]" min="1" value="1"><a href="#" class="quantity__pluss" data-id="' + i + '"><span>+</span></a></div></td>' +
                '<td><div class="sa-price" subprice-id="' + i + '" id="sub-price' + i + '">' + getCurrency + '<span  id="sub-price1' + i + '">0,000.00</span></div></td>' +
                '<td class="hide_tab"><span data-id="' + i + '" class="remove_item remove_item' + i + '"><i class="fa-solid fa-minus"></i></span></td>' +
                '</tr>';
            $('.orders_table .total_row').before(add_row);

            $.ajax({
                url: "{{ url('admin/get-extra-value-product')}}",
                type: "get",
                data: {
                    data: 1,
                    _token: '{{ csrf_token() }}'
                },
                dataType: 'json',
                success: function(response) {
                    // <option value="" disabled selected>Select Service</option>
                    $.each(response, function(key, value) {
                        var option = $('<option value="' + value.id +
                            '">' + value.product_name +
                            '</option>');
                        $('#extravalueproduct' + i + '').append(option);
                        if (key == 1) {
                            $('#extravalueproduct' + i + '').prepend('<option value="" disabled selected>Select Service</option>');
                        }
                    });
                }
            });

        });

        // set value om change 
        var productIdArray = [];
        $(document).on('change', '.extravalueproduct', function() {
            var productId = $(this).val();
            dataId = $(this).attr("extravalueproduct-id");
            if (jQuery.inArray(productId, productIdArray) !== -1) {
                $(".order_row" + dataId).remove();
                alert("Already added");
            } else {
                productIdArray.push(productId);

                $.ajax({
                    url: "{{ url('admin/get-extra-value-product-by-id')}}",
                    type: "get",
                    data: {
                        data: productId,
                        _token: '{{ csrf_token() }}'
                    },
                    dataType: 'json',
                    success: function(response) {
                     
                        $(".priceUnit" + dataId + "").val(Number(response));
                        $("#sa-price1" + dataId + "").text(Number(response));
                        $("#sub-price1" + dataId + "").text(Number(response));
                        myFunctionOnchange(dataId, response);
                    }
                });
            }

        });

        // inc and dec

        /*subProductQuantity*/
        // const minuss = $('.quantity__minuss');
        // const pluss = $('.quantity__pluss');
        //  minuss.click(function(e) {
        $(document).on('click', '.quantity__minuss', function(e) {
            e.preventDefault();
            dataId = $(this).attr("data-id");

            var value = Number($(".subProductQuantity" + dataId + "").val());
            if (value > 1) {
                value--;
                var spric1 = $(".sa-pric1").text();

                var saprice1 = $("#sa-price1" + dataId).text();
                $(".subProductQuantity" + dataId + "").val(value);
                $("#sub-price1" + dataId + "").text(saprice1 * value);

                $(".sa-pric1").text(Number(spric1) - Number(saprice1));
            }



        });

        $(document).on('click', '.quantity__pluss', function(e) {
            e.preventDefault();
            dataId = $(this).attr("data-id");
            var value = Number($(".subProductQuantity" + dataId + "").val());
            value++;
            var saprice1 = $("#sa-price1" + dataId).text();
            $(".subProductQuantity" + dataId + "").val(value);
            $("#sub-price1" + dataId + "").text(saprice1 * value);
            //alert(Number(saprice1) * Number(value));
            var spric1 = $(".sa-pric1").text();
            $(".sa-pric1").text(Number(spric1) + Number(saprice1));


        })

        function myFunctionOnchange(dataId, price) {

            var spric1 = $(".sa-pric1").text();
            //alert(spric1);
            var price = $("#sub-price1" + dataId).text();

            $(".sa-pric1").text(Number(spric1) + Number(price));
        }


        $(document).on('click', '.remove_item', function() {
            var dataId = $(this).attr("data-id");
            var price = $("#sub-price1" + dataId).text();
            var spric1 = $(".sa-pric1").text();
            $(".sa-pric1").text(Number(spric1) - Number(price));
            $(this).parents('tr').remove();
        });
    });
</script>