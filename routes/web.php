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


Route::get('/', ['as'=>'home', 'uses'=>'HomeController@home_view']);
Route::get('/terms',['as'=>'terms','uses'=>'HomeController@terms']);
Route::get('/complaint',['as'=>'complaint','uses'=>'HomeController@complaint']);
Route::get('/employment/form',['as'=>'employment.form','uses'=>'JobController@form']);
Route::post('/employment/store',['as'=>'job.store','uses'=>'JobController@store']);
// Route::get('/', function () {
//     return view('home');
// });
Route::post('/payment/verify', ['as'=>'callback', 'uses'=>'HomeController@callback']);
Route::group(['prefix' => 'admin'], function () {
  
  Route::get('/login', 'AdminAuth\LoginController@showLoginForm')->name('login');
  Route::post('/login', 'AdminAuth\LoginController@login');
  Route::post('/logout', 'AdminAuth\LoginController@logout')->name('logout');

//   Route::get('/register', 'AdminAuth\RegisterController@showRegistrationForm')->name('register');
//   Route::post('/register', 'AdminAuth\RegisterController@register');

//   Route::post('/password/email', 'AdminAuth\ForgotPasswordController@sendResetLinkEmail')->name('password.request');
//   Route::post('/password/reset', 'AdminAuth\ResetPasswordController@reset')->name('password.email');
//   Route::get('/password/reset', 'AdminAuth\ForgotPasswordController@showLinkRequestForm')->name('password.reset');
//   Route::get('/password/reset/{token}', 'AdminAuth\ResetPasswordController@showResetForm');
});

Route::group(['prefix' => 'customer'], function () {
//   Route::get('/login', 'CustomerAuth\LoginController@showLoginForm')->name('login');
  Route::post('/login', 'CustomerAuth\LoginController@login');
  Route::post('/logout', 'CustomerAuth\LoginController@logout')->name('logout');

//   Route::get('/register', 'CustomerAuth\RegisterController@showRegistrationForm')->name('register');
  Route::post('/register', 'CustomerAuth\RegisterController@register');

  Route::post('/password/email', 'CustomerAuth\ForgotPasswordController@sendResetLinkEmail')->name('password.request');
  Route::post('/password/reset', 'CustomerAuth\ResetPasswordController@reset')->name('password.email');
  Route::get('/password/reset', 'CustomerAuth\ForgotPasswordController@showLinkRequestForm')->name('password.reset');
  Route::get('/password/reset/{token}', 'CustomerAuth\ResetPasswordController@showResetForm');
});


// Route::middleware([['auth:admin']])->group(function () {
    
//     // Route::get('/hi', function () {
//     //     return ("hi");
//     // });
    
    

// });



