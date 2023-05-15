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
use App\Http\Controllers\chatbotController;
use App\Http\Controllers\DashboardController;
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

Route::get('storepage',function(){
   return view('regisPending'); 
});

Route::get('dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');
Route::middleware(['auth','verified'])->group(function () {
    Route::get('AddStore', [storeController::class, 'RegisterStore'])->name('RstoreInput');
    Route::get('basket',[BasketController::class,'index'])->name('basket');
    Route::post('AddBasket',[BasketController::class,'createbasket'])->name('AddBasket');
    Route::post('updateBasket/{id}',[BasketController::class,'updatebasket'])->name('updateBasket');
    Route::post('removefromBasket/{id}',[BasketController::class,'removefromBasket'])->name('removefromBasket');
    Route::post('clearBasket',[BasketController::class,'clearBasket'])->name('clearBasket');
    Route::get('orders',[UserOrderController::class,'index'])->name('orders');

    Route::get('pending/approval', [storeController::class, 'pendingS'])->name('pendingStore');
});
Route::middleware(['auth','verified','store'])->group(function () {
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
    Route::post('/addFoodTooffer/{id}', [StoreDashboardController::class, 'storeoffer'])->name('addoffer');
    Route::get('/updatefood/{id}',[StoreDashboardController::class,'updateItem'])->name('updateItem');
    Route::put('/updatefood/{id}',[StoreDashboardController::class,'update'])->name('updateI');
    Route::delete('/delete/{id}',[StoreDashboardController::class,'deleteItem'])->name('deleteItem');
    Route::get('/deleteOffer/{id}',[StoreDashboardController::class,'deleteOffer'])->name('deleteOffer');
    Route::get('/Store/Dashboard/Platdejour', [StoreDashboardController::class, 'platdejour'])->name('sdplatdujour');
    Route::put('/AddPlat/{id}', [StoreDashboardController::class, 'addplat'])->name('addPlat');
    Route::put('/DeletePlat/{id}', [StoreDashboardController::class, 'deleteplat'])->name('deletePlat');
    Route::get('/Store/Dashboard/Orders', [StoreDashboardController::class, 'order'])->name('sdindexOrders');
    Route::put('/ApproveOrders/{id}', [StoreDashboardController::class, 'approve'])->name('appOr');
    Route::put('/RejectOrders/{id}', [StoreDashboardController::class, 'reject'])->name('rejOr');
    Route::get('/Store/Dashboard/Delivery', [StoreDashboardController::class, 'Delivery'])->name('sdindexManageDe');
    Route::put('/UpdateStatue/{id}/{status}', [StoreDashboardController::class, 'UpdateStatus'])->name('updateSD');
});
Route::middleware(['auth','verified','role:Admin'])->group(function () {
    Route::get('Dashboard/Controls', [DashboardController::class, 'getStores'])->name('Controls');
    Route::get('Dashboard/userControls', [DashboardController::class, 'userControls'])->name('userControls');
    Route::patch('Dashboard/Controls/Approve/{id}', [DashboardController::class, 'approveStatus'])->name('approve');
    Route::patch('Dashboard/Controls/Reject/{id}', [DashboardController::class, 'rejectStatus'])->name('reject');
    Route::delete('Dashboard/Controls/Deleted/{id}', [DashboardController::class, 'deleteStore'])->name('deleteStore');
    Route::delete('Dashboard/Controls/userDeleted/{id}', [DashboardController::class, 'deleteUser'])->name('deleteUser');
    Route::get('Dashboard/userControls/userDetail/{id}' , [DashboardController::class, 'editpage'])->name('editpage');
    Route::put('Dashboard/userControls/userDetails/{id}', [DashboardController::class, 'editUser'])->name('editUser');
    Route::delete('Dashboard/userControls/revokeRole', [DashboardController::class, 'revokeRole'])->name('revoke');
    Route::delete('store/review/{id}', [storeController::class, 'deleteReview'])->name('deleteReview');
});
Route::get('searchFood',[FoodController::class,'searchFood'])->name('searchFood');
Route::post('makeReview',[ReviewController::class,'review'])->name('makeReview');
Route::get('/DownloadPrivacy',[HomePageController::class,'getPrivacy'])->name('downloadPrivacy');
Route::get('/DownloadTerms',[HomePageController::class,'getTermsOfService'])->name('downloadTerms');
require __DIR__.'/auth.php';

