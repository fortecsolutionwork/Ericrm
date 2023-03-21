<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//Clear config cache
Route::get("/config-cache", function () {
    \Artisan::call("config:cache");
    return "Config cache cleared";
});


Route::get("/stoarge", function () {
    \Artisan::call("storage:link");
    return "Config cache cleared";
});

// Clear application cache
Route::get("/clear-cache", function () {
    \Artisan::call("cache:clear");
    return "Application cache cleared";
});

Route::get("/route-clear", function () {
    \Artisan::call("route:clear");
    return "Application cache cleared";
});

// Clear view cache
Route::get("/view-clear", function () {
    \Artisan::call("view:clear");
    return "View cache cleared";
});


Route::get('/', function () {
    return view('welcome');
});

Auth::routes();
Route::group(["prefix" => "admin"], function () {
    Route::middleware(['auth', 'adminauth'])->group(function () {
        Route::get('/dashboard', [App\Http\Controllers\AdminController::class, 'dashboard'])->name('dashboardadmin');
        Route::get('/orders', [App\Http\Controllers\AdminController::class, 'orders'])->name('orders');
        Route::get('/order-delete/{id}', [App\Http\Controllers\AdminController::class, 'orderDelete'])->name('orderdelete');
        Route::get('/new-order', [App\Http\Controllers\AdminController::class, 'newOrder'])->name('neworder');
        Route::post('/store-new-order', [App\Http\Controllers\AdminController::class, 'storeNewOrder'])->name('storeneworder');
        Route::post('/delete-order-product/{id}/{orderId}', [App\Http\Controllers\AdminController::class, 'DeleteOrderProduct'])->name('deleteorderproduct');
        Route::get('/all-tickets', [App\Http\Controllers\AdminController::class, 'AllTickets'])->name('alltickets');
        Route::get('/create-ticket', [App\Http\Controllers\AdminController::class, 'CreateTicket'])->name('createticket');
        Route::Post('/store-ticket', [App\Http\Controllers\AdminController::class, 'StoreTicket'])->name('storeticket');
        Route::get('/order-details/{id}', [App\Http\Controllers\AdminController::class, 'OrderDetails'])->name('orderdetails');
        Route::get('/edit-order/{id}', [App\Http\Controllers\AdminController::class, 'EditOrder'])->name('editorder');
        Route::post('/store-edit-order', [App\Http\Controllers\AdminController::class, 'StoreEditOrder'])->name('storeeditorder');
        Route::get('/ticket-details/{id}/{userId}', [App\Http\Controllers\AdminController::class, 'TicketDetails'])->name('ticketdetails');
        Route::post('/ticket-replay', [App\Http\Controllers\AdminController::class, 'TicketReplay'])->name('ticketreplay');
        Route::get('/edit-ticket/{id}', [App\Http\Controllers\AdminController::class, 'EditTicket'])->name('editticket');
        Route::get('/delete-ticket/{id}', [App\Http\Controllers\AdminController::class, 'DeleteTicket'])->name('deleteticket');
        Route::post('/update-ticket', [App\Http\Controllers\AdminController::class, 'updateTicket'])->name('updateticket');
        Route::get('/all-user', [App\Http\Controllers\AdminController::class, 'AllUser'])->name('alluser');
        Route::get('/add-user', [App\Http\Controllers\AdminController::class, 'AddUser'])->name('adduser');
        Route::POST('/store-user', [App\Http\Controllers\AdminController::class, 'StoreUser'])->name('storeuser');
        Route::get('/edit-user/{id}', [App\Http\Controllers\AdminController::class, 'EditUser'])->name('edituser');
        Route::post('/update-user', [App\Http\Controllers\AdminController::class, 'updateUser'])->name('updateuser');
        Route::get('/delete-user/{id}', [App\Http\Controllers\AdminController::class, 'deleteUser'])->name('deleteuser');
        Route::get('/user-details/{id}', [App\Http\Controllers\AdminController::class, 'UserDetails'])->name('userdetails');
        Route::get('/all-product', [App\Http\Controllers\AdminController::class, 'AllProduct'])->name('allproduct');
        Route::get('/add-product', [App\Http\Controllers\AdminController::class, 'AddProduct'])->name('addproduct');
        Route::post('/store-product', [App\Http\Controllers\AdminController::class, 'StoreProduct'])->name('storeproduct');
        Route::get('/edit-product/{id}', [App\Http\Controllers\AdminController::class, 'EditProduct'])->name('editproduct');
        Route::post('/update-product', [App\Http\Controllers\AdminController::class, 'UpdateProduct'])->name('updateproduct');
        Route::get('/all-category', [App\Http\Controllers\AdminController::class, 'AllCategory'])->name('allcategory');
        Route::get('/add-category', [App\Http\Controllers\AdminController::class, 'AddCategory'])->name('addcategory');
        Route::POST('/store-category', [App\Http\Controllers\AdminController::class, 'StoreCategory'])->name('storecategory');
        Route::get('/get-extra-value-product', [App\Http\Controllers\AdminController::class, 'GetExtraValueProduct'])->name('getextravalueproduct');
        Route::get('/get-extra-value-product-by-id', [App\Http\Controllers\AdminController::class, 'GetExtraValueProductById'])->name('getextravalueproductbyid');
        Route::get('/edit-category/{id}', [App\Http\Controllers\AdminController::class, 'EditCategory'])->name('editcategory');
        Route::POST('/update-category', [App\Http\Controllers\AdminController::class, 'UpdateCategory'])->name('updatecategory');
        Route::get('/delet-category/{id}', [App\Http\Controllers\AdminController::class, 'DeleteCategory'])->name('deletecategory');
        Route::get('/delet-product/{id}', [App\Http\Controllers\AdminController::class, 'DeleteProduct'])->name('deleteproduct');
        Route::group(["prefix" => "account"], function () {
            Route::get('/my-info', [App\Http\Controllers\AdminController::class, 'MyInfo'])->name('myinfoadmin');
            Route::get('/password', [App\Http\Controllers\AdminController::class, 'PasswordAdmin'])->name('passwordadmin');
            Route::get('/my-info-edit', [App\Http\Controllers\AdminController::class, 'MyInfoEdit'])->name('myinfoeditadmin');
            Route::POST('/my-info-update', [App\Http\Controllers\AdminController::class, 'myInfoUpdate'])->name('Myinfoupdate');
        });
        Route::group(["prefix" => "user-detail"], function () {
            Route::get('/support-tickets/{id}', [App\Http\Controllers\AdminController::class, 'SupportTickets'])->name('supporttickets');
            Route::get('/orders/{id}', [App\Http\Controllers\AdminController::class, 'UserDetailsOrders'])->name('userdetailsorders');
            Route::get('/payment-cards/{id}', [App\Http\Controllers\AdminController::class, 'PaymentCards'])->name('paymentscard');
            Route::get('/credits/{id}', [App\Http\Controllers\AdminController::class, 'Credits'])->name('credits');
            Route::get('/password/{id}', [App\Http\Controllers\AdminController::class, 'Password'])->name('password');
        });
    });
});