Route::group([
    'middleware' => ['web', 'auth:admin'], //you need to add the last middleware to array to fix it (version < v.1.0.6)
    'prefix' => 'admin',
    
    
], function () {
    Route::get('/product/disactive', ['as'=>'products.disactive', 'uses'=>'ProductController@disactive']);
    
    Route::get('category/reorder',['as'=>'sort','uses'=>'CategoryController@sort']);
    Route::post('cateory/reorder',['as'=>'reorder','uses'=>'CategoryController@reorder']);
    
    Route::get('/employments',['as'=>'employment.index','uses'=>'JobController@index']);
    Route::get('/employments/{job}',['as'=>'job.show','uses'=>'JobController@show']);
   Route::get('/home',['as'=>'admin_home','uses'=>'ReportController@home']);
   
   Route::get('/tempers',['as'=>'tempers.index','uses'=>'QuestionController@tempers']);
   Route::get('/caegpry/{id}', ['as'=>'products.category', 'uses'=>'ProductController@single_category']);
   Route::get('/discount/products', ['as'=>'products.discount', 'uses'=>'ProductController@discount']);
   Route::get('/free/products', ['as'=>'products.free', 'uses'=>'ProductController@free']);
   
   Route::post('/add/product/{id}', ['as'=>'order.sale.add', 'uses'=>'SaleController@add_product']);
   Route::resource('products','ProductController');
   Route::resource('customers','AdminCustomerController');
   Route::resource('categories','CategoryController');
   Route::resource('orders','OrderController');
   Route::resource('promocode','PromocodeController');
   Route::resource('banner','BannerController');
   Route::resource('story','StoryController');
   Route::resource('message','MessageController');
   Route::resource('property','PropertyController');
   Route::resource('sale','SaleController');
   Route::resource('transactions','TransactionController');
   Route::resource('costs','CostController');
   
   
   Route::post('/products/update_quantity', ['as'=>'quantity.update', 'uses'=>'ProductController@update_quantity']);
   Route::post('/products/update_multiple', ['as'=>'multiple.update', 'uses'=>'ProductController@update_multiple']);
   Route::patch('/orders/update_delivery/{order}', ['as'=>'orders.update_delivery', 'uses'=>'OrderController@update_delivery']);
   Route::patch('/orders/update_payed/{order}', ['as'=>'orders.update_payed', 'uses'=>'OrderController@update_payed']);
   Route::resource('reviews','ReviewController');
   Route::post('/products/search', ['as'=>'admin.product.search', 'uses'=>'ProductController@product_search']);
   Route::get('/photos/product/{product}', ['as'=>'product.photos', 'uses'=>'PhotoController@add_photos']);
   Route::get('/customers/transactions/{id}', ['as'=>'customers.show1', 'uses'=>'AdminCustomerController@show1']);
   Route::get('/customers/cart/{id}', ['as'=>'customers.cart', 'uses'=>'AdminCustomerController@cart']);
   
   Route::get('category/{category}/property',['as'=>'categories.properties', 'uses'=>'PropertyController@category_add']);
   Route::post('category/property/add',['as'=>'category.property.store', 'uses'=>'PropertyController@category_store']);
   Route::post('category/property/update',['as'=>'category.property.update', 'uses'=>'PropertyController@category_update']);
   Route::get('product/{product}/property',['as'=>'products.properties', 'uses'=>'PropertyController@product_add']);
   Route::post('product/property/add',['as'=>'product.property.store', 'uses'=>'PropertyController@product_store']);
   
   Route::post('stores/{store}/message',['as'=>'store.message.store', 'uses'=>'AdminStoreController@send_notification']);
   Route::get('stores',['as'=>'admin.store.index', 'uses'=>'AdminStoreController@index']);
   Route::get('stores/edit/{store}',['as'=>'admin.store.edit', 'uses'=>'AdminStoreController@edit']);
   Route::get('stores/{store}/notification',['as'=>'admin.store.notification', 'uses'=>'AdminStoreController@notification']);
   Route::put('stores/{store}/notification',['as'=>'admin.store.notification.store', 'uses'=>'AdminStoreController@send_notification']);
   Route::get('stores/{store}/products',['as'=>'admin.store.products', 'uses'=>'ProductController@vendor_products']);


});

