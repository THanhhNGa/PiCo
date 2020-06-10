<?php

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

Route::get('login', 'backend\LoginController@GetLogin')->middleware('CheckLogout');
Route::post('login', 'backend\LoginController@PostLogin');


// ----------------------------BACKEND-----------------------------------
Route::group(['prefix' => 'admin','middleware'=>'CheckLogin','namespace'=>'backend'], function () {
    Route::get('', 'LoginController@GetIndex');
    Route::get('logout', 'LoginController@Logout')->name('logout');

    // USER
    Route::group(['prefix' => 'user'], function () {
        Route::get('', 'UserController@GetUser')->name('user');
        Route::get('add', 'UserController@GetAddUser');
        Route::post('add', 'UserController@PostAddUser');
        Route::get('edit/{id}', 'UserController@GetEditUser')->name('edit_user');
        Route::post('edit/{id}', 'UserController@PostEditUser')->name('edit_user');
        Route::get('del/{id}', 'UserController@DelUser')->name('del_edit');
        Route::get('add', 'UserController@GetAddUser')->name('add');
        Route::post('add', 'UserController@PostAddUser')->name('add');
        Route::get('edit_user/{id}', 'UserController@GetEditUser')->name('edit_user');
        Route::post('edit_user/{id}', 'UserController@PostEditUser')->name('edit_user');
        Route::get('del/{id}', 'UserController@DelUser')->name('del');
    });

    // CATEGORY
    Route::group(['prefix' => 'category'], function () {
        Route::get('','CategoryController@GetCate')->name('category');
        Route::post('','CategoryController@PostCate');
        Route::get('edit/{id}','CategoryController@getEditCategory')->name('edit_cate');
        Route::post('edit/{id}','CategoryController@postEditCategory')->name('edit_cate');
        Route::get('del/{idCate}','CategoryController@delCategory')->name('del_cate');
        Route::post('','CategoryController@PostCate')->name('category');
        Route::get('edit/{idCate}','CategoryController@getEditCategory');
        Route::post('edit/{idCate}','CategoryController@postEditCategory');
        Route::get('del/{idCate}','CategoryController@delCategory');
    });

     //ql order
    Route::group(['prefix'=>'order'],function(){
        //đơn chưa xử lý
        Route::get('order_list','OrderController@list')->name('order_list');
        Route::get('search','OrderController@search')->name('search');
        //đã xử lý
        Route::get('processed','OrderController@processed')->name('processed');
        Route::get('search_processed','OrderController@search_processed')->name('search_processed');

        ROute::get('order_detail/{id}','OrderController@order_detail')->name('order_detail');
        Route::post('update_order','OrderController@update_order')->name('update_order');
    });
    

    //product
    Route::group(['prefix'=>'product'], function(){
        Route::get('','ProductController@index')->name('index_pro');
        Route::get('add_pro','ProductController@add_pro')->name('add_pro');
        Route::post('add_pro','ProductController@post_add_pro')->name('add_pro');

        Route::get('edit_pro/{id}','ProductController@edit_pro')->name('edit_pro');
        Route::post('edit_pro/{id}','ProductController@post_edit_pro')->name('edit_pro');

        Route::get('del_pro/{id}','ProductController@del_pro')->name('del_pro');

        //
        Route::post('add_attr','ProductController@AddAttr')->name('add_attr');

        Route::get('detail_attr','ProductController@DetailAttr')->name('detail_attr');
        Route::get('edit_attr/{id}','ProductController@EditAttr')->name('edit_attr');
        Route::post('edit_attr/{id}','ProductController@Post_EditAttr')->name('edit_attr');
        Route::get('delete_attr/{id}','ProductController@DelAttr')->name('delete_attr');

        //
        Route::post('add_value','ProductController@AddValue')->name('add_value');
        Route::get('edit_value/{id}','ProductController@EditValue')->name('edit_value');
        Route::post('edit_value/{id}','ProductController@Post_EditValue')->name('edit_value');

        Route::get('add_variant/{id}','ProductController@AddVariant')->name('add_variant');
        Route::post('add_variant/{id}','ProductController@PostAddVariant')->name('add_variant');
        Route::get('edit_variant/{id}','ProductController@EditVariant')->name('edit_variant');
        Route::post('edit_variant/{id}','ProductController@PostEditVariant')->name('edit_variant');
        Route::get('del_variant/{id}','ProductController@DelVariant')->name('del_variant');
    });
});

// ----------------------FRONTEND------------------------------------
Route::get('','frontend\HomeController@getIndex')->name('index');
Route::group(['prefix' => 'product'], function () {
    Route::get('','frontend\ProductController@ListProduct');
    Route::get('detail/{id}','frontend\ProductController@DetailProduct')->name('detail');
    // Route::get('add_cart','frontend\ProductController@AddCart')->name('add_cart');
    // Route::get('cart','frontend\ProductController@GetCart');
    // Route::get('checkout','frontend\ProductController@CheckOut');
    // Route::get('complete','frontend\ProductController@complate');

    

});
//giỏ hàng
Route::group(['prefix'=>'customer'],function(){
    Route::group(['prefix'=>'cart','namespace'=>'frontend'],function(){
        Route::get('show-cart','CartController@show')->name('show-cart');
        Route::get('add-cart/{id}','CartController@add')->name('add-cart');
        Route::get('update-cart/{id}','CartController@update')->name('update-cart');
        Route::get('delete-cart/{id}','CartController@delete')->name('delete-cart');
        Route::get('sign_checkout','CartController@sign')->name('sign_checkout');

        Route::get('check-out','CheckoutController@get_check_out')->name('check_out');
        Route::post('check-out','CheckoutController@post_check_out')->name('check_out');
        Route::get('complete',function(){
            return view('frontend.complete');
        })->name('complete');
    });
    

     //ql tài khoản
    Route::group(['prefix'=>'account','namespace'=>'frontend'],function(){
        Route::get('login_cus','CustomerController@login')->name('login_cus');
        Route::post('login_cus','CustomerController@post_login')->name('login_cus');
        Route::get('logout','CustomerController@logout')->name('logout_cus');
        Route::get('register','CustomerController@register')->name('register');
        Route::post('register','CustomerController@post_register')->name('register');
    });
   
    
});
Route::get('categories/{slug}','frontend\HomeController@Categories')->name('categories');
Route::get('checkout','frontend\HomeController@Checkout');
Route::get('register','frontend\HomeController@Register');
Route::get('checklog','frontend\HomeController@CheckLog');
Route::get('cart','frontend\HomeController@Cart');
//reset pass
Route::get('reset_pass','frontend\HomeController@reset_pass')->name('reset_pass');
Route::post('reset_pass','frontend\HomeController@sendCodeResetPass')->name('reset_pass');
Route::post('reset_pass','frontend\HomeController@getResetPass')->name('reset_pass');