Route::group(["prefix" => "account"], function () {
    Route::middleware(['auth', 'accountauth'])->group(function () {
        Route::get('/dashboard', [App\Http\Controllers\AccountController::class, 'dashboard'])->name('dashboard');
        Route::get('/manage-products/{id}', [App\Http\Controllers\AccountController::class, 'ManageProducts'])->name('manageproducts');
        Route::get('/category', [App\Http\Controllers\AccountController::class, 'Category'])->name('category');
        Route::get('/my-order', [App\Http\Controllers\AccountController::class, 'Myorder'])->name('myorder');
        Route::get('/my-assets', [App\Http\Controllers\AccountController::class, 'Myassets'])->name('myassets');
        Route::get('/add-assets', [App\Http\Controllers\AccountController::class, 'Addassets'])->name('addassets');
        Route::post('/store-assets', [App\Http\Controllers\AccountController::class, 'StoreAssets'])->name('storeassets'); 
        Route::get('/assets-edit/{id}', [App\Http\Controllers\AccountController::class, 'AssetsEdit'])->name('assetsedit'); 
        Route::get('/assets-delete/{id}', [App\Http\Controllers\AccountController::class, 'AssetsDelete'])->name('assetdelet'); 
        Route::post('/assets-update', [App\Http\Controllers\AccountController::class, 'AssetsUpdate'])->name('assetsupdate'); 
        Route::get('/my-support-ticket', [App\Http\Controllers\AccountController::class, 'MySupportTicket'])->name('mysupportticket');
        Route::get('/open-new-support-ticket', [App\Http\Controllers\AccountController::class, 'openNewSupportTicket'])->name('opennewsupportticket');
        Route::post('/user-store-ticket', [App\Http\Controllers\AccountController::class, 'UserStoreTicket'])->name('userstoreticket');
        Route::get('/website/{id}', [App\Http\Controllers\AccountController::class, 'Website'])->name('website');
        Route::get('/my-info', [App\Http\Controllers\AccountController::class, 'MyInfo'])->name('myinfo');
        Route::get('/my-info-edit', [App\Http\Controllers\AccountController::class, 'myInfoEdit'])->name('myinfoedit');
        Route::get('/password', [App\Http\Controllers\AccountController::class, 'Password'])->name('password');
        Route::get('/payment-and-billing', [App\Http\Controllers\AccountController::class, 'paymentandbilling'])->name('paymentandbilling');
        Route::get('/referrel', [App\Http\Controllers\AccountController::class, 'referrel'])->name('referrel');
        Route::get('/preferences', [App\Http\Controllers\AccountController::class, 'preferences'])->name('preferences');
        Route::get('/webzolution-credits', [App\Http\Controllers\AccountController::class, 'webzolutionCredits'])->name('webzolutioncredits');
        Route::get('/cart', [App\Http\Controllers\AccountController::class, 'cart'])->name('cart');
        Route::post('/ticket-replay-user', [App\Http\Controllers\AccountController::class, 'TicketReplayUser'])->name('ticketreplayuser');
        Route::get('/checkout', [App\Http\Controllers\AccountController::class, 'Checkout'])->name('checkout');
        Route::get('/order-details/{id}', [App\Http\Controllers\AccountController::class, 'orderDetailsUser'])->name('orderdetailsuser');
        Route::get('/remove-cart/{id}', [App\Http\Controllers\AccountController::class, 'removeCart'])->name('removecart');
        Route::post('/update-cart', [App\Http\Controllers\AccountController::class, 'UpdateCart'])->name('updatecart');
        Route::post('/store-to-cart', [App\Http\Controllers\AccountController::class, 'StoreToCart'])->name('storetocart');
        Route::post('/my-info-update', [App\Http\Controllers\AccountController::class, 'myInfoUpdate'])->name('myinfoupdate');
        Route::post('/process', [App\Http\Controllers\AccountController::class, 'processPayment'])->name('process');
        Route::get('/processt', [App\Http\Controllers\AccountController::class, 'processPaymentt'])->name('processt');
        Route::group(["prefix" => "support"], function () {
            Route::get('/ticket/{id}', [App\Http\Controllers\AccountController::class, 'Ticket'])->name('ticket');
        });
    });
});

//master page universal 
Route::get('/gallary', [App\Http\Controllers\PageController::class, 'gallary'])->name('gallary');
Route::get('/services', [App\Http\Controllers\PageController::class, 'services'])->name('services');
Route::get('/unique-website', [App\Http\Controllers\PageController::class, 'uniqueWebsite'])->name('uniquewebsite');
Route::get('/presentation-template-design', [App\Http\Controllers\PageController::class, 'presentationTemplateDesign'])->name('presentationtemplatedesign');
Route::get('/NFC-business-card', [App\Http\Controllers\PageController::class, 'NFCBusinessCard'])->name('nfcbusinesscard');
Route::get('/unauthorized', [App\Http\Controllers\PageController::class, 'unauthorized'])->name('unauthorized');


//common controller like country state city 
Route::post('/get-city-by-country', [App\Http\Controllers\CommonController::class, 'getCityByCountry'])->name('getcitybycountry');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