Route::get('/tags/autosearch', ['as'=>'tags.autosearch', 'uses'=>'ProductController@tags_autosearch']); 
Route::group([
    'middleware' => ['web'], //you need to add the last middleware to array to fix it (version < v.1.0.6)
    ], function () {
        Route::get('/product/{id}', ['as'=>'product.show', 'uses'=>'HomeController@single_product']);
        Route::get('/vendors', ['as'=>'vendors', 'uses'=>'HomeController@vendor']);
        Route::post('cart', ['as'=>'cart.add', 'uses'=>'CartController@add']);
        
        Route::post('cart/remove', ['as'=>'cart.remove', 'uses'=>'CartController@remove']);
        Route::post('cart/delete', ['as'=>'cart.delete', 'uses'=>'CartController@delete']);
        
        Route::get('/category/{id}', ['as'=>'category.show', 'uses'=>'HomeController@category_select']);
        Route::get('/maincategory/{id}', ['as'=>'maincat.show', 'uses'=>'HomeController@maincat_select']);
        
        
        Route::post('review/add', ['as'=>'review.add', 'uses'=>'HomeController@review_store']);
        Route::post('comment/add', ['as'=>'comment.add', 'uses'=>'HomeController@comment_store']);
        Route::get('/search', ['as'=>'product.search', 'uses'=>'HomeController@product_search']);
        Route::get('/shop', ['as'=>'shop', 'uses'=>'HomeController@shop']);
        Route::get('/cart', ['as'=>'cart', 'uses'=>'HomeController@cart']);
        Route::post('/address', ['as'=>'add.address', 'uses'=>'AddressController@store']);
        Route::post('/payment', ['as'=>'payment', 'uses'=>'HomeController@payment']);
        Route::get('/invoice', ['as'=>'invoice', 'uses'=>'HomeController@invoice']);
        Route::get('/homeproducts', ['as'=>'homeproducts', 'uses'=>'HomeController@homeproducts']);
        Route::get('/homeproducts1', ['as'=>'homeproducts1', 'uses'=>'HomeController@homeproducts1']);
        
        Route::post('/add_like', ['as'=>'add.like', 'uses'=>'HomeController@add_like']);
        Route::post('/aremove_like', ['as'=>'remove.like', 'uses'=>'HomeController@remove_like']);
        Route::resource('mahalisaz','MahalisazController');
        Route::resource('mahaliyar','MahaliyarController');
        Route::resource('mahalikhah','MahalikhahController');
        route::get('thankyou',['as'=>'thankyou', 'uses'=>'HomeController@thankyou']);
        
        Route::get('/blog', ['as'=>'blog', 'uses'=>'HomeController@blog']);
        Route::get('/blog/{slug}', ['as'=>'blog.show', 'uses'=>'HomeController@blog_show']);
        Route::get('/amp/blog/{slug}', ['as'=>'blog.ampshow', 'uses'=>'HomeController@blog_amp']);
        Route::get('/contact-us', ['as'=>'contact', 'uses'=>'HomeController@contact']);
        Route::post('/your-message', ['as'=>'your_message', 'uses'=>'HomeController@your_message']);
        Route::get('/vendor/{store}/{category?}', ['as'=>'store.page', 'uses'=>'HomeController@show_store']);
});

 Route::get('products/autocomplete',[
    'uses'=>'HomeController@autocomplete',
    'as'=>'proudcts.autocomplete'
    ]);
  
// Route::group([
//     'middleware' => ['web','customerAuth'], //you need to add the last middleware to array to fix it (version < v.1.0.6)
//     ], function () {
//         Route::post('/customer/{id}/store/address/', ['as'=>'store.address', 'uses'=>'AddressController@store1']);
//      Route::get('/customer/{id}/profile', ['as'=>'customer.panel', 'uses'=>'CustomerController@show']);
//      Route::get('/customer/{id}/favorites', ['as'=>'customer.favorites', 'uses'=>'CustomerController@favorites']); 
//      Route::get('/customer/{id}/orders', ['as'=>'customer.orders', 'uses'=>'CustomerController@orders']); 
//      Route::get('/customer/{id}/order/{order_id}', ['as'=>'customer.orders.show', 'uses'=>'CustomerController@orders_show']); 
//      Route::get('/customer/{id}/addresses', ['as'=>'customer.addresses', 'uses'=>'CustomerController@addresses']); 
//      Route::post('/customer/{id}/edit', ['as'=>'customer.edit.profile', 'uses'=>'CustomerController@edit_profile']);
//      Route::post('/customer/{id}/address/{address_id}', ['as'=>'edit.address', 'uses'=>'AddressController@update']);
//      Route::post('/customer/{id}/address/{address_id}/delete', ['as'=>'delete.address', 'uses'=>'AddressController@destroy']);
     
//     });
Route::get('/temper', ['as'=>'temper.first', 'uses'=>'QuestionController@temper1']);
Route::group([
    'middleware' => ['web','auth:customer'], //you need to add the last middleware to array to fix it (version < v.1.0.6)
    ], function () {
         
         Route::post('/temper', ['as'=>'temper1.store', 'uses'=>'QuestionController@temper1_store']);
         
         Route::post('/customer/store/address/', ['as'=>'store.address', 'uses'=>'AddressController@store1']);
         Route::get('/customer/profile', ['as'=>'customer.panel', 'uses'=>'CustomerController@show']);
         Route::get('/customer/favorites', ['as'=>'customer.favorites', 'uses'=>'CustomerController@favorites']); 
         Route::get('/customer/orders', ['as'=>'customer.orders', 'uses'=>'CustomerController@orders']); 
         Route::get('/customer/order/{order_id}', ['as'=>'customer.orders.show', 'uses'=>'CustomerController@orders_show']); 
         Route::get('/customer/addresses', ['as'=>'customer.addresses', 'uses'=>'CustomerController@addresses']); 
         Route::post('/customer/edit', ['as'=>'customer.edit.profile', 'uses'=>'CustomerController@edit_profile']);
         Route::post('/customer/address/{address_id}', ['as'=>'edit.address', 'uses'=>'AddressController@update']);
         Route::post('/customer/address/{address_id}/delete', ['as'=>'delete.address', 'uses'=>'AddressController@destroy']);
         Route::post('/code_check', ['as'=>'check.code', 'uses'=>'CustomerController@check_code']);
         Route::get('/free', ['as'=>'free', 'uses'=>'CustomerController@free']);
    });

    
    
