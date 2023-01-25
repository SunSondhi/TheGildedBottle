<?php

use App\Http\Middleware\AdminSystem;
use Illuminate\Support\Facades\Route;

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

// the main page route
Route::get('/', function () {
    return view("HomePage");
})->name('HomePage');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


// products page route
Route::get('/products', function () {
    return view("Products");
})->name('Products');
// about us page route
Route::get('/aboutus', function () {
    return view("Aboutus");
})->name('Aboutus');
// Basket page route
Route::get('/basket', function () {
    return view("Basket");
})->name('Basket');
// Contact us page route
Route::get('/contacus', function () {
    return view("Contactus");
})->name('Contactus');




// admin routes 
Route::middleware([AdminSystem::class])->group(function () {
    Route::get('home', [HomeController::class, 'home']);
});