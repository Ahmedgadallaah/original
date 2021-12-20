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

    Route::get('/dealer-dashboard',[App\Http\Controllers\dashboard\ProductsController::class, 'index'])->name('index');
    Route::get('/settings',[App\Http\Controllers\dashboard\SettingController::class, 'settings'])->name('settings');
    Route::get('/store-details',[App\Http\Controllers\dashboard\SettingController::class, 'store_details'])->name('store-details');
    Route::get('/dealer-cars',[App\Http\Controllers\dashboard\SettingController::class, 'dealer_cars'])->name('dealer-cars');

    //gad
    Route::get('/add-car',[App\Http\Controllers\dashboard\SettingController::class, 'add_car'])->name('add-car');
    Route::get('/edit-profile',[App\Http\Controllers\dashboard\SettingController::class, 'edit_profile'])->name('edit-profile');
    Route::get('/add-store',[App\Http\Controllers\dashboard\SettingController::class, 'add_store'])->name('add-store');


});

Route::get('/clear' ,function () {
     \Artisan::call('cache:clear');
     return 'cleared';
});


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