Route::get('sitemap', ['as'=>'sitempa', 'uses'=>'HomeController@sitemap']);
Route::group(['prefix' => 'store'], function () {
  Route::get('/login', 'StoreAuth\LoginController@showLoginForm')->name('login');
  Route::get('store/login', 'StoreAuth\LoginController@showLoginForm')->name('login');
  Route::post('/login', 'StoreAuth\LoginController@login');
  Route::post('/logout', 'StoreAuth\LoginController@logout')->name('logout');

  Route::get('/register', 'StoreAuth\RegisterController@showRegistrationForm')->name('register');
  Route::post('/register', 'StoreAuth\RegisterController@register');

  Route::post('/password/email', 'StoreAuth\ForgotPasswordController@sendResetLinkEmail')->name('password.request');
  Route::post('/password/reset', 'StoreAuth\ResetPasswordController@reset')->name('password.email');
  Route::get('/password/reset', 'StoreAuth\ForgotPasswordController@showLinkRequestForm')->name('password.reset');
  Route::get('/password/reset/{token}', 'StoreAuth\ResetPasswordController@showResetForm');
});


Route::group([
    'middleware' => ['web','auth:store'], //you need to add the last middleware to array to fix it (version < v.1.0.6)
    'prefix' => 'store',
    ], function () {
         Route::get('/home', ['as'=>'store.home', 'uses'=>'StoreController@index']);
        Route::resource('/store','StoreController', ['except' => [ 'update']]);
        Route::get('/products/add',['as'=>'store.products.add', 'uses'=>'StoreController@add_product']);
        Route::get('/products/edit/{product}',['as'=>'store.products.edit', 'uses'=>'StoreController@edit_product']);
        Route::put('/products/edit/{product}',['as'=>'store.products.update', 'uses'=>'StoreController@update_product']);
        Route::get('/products',['as'=>'store.products', 'uses'=>'StoreController@products']);
        Route::post('/products/add',['as'=>'store.products.store', 'uses'=>'StoreController@store_product']);
        Route::get('/photos/products/{product}', ['as'=>'store.product.photos', 'uses'=>'StoreController@add_photos']);
        Route::get('/notifications', ['as'=>'store.notifications.show', 'uses'=>'StoreController@notifications']);
        
        //  Route::get('/customer/favorites', ['as'=>'customer.favorites', 'uses'=>'CustomerController@favorites']); 
        //  Route::get('/customer/orders', ['as'=>'customer.orders', 'uses'=>'CustomerController@orders']); 
        //  Route::get('/customer/order/{order_id}', ['as'=>'customer.orders.show', 'uses'=>'CustomerController@orders_show']); 
        //  Route::get('/customer/addresses', ['as'=>'customer.addresses', 'uses'=>'CustomerController@addresses']); 
        //  Route::post('/customer/edit', ['as'=>'customer.edit.profile', 'uses'=>'CustomerController@edit_profile']);
        //  Route::post('/customer/address/{address_id}', ['as'=>'edit.address', 'uses'=>'AddressController@update']);
        //  Route::post('/customer/address/{address_id}/delete', ['as'=>'delete.address', 'uses'=>'AddressController@destroy']);
        //  Route::post('/code_check', ['as'=>'check.code', 'uses'=>'CustomerController@check_code']);
        //  Route::get('/free', ['as'=>'free', 'uses'=>'CustomerController@free']);
    });
    
Route::group([
    'middleware' => ['web','storeAdmin'], //you need to add the last middleware to array to fix it (version < v.1.0.6)
    ], function () {
        Route::resource('photo','PhotoController');
        Route::resource('/store','StoreController', ['only' => [ 'update']]);
    });
Route::post('/getcities',['as'=>'get_cities', 'uses'=>'StoreController@get_cities']);

