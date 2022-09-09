<?php

use App\Http\Controllers\AdController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\MarkController;
use App\Http\Controllers\MealController;
use App\Http\Controllers\MealOrderController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\RestaurantController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProductOrderController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PagesController;
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

Route::get("/", [PagesController::class, 'index'])->name('home-page');

Route::get("/all/products", [PagesController::class, 'allProducts']);
Route::get("/all/meals", [PagesController::class, 'allMeals']);
Route::get("/all/restaurants", [PagesController::class, 'allRestaurants']);



Auth::routes();

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


//Auth::routes();

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::prefix('manager')->name('manager.')->group(function(){
    Route::middleware(['guest:manager'])->group(function(){
        Route::view('/login','Admin.login')->name('login');
    });
    Route::middleware(['auth:manager'])->group(function(){

        Route::view('/register','register')->name('register');
        Route::post('/create',[\App\Http\Controllers\ManagerController::class,'create'])->name('create');
        Route::post('/logout',[\App\Http\Controllers\ManagerController::class,'logout'])->name('logout');


    });


});



Route::prefix('admin')->name('admin.')->group(function(){

    Route::middleware(['guest:admin'])->group(function(){

Route::view('/login','Admin.login')->name('login');
Route::post('/check',[\App\Http\Controllers\AdminController::class, 'check'] )->name('check');

    });

    Route::middleware(['auth:admin'])->group(function(){
        Route::get("/home", [\App\Http\Controllers\AdminController::class, 'home'])->name('home');
/////////////////////////category routes///////////////////
        Route::get("/category/add", [CategoryController::class, 'add']);
        Route::post("/category/store", [CategoryController::class, 'store']);
        Route::get("/category/all", [CategoryController::class, 'all']);
        Route::get('/category/delete/{id}', [CategoryController::class, 'delete']);
        Route::get('/category/edit/{id}', [CategoryController::class, 'edit']);
        Route::post('/category/edit/{id}',[CategoryController::class, 'update'] );
/////////////////////////end of category///////////////////
/// ///////////////////////products routes////////////////////
Route::get("/product/add", [ProductController::class, 'add']);
Route::post("/product/store", [ProductController::class, 'store']);
Route::get("/product/all", [ProductController::class, 'all']);
Route::get('/product/delete/{id}', [ProductController::class, 'delete']);
Route::get('/product/edit/{id}', [ProductController::class, 'edit']);
Route::post('/product/edit/{id}',[ProductController::class, 'update'] );
///////////////////end of product routs/////////////////////////
/// /// ///////////////////////restaurant routes////////////////////
Route::get("/restaurant/add", [RestaurantController::class, 'add']);
Route::post("/restaurant/store", [RestaurantController::class, 'store']);
Route::get("/restaurant/all", [RestaurantController::class, 'all']);
Route::get('/restaurant/delete/{id}', [RestaurantController::class, 'delete']);
Route::get('/restaurant/edit/{id}', [RestaurantController::class, 'edit']);
Route::post('/restaurant/edit/{id}',[RestaurantController::class, 'update'] );
/////////////////////end of restaurant routs/////////////////////////
/// /// ///////////////////////meal routes////////////////////
        Route::get("/meal/add", [MealController::class, 'add']);
        Route::post("/meal/store", [MealController::class, 'store']);
        Route::get("/meal/all", [MealController::class, 'all']);
        Route::get('/meal/delete/{id}', [MealController::class, 'delete']);
        Route::get('/meal/edit/{id}', [MealController::class, 'edit']);
        Route::post('/meal/edit/{id}',[MealController::class, 'update'] );
/////////////////////end of meal routs/////////////////////////
////////////////////location routes/////////////////////
        Route::get("/location/add", [LocationController::class, 'add']);
        Route::post("/location/store", [LocationController::class, 'store']);
        Route::get("/location/all", [LocationController::class, 'all']);
        Route::get('/location/delete/{id}', [LocationController::class, 'delete']);
        Route::get('/location/edit/{id}', [LocationController::class, 'edit']);
        Route::post('/location/edit/{id}',[LocationController::class, 'update'] );
////////////////////end of location routes//////////////////////////
////////////////////orders routes////////////////////////
        Route::get("/orders/all", [ProductOrderController::class, 'adminAll']);
        Route::get("/order/delete/{id}", [ProductOrderController::class, 'adminDelete']);
        Route::get("/mealorders/all", [MealOrderController::class, 'adminAll']);
        Route::get("/mealorder/delete/{id}", [MealOrderController::class, 'adminDelete']);
 ////////////////////////end of order roures////////////////////////
        Route::get("/reservations/all", [ReservationController::class, 'all']);
        Route::get("/reservation/delete/{id}", [ReservationController::class, 'delete']);
Route::post('/logout',[\App\Http\Controllers\AdminController::class,'logout'])->name('logout');
    });

});


Route::prefix('user')->name('user.')->group(function(){
    Route::middleware(['guest'])->group(function(){
        Route::view('/login','Admin.login')->name('login');
        Route::post('/check',[\App\Http\Controllers\AdminController::class, 'check'] )->name('check');
        Route::view('/register','register')->name('register');
        Route::post('/create',[\App\Http\Controllers\UserController::class,'create'])->name('create');
    });
    Route::middleware(['auth'])->group(function(){
////////////////////////////orders routes////////////////////////////////
        Route::get('/add/order/{id}', [ProductOrderController::class, 'add']);
        Route::post('/order/store/{id}', [ProductOrderController::class, 'store']);
        Route::get('/all/orders', [ProductOrderController::class, 'all']);
        Route::get('/order/delete/{id}', [ProductOrderController::class, 'delete']);
        Route::get('/order/confirm/{id}', [ProductOrderController::class, 'confirm']);
        Route::get('/add/mealorder/{id}', [MealOrderController::class, 'add']);
        Route::post('/mealorder/store/{id}', [MealOrderController::class, 'store']);
        Route::get('/all/mealorders', [MealOrderController::class, 'all']);
        Route::get('/mealorder/delete/{id}', [MealOrderController::class, 'delete']);
        Route::get('/mealorder/confirm/{id}', [MealOrderController::class, 'confirm']);
//////////////////////end of orders routes/////////////////////////////////
/////////////////////reservation routes///////////////////////////////
        Route::get('/add/reserve/{id}', [ReservationController::class, 'add']);
        Route::post('/reserve/store/{id}', [ReservationController::class, 'store']);
/////////////////////end of reservation routes/////////////////////////
        Route::post('/logout',[\App\Http\Controllers\UserController::class,'logout'])->name('logout');

    });


});
