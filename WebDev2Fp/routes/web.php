<?php

use App\Http\Controllers\ProfileController;

use App\Http\Controllers\storeController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CuisineController;
use App\Http\Controllers\StoreDashboardController;
use App\Http\Controllers\FoodController;
use App\Http\Controllers\BasketController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\UserOrderController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/',[HomeController::class,'index'])->name('home');
Route::get('food/{id}',[HomeController::class,'foodinfo'])->name('food');
Route::get('store/{id}',[storeController::class,'index'])->name('store');
Route::get('cuisine',[CuisineController::class,'AllCuisines'])->name('Allcusisnes');
Route::get('cuisine/{id}',[CuisineController::class,'cuisineinfo'])->name('cuisine');
Route::get('searchFood',[FoodController::class,'searchFood'])->name('searchFood');

Route::get('dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');
Route::middleware(['auth','verified'])->group(function () {
    Route::get('basket',[BasketController::class,'index'])->name('basket');
    Route::post('AddBasket',[BasketController::class,'createbasket'])->name('AddBasket');
    Route::post('updateBasket/{id}',[BasketController::class,'updatebasket'])->name('updateBasket');
    Route::post('removefromBasket/{id}',[BasketController::class,'removefromBasket'])->name('removefromBasket');
    Route::post('clearBasket',[BasketController::class,'clearBasket'])->name('clearBasket');
    Route::get('orders',[UserOrderController::class,'index'])->name('orders');

    Route::get('pending/approval', [storeController::class, 'pendingS'])->name('pendingStore');
});
Route::middleware(['auth','verified','store'])->group(function () {
Route::get('AddStore', [storeController::class, 'RegisterStore'])->name('RstoreInput');
Route::post('storeCook', [storeController::class, 'store'])->name('storeCook');
});
Route::middleware('auth')->group(function () {
    Route::get('profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth','verified','role:Cook','approved'])->group(function () {
    Route::get('/Store/Dashboard', [StoreDashboardController::class, 'index'])->name('sdindex');
    Route::get('/Store/Dashboard/Analytic', [StoreDashboardController::class, 'analysis'])->name('sdindexA');
    Route::post('/Addfood/{id}', [StoreDashboardController::class, 'store'])->name('storeFood');
    Route::get('/Store/Dashboard/Menu', [StoreDashboardController::class, 'menu'])->name('sdindexMenu');
    Route::get('/Store/Dashboard/offers', [StoreDashboardController::class, 'offer'])->name('sdindexOffers');
    Route::post('/AddOffer', [StoreDashboardController::class, 'storeoffer'])->name('addoffer');
    Route::post('/addFoodTooffer', [StoreDashboardController::class, 'addFoodTooffer'])->name('addFoodTooffer');
    Route::get('/Store/Dashboard/Platdejour', [StoreDashboardController::class, 'analysis'])->name('Addplatdujour');
    Route::get('/Store/Dashboard/Orders', [StoreDashboardController::class, 'analysis'])->name('sdindexOrders');
    Route::get('/Store/Dashboard/Delvery', [StoreDashboardController::class, 'analysis'])->name('sdindexManageDe');
});

Route::get('searchFood',[FoodController::class,'searchFood'])->name('searchFood');
Route::post('makeReview',[ReviewController::class,'review'])->name('makeReview');

require __DIR__.'/auth.php';

