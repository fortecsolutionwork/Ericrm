<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Stripe\Stripe;
use Session;

class AccountController extends Controller
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
    // public function index()
    // {
    //     return view('account/home');
    // }

    public function dashboard()
    {
        return view('account.dashboard');
    }

    public function Category(Request $request)
    {

       $category =  DB::table('category')
            ->select('*')
            ->where('soft_delete', '!=', '1')
            ->get();

        return view('account.category', ['category' => $category]);
    }

    public function Checkout(Request $request)
    {

        $countries = DB::table('countries')
            ->select('*')
            ->get();

        $user = DB::table('users')
            ->select('*')
            ->where('id', '=', auth()->id())
            ->first();

        $cities = DB::table('cities')
            ->select('*')
            ->where('country_id', '=', $user->fk_country_id)
            ->get();


        $userId = auth()->id();
        $cart =   DB::table('cart')
            ->select('fk_original_product_id')
            ->where('fk_user_id', '=', $userId)
            ->get()->toArray();

        $arrays = array_map(function ($cart) {
            return (array)$cart;
        }, $cart);

        // Use array_unique to remove duplicates
        $uniqueArrays = array_unique($arrays, SORT_REGULAR);

        // Use array_map to convert arrays back to objects
        $uniqueObjects = array_map(function ($array) {
            return (object)$array;
        }, $uniqueArrays);

        $CurrentUsercart = [];


        foreach ($uniqueObjects as  $uniqueObject) {


            $serviceExist = DB::table('cart')
                ->where('fk_user_id', '=', $userId)
                ->where('fk_product_id', '=', $uniqueObject->fk_original_product_id)
                ->where('fk_original_product_id', '=', $uniqueObject->fk_original_product_id)
                ->first();

            if (!is_null($serviceExist)) {
                $OriginalProductCurrentUser  =  DB::table('product')
                    ->select('*', 'cart.*')
                    ->leftJoin('cart', 'cart.fk_product_id', '=', 'product.id')
                    ->where('cart.fk_user_id', '=', $userId)
                    ->where('cart.fk_product_id', '=', $uniqueObject->fk_original_product_id)
                    ->where('cart.fk_original_product_id', '=', $uniqueObject->fk_original_product_id)
                    ->first();

                $serviceSubServiceCurrentUser  =  DB::table('product')
                    ->select('product.*', 'cart.*')
                    ->leftJoin('cart', 'cart.fk_product_id', '=', 'product.id')
                    ->where('cart.fk_user_id', '=', $userId)
                    ->where('cart.fk_product_id', '!=', $uniqueObject->fk_original_product_id)
                    ->where('cart.fk_original_product_id', '=', $uniqueObject->fk_original_product_id)
                    ->get();


                $serviceSubService = [];
                if (!empty($serviceSubServiceCurrentUser)) {
                    foreach ($serviceSubServiceCurrentUser as $serviceSubServiceCurrentUser) {
                        $new = (object) [
                            "id" =>   $serviceSubServiceCurrentUser->fk_product_id,
                            "did" =>   $serviceSubServiceCurrentUser->id,
                            "product_name" =>  $serviceSubServiceCurrentUser->product_name,
                            "quantity" =>  $serviceSubServiceCurrentUser->quantity,
                            "credit_value" =>  $serviceSubServiceCurrentUser->credit_value,
                            "original_price" =>  $serviceSubServiceCurrentUser->original_price,
                            "sale_price" =>  $serviceSubServiceCurrentUser->sale_price,
                        ];
                        array_push($serviceSubService, $new);
                    }
                }
            } else {
                $OriginalProductCurrentUser  =  DB::table('product')
                    ->select('*', 'cart.*')
                    ->leftJoin('cart', 'cart.fk_product_id', '=', 'product.id')
                    ->where('cart.fk_user_id', '=', $userId)
                    ->where('cart.fk_product_id', '=', $uniqueObject->fk_original_product_id)
                    ->first();

                $serviceSubService = [];
            }


            $originalAndsub = (object) [
                "OriginalProductCurrentUser" => $OriginalProductCurrentUser,
                "serviceSubService" => $serviceSubService,
            ];


            array_push($CurrentUsercart, $originalAndsub);
        }

        $getCurrency = DB::table('currency')
            ->select('currency.*')
            ->leftJoin('global_option', 'global_option.fk_currency_id', '=', 'currency.id')
            ->first();

        return view('account.checkout', [
            'CurrentUsercart' => $CurrentUsercart, 'getCurrency' => $getCurrency,
            'cities' => $cities, 'countries' => $countries, 'user' => $user
        ]);
    }
    public function ManageProducts($id)
    {

        $product  =  DB::table('product')
            ->select('*')
            ->where('soft_delete', '=', 0)
            ->where('fk_category_id', '=', $id)
            ->orderBy('product.id', 'desc')
            ->get();
        return view('account.manage-products', ['product' => $product]);
    }

    public  function Myorder(Request $request)
    {


        $orderStatus = $request->orderStatus;
        if ($orderStatus == "all") {
            $orderStatus = "";
        }

        $productName = $request->productName;


        $userId = auth()->id();
        $order =   DB::table('order')
            ->select('id')
            ->where('fk_user_id', '=', $userId)
            ->get()->toArray();
        //dd($order);
        $CurrentUsercart = [];
        foreach ($order as  $order) {

            $orderId =  $order->id;
            $serviceExist = DB::table('order_meta')
                ->where('fk_order_id', '=', $orderId)
                ->get();

            if (!is_null($serviceExist)) {
                foreach ($serviceExist  as  $serviceExistData) {
                    //if ($orderId  == $serviceExistData->fk_original_product_id) {
                    $OriginalProductCurrentUser  =  DB::table('product')
                        ->select('*', 'order_meta.*', 'order.created_at as created_at', 'order.order_status as order_status')
                        ->leftJoin('order_meta', 'order_meta.fk_product_id', '=', 'product.id')
                        ->leftJoin('order', 'order.id', '=', 'order_meta.fk_order_id')
                        ->where('order_meta.fk_product_id', '=', $serviceExistData->fk_product_id)
                        ->where('order_meta.fk_original_product_id', '=', $serviceExistData->fk_product_id)
                        ->where('product.product_name', 'like', '%' . $productName . '%')
                        ->where('order.order_status', 'like', '%' . $orderStatus . '%')
                        ->where('order_meta.fk_order_id', '=', $orderId)
                        ->first();

                    $serviceSubServiceCurrentUser  =  DB::table('product')
                        ->select('product.*', 'order_meta.*')
                        ->leftJoin('order_meta', 'order_meta.fk_product_id', '=', 'product.id')
                        ->where('order_meta.fk_product_id', '!=', $serviceExistData->fk_product_id)
                        ->where('order_meta.fk_original_product_id', '=', $serviceExistData->fk_product_id)
                        ->where('order_meta.fk_order_id', '=', $orderId)
                        ->get();


                    $serviceSubService = [];
                    if (!empty($serviceSubServiceCurrentUser)) {
                        foreach ($serviceSubServiceCurrentUser as $serviceSubServiceCurrentUser) {
                            $new = (object) [
                                "id" =>   $serviceSubServiceCurrentUser->fk_product_id,
                                "did" =>   $serviceSubServiceCurrentUser->id,
                                "product_name" =>  $serviceSubServiceCurrentUser->product_name,
                                "quantity" =>  $serviceSubServiceCurrentUser->quantity,

                                "total_payment" =>  $serviceSubServiceCurrentUser->total_payment,
                            ];
                            array_push($serviceSubService, $new);
                        }
                    }
                    $originalAndsub = (object) [
                        "OriginalProductCurrentUser" => $OriginalProductCurrentUser,
                        "serviceSubService" => $serviceSubService,
                    ];
                    array_push($CurrentUsercart, $originalAndsub);
                    //}
                }
            }
        }

        $CurrentUsercart = array_filter($CurrentUsercart);
        //dd( $CurrentUsercart);
        $getCurrency = DB::table('currency')
            ->select('currency.*')
            ->leftJoin('global_option', 'global_option.fk_currency_id', '=', 'currency.id')
            ->first();


        $orderStatus =  DB::table('order_status')
            ->select('*')
            ->get();
        return view('account.my-order', ['CurrentUsercart' => $CurrentUsercart, 'getCurrency' => $getCurrency, 'orderStatus' => $orderStatus]);
    }
    public function Myassets(Request $request)
    {
        $assets = DB::table('assets')
            ->select('*')
            ->where('fk_user_id', '=', auth()->id())
            ->orderBy('id', 'DESC')
            ->get();

        return view('account.my-assets', ['assets' => $assets]);
    }
    public function Addassets(Request $request)
    {

        // $file_type =  DB::table('file_type')
        //     ->select('*')
        //     ->get();

        return view('account.add-assets');
    }

    public function StoreAssets(Request $request)
    {
        // $userId = auth()->id();
        // $assets_name =  $request->assets_name;
        // $assets_link =  $request->assets_link;
        // $document =  $request->Document;
        // DB::table('assets')->insert([
        //     'fk_user_id' => $userId,
        //     'how_call' => $assets_name,
        //     'assets_link' => $assets_link,
        //     'file_type' => $document,
        // ]);
        // return redirect()->route('myassets')
        //     ->with('success', 'Assets successfully added.');
    }

    public function AssetsEdit($id)
    {

        // $assets =  DB::table('assets')
        //     ->select('*')
        //     ->where('id', '=', $id)
        //     ->first();
        // $file_type =  DB::table('file_type')
        //     ->select('*')
        //     ->get();

         return view('account.assets-edit');
    }

    public function AssetsUpdate(Request $request)
    {

        $userId = auth()->id();
        $assets_name =  $request->assets_name;
        $assets_link =  $request->assets_link;
        $document =  $request->Document;

        DB::table('assets')
            ->where('fk_user_id', '=', $userId)
            ->where('id', '=', $request->id)
            ->update([
                'how_call' => $assets_name,
                'assets_link' => $assets_link,
                'file_type' => $document,
                'created_at' => now()
            ]);
        return redirect()->route('myassets')
            ->with('success', 'Assets Updated successfully.');
    }

    public  function AssetsDelete($id)
    {
        DB::table('assets')->where('id', $id)->delete(); // Delete the post with ID 1

        return redirect()->route('myassets')
            ->with('success', 'Assets deleted successfully.');
    }
    public function MySupportTicket(Request $request)
    {
        
        return view('account.my-support-ticket');
    }
    public function website($id)
    {

        $order =  DB::table('product')
            ->select('*')
            ->where('id', '=', $id)
            ->first();
        if ($order != null) {

            if ($order->product_type != 3) {
                $getCurrency = DB::table('currency')
                    ->select('currency.*')
                    ->leftJoin('global_option', 'global_option.fk_currency_id', '=', 'currency.id')
                    ->first();

                $product  =  DB::table('product')
                    ->select('*')
                    ->where('soft_delete', '=', 0)
                    ->where('id', '=', $id)
                    ->first();

                $prooduct_accordion  =  DB::table('prooduct_accordion')
                    ->select('*')
                    ->where('fk_product_id', '=', $id)
                    ->get();

                $user = DB::table('users')
                    ->select('*')
                    ->where('id', '=', auth()->id())
                    ->first();

                $extra_value_products  =  DB::table('product')
                    ->select('product.*', 'extra_value_products.discount as discount', 'extra_value_products.fk_extra_value_products as fk_extra_value_products')
                    ->leftJoin('extra_value_products', 'extra_value_products.fk_extra_value_products', '=', 'product.id')
                    ->where('product.soft_delete', '=', 0)
                    ->where('extra_value_products.fk_product_id', '=', $id)
                    ->where('extra_value_products.fk_product_id', '=', $id)
                    ->get();

                return view('account.website', ['product' => $product, 'getCurrency' => $getCurrency, 'prooduct_accordion' => $prooduct_accordion, 'extra_value_products' => $extra_value_products, 'user' => $user]);
            } else {
                return redirect()->route('manageproducts')
                    ->with('error', 'Please buy this product with extra value Product.');
            }
        } else {
            return redirect()->route('manageproducts')
                ->with('error', 'Server error.');
        }
    }

    public function storetocart(Request $request)
    {
        $userId = auth()->id();
        $design_check =  $request->design_check;
        $quantity =  $request->quantity;
        // dd($request);
        $original_product_id =  $request->original_product_id;
        $original_product_price =  $request->original_product_price;
        $sale_price =  $request->sale_price;
        $extra_value_products_price =  $request->extra_value_products_price;
        $extra_value_products_sale_price =  $request->extra_value_products_sale_price;
        $extra_value_products =  $request->extra_value_products;
        $extra_value_products_creadit_value =  $request->extra_value_products_creadit_value;
        $original_product_creadit_value =  $request->original_product_creadit_value;


        if ($design_check == null) {
            return redirect()->route('website', $original_product_id)
                ->with('error', 'Please select Product.');
        } else {

            if (!empty($quantity)) {

                $serviceExistMain = DB::table('cart')
                    ->where('fk_user_id', '=', $userId)
                    ->where('fk_product_id', '=', $original_product_id)
                    ->where('fk_original_product_id', '=', $original_product_id)
                    ->first();

                if ($serviceExistMain != null) {
                    $serviceExistMainQuantity = $serviceExistMain->quantity;
                    DB::table('cart')
                        ->where('fk_user_id', '=', $userId)
                        ->where('fk_product_id', '=', $original_product_id)
                        ->where('fk_original_product_id', '=', $original_product_id)
                        ->update([
                            'quantity' =>  $serviceExistMainQuantity + 1,
                            'original_price' => $original_product_price,
                            'sale_price' => $sale_price,
                            'credit_value' => $original_product_creadit_value,
                            'updated_at' => now()
                        ]);

                    foreach ($quantity as $key => $quantity) {
                        if ($quantity != 0) {
                            $ExtraserviceExistMain = DB::table('cart')
                                ->where('fk_user_id', '=', $userId)
                                ->where('fk_product_id', '=', $extra_value_products[$key])
                                ->where('fk_original_product_id', '=', $original_product_id)
                                ->first();
                            $ExtraserviceExistMainQuantity = $ExtraserviceExistMain->quantity;

                            DB::table('cart')
                                ->where('fk_user_id', '=', $userId)
                                ->where('fk_product_id', '=',  $extra_value_products[$key])
                                ->where('fk_original_product_id', '=', $original_product_id)
                                ->update([
                                    'quantity' =>  $ExtraserviceExistMainQuantity + $quantity,
                                    'original_price' => $extra_value_products_price[$key],
                                    'sale_price' => $extra_value_products_sale_price[$key],
                                    'credit_value' => $extra_value_products_creadit_value[$key],
                                ]);
                        }
                    }

                    return redirect()->route('cart')
                        ->with('success', 'Product added successfully to cart.');
                } else {
                    DB::table('cart')->insert([
                        'fk_user_id' => $userId,
                        'fk_product_id' => $original_product_id,
                        'quantity' => 1,
                        'fk_original_product_id' => $original_product_id,
                        'original_price' => $original_product_price,
                        'sale_price' => $sale_price,
                        'credit_value' => $original_product_creadit_value,
                    ]);
                    foreach ($quantity as $key => $quantity) {
                        if ($quantity != 0) {
                            DB::table('cart')->insert([
                                'fk_user_id' => $userId,
                                'fk_original_product_id' => $original_product_id,
                                'fk_product_id' => $extra_value_products[$key],
                                'quantity' => $quantity,
                                'original_price' => $extra_value_products_price[$key],
                                'sale_price' => $extra_value_products_sale_price[$key],
                                'credit_value' => $extra_value_products_creadit_value[$key],
                            ]);
                        }
                    }
                    return redirect()->route('cart')
                        ->with('success', 'Product added successfully to cart.');
                }
            } else {
                // if new

                $serviceExistMain = DB::table('cart')
                    ->where('fk_user_id', '=', $userId)
                    ->where('fk_product_id', '=', $original_product_id)
                    ->where('fk_original_product_id', '=', $original_product_id)
                    ->first();

                if ($serviceExistMain != null) {
                    $serviceExistMainQuantity = $serviceExistMain->quantity;
                    DB::table('cart')
                        ->where('fk_user_id', '=', $userId)
                        ->where('fk_product_id', '=', $original_product_id)
                        ->where('fk_original_product_id', '=', $original_product_id)
                        ->update([
                            'quantity' =>  $serviceExistMainQuantity + 1,
                            'original_price' => $original_product_price,
                            'sale_price' => $sale_price,
                            'credit_value' => $original_product_creadit_value,
                            'updated_at' => now()
                        ]);

                    return redirect()->route('cart')
                        ->with('success', 'Product update successfully to cart.');
                } else {
                    DB::table('cart')->insert([
                        'fk_user_id' => $userId,
                        'fk_product_id' => $original_product_id,
                        'quantity' => 1,
                        'fk_original_product_id' => $original_product_id,
                        'credit_value' => $original_product_creadit_value,
                        'original_price' => $original_product_price,
                        'sale_price' => $sale_price,
                    ]);

                    return redirect()->route('cart')
                        ->with('success', 'Product added successfully to cart.');
                }
            }
        }
    }

    public function UpdateCart(Request $request)
    {
        //dd($request);
        $originalProductId = $request->originalProductId;
        $extaValueProductId = $request->extaValueProductId;
        $originalProductQuantity = $request->originalProductQuantity;
        $originalProductTotal = $request->originalProductTotal;
        $saleProductTotal = $request->saleProductTotal;
        $subProductQuantity = $request->subProductQuantity;
        $originalPrice = $request->originalPrice;
        $sale_Price = $request->sale_Price;
        $extaValueProductIdWithOriginal = $request->extaValueProductIdWithOriginal;

        if (!empty($originalProductId)) {
            foreach ($originalProductId as $key => $originalProductId) {
                $userId = auth()->id();
                DB::table('cart')
                    ->where('fk_user_id', '=', $userId)
                    ->where('fk_product_id', '=', $originalProductId)
                    ->where('fk_original_product_id', '=', $originalProductId)
                    ->update([
                        'quantity' =>  $originalProductQuantity[$key],
                        'original_price' => $originalProductTotal[$key],
                        'sale_price' => $saleProductTotal[$key],
                        'updated_at' => now()
                    ]);
            }
        }

        if (count($extaValueProductId) > 1) {
            foreach ($extaValueProductId as $key => $extaValueProductId) {
                $userId = auth()->id();
                DB::table('cart')
                    ->where('fk_user_id', '=', $userId)
                    ->where('fk_product_id', '=', $extaValueProductId)
                    ->where('fk_original_product_id', '=', $extaValueProductIdWithOriginal[$key])
                    ->update([
                        'quantity' =>  $subProductQuantity[$key],
                        'original_price' => $originalPrice[$key],
                        'sale_price' => $sale_Price[$key],
                        'updated_at' => now()
                    ]);
            }
        }
        return redirect()->route('cart')
            ->with('success', 'Product updated successfully to cart.');
    }

    public function orderDetailsUser($id)
    {
        $countries = DB::table('countries')
            ->select('*')
            ->get();

        $user = DB::table('users')
            ->select('*')
            ->where('id', '=', auth()->id())
            ->first();

        $cities = DB::table('cities')
            ->select('*')
            ->where('country_id', '=', $user->fk_country_id)
            ->get();


        $userId = auth()->id();
        $cart =   DB::table('order_meta')
            ->select('fk_original_product_id')
            ->where('fk_order_id', '=', $id)
            ->get()->toArray();

        $arrays = array_map(function ($cart) {
            return (array)$cart;
        }, $cart);

        // Use array_unique to remove duplicates
        $uniqueArrays = array_unique($arrays, SORT_REGULAR);

        // Use array_map to convert arrays back to objects
        $uniqueObjects = array_map(function ($array) {
            return (object)$array;
        }, $uniqueArrays);

        $CurrentUsercart = [];


        foreach ($uniqueObjects as  $uniqueObject) {


            $serviceExist = DB::table('order_meta')
                // ->where('fk_user_id', '=', $userId)
                ->where('fk_product_id', '=', $uniqueObject->fk_original_product_id)
                ->where('fk_original_product_id', '=', $uniqueObject->fk_original_product_id)
                ->first();

            if (!is_null($serviceExist)) {
                $OriginalProductCurrentUser  =  DB::table('product')
                    ->select('*', 'order_meta.*')
                    ->leftJoin('order_meta', 'order_meta.fk_product_id', '=', 'product.id')
                    ->where('order_meta.fk_order_id', '=', $id)
                    ->where('order_meta.fk_product_id', '=', $uniqueObject->fk_original_product_id)
                    ->where('order_meta.fk_original_product_id', '=', $uniqueObject->fk_original_product_id)
                    ->first();

                $serviceSubServiceCurrentUser  =  DB::table('product')
                    ->select('product.*', 'order_meta.*')
                    ->leftJoin('order_meta', 'order_meta.fk_product_id', '=', 'product.id')
                    ->where('order_meta.fk_order_id', '=', $id)
                    ->where('order_meta.fk_product_id', '!=', $uniqueObject->fk_original_product_id)
                    ->where('order_meta.fk_original_product_id', '=', $uniqueObject->fk_original_product_id)
                    ->get();


                $serviceSubService = [];
                if (!empty($serviceSubServiceCurrentUser)) {
                    foreach ($serviceSubServiceCurrentUser as $serviceSubServiceCurrentUser) {
                        $new = (object) [
                            "id" =>   $serviceSubServiceCurrentUser->fk_product_id,
                            "did" =>   $serviceSubServiceCurrentUser->id,
                            "product_name" =>  $serviceSubServiceCurrentUser->product_name,
                            "quantity" =>  $serviceSubServiceCurrentUser->quantity,
                            "total_payment" =>  $serviceSubServiceCurrentUser->price
                        ];
                        array_push($serviceSubService, $new);
                    }
                }
            } else {
                $OriginalProductCurrentUser  =  DB::table('product')
                    ->select('*', 'order_meta.*')
                    ->leftJoin('order_meta', 'order_meta.fk_product_id', '=', 'product.id')
                    ->where('order_meta.fk_order_id', '=', $id)
                    ->where('order_meta.fk_product_id', '=', $uniqueObject->fk_original_product_id)
                    ->first();

                $serviceSubService = [];
            }


            $originalAndsub = (object) [
                "OriginalProductCurrentUser" => $OriginalProductCurrentUser,
                "serviceSubService" => $serviceSubService,
            ];


            array_push($CurrentUsercart, $originalAndsub);
        }

        $getCurrency = DB::table('currency')
            ->select('currency.*')
            ->leftJoin('global_option', 'global_option.fk_currency_id', '=', 'currency.id')
            ->first();

        return view('account.order-details', [
            'CurrentUsercart' => $CurrentUsercart, 'getCurrency' => $getCurrency,
            'cities' => $cities, 'countries' => $countries, 'user' => $user
        ]);
    }
    // public function storetocart(Request $request)
    // {
    //     $userId = auth()->id();
    //     $design_check =  $request->design_check;
    //     $quantity =  $request->quantity;
    //     $original_product_id =  $request->original_product_id;
    //     $original_product_price =  $request->original_product_price;
    //     $extra_value_products_price =  $request->extra_value_products_price;
    //     $extra_value_products =  $request->extra_value_products;
    //     //DD(array_fill(0, count($quantity), '0') === array_values($quantity));
    //     $quantity1 = [];
    //     $quantity12 = null;
    //     if ($quantity == null) {
    //         $quantity12 == 0;
    //     } else {
    //         $quantity1 = $quantity;
    //         $quantity12 = count($quantity);

    //     }


    //     //dd($quantity1);
    //     if (array_fill(0, $quantity12, '0') === array_values($quantity1)  &&  $design_check == null) {
    //         return redirect()->route('website', $original_product_id)
    //             ->with('error', 'Please select one service.');
    //     } else {
    //         if (array_fill(0, $quantity12, '0') === array_values($quantity1)) {

    //             $serviceExist = DB::table('cart')
    //                 ->where('fk_user_id', '=', $userId)
    //                 ->where('fk_product_id', '=', $original_product_id)
    //                 ->where('fk_original_product_id', '=', $original_product_id)
    //                 ->first();

    //             // DB::table('cart')
    //             //     ->where('fk_user_id', '=', $userId)
    //             //     // ->where('fk_product_id', '=', $original_product_id)
    //             //     ->where('fk_original_product_id', '=', $original_product_id)
    //             //     ->delete();
    //             // dd(is_null($serviceExist));
    //             // if (is_null($serviceExist)) {
    //             DB::table('cart')->insert([
    //                 'fk_user_id' => $userId,
    //                 'fk_product_id' => $original_product_id,
    //                 'quantity' => 1,
    //                 'fk_original_product_id' => $original_product_id,
    //                 'total' => $original_product_price,
    //             ]);
    //             return redirect()->route('cart')
    //                 ->with('success', 'Product added successfully to cart.');
    //             // } else {
    //             //     return redirect()->route('cart')
    //             //         ->with('error', 'The product is already in your shopping cart.');
    //             // }
    //         } else {
    //             $serviceExist = DB::table('cart')
    //                 ->where('fk_user_id', '=', $userId)
    //                 ->where('fk_product_id', '=', $original_product_id)
    //                 ->first();

    //             // DB::table('cart')
    //             //     ->where('fk_user_id', '=', $userId)
    //             //     // ->where('fk_product_id', '=', $original_product_id)
    //             //     ->where('fk_original_product_id', '=', $original_product_id)
    //             //     ->delete();
    //             // if (!is_null($serviceExist)) {
    //             //     return redirect()->route('cart')
    //             //         ->with('error', 'The product is already in your shopping cart.');
    //             // } else {
    //             foreach ($quantity as $key => $quantity) {
    //                 if ($quantity != 0) {
    //                     // DB::table('cart')
    //                     //     ->where('fk_user_id', '=', $userId)
    //                     //     ->where('fk_product_id', '=', $extra_value_products[$key])
    //                     //     ->where('fk_original_product_id', '=', $extra_value_products[$key])
    //                     //     ->delete();

    //                     DB::table('cart')->insert([
    //                         'fk_user_id' => $userId,
    //                         'fk_original_product_id' => $original_product_id,
    //                         'fk_product_id' => $extra_value_products[$key],
    //                         'quantity' => $quantity,
    //                         'total' => $extra_value_products_price[$key],
    //                     ]);
    //                 }
    //             }
    //             DB::table('cart')->insert([
    //                 'fk_user_id' => $userId,
    //                 'fk_product_id' => $original_product_id,
    //                 'fk_original_product_id' => $original_product_id,
    //                 'quantity' => 1,
    //                 'total' => $original_product_price,
    //             ]);
    //             return redirect()->route('cart')
    //                 ->with('success', 'Product added successfully to cart.');
    //             // }
    //         }
    //         // return redirect()->route('website', $original_product_id)
    //         //     ->with('error', 'Please select one service.');
    //     }
    // }
    public function openNewSupportTicket()
    {


        $departments = DB::table('department')
            ->select('*')
            ->get();
        return view('account.open-new-support-ticket', ['departments' => $departments]);
    }

    public function UserStoreTicket(Request $request)
    {


    }

    public function Ticket($id)
    {
        $supportId = $id;
        $support =   DB::table('support_ticket')
            ->select('support_ticket.*', 'tickets_status.*', 'tickets_status.name as statusname', 'support_ticket.id as id')
            ->leftJoin('tickets_status', 'support_ticket.fk_ticket_status_id', '=', 'tickets_status.id')
            ->where('support_ticket.id', '=', $supportId)
            ->first();

        $support_tickets_replay =   DB::table('support_tickets_replay')
            ->select('support_tickets_replay.*', 'users.*', 'support_tickets_replay.created_at as tcreated_at', 'support_tickets_replay.id as support_tickets_replay_id')
            //->leftJoin('users', 'users.id', '=', 'support_tickets_replay.fk_user_id')
            ->leftJoin('users', 'users.id', '=', 'support_tickets_replay.fk_user_id')
            ->where('fk_support_ticket_id', '=', $supportId)
            ->orderBy('support_tickets_replay.created_at', 'DESC')
            ->get();

        $ticket_images =   DB::table('ticket_images')
            ->select('ticket_images.*')
            ->where('fk_support_ticket_id', '=', $supportId)
            ->get();

        return view('account.support.ticket', ['support' => $support, 'ticket_images' => $ticket_images, 'support_tickets_replay' => $support_tickets_replay, 'support' => $support]);
    }
    public function MyInfo()
    {
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


            return view('account.my-info', ['user' => $user, 'countries' => $countries, 'cities' => $cities]);
        }
    }
    public function Password()
    {
        return view('account.password');
    }
    public function webzolutionCredits()
    {
        return view('account.webzolution-credits');
    }
    public function paymentandbilling()
    {
        return view('account.payment-and-billing');
    }
    public function referrel()
    {
        $userId = auth()->id();
        $users =   DB::table('users')
            ->select('*')
            ->where('id', '=', $userId)
            ->first();
        return view('account.referrel', ['users' => $users]);
    }
    public function preferences()
    {
        return view('account.preferences');
    }
    public function cart(Request $request)
    {

        $userId = auth()->id();
        $cart =   DB::table('cart')
            ->select('fk_original_product_id')
            ->where('fk_user_id', '=', $userId)
            ->get()->toArray();

        $arrays = array_map(function ($cart) {
            return (array)$cart;
        }, $cart);

        // Use array_unique to remove duplicates
        $uniqueArrays = array_unique($arrays, SORT_REGULAR);

        // Use array_map to convert arrays back to objects
        $uniqueObjects = array_map(function ($array) {
            return (object)$array;
        }, $uniqueArrays);

        $CurrentUsercart = [];


        foreach ($uniqueObjects as  $uniqueObject) {


            $serviceExist = DB::table('cart')
                ->where('fk_user_id', '=', $userId)
                ->where('fk_product_id', '=', $uniqueObject->fk_original_product_id)
                ->where('fk_original_product_id', '=', $uniqueObject->fk_original_product_id)
                ->first();

            if (!is_null($serviceExist)) {
                $OriginalProductCurrentUser  =  DB::table('product')
                    ->select('*', 'cart.*')
                    ->leftJoin('cart', 'cart.fk_product_id', '=', 'product.id')
                    ->where('cart.fk_user_id', '=', $userId)
                    ->where('cart.fk_product_id', '=', $uniqueObject->fk_original_product_id)
                    ->where('cart.fk_original_product_id', '=', $uniqueObject->fk_original_product_id)
                    ->first();

                $serviceSubServiceCurrentUser  =  DB::table('product')
                    ->select('product.*', 'cart.*')
                    ->leftJoin('cart', 'cart.fk_product_id', '=', 'product.id')
                    ->where('cart.fk_user_id', '=', $userId)
                    ->where('cart.fk_product_id', '!=', $uniqueObject->fk_original_product_id)
                    ->where('cart.fk_original_product_id', '=', $uniqueObject->fk_original_product_id)
                    ->get();


                $serviceSubService = [];
                if (!empty($serviceSubServiceCurrentUser)) {
                    foreach ($serviceSubServiceCurrentUser as $serviceSubServiceCurrentUser) {
                        $new = (object) [
                            "id" =>   $serviceSubServiceCurrentUser->fk_product_id,
                            "did" =>   $serviceSubServiceCurrentUser->id,
                            "product_name" =>  $serviceSubServiceCurrentUser->product_name,
                            "quantity" =>  $serviceSubServiceCurrentUser->quantity,
                            "original_price" =>  $serviceSubServiceCurrentUser->original_price,
                            "sale_price" =>  $serviceSubServiceCurrentUser->sale_price,
                        ];
                        array_push($serviceSubService, $new);
                    }
                }
            } else {
                $OriginalProductCurrentUser  =  DB::table('product')
                    ->select('*', 'cart.*')
                    ->leftJoin('cart', 'cart.fk_product_id', '=', 'product.id')
                    ->where('cart.fk_user_id', '=', $userId)
                    ->where('cart.fk_product_id', '=', $uniqueObject->fk_original_product_id)
                    ->first();

                $serviceSubService = [];
            }


            $originalAndsub = (object) [
                "OriginalProductCurrentUser" => $OriginalProductCurrentUser,
                "serviceSubService" => $serviceSubService,
            ];


            array_push($CurrentUsercart, $originalAndsub);
        }


        $getCurrency = DB::table('currency')
            ->select('currency.*')
            ->leftJoin('global_option', 'global_option.fk_currency_id', '=', 'currency.id')
            ->first();
        return view('account.cart', ['CurrentUsercart' => $CurrentUsercart, 'getCurrency' => $getCurrency]);
    }

    public function removeCart($id)
    {

        $productId = $id;
        $userId = auth()->id();
        DB::table('cart')
            ->where('fk_user_id', '=', $userId)
            ->where('fk_original_product_id', '=', $productId)
            ->delete();


        return redirect()->route('cart')
            ->with('success', 'Service deleted successfully.');
    }

    public function myInfoEdit(Request $request)
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

            return view('account.my-info-edit', ['user' => $user, 'countries' => $countries, 'cities' => $cities]);
        } else {
            die("server error");
        }
    }

    public function TicketReplayUser(Request $request)
    {

        $user_id = $request->fk_user_id;
        $message = $request->message;
        $ticketId = $request->ticketId;

        $support_tickets_replay_id =  DB::table('support_tickets_replay')->insertGetId([
            'fk_support_ticket_id' => $ticketId,
            'fk_user_id' => $user_id,
            "message" => $message,
        ]);

        $files = $request->file('file');
        if (!empty($files)) {
            foreach ($files as $file) {
                $filename = time() . rand(1, 100) . '.' . $file->getClientOriginalExtension();
                $file->move(public_path('images/tickets'), $filename);
                DB::table('ticket_images')->insert([
                    'fk_support_ticket_id' => $ticketId,
                    'fk_support_replay_id' => $support_tickets_replay_id,
                    'file' => $filename,
                ]);
            }
            return redirect()->route('mysupportticket')
                ->with('success', 'Ticket created successfully.');
        } else {
            return redirect()->route('mysupportticket')
                ->with('success', 'Ticket created successfully.');
        }
    }

    public function myInfoUpdate(Request $request)
    {

        $name = $request->name;
        $last_name = $request->last_name;
        $id = $request->id;
        $company_name = $request->company_name;
        $position = $request->position;
        $email = $request->email;
        $phone_number = $request->phone_number;
        $fk_country_id = $request->country;
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
                    "position" => $position,
                    "email" => $email,
                    "fk_country_id" => $fk_country_id,
                    "fk_city_id" => $fk_city_id,
                    "address_line1" => $address_line1,
                    "address_line2" => $address_line2,
                    'phone_number' => $phone_number,
                    'updated_at' => now()
                ]);
            if ($updateUsers) {
                return redirect()->route('myinfo')
                    ->with('success', 'Info updated successfully.');
            }
        }
    }
    public function processPaymentt(Request $request)
    {
        return view('account.processt');
    }

    public function processPayment(Request $request)
    {


        $originalProductId = $request->originalProductId;
        $extaValueProductId = $request->extaValueProductId;
        $originalProductTotal = $request->originalProductTotal;
        $subProductQuantity = $request->subProductQuantity;
        $originalProductQuantity = $request->originalProductQuantity;
        $subProductUnitPrice = $request->subProductUnitPrice;
        $extaValueProductIdWithOriginal = $request->extaValueProductIdWithOriginal;
        $totalAmount = $request->totalAmount;
        $subProductCredit = $request->extaValueProductIdWithOriginalCredit;
        $originalProductCredit = $request->originalProductCredit;
        $userId = auth()->id();
        $credit = 0;



        DB::table('users')
            ->where('id', '=', $userId)
            ->update([
                'fk_country_id' => $request->country,
                "fk_city_id" => $request->city,
                'address_line1' => $request->address_line1,
                'address_line2' => $request->address_line2
            ]);

        $userdetails = DB::table('users')
            ->select('users.*', 'countries.name as countryName', 'cities.name as cityName')
            ->leftJoin('countries', 'countries.id', '=', 'users.fk_country_id')
            ->leftJoin('cities', 'cities.id', '=', 'users.fk_city_id')
            ->where('users.id', '=', $userId)
            ->first();


        $getCurrency = DB::table('currency')
            ->select('currency.*')
            ->leftJoin('global_option', 'global_option.fk_currency_id', '=', 'currency.id')
            ->first();




        \Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));



        $customer = \Stripe\Customer::create(array(
            'name' => $userdetails->name,
            'description' => 'test description',
            'email' =>  $userdetails->email,
            'source' => $request->input('stripeToken'),
            "address" => ["city" => $userdetails->cityName, "country" =>  $userdetails->countryName, "line1" =>  $userdetails->address_line1]

        ));


        try {
            $payement =  \Stripe\Charge::create(array(
                "amount" => $totalAmount,
                "currency" => $getCurrency->code,
                "customer" =>  $customer["id"],
                "description" => "Test payment."
            ));


            $orderId = DB::table('order')
                ->insertGetId([
                    'fk_user_id' => $userId,
                    'order_details' => "testing",
                    'payment_status' => 1,
                    'order_status' => 1,
                    'transaction_id' => 1000,
                ]);

            if (!empty($originalProductId)) {
                foreach ($originalProductId as $key => $originalProductId) {
                    DB::table('order_meta')
                        ->insert([
                            'fk_order_id' =>  $orderId,
                            'price' =>  $originalProductTotal[$key],
                            'fk_product_id' => $originalProductId,
                            'fk_original_product_id' => $originalProductId,
                            'credits' => $originalProductCredit[$key],
                            'quantity' => $originalProductQuantity[$key],
                            'total_payment' => $originalProductTotal[$key] * $originalProductQuantity[$key],
                        ]);
                }

                $credit =     $credit + $originalProductCredit[$key];

                if ($subProductCredit[$key] != null) {
                    $userCredit =  DB::table('credit_transaction')
                        ->select('*')
                        ->where('fk_user_id', '=', $userId)
                        ->latest('created_at')->first();

                    if ($userCredit == null) {
                        $total_credit = 0;
                    } else {
                        $total_credit = $userCredit->total_credit;
                    }
                    DB::table('credit_transaction')
                        ->insert([
                            'total_credit' => $total_credit + $credit,
                            'credit' => $credit,
                            'order_id' => $orderId,
                            'fk_product_id' => $originalProductId,
                            'fk_original_product_id' => $originalProductId,
                            'fk_user_id' =>  $userId,
                        ]);
                }
            }
            if (!empty($extaValueProductId)) {
                //$orderIdForTransaction = null;
                foreach ($extaValueProductId as $key => $extaValueProductId) {
                    DB::table('order_meta')
                        ->insert([
                            'fk_order_id' => $orderId,
                            'fk_product_id' => $extaValueProductId,
                            'fk_original_product_id' => $extaValueProductIdWithOriginal[$key],
                            'price' => $subProductUnitPrice[$key],
                            'credits' => $subProductCredit[$key],
                            'quantity' =>  $subProductQuantity[$key],
                            'total_payment' => $subProductUnitPrice[$key] * $subProductQuantity[$key]
                        ]);
                    $credit =   $credit + $subProductCredit[$key];
                    if ($subProductCredit[$key] != null) {
                        $userCredit =  DB::table('credit_transaction')
                            ->select('*')
                            ->where('fk_user_id', '=', $userId)
                            ->latest('created_at')->first();

                        if ($userCredit == null) {
                            $total_credit = 0;
                        } else {
                            $total_credit = $userCredit->total_credit;
                        }
                        DB::table('credit_transaction')
                            ->insert([
                                'total_credit' => $total_credit + $credit,
                                'credit' => $credit,
                                'order_id' => $orderId,
                                'fk_product_id' => $extaValueProductId,
                                'fk_original_product_id' => $extaValueProductIdWithOriginal[$key],
                                'fk_user_id' =>  $userId,
                            ]);
                    }
                }
            }

            sleep(5);
            DB::table('cart')
                ->where('fk_user_id', '=', $userId)
                ->delete();
            Session::flash('success-message', 'Payment done successfully !');
            return redirect()->route('orderdetailsuser', ['id' => $orderId])
                ->with('success', 'Order Added.');
        } catch (\Stripe\Error\Card $e) {
            dd("sdfsfsf");
            Session::flash('fail-message', $e->get_message());
            return redirect()->route('checkout')
                ->with('success', 'Order Added.');
        }
    }
}
