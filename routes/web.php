<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AttributesController;
use App\Http\Controllers\CarsController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\ContactsController;
use App\Http\Controllers\EnginesController;
use App\Http\Controllers\FavouritsController;
use App\Http\Controllers\MarksController;
use App\Http\Controllers\ModelsController;
use App\Http\Controllers\OffersController;
use App\Http\Controllers\PartsController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\ShopsController;
use App\Http\Controllers\SlidesController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\RatingController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\DealerController;
use App\Http\Controllers\SettingController;
/*
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
Auth::routes();

Route::get('/', function () {
    return view('land');
});


Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});


Route::group(['middleware' => 'auth'], function () {

    // don
    Route::post('/update-product/{product}',[App\Http\Controllers\dashboard\ProductsController::class, 'updateProduct'])->name('updateDealerProducts');
    Route::get('/add-product',[App\Http\Controllers\dashboard\ProductsController::class, 'createProduct'])->name('createDealerProducts');
    Route::get('/add-product/{product}/second-page',[App\Http\Controllers\dashboard\ProductsController::class, 'createProduct2'])->name('createDealerProducts2');
    Route::get('/edit-product/{product}/second-page',[App\Http\Controllers\dashboard\ProductsController::class, 'editProduct2'])->name('editDealerProducts2');

    Route::get('/edit/{product}/product',[App\Http\Controllers\dashboard\ProductsController::class, 'editProduct'])->name('editDealerProducts');

    Route::post('/store-product/{product?}',[App\Http\Controllers\dashboard\ProductsController::class, 'storeProduct'])->name('storeDealerProducts');
    Route::get('/delete-product/{id}',[App\Http\Controllers\dashboard\ProductsController::class, 'deleteProduct'])->name('deleteProducts');
    Route::get('/dealer-products',[App\Http\Controllers\dashboard\ProductsController::class, 'products'])->name('dealerProducts');
    Route::get('/dealer-dashboard',[App\Http\Controllers\dashboard\ProductsController::class, 'index'])->name('index');


    //gad

    Route::get('/dealer-cars',[App\Http\Controllers\dashboard\SettingController::class, 'dealer_cars'])->name('dealer-cars');
    Route::get('/add-car',[App\Http\Controllers\dashboard\SettingController::class, 'add_car'])->name('add-car');
    Route::post('/store-car',[App\Http\Controllers\dashboard\SettingController::class, 'store_car'])->name('store-car');
    Route::post('/delete-car',[App\Http\Controllers\dashboard\SettingController::class, 'delete_car'])->name('delete-car');

    Route::get('/settings',[App\Http\Controllers\dashboard\SettingController::class, 'settings'])->name('settings');
    Route::post('/update-profile',[App\Http\Controllers\dashboard\SettingController::class, 'update_profile'])->name('update-profile');
    Route::get('/edit-profile',[App\Http\Controllers\dashboard\SettingController::class,  'edit_profile'])->name('edit-profile');
    Route::get('/store-details',[App\Http\Controllers\dashboard\SettingController::class, 'store_details'])->name('store-details');
    Route::get('/edit-store',[App\Http\Controllers\dashboard\SettingController::class,    'edit_store'])->name('edit-store');
    Route::post('/update-store',[App\Http\Controllers\dashboard\SettingController::class, 'update_store'])->name('update-store');



});

Route::get('/clear' ,function () {
     \Artisan::call('cache:clear');
     return 'cleared';
});


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
