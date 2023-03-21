<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use DB;

class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function dashboard()
    {
        return view('admin.dashboard');
    }

    public function orderDelete($id)
    {

        if ($id) {
            DB::table('order')
                ->where('id', '=', $id)
                ->update([
                    'soft_delete' => 1,
                ]);

            return redirect()->route('orders')
                ->with('success', 'Order deleted');
        } else {

            return redirect()->route('orders')
                ->with('error', 'Order not deleted');
        }
    }
    public function orders()
    {

        $user_id =  auth()->id();



        $userOrder = DB::table('order')
            ->select('order.*', 'users.*', 'order.id as oId', 'order.created_at as oCreated_at', 'order_status.order_status_name as order_status_name', 'order_status.id as order_status_id')
            ->leftJoin('users', 'users.id', '=', 'order.fk_user_id')
            ->leftJoin('order_status', 'order_status.id', '=', 'order.order_status')
            ->where('order.soft_delete', '=', 0)
            ->orderBy('order.id', 'DESC')
            ->get();
        $getCurrency = DB::table('currency')
            ->select('currency.*')
            ->leftJoin('global_option', 'global_option.fk_currency_id', '=', 'currency.id')
            ->first();


        return view('admin.orders', ['userOrder' => $userOrder, 'getCurrency' => $getCurrency]);
    }
    public function newOrder()
    {

        $user = DB::table('users')
            ->select('*')
            ->where('fk_role_id', '!=', 1)
            ->get();

        $order_status = DB::table('order_status')
            ->select('*')
            ->get();


        $getCurrency = DB::table('currency')
            ->select('currency.*')
            ->leftJoin('global_option', 'global_option.fk_currency_id', '=', 'currency.id')
            ->first();

        return view('admin.new-order', ['user' => $user, 'getCurrency' => $getCurrency, 'order_status' => $order_status]);
    }

    public function storeNewOrder(Request $request)
    {

        $productId = $request->extravalueproduct;
        $subProductQuantity = $request->subProductQuantity;
        $priceUnit = $request->priceUnit;
        $order_details = $request->order_details;
        $order_status = $request->order_status;
        $user_id = $request->user_id;
        if (!empty($productId)) {
            $insertGetId  = DB::table('order')->insertGetId([
                'fk_user_id' =>    $user_id,
                "order_details" => $order_details,
                "order_status" => $order_status
            ]);

            foreach ($productId as $key => $productId) {
                DB::table('order_meta')->insert([
                    'fk_order_id' => $insertGetId,
                    'fk_product_id' => $productId,
                    'price' => $priceUnit[$key],
                    'total_payment' => $priceUnit[$key] * $subProductQuantity[$key],
                    'quantity' => $subProductQuantity[$key],
                ]);
            }
            return redirect()->route('orders')
                ->with('success', 'Order Added.');
        } else {
            return redirect()->route('neworder')
                ->with('error', 'Please choose at least one service.');
        }
    }
    public function AllTickets(Request $request)
    {


        return view('admin.all-tickets');
    }
    public function CreateTicket(Request $request)
    {
       
        return view('admin.create-ticket');
    }
    public function StoreTicket(Request $request)
    {

       
            return redirect()->route('alltickets')
                ->with('success', 'Ticket created successfully.');
       
    }
    public function OrderDetails($id)
    {
        //$orderId = $equest->id;
        $orderId =  DB::table('order')
            ->select('*')
            ->where('id', '=', $id)
            ->first();

        if ($orderId != null) {
            $order_meta =   DB::table('order_meta')
                ->select('product.*', 'order_meta.*')
                ->leftJoin('product', 'product.id', '=', 'order_meta.fk_product_id')
                ->where('order_meta.fk_order_id', '=', $id)
                ->orderBy('order_meta.id', 'DESC')
                ->get();

            $UserOrder =   DB::table('order')
                ->select('order.*', 'users.*', 'order.id as oId', 'order.created_at as order_created_at', 'order_status.*')
                ->leftJoin('users', 'users.id', '=', 'order.fk_user_id')
                ->leftJoin('order_status', 'order_status.id', '=', 'order.order_status')
                ->where('order.id', '=', $id)
                ->where('order.soft_delete', '=', 0)
                ->first();

            return view('admin.order-details', ['order_meta' => $order_meta, 'UserOrder' => $UserOrder]);
        } else {
            return redirect()->route('orders')
                ->with('error', 'Server Erro.');
        }
    }
    public function EditOrder($id)
    {
        $order =  DB::table('order')
            ->select('*')
            ->where('id', '=', $id)
            ->first();
        if ($order != null) {
            $order_meta =   DB::table('order_meta')
                ->select('product.*', 'order_meta.*')
                ->leftJoin('product', 'product.id', '=', 'order_meta.fk_product_id')
                ->where('order_meta.fk_order_id', '=', $id)
                ->orderBy('order_meta.id', 'DESC')
                ->get();

            $product = DB::table('product')
                ->select('*')
                ->where('soft_delete', '=', 0)
                ->get();

            $order_status =   DB::table('order_status')
                ->select('*')
                ->get();


            $UserOrder =   DB::table('order')
                ->select('order.*', 'users.*', 'order.id as oId', 'order.created_at as order_created_at', 'order_status.*')
                ->leftJoin('users', 'users.id', '=', 'order.fk_user_id')
                ->leftJoin('order_status', 'order_status.id', '=', 'order.order_status')
                ->where('order.id', '=', $id)
                ->where('order.soft_delete', '=', 0)
                ->first();

            $getCurrency = DB::table('currency')
                ->select('currency.*')
                ->leftJoin('global_option', 'global_option.fk_currency_id', '=', 'currency.id')
                ->first();

            return view('admin.edit-order', ['UserOrder' => $UserOrder, 'order_meta' => $order_meta, 'currency' => $getCurrency, 'product' => $product, 'order_status' => $order_status]);
        } else {
            return redirect()->route('orders')
                ->with('error', 'Server Erro.');
        }
    }

    public function StoreEditOrder(Request $request)
    {


        $extravalueproduct = $request->extravalueproduct;
        $OrderId = $request->oId;
        $order_status = $request->order_status;
        $priceUnit = $request->priceUnit;
        $subProductQuantity = $request->subProductQuantity;

        foreach ($extravalueproduct as  $key => $value) {
            $productId =  intval($value);
            $priceUnit1 =   $priceUnit[$key];

            $orderMetaExist =   DB::table('order_meta')
                ->select('*')
                ->where('fk_order_id', '=', $OrderId)
                ->where('fk_product_id', '=', $productId)
                ->get();
            if (!empty($orderMetaExist)) {
                DB::table('order_meta')
                    ->where('fk_order_id', '=',  $OrderId)
                    ->where('fk_product_id', '=', $productId)
                    ->update([
                        'quantity' => $subProductQuantity[$key],
                        "price" => $priceUnit1,
                        "total_payment" => $priceUnit1 * $subProductQuantity[$key]
                    ]);
            }
        }

        DB::table('order')
            ->where('id', '=',  $OrderId)
            ->update([
                'order_status' => $order_status,
            ]);

        return redirect()->route('orders')
            ->with('success', 'Order Updated.');
    }
    public function deleteUser($id)
    {
        $userId  =  $id;

        $userUpdate =   DB::table('users')->where('id', $userId)->update(array('soft_delete' => 1));
        if ($userUpdate) {
            return redirect()->route('alluser')
                ->with('success', 'User deleted successfully.');
        }
    }
    public function TicketDetails($id)
    {
        

        return view('admin.ticket-details');
    }

    public function TicketReplay(Request $request)
    {

            return redirect()->route('alltickets')
                ->with('success', 'Ticket created successfully.');
       
    }
    public function deleteticket(Request $request, $id)
    {

        
    }


    public function EditTicket(Request $request, $id)
    {
      
            return view('admin.edit-ticket');
      
    }
    public function updateTicket(Request $request)
    {
      
    }
    public function AllUser(Request $request)
    {


        $allUsers = DB::table('users');


        if ($request->type != "all") {

            if ($request->name != null) {
                $allUsers = $allUsers
                    ->where('name', 'like', '%' . $request->name . '%')
                    // ->Where('fk_role_id', 'like', '%' . $request->type . '%')
                    ->orWhere('last_name', 'like', '%' . $request->name . '%');
            }

            if ($request->type != null) {
                $allUsers = $allUsers
                    ->Where('fk_role_id', 'like', '%' . $request->type . '%');
            }
        }




        $allUsers =  $allUsers
            ->select('*')
            ->where('soft_delete', '=', 0)
            // ->where('fk_role_id', '!=', 1)
            ->orderBy('id', 'DESC')
            ->paginate(10);

        $UserTypes = DB::table('roles')
            ->select('*')
            ->get();

        return view('admin.all-user', ['allUsers' => $allUsers, 'UserTypes' => $UserTypes]);
    }
    public function AddUser(Request $request)
    {
        $UserTypes = DB::table('roles')
            ->select('*')
            ->get();

        $countries = DB::table('countries')
            ->select('*')
            ->get();

        $cities = DB::table('cities')
            ->select('*')
            ->get();

        return view('admin.add-user', ['UserTypes' => $UserTypes, 'countries' => $countries, 'cities' => $cities]);
    }
    public function StoreUser(Request $request)
    {

        $validatedData = $request->validate([
            'email' => [
                'required',
                'email',
                Rule::unique('users')
            ],
            'password' => 'required|min:6|confirmed',
        ]);

        $name = $request->name;
        $last_name = $request->last_name;
        $fk_role_id = $request->fk_role_id;
        $company_name = $request->company_name;
        $email = $request->email;
        $phone_number = $request->phone_number;
        $fk_country_id = $request->country;
        $fk_city_id = $request->city;
        // $phone_code = $request->phone_code;
        $password = $request->password;
        $address_line1 = $request->address_line1;
        $address_line2 = $request->address_line2;
        $hashedPassword = bcrypt($password);

        $insertUsers = DB::table('users')->insert([
            'fk_role_id' => $fk_role_id,
            'name' => $name,
            'last_name' => $last_name,
            "company_name" => $company_name,
            "email" => $email,
            //"phone_code" => $phone_code,
            "fk_country_id" => $fk_country_id,
            "fk_city_id" => $fk_city_id,
            "address_line1" => $address_line1,
            "address_line2" => $address_line2,
            'phone_number' => $phone_number,
            'password' => $hashedPassword
        ]);
        if ($insertUsers) {
            return redirect()->route('alluser')
                ->with('success', 'User created successfully.');
        }
    }
    public function EditUser(Request $request, $id)
    {
        $users =  DB::table('users')
            ->select('*')
            ->where('id', '=', $id)
            ->first();
        if ($users != null) {

            $user = DB::table('users')
                ->select('*')
                ->where('id', '=', $id)
                ->first();

            $countries = DB::table('countries')
                ->select('*')
                ->get();

            $cities = DB::table('cities')
                ->select('*')
                ->where('country_id', '=', $user->fk_country_id)
                ->get();

            return view('admin.edit-user', ['user' => $user, 'countries' => $countries, 'cities' => $cities]);
        } else {
            return redirect()->route('alluser')
                ->with('error', 'Server error.');
        }
    }
    public function updateUser(Request $request)
    {

        $name = $request->name;
        $last_name = $request->last_name;
        $id = $request->id;
        $company_name = $request->company_name;
        $email = $request->email;
        $phone_number = $request->phone_number;
        $fk_country_id = $request->country;
        $fk_city_id = $request->city;
        $position = $request->position;
        // $phone_code = $request->phone_code;
        $address_line1 = $request->address_line1;
        $address_line2 = $request->address_line2;
        $updateUsers = DB::table('users')
            ->where('id', '=', $id)
            ->update([
                'name' => $name,
                'last_name' => $last_name,
                "company_name" => $company_name,
                "email" => $email,
                "position" => $position,
                "fk_country_id" => $fk_country_id,
                "fk_city_id" => $fk_city_id,
                "address_line1" => $address_line1,
                // "phone_code" => $phone_code,
                "address_line2" => $address_line2,
                'phone_number' => $phone_number,
                'updated_at' => now()
            ]);
        if ($updateUsers) {
            return redirect()->route('alluser')
                ->with('success', 'User updated successfully.');
        }
    }
    public function userdetails(Request $request, $id)
    {

        $users =  DB::table('users')
            ->select('*')
            ->where('id', '=', $id)
            ->first();
        if ($users != null) {
            $user = DB::table('users')
                ->select('users.*', 'roles.name as role_name', 'countries.name as countries_name', 'cities.name as cities_name')
                ->leftJoin('roles', 'roles.id', '=', 'users.fk_role_id')
                ->leftJoin('countries', 'countries.id', '=', 'users.fk_country_id')
                ->leftJoin('cities', 'cities.id', '=', 'users.fk_city_id')
                ->where('users.id', '=', $id)
                ->first();

            return view('admin.user-details', ['user' => $user]);
        } else {
            return redirect()->route('alluser')
                ->with('error', 'Server Error.');
        }
    }
    public function PasswordAdmin()
    {
        return view('admin.account.password');
    }
    public function AllProduct()
    {
        //get currency

        $getCurrency = DB::table('currency')
            ->select('currency.*')
            ->leftJoin('global_option', 'global_option.fk_currency_id', '=', 'currency.id')
            ->first();


        $product = DB::table('product')
            ->select('*', 'product.id as pid')
            ->where('product.soft_delete', '=', 0)
            ->leftJoin('category', 'category.id', '=', 'product.fk_category_id')
            ->orderBy('product.id', 'desc')
            ->get();
        // dd($product);
        return view('admin.all-product', ['product' => $product, 'getCurrency' => $getCurrency]);
    }

    public function AddProduct()
    {
        $product_status  =  DB::table('product_status')
            ->select('*')
            ->get();

        $category  =  DB::table('category')
            ->select('*')
            ->where('soft_delete', '=', 0)
            ->where('fk_category_status', '=', 1)
            ->get();

        $product  =  DB::table('product')
            ->select('*')
            ->where('soft_delete', '=', 0)
            ->get();

        $product_type =  DB::table('product_type')
            ->select('*')
            ->get();
        // dd($product );
        return view('admin.add-product', ['category' => $category, 'category_status' => $product_status, 'product' => $product, 'product_type' => $product_type]);
    }

    public function GetExtraValueProduct(Request $request)
    {

        $product  =  DB::table('product')
            ->select('*')
            ->where('soft_delete', '=', 0)
            // ->whereNotIn('id', $request->id)
            ->get();
        echo  $product;
    }
    public function GetExtraValueProductById(Request $request)
    {

        $productId = $request->data;
        $price = 0;
        $totalPrice = 0;
        $totalPricee = 0;
        $extra_value_products  =  DB::table('product')
            ->select('product.*', 'extra_value_products.discount as discount', 'extra_value_products.fk_extra_value_products as fk_extra_value_products')
            ->leftJoin('extra_value_products', 'extra_value_products.fk_extra_value_products', '=', 'product.id')
            ->where('product.soft_delete', '=', 0)
            //  ->where('extra_value_products.fk_product_id', '=',  $productId)
            ->where('extra_value_products.fk_product_id', '=', $productId)
            ->get();
        if (empty($extra_value_products)) {
            $totalPricee = 0;
            $product  =  DB::table('product')
                ->select('*')
                ->where('soft_delete', '=', 0)
                ->where('id', $productId)
                ->get();


            $original_price = $product[0]->original_price;
            $sale_price = $product[0]->sale_price;
            if ($sale_price > 0) {
                $price =  $sale_price;
            } else {
                $price =  $original_price;
            }
            $totalPrice =  $price;
        } else {

            $producte  =  DB::table('product')
                ->select('*')
                ->where('soft_delete', '=', 0)
                ->where('id', $productId)
                ->get();

            $original_pricee = $producte[0]->original_price;
            $sale_pricee = $producte[0]->sale_price;
            if ($sale_pricee > 0) {
                $pricee =  $sale_pricee;
            } else {
                $pricee =  $original_pricee;
            }
            $totalPricee =  $pricee;

            foreach ($extra_value_products as $extra_value_products) {

                $discount = $extra_value_products->discount;
                $original_price = $extra_value_products->original_price;
                $sale_price = $extra_value_products->sale_price;
                if ($sale_price > 0) {
                    $price =  $sale_price;
                } else {
                    $price =  $original_price;
                }

                $totalPrice  =  $totalPrice + $price * $discount / 100;
            }
        }

        echo  $totalPrice + $totalPricee;
    }

    public function StoreProduct(Request $request)
    {

        $productType = $request->vehicle1;


        if ($productType == 4) {
            $original_price = (int) $request->original_price;
            $sale_price = (int) $request->sale_price;
            if ($original_price >  $sale_price) {
                $product_name = $request->product_name;
                $description = $request->description;
                $discount = $request->discount;
                $credit_value = $request->credit_value;
                //$extravalueproduct = $request->extravalueproduct;
                $accord_description = $request->accord_description;
                $title = $request->accord_title;
                $fk_category_id = $request->fk_category_id;
                $fk_product_status_id = $request->fk_product_status_id;
                $file = $request->file('file');


                if (isset($file)) {
                    $filename = time() . rand(1, 100) . '.' . $file->getClientOriginalExtension();
                    $file->move(public_path('images/products'), $filename);
                } else {
                    $filename = "";
                }

                $insertProduct = DB::table('product')->insertGetId([
                    'product_name' => $product_name,
                    'description' =>  $description,
                    'fk_category_id' =>  $fk_category_id,
                    'fk_product_status_id' =>  $fk_product_status_id,
                    'original_price' =>  $original_price,
                    'sale_price' =>  $sale_price,
                    'product_type' => $productType,
                    'credit_value' => $credit_value,
                    'image' =>   $filename,
                ]);


                return redirect()->route('allproduct')
                    ->with('success', 'Product added successfully.');
            } else {
                return redirect()->route('addproduct')
                    ->with('error', 'Original price can not be less than sale price.');
            }
        }
        // standard product
        if ($productType == 2 || $productType == 2) {
            $original_price = (int) $request->original_price;
            $sale_price = (int) $request->sale_price;
            if ($original_price >  $sale_price) {
                $product_name = $request->product_name;
                $description = $request->description;
                $discount = $request->discount;
                //$extravalueproduct = $request->extravalueproduct;
                $accord_description = $request->accord_description;
                $title = $request->accord_title;
                $fk_category_id = $request->fk_category_id;
                $fk_product_status_id = $request->fk_product_status_id;
                $file = $request->file('file');


                if (isset($file)) {
                    $filename = time() . rand(1, 100) . '.' . $file->getClientOriginalExtension();
                    $file->move(public_path('images/products'), $filename);
                } else {
                    $filename = "";
                }

                $insertProduct = DB::table('product')->insertGetId([
                    'product_name' => $product_name,
                    'description' =>  $description,
                    'fk_category_id' =>  $fk_category_id,
                    'fk_product_status_id' =>  $fk_product_status_id,
                    'original_price' =>  $original_price,
                    'sale_price' =>  $sale_price,
                    'product_type' => $productType,
                    'image' =>   $filename,
                ]);

                if ($insertProduct) {
                    foreach ($accord_description as $key => $value) {
                        if ($value != null && $title[$key] != null) {
                            DB::table('prooduct_accordion')->insert([
                                'fk_product_id' => $insertProduct,
                                'description' => $value,
                                'title' => $title[$key],
                            ]);
                        }
                    }
                    sleep(2);
                    return redirect()->route('allproduct')
                        ->with('success', 'Product added successfully.');
                } else {
                    return redirect()->route('addproduct')
                        ->with('error', 'Server error.');
                }
            } else {
                return redirect()->route('addproduct')
                    ->with('error', 'Original price can not be less than sale price.');
            }
        }

        if ($productType == 3) {
            $product_name = $request->product_name;
            $description = $request->description;

            //$extravalueproduct = $request->extravalueproduct;
            $accord_description = $request->accord_description;
            $title = $request->accord_title;
            $fk_category_id = $request->fk_category_id;
            $fk_product_status_id = $request->fk_product_status_id;
            $file = $request->file('file');


            if (isset($file)) {
                $filename = time() . rand(1, 100) . '.' . $file->getClientOriginalExtension();
                $file->move(public_path('images/products'), $filename);
            } else {
                $filename = "";
            }

            $insertProduct = DB::table('product')->insertGetId([
                'product_name' => $product_name,
                'description' =>  $description,
                'fk_category_id' =>  $fk_category_id,
                'fk_product_status_id' =>  $fk_product_status_id,
                'product_type' => $productType,
                'image' =>   $filename,
            ]);

            if ($insertProduct) {
                foreach ($accord_description as $key => $value) {
                    if ($value != null && $title[$key] != null) {
                        DB::table('prooduct_accordion')->insert([
                            'fk_product_id' => $insertProduct,
                            'description' => $value,
                            'title' => $title[$key],
                        ]);
                    }
                }
                sleep(2);
                return redirect()->route('allproduct')
                    ->with('success', 'Product added successfully.');
            } else {
                return redirect()->route('addproduct')
                    ->with('error', 'Server error.');
            }
        }
        /* end of standard product */
        /* extra value product */
        if ($productType == 1) {
            $original_price = (int) $request->original_price;
            $sale_price = (int) $request->sale_price;

            if ($original_price >  $sale_price) {
                $product_name = $request->product_name;
                $description = $request->description;
                $discount = $request->discount;
                $extravalueproduct = $request->extravalueproduct;
                $accord_description = $request->accord_description;
                $title = $request->accord_title;
                $fk_category_id = $request->fk_category_id;
                $fk_product_status_id = $request->fk_product_status_id;
                $file = $request->file('file');
                if ($request->vehicle1 == 1) { // extra value product 
                    if (isset($file)) {
                        $filename = time() . rand(1, 100) . '.' . $file->getClientOriginalExtension();
                        $file->move(public_path('images/products'), $filename);
                    }

                    $insertGetId = DB::table('product')->insertGetId([
                        'product_name' => $product_name,
                        'description' =>  $description,
                        'fk_category_id' =>  $fk_category_id,
                        'fk_product_status_id' =>  $fk_product_status_id,
                        'original_price' =>  $original_price,
                        'sale_price' =>  $sale_price,
                        'product_type' => $productType,
                        'image' =>   $filename,
                    ]);
                    if (isset($insertGetId)) {
                        foreach ($extravalueproduct as $key => $value) {
                            DB::table('extra_value_products')->insert([
                                'fk_product_id' => $insertGetId,
                                'fk_extra_value_products' => $value,
                                'discount' => $discount[$key],
                            ]);
                        }
                        foreach ($accord_description as $key => $value) {
                            if ($value != null && $title[$key] != null) {
                                DB::table('prooduct_accordion')->insert([
                                    'fk_product_id' => $insertGetId,
                                    'description' => $value,
                                    'title' => $title[$key],
                                ]);
                            }
                        }
                        sleep(2);
                        return redirect()->route('allproduct')
                            ->with('success', 'Product added successfully.');
                    } else {
                        return redirect()->route('addproduct')
                            ->with('error', 'Server error.');
                    }
                } else { //simple product product

                    if (isset($file)) {
                        $filename = time() . rand(1, 100) . '.' . $file->getClientOriginalExtension();
                        $file->move(public_path('images/products'), $filename);
                    } else {
                        $filename = "";
                    }
                    $insertProduct = DB::table('product')->insertGetId([
                        'product_name' => $product_name,
                        'description' =>  $description,
                        'fk_category_id' =>  $fk_category_id,
                        'fk_product_status_id' =>  $fk_product_status_id,
                        'original_price' =>  $original_price,
                        'sale_price' =>  $sale_price,
                        'product_type' => $productType,
                        'image' =>   $filename,
                    ]);

                    if ($insertProduct) {
                        foreach ($accord_description as $key => $value) {
                            if ($value != null && $title[$key] != null) {
                                DB::table('prooduct_accordion')->insert([
                                    'fk_product_id' => $insertProduct,
                                    'description' => $value,
                                    'title' => $title[$key],
                                ]);
                            }
                        }
                        sleep(2);
                        return redirect()->route('allproduct')
                            ->with('success', 'Product added successfully.');
                    } else {
                        return redirect()->route('addproduct')
                            ->with('error', 'Server error.');
                    }
                }
            } else {
                return redirect()->route('addproduct')
                    ->with('error', 'Original price can not be less than sale price.');
            }
        }
    }

    public function updateProduct(Request $request)
    {

        //dd($request);
        $productType = $request->vehicle1;
        $original_price = (int) $request->original_price;
        $pid = (int) $request->pid;
        $sale_price = (int) $request->sale_price;
        if ($productType == 2 || $productType == 4) {
            if ($original_price >  $sale_price) {
                $product_name = $request->product_name;
                $description = $request->description;
                // $discount = $request->discount;
                // $extravalueproduct = $request->extravalueproduct;
                $accord_description = $request->accord_description;
                $title = $request->accord_title;
                $fk_category_id = $request->fk_category_id;
                $fk_product_status_id = $request->fk_product_status_id;
                $file = $request->file('file');


                $extra_value_products_delete =  DB::table('extra_value_products')
                    ->select('*')
                    ->where('fk_product_id', '=', $pid)
                    ->get();

                if ($extra_value_products_delete != null) {
                    DB::table('extra_value_products')->where('fk_product_id', $pid)->delete();
                }

                $prooduct_accordion_delete =  DB::table('prooduct_accordion')
                    ->select('*')
                    ->where('fk_product_id', '=', $pid)
                    ->get();

                if ($prooduct_accordion_delete != null) {
                    DB::table('prooduct_accordion')->where('fk_product_id', $pid)->delete();
                }

                if (isset($file)) {
                    $filename = time() . rand(1, 100) . '.' . $file->getClientOriginalExtension();
                    $file->move(public_path('images/products'), $filename);
                } else {
                    $filename = $request->hiddenImage;
                }

                foreach ($accord_description as $key => $value) {
                    DB::table('prooduct_accordion')->insert([
                        'fk_product_id' => $pid,
                        'description' => $value,
                        'title' => $title[$key],
                    ]);
                }

                DB::table('product')->where('id', '=', $pid)
                    ->update([
                        'product_name' => $product_name,
                        'description' =>  $description,
                        'fk_category_id' =>  $fk_category_id,
                        'fk_product_status_id' =>  $fk_product_status_id,
                        'original_price' =>  $original_price,
                        'sale_price' =>  $sale_price,
                        'product_type' => $productType,
                        'image' =>   $filename,
                    ]);

                return redirect()->route('allproduct')
                    ->with('success', 'Product added successfully.');
            } else {
                return redirect()->route('addproduct')
                    ->with('error', 'Original price can not be less than sale price.');
            }
        }

        //combo product 

        if ($productType == 1) {
            if ($original_price >  $sale_price) {
                $product_name = $request->product_name;
                $description = $request->description;
                $discount = $request->discount;
                $extravalueproduct = $request->extravalueproduct;
                $accord_description = $request->accord_description;
                $title = $request->accord_title;
                $fk_category_id = $request->fk_category_id;
                $fk_product_status_id = $request->fk_product_status_id;
                $file = $request->file('file');
                if ($request->vehicle1 == 1) { // extra value product 

                    $extra_value_products_delete =  DB::table('extra_value_products')
                        ->select('*')
                        ->where('fk_product_id', '=', $pid)
                        ->get();
                    $delete_extra_value_products = null;
                    $delete_prooduct_accordion_delete = null;
                    $delete = null;
                    if ($extra_value_products_delete != null) {
                        DB::table('extra_value_products')->where('fk_product_id', $pid)->delete();
                    }

                    $prooduct_accordion_delete =  DB::table('prooduct_accordion')
                        ->select('*')
                        ->where('fk_product_id', '=', $pid)
                        ->get();

                    if ($prooduct_accordion_delete != null) {
                        DB::table('prooduct_accordion')->where('fk_product_id', $pid)->delete();
                    }
                    // if ($delete_extra_value_products &&  $delete_prooduct_accordion_delete) {
                    if (isset($file)) {
                        $filename = time() . rand(1, 100) . '.' . $file->getClientOriginalExtension();
                        $file->move(public_path('images/products'), $filename);
                    } else {
                        $filename = $request->hiddenImage;
                    }
                    DB::table('product')->where('id', '=', $pid)
                        ->update([
                            'product_name' => $product_name,
                            'description' =>  $description,
                            'fk_category_id' =>  $fk_category_id,
                            'fk_product_status_id' => $fk_product_status_id,
                            'original_price' => $original_price,
                            'sale_price' => $sale_price,
                            'product_type' => $productType,
                            'image' => $filename,
                        ]);
                    // if (isset($insertGetId)) {
                    foreach ($extravalueproduct as $key => $value) {
                        DB::table('extra_value_products')->insert([
                            'fk_product_id' => $pid,
                            'fk_extra_value_products' => $value,
                            'discount' => $discount[$key],
                        ]);
                    }
                    foreach ($accord_description as $key => $value) {
                        DB::table('prooduct_accordion')->insert([
                            'fk_product_id' => $pid,
                            'description' => $value,
                            'title' => $title[$key],
                        ]);
                    }
                    sleep(2);
                    return redirect()->route('allproduct')
                        ->with('success', 'Product updated successfully.');
                    // } else {
                    //     return redirect()->route('allproduct')
                    //         ->with('error', 'Server error.');
                    // }
                    // } else {
                    //     return redirect()->route('allproduct')
                    //         ->with('error', 'Server error.');
                    // }
                } else { //simple product product

                    $extra_value_products_delete =  DB::table('extra_value_products')
                        ->select('*')
                        ->where('fk_product_id', '=', $pid)
                        ->get();

                    if ($extra_value_products_delete != null) {
                        DB::table('extra_value_products')->where('fk_product_id', $pid)->delete();
                    }

                    $prooduct_accordion_delete =  DB::table('prooduct_accordion')
                        ->select('*')
                        ->where('fk_product_id', '=', $pid)
                        ->get();

                    if ($prooduct_accordion_delete != null) {
                        DB::table('prooduct_accordion')->where('fk_product_id', $pid)->delete();
                    }

                    if (isset($file)) {
                        $filename = time() . rand(1, 100) . '.' . $file->getClientOriginalExtension();
                        $file->move(public_path('images/products'), $filename);
                    } else {
                        $filename = $request->hiddenImage;
                    }

                    foreach ($accord_description as $key => $value) {
                        DB::table('prooduct_accordion')->insert([
                            'fk_product_id' => $pid,
                            'description' => $value,
                            'title' => $title[$key],
                        ]);
                    }

                    DB::table('product')->where('id', '=', $pid)
                        ->update([
                            'product_name' => $product_name,
                            'description' =>  $description,
                            'fk_category_id' =>  $fk_category_id,
                            'fk_product_status_id' =>  $fk_product_status_id,
                            'original_price' =>  $original_price,
                            'sale_price' =>  $sale_price,
                            'product_type' => $productType,
                            'image' =>   $filename,
                        ]);

                    return redirect()->route('allproduct')
                        ->with('success', 'Product added successfully.');
                }
            } else {
                return redirect()->route('addproduct')
                    ->with('error', 'Original price can not be less than sale price.');
            }
        }

        if ($productType == 3) {

            $product_name = $request->product_name;
            $description = $request->description;
            // $discount = $request->discount;
            // $extravalueproduct = $request->extravalueproduct;
            $accord_description = $request->accord_description;
            $title = $request->accord_title;
            $fk_category_id = $request->fk_category_id;
            $fk_product_status_id = $request->fk_product_status_id;
            $file = $request->file('file');


            $extra_value_products_delete =  DB::table('extra_value_products')
                ->select('*')
                ->where('fk_product_id', '=', $pid)
                ->get();

            if ($extra_value_products_delete != null) {
                DB::table('extra_value_products')->where('fk_product_id', $pid)->delete();
            }

            $prooduct_accordion_delete =  DB::table('prooduct_accordion')
                ->select('*')
                ->where('fk_product_id', '=', $pid)
                ->get();

            if ($prooduct_accordion_delete != null) {
                DB::table('prooduct_accordion')->where('fk_product_id', $pid)->delete();
            }

            if (isset($file)) {
                $filename = time() . rand(1, 100) . '.' . $file->getClientOriginalExtension();
                $file->move(public_path('images/products'), $filename);
            } else {
                $filename = $request->hiddenImage;
            }

            foreach ($accord_description as $key => $value) {
                DB::table('prooduct_accordion')->insert([
                    'fk_product_id' => $pid,
                    'description' => $value,
                    'title' => $title[$key],
                ]);
            }

            DB::table('product')->where('id', '=', $pid)
                ->update([
                    'product_name' => $product_name,
                    'description' =>  $description,
                    'fk_category_id' =>  $fk_category_id,
                    'fk_product_status_id' =>  $fk_product_status_id,
                    'original_price' =>  $original_price,
                    'sale_price' =>  $sale_price,
                    'product_type' => $productType,
                    'image' =>   $filename,
                ]);

            return redirect()->route('allproduct')
                ->with('success', 'Product added successfully.');
        }
    }
    public function EditProduct($id)
    {

        $product =  DB::table('product')
            ->select('*')
            ->where('id', '=', $id)
            ->first();
        if ($product != null) {

            $product_status  =  DB::table('product_status')
                ->select('*')
                ->get();

            $category  =  DB::table('category')
                ->select('*')
                ->where('soft_delete', '=', 0)
                ->get();
            $product  =  DB::table('product')
                ->select('*')
                ->where('soft_delete', '=', 0)
                ->where('id', '=', $id)
                ->first();

            $productExtra  =  DB::table('product')
                ->select('*')
                ->where('soft_delete', '=', 0)
                ->where('id', '!=', $id)
                ->get();

            $product_type =  DB::table('product_type')
                ->select('*')
                ->get();


            $extra_value_products  =  DB::table('extra_value_products')
                ->select('*')
                //   ->join('extra_value_products', 'extra_value_products.fk_product_id', '=', 'product.id')
                ->where('extra_value_products.fk_product_id', '=', $id)
                ->get();

            $prooduct_accordion  =  DB::table('prooduct_accordion')
                ->select('*')
                ->where('fk_product_id', '=', $id)
                ->get();
            return view('admin.edit-product', ['category' => $category, 'prooduct_accordion' => $prooduct_accordion, 'extra_value_products' => $extra_value_products, 'category_status' => $product_status, 'product' => $product, 'productExtra' => $productExtra, 'product_type' => $product_type]);
        } else {
            return redirect()->route('allproduct')
                ->with('error', 'Server error.');
        }
    }

    public function DeleteProduct($id)
    {

        if ($id != "") {
            $productDelete = DB::table('product')
                ->where('id', '=', $id)
                ->update([
                    'soft_delete' => 1
                ]);
            //dd($productDelete);
            if ($productDelete) {
                return redirect()->route('allproduct')
                    ->with('success', 'Product deleted successfully.');
            } else {
                return redirect()->route('allproduct')
                    ->with('error', 'Product not deleted.');
            }
        }
    }
    public function MyInfo(Request $request)
    {
        // dd($request);
        if (auth()->id() != "") {
            $user = DB::table('users')
                ->select('*')
                ->where('id', '=', auth()->id())
                ->first();

            $countries = DB::table('countries')
                ->select('*')
                ->where('id', '=', $user->fk_country_id)
                ->first();



            $cities = DB::table('cities')
                ->select('*')
                ->where('id', '=', $user->fk_city_id)
                ->first();


            return view('admin.account.my-info', ['user' => $user, 'countries' => $countries, 'cities' => $cities]);
        }
    }
    public function MyInfoEdit()
    {
        $countries = DB::table('countries')
            ->select('*')
            ->get();

        if (auth()->id() != "") {
            $user = DB::table('users')
                ->select('*')
                ->where('id', '=', auth()->id())
                ->first();

            $cities = DB::table('cities')
                ->select('*')
                ->where('country_id', '=', $user->fk_country_id)
                ->get();

            return view('admin.account.my-info-edit', ['user' => $user, 'countries' => $countries, 'cities' => $cities]);
        } else {

            return view('admin.account.my-info-edit');
        }
    }
    public function myInfoUpdate(Request $request)
    {

        $name = $request->name;
        $last_name = $request->last_name;
        $company_name = $request->company_name;
        $email = $request->email;
        $phone_number = $request->phone_number;
        $fk_country_id = $request->country;
        //  $phone_code = $request->phone_code;

        $fk_city_id = $request->city;
        $address_line1 = $request->address_line1;
        $address_line2 = $request->address_line2;
        if (auth()->id() != "") {
            $updateUsers = DB::table('users')
                ->where('id', '=', auth()->id())
                ->update([
                    'name' => $name,
                    'last_name' => $last_name,
                    "company_name" => $company_name,
                    "email" => $email,
                    "fk_country_id" => $fk_country_id,
                    //"phone_code" => $phone_code,
                    "fk_city_id" => $fk_city_id,
                    "address_line1" => $address_line1,
                    "address_line2" => $address_line2,
                    'phone_number' => $phone_number,
                    'updated_at' => now()
                ]);
            if ($updateUsers) {
                return redirect()->route('myinfoadmin')
                    ->with('success', 'Info updated successfully.');
            }
        }
    }
    public function SupportTickets($id)
    {
        $support_ticket =  DB::table('users')
            ->select('*')
            ->where('id', '=', $id)
            ->first();
        if ($support_ticket != null) {
            $user = DB::table('users')
                ->select('users.*', 'roles.name as role_name', 'countries.name as countries_name', 'cities.name as cities_name')
                ->leftJoin('roles', 'roles.id', '=', 'users.fk_role_id')
                ->leftJoin('countries', 'countries.id', '=', 'users.fk_country_id')
                ->leftJoin('cities', 'cities.id', '=', 'users.fk_city_id')
                ->where('users.id', '=', $id)
                ->first();

            $supportId = $id;
            $support =   DB::table('support_ticket')
                ->select('support_ticket.*', 'tickets_status.*', 'tickets_status.name as statusname', 'support_ticket.id as id', 'department.department_name as department_name')
                ->leftJoin('tickets_status', 'support_ticket.fk_ticket_status_id', '=', 'tickets_status.id')
                ->leftJoin('department', 'support_ticket.fk_department_id', '=', 'department.id')
                ->where('support_ticket.fk_user_id', '=', $supportId)
                ->get();

            $department = DB::table('department')
                ->select('*')
                ->get();
            $tickets_status = DB::table('tickets_status')
                ->select('*')
                ->get();

            // $support_tickets_replay =   DB::table('support_tickets_replay')
            //     ->select('support_tickets_replay.*', 'users.*', 'support_tickets_replay.created_at as tcreated_at', 'support_tickets_replay.id as support_tickets_replay_id')
            //     ->leftJoin('users', 'users.id', '=', 'support_tickets_replay.fk_user_id')
            //     ->where('fk_support_ticket_id', '=', $supportId)
            //     ->orderBy('support_tickets_replay.created_at', 'DESC')
            //     ->get();


            // $ticket_images =   DB::table('ticket_images')
            //     ->select('ticket_images.*')
            //     ->where('fk_support_ticket_id', '=', $supportId)
            //     ->get();

            return view('admin.user-details.support-tickets', ['user' => $user, 'support' => $support, 'department' => $department]);
        } else {

            return redirect()->route('alluser')
                ->with('error', 'Server Error');
        }
    }
    public function UserDetailsOrders($id)
    {
        if (isset($id)) {
            $user = DB::table('users')
                ->select('users.*', 'roles.name as role_name', 'countries.name as countries_name', 'cities.name as cities_name')
                ->leftJoin('roles', 'roles.id', '=', 'users.fk_role_id')
                ->leftJoin('countries', 'countries.id', '=', 'users.fk_country_id')
                ->leftJoin('cities', 'cities.id', '=', 'users.fk_city_id')
                ->where('users.id', '=', $id)
                ->first();
            return view('admin.user-details.order', ['user' => $user]);
        }
    }
    public function PaymentCards($id)
    {
        if (isset($id)) {
            $user = DB::table('users')
                ->select('users.*', 'roles.name as role_name', 'countries.name as countries_name', 'cities.name as cities_name')
                ->leftJoin('roles', 'roles.id', '=', 'users.fk_role_id')
                ->leftJoin('countries', 'countries.id', '=', 'users.fk_country_id')
                ->leftJoin('cities', 'cities.id', '=', 'users.fk_city_id')
                ->where('users.id', '=', $id)
                ->first();
            return view('admin.user-details.payment-cards', ['user' => $user]);
        }
    }
    public function Credits()
    {
        return view('admin.user-details.credits');
    }
    public function Password($id)
    {
        if (isset($id)) {
            $user = DB::table('users')
                ->select('users.*', 'roles.name as role_name', 'countries.name as countries_name', 'cities.name as cities_name')
                ->leftJoin('roles', 'roles.id', '=', 'users.fk_role_id')
                ->leftJoin('countries', 'countries.id', '=', 'users.fk_country_id')
                ->leftJoin('cities', 'cities.id', '=', 'users.fk_city_id')
                ->where('users.id', '=', $id)
                ->first();
            return view('admin.user-details.password', ['user' => $user]);
        }
    }

    public function AllCategory(Request $request)
    {
        $category_status  =  DB::table('category_status')
            ->select('*')
            ->get();

        $category  =  DB::table('category')
            ->select('*')
            ->where('soft_delete', '=', 0)
            ->get();


        return view('admin.all-category', ['category_status' => $category_status, 'category' => $category]);
    }
    public function AddCategory(Request $request)
    {

        $category_status  =  DB::table('category_status')
            ->select('*')
            ->get();

        return view('admin.add-category', ['category_status' => $category_status]);
    }
    public function StoreCategory(Request $request)
    {

        $insertCategory = DB::table('category')->insert([
            'fk_category_status' => $request->category_status,
            'category_name' =>  $request->category_name,
        ]);
        if ($insertCategory) {
            return redirect()->route('allcategory')
                ->with('success', 'Category created successfully.');
        }
    }

    public function EditCategory($id)
    {

        $product =  DB::table('category')
            ->select('*')
            ->where('id', '=', $id)
            ->first();
        if ($product != null) {
            $category_status  =  DB::table('category_status')
                ->select('*')
                ->get();

            $category  =  DB::table('category')
                ->select('*')
                ->where('id', '=', $id)
                ->first();
            return view('admin.edit-category', ['category_status' => $category_status, 'category' => $category]);
        } else {
            return redirect()->route('allcategory')
                ->with('error', 'server Error.');
        }
    }

    public function UpdateCategory(Request $request)
    {

        $category_name = $request->category_name;
        $fk_category_status = $request->category_status;
        $id = $request->id;

        if ($id != "") {
            $categoryUpdate = DB::table('category')
                ->where('id', '=', $id)
                ->update([
                    'category_name' => $category_name,
                    'fk_category_status' => $fk_category_status,
                ]);
            if ($categoryUpdate) {
                return redirect()->route('allcategory')
                    ->with('success', 'category updated successfully.');
            } else {
                return redirect()->route('allcategory')
                    ->with('error', 'category not updated.');
            }
        }
    }

    public function DeleteCategory($id)
    {
        if ($id != "") {
            $categoryDelete = DB::table('category')
                ->where('id', '=', $id)
                ->update([
                    'soft_delete' => 1
                ]);
            if ($categoryDelete) {
                return redirect()->route('allcategory')
                    ->with('success', 'category deleted successfully.');
            } else {
                return redirect()->route('allcategory')
                    ->with('error', 'category not deleted.');
            }
        }
    }
}
