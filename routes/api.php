<?php

use Illuminate\Http\Request;
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
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->prefix('v1')->group(function(){
    // return $request->user();

    Route::get('/logout', [RegisterController::class, 'logout']);

    // return authenticated user data
    Route::get('/my-profile', [RegisterController::class, 'profile']);
    Route::get('/dealer-profile', [RegisterController::class, 'dealer_profile']);

    Route::post('/update-profile', [RegisterController::class, 'update']);
    Route::post('/send-points', [RegisterController::class, 'send_points']);

    // Ratings
    Route::get('ratings', [RatingController::class, 'ratings']);
    Route::post('store-product-rate', [RatingController::class, 'store_product_rate']);
    Route::post('store-dealer-rate', [RatingController::class, 'store_dealer_rate']);
    Route::post('store-dealer-product-rate', [RatingController::class, 'store_dealer_product_rate']);

    Route::post('store-dealer-part-price', [PartController::class, 'store_part_price']);


    //-------------------favourite--------------------------------------
    Route::get('/favourits', [FavouritsController::class, 'favoruites']);
    Route::post('/create-favourite', [FavouritsController::class, 'create_favourite']);
    Route::get('delete-favourite/{id}',[FavouritsController::class, 'delete_favourite']);
    //car
    Route::post('/store-car', [CarsController::class, 'store_car']);
    Route::post('/update-car/{car_id}', [CarsController::class, 'update_car']);
    // part
    Route::post('/store-part', [PartsController::class, 'store_part']);
    Route::post('/update-part/{id}', [PartsController::class, 'update_part']);
    Route::get('/delete-part/{id}', [PartsController::class, 'delete_part']);
    Route::post('/store-dealer-part-price', [PartsController::class, 'store_part_price']);

    //product
    Route::post('/store-product', [ProductsController::class, 'store_product']);

    // cart
    Route::post('/add-to-cart/{id}', [CartController::class, 'add_to_cart']);
    Route::post('/update-cart/{id}', [CartController::class, 'update_cart']);
    Route::any('/show-my-cart', [CartController::class, 'show']);
    Route::get('/delete-from-cart/{id}', [CartController::class, 'delete']);
    Route::get('/empty-cart', [CartController::class, 'empty_cart']);


    // orders
    Route::post('/make-order', [OrderController::class, 'make_order']);
    Route::get('/pending-orders', [OrderController::class, 'pending']);
    Route::get('/completed-orders', [OrderController::class, 'completed']);
    Route::get('/shipped-orders', [OrderController::class, 'shipped']);
    Route::get('/all-orders', [OrderController::class, 'all_orders']);
    Route::post('/update-status/{id}', [OrderController::class, 'update_status']);



    /////////////////////////////////// Dealer //////////////////////////////////////////////
    //
    Route::get('/dealer-home', [DealerController::class, 'home']);
    // shop
    Route::get('/dealer-shop', [ShopsController::class, 'Shop_By_Dealer']);

    //car
    Route::post('/dealer-store-car', [CarsController::class, 'dealer_store_car']);
    Route::post('/dealer-update-car/{car_id}', [CarsController::class, 'dealer_update_car']);
    Route::get('/dealer-cars', [CarsController::class, 'Dealer_cars']);
    Route::get('/delete-car/{car_id}', [CarsController::class, 'delete_car']);
    Route::post('/dealer-products-filter', [ProductsController::class, 'products_by_name_category']);

    Route::get('/dealer-pending-orders', [OrderController::class, 'dealer_pending_orders']);
    Route::get('/dealer-shipped-orders', [OrderController::class, 'dealer_inProgress_orders']);
    Route::get('/dealer-completed-orders', [OrderController::class, 'dealer_completed_orders']);
    Route::get('/dealer-rejected-orders', [OrderController::class, 'dealer_rejected_orders']);
    Route::get('/dealer-orders', [OrderController::class, 'dealer_orders']);
    Route::get('/my-sales', [DealerController::class, 'dealer_sold_orders']);
    Route::get('/my-sales-products', [DealerController::class, 'dealer_sold_products']);


    Route::get('/dealer-pending-parts', [PartsController::class, 'dealer_pending_parts']);
    Route::post('update-shop',[ShopsController::class,'update_shop']);

});
Route::prefix('v1')->group(function(){


    //-------------------Auth-----------------------------------
    Route::post('/register', [RegisterController::class, 'register']);
    Route::post('/login', [RegisterController::class, 'login']);
    Route::post('/dealer-register', [RegisterController::class, 'dealer_register']);
    Route::post('/dealer-login', [RegisterController::class, 'dealer_login']);
    Route::post('forgot-password',[AuthController::class, 'forgot_password']);
    Route::post('password/reset/{token}',[AuthController::class, 'passwordReset']);
    Route::post('social_login/{provider}/callback',[AuthController::class, 'social_login']);
    Route::post('dealer_social_login/{provider}/callback',[AuthController::class, 'dealer_social_login']);

    Route::get('single-user/{id}',[RegisterController::class, 'single_user']);
    Route::get('single-dealer/{id}',[RegisterController::class, 'single_dealer']);

    Route::get('all-dealers',[RegisterController::class, 'dealers']);
    //-------------------Car-----------------------------------
    Route::get('all-models',[ModelsController::class, 'models']);
    Route::get('all-marks',[MarksController::class, 'marks']);
    Route::get('all-engines',[EnginesController::class, 'engines']);
    Route::get('user-car',[CarsController::class, 'user_car']);
    Route::get('models-by-mark/{id}',[ModelsController::class, 'modelsByMark']);
    Route::get('single-model/{id}',[ModelsController::class, 'singleModel']);
    Route::get('model-years/{id}',[ModelsController::class, 'singleModelYears']);
    Route::get('model-engines/{id}',[ModelsController::class, 'singleModelEngines']);
    Route::get('/years', [CarsController::class, 'years']);

    //-------------------Slides--------------------------------------
    Route::get('/home-slides/{num}', [SlidesController::class, 'home_sliders']);
    Route::get('/all-addresses', [SlidesController::class, 'addresses']);
    Route::get('/trade-types', [SlidesController::class, 'trade_types']);
    Route::post('/chat-file', [SlidesController::class, 'file']);// price filter


    Route::get('/home-categories/{num}', [CategoriesController::class, 'home_categories']);
    ;
    //Route::get('/create-favourite/{product_id}', [FavouritsController::class, 'create_favourite']);


    Route::post('/contact', [ContactsController::class, 'contact']);
    //-------------------Part--------------------------------------

    Route::get('/parts', [PartsController::class, 'parts']);
    Route::get('/part/{id}', [PartsController::class, 'single_part']);
    Route::get('/available-parts', [PartsController::class, 'available']);
    Route::get('/pending-parts', [PartsController::class, 'pending']);
    Route::get('/inavailable-parts', [PartsController::class, 'inavailable']);


    //-------------------Products--------------------------------------
    Route::get('/products', [ProductsController::class, 'products']);
    Route::get('/product/{id}', [ProductsController::class, 'product']);
    Route::get('/similar-products/{id}', [ProductsController::class, 'similar_products']);
    Route::post('/products-by-category-dealer', [ProductsController::class, 'products_by_category_dealer']);


    //-------------------offers--------------------------------------
    Route::get('/offers', [OffersController::class, 'offers']);
    Route::get('/latest-offers', [OffersController::class, 'latest_offers']);
    Route::get('/best-latest-offers', [OffersController::class, 'best_latest_offers']);
    Route::get('/best-seller-products', [OrderController::class, 'best_seller']);
    Route::get('/offer/{id}', [OffersController::class, 'offer']);



    //Rating
    Route::get('product-rating/{product_id}',[RatingController::class, 'ProductReviews']);
    Route::get('dealer-rating/{dealer_id}',[RatingController::class, 'DealerReviews']);
    //search
    Route::post('/home-search', [SearchController::class, 'home_search']);
    Route::post('/store-search', [SearchController::class, 'store_search']);
    Route::get('/default-filter/{category_id}', [SearchController::class, 'default_filter']); //default filter
    Route::post('/attribuites_search/{category_id}', [SearchController::class, 'attribuites_search']);
    Route::post('/price-filter/{category_id}', [SearchController::class, 'price_filter']);// price filter
    Route::get('/attribute-filter/{tag_id}', [SearchController::class, 'attribute_filter']);// filter attr by tag id
    Route::post('/revoke', [RegisterController::class, 'revoke']);
    Route::post('/social-revoke', [RegisterController::class, 'revoke_social']);



    Route::post('/logout-devices', [RegisterController::class, 'logoutApi']);// filter attr by tag id


});
