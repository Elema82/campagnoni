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

Route::get('/', 'FrontendController@home')->name('home');

Route::get('/productos/motores-electricos', 'FrontendController@showProductsEngines')->name('engines');

Route::get('/productos/jardin', 'FrontendController@showProductsGarden')->name('garden');

Route::get('/productos/ventilacion', 'FrontendController@showProductsVentilation')->name('ventilation');

Route::get('/productos/riego', 'FrontendController@showProductsIrrigation')->name('irrigation');

Route::get('/productos/calefaccion', 'FrontendController@showProductsHeating')->name('heating');

Route::get('productos/{category}/{product}/{name}', 'FrontendController@showProduct')->where([

    ])->name('single-product');

Route::get('/novedades', function () {
    return view('index-news');
})->name('news');

Route::get('/contacto', 'FrontendController@showContact')->name('showContact');

Route::post('/contacto', 'FrontendController@contact')->name('contact');

Route::get('/quienes-somos', 'FrontendController@aboutUs')->name('about-us');

Route::get('/novedades', 'FrontendController@showNews')->name('showNews');

Route::get('novedades/{news}/{title}', 'FrontendController@singleNews')->name('single-news');


//Route::get('/admin', function () {return view('adminlte::auth.login');});
//Route::get('/admin', "\Laravel\Dusk\Http\Controllers\UserController@login")->name('admin');
Route::get('/admin', "HomeController@login")->name('admin');

Auth::routes();

Route::group(['middleware' => 'auth'], function () {
    Route::prefix('admin')->group(function () {
        Route::namespace('Admin')->group(function () {
            Route::get('/users', "AdminUsersControllers@index")->name('users');
            Route::post('/users', "AdminUsersControllers@store");
            Route::post('/users/{user}', "AdminUsersControllers@update");
            Route::get('/users/{user}', "AdminUsersControllers@show");
//
            Route::get('/products', "AdminProductsControllers@index")->name("adminProducts");
            Route::get('/products/create', "AdminProductsControllers@prestore")->name('createProduct');
            Route::post('/products', "AdminProductsControllers@store")->name("saveProduct");
            Route::post('/products/update/{product}', "AdminProductsControllers@update")->name("updateProduct");
            Route::get('/products/{product}', "AdminProductsControllers@show")->name("showProduct");
            Route::get('/products/delete/{product}', "AdminProductsControllers@delete")->name('deleteProduct');

            Route::get('/productscategory', "AdminProductsCategoryControllers@index")->name("adminProductsCategory");
            Route::get('/productscategory/create', "AdminProductsCategoryControllers@prestore")->name('createProductCategory');
            Route::post('/productscategory', "AdminProductsCategoryControllers@store")->name("saveProductCategory");
            Route::post('/productscategory/update/{product}', "AdminProductsCategoryControllers@update")->name("updateProductCategory");
            Route::get('/productscategory/{product}', "AdminProductsCategoryControllers@show")->name("showProductCategory");
            Route::get('/productscategory/delete/{product}', "AdminProductsCategoryControllers@delete")->name('deleteProductCategory');
//

            Route::get('/categories', "AdminCategoriesControllers@index")->name('adminCategories');
            Route::get('/categories/create', "AdminCategoriesControllers@prestore")->name('createCategory');
            Route::post('/categories', "AdminCategoriesControllers@store")->name('saveCategory');
            Route::post('/categories/update/{category}', "AdminCategoriesControllers@update")->name('updateCategory');
            Route::get('/categories/{category}', "AdminCategoriesControllers@show")->name('showCategory');
            Route::get('/categories/delete/{category}', "AdminCategoriesControllers@delete")->name('deleteCategory');

            Route::get('/news', "AdminNewsControllers@index")->name('adminNews');
            Route::get('/news/create', "AdminNewsControllers@prestore")->name('createNew');
            Route::post('/news', "AdminNewsControllers@store")->name('saveNew');
            Route::post('/news/update/{news}', "AdminNewsControllers@update")->name("updateNew");
            Route::post('/news/{news}', "AdminNewsControllers@update");
            Route::get('/news/{news}', "AdminNewsControllers@show")->name('showNew');
            Route::get('/news/delete/{news}', "AdminNewsControllers@delete")->name('deleteNew');

            Route::get('/settings', "AdminSettingsControllers@index")->name('adminSettings');
            Route::get('/settings/create', "AdminSettingsControllers@prestore")->name('createSetting');
            Route::post('/settings', "AdminSettingsControllers@store")->name('saveSetting');
            Route::post('/settings/update/{setting}', "AdminSettingsControllers@update")->name('updateSetting');
            Route::get('/settings/{setting}', "AdminSettingsControllers@show")->name('showSetting');

            Route::get('/slider', "AdminSliderControllers@index")->name('adminSliderhome');
            Route::get('/slider/create', "AdminSliderControllers@prestore")->name('createSlider');
            Route::post('/slider', "AdminSliderControllers@store")->name('saveSlider');
            Route::get('/slider/delete/{slider}', "AdminSliderControllers@delete")->name('deleteSlider');

        });
    });

    //Please do not remove this if you want adminlte:route and adminlte:link commands to works correctly.
    #adminlte_routes
});


/*
Route::group(['middleware' => 'auth'], function () {
    Route::prefix('admin')->group(function () {
        Route::namespace('Admin')->group(function () {
            Route::get('/users', "AdminUsersControllers@index");
            Route::post('/users', "AdminUsersControllers@store");
            Route::put('/users/{user}', "AdminUsersControllers@update");
            Route::get('/users/{user}', "AdminUsersControllers@show");

            //        Route::get('/products', "AdminProductsControllers@index");
            //        Route::post('/products', "AdminProductsControllers@store");
            //        Route::put('/products/{product}', "AdminProductsControllers@update");
            //        Route::get('/products/{product}', "AdminProductsControllers@show");

            Route::get('/categories', "AdminCategoriesControllers@index");
            Route::post('/categories', "AdminCategoriesControllers@store");
            Route::put('/categories/{category}', "AdminCategoriesControllers@update");
            Route::get('/categories/{category}', "AdminCategoriesControllers@show");


            Route::get('/news', "AdminNewsControllers@index");
            Route::post('/news', "AdminNewsControllers@store");
            Route::put('/news/{news}', "AdminNewsControllers@update");
            Route::get('/news/{news}', "AdminNewsControllers@show");

            Route::get('/settings', "AdminSettingsControllers@index");
            Route::post('/settings', "AdminSettingsControllers@store");
            Route::put('/settings/{setting}', "AdminSettingsControllers@update");
            Route::get('/settings/{setting}', "AdminSettingsControllers@show");
        });
    });

    //Please do not remove this if you want adminlte:route and adminlte:link commands to works correctly.
    #adminlte_routes
});

//Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
*/