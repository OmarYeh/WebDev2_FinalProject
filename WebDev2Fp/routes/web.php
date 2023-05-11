<?php

use App\Http\Controllers\ProfileController;

use App\Http\Controllers\storeController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CuisineController;
use App\Http\Controllers\StoreDashboardController;
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
Route::get('search',[HomeController::class,'search'])->name('home.search');
Route::get('food/{id}',[HomeController::class,'foodinfo'])->name('food');
Route::get('cuisine/{id}',[HomeController::class,'cuisineinfo'])->name('cuisine');
Route::get('store/{id}',[storeController::class,'index'])->name('store');
Route::get('cuisine',[CuisineController::class,'AllCuisines'])->name('Allcusisnes');
Route::get('cuisine/store/{id}',[storeController::class,'storeinfo'])->name('storeC');
Route::get('dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');
Route::middleware(['auth','verified'])->group(function () {
    Route::get('AddStore', [storeController::class, 'RegisterStore'])->name('RstoreInput');
    Route::post('storeCook', [storeController::class, 'store'])->name('storeCook');
});
Route::middleware('auth')->group(function () {
    Route::get('profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth','verified'])->group(function () {
    Route::get('/Store/Dashboard', [StoreDashboardController::class, 'index'])->name('sdindex');
    Route::get('/Store/Dashboard/Analytic', [StoreDashboardController::class, 'analysis'])->name('sdindexA');

    Route::get('/Store/Dashboard/Menu', [StoreDashboardController::class, 'menu'])->name('sdindexMenu');
    Route::get('/Store/Dashboard/offers', [StoreDashboardController::class, 'analysis'])->name('sdindexOfers');
    Route::get('/Store/Dashboard/Platdejour', [StoreDashboardController::class, 'analysis'])->name('Addplatdujour');
    Route::get('/Store/Dashboard/Orders', [StoreDashboardController::class, 'analysis'])->name('sdindexOrders');
    Route::get('/Store/Dashboard/Delvery', [StoreDashboardController::class, 'analysis'])->name('sdindexManageDe');
});

require __DIR__.'/auth.php';

