<?php

use App\Http\Middleware\AdminSystem;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\productController;
use App\Models\Basket_product;
use App\Models\Basket;

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

Route::get('/restricted/{age}', function ($age) {
    return view('restricted')->with('age', $age);
})->name('restricted.age');

// products page route
Route::get('/products', [App\Http\Controllers\ProductController::class, 'productList'], function () {
    return view("Products");
})->name('Products');

//Product details and add to basket prepopulated form
Route::get(
    '/Product_details/{id}',
    [App\Http\Controllers\ProductController::class, 'Product_details'],
    function () {
        return view("Product_details");
    }
);

Route::post('/Product_details/{id}', [App\Http\Controllers\ProductController::class, 'add_to_basket'], function () {
    return view("Product_details");
});

Route::post('/products/{id}', [App\Http\Controllers\ProductController::class, 'add_to_basket'], function () {
    return view("Products");
})->name('add_to_basket');

Route::get('/products/update/quantity', [App\Http\Controllers\ProductController::class, 'updateQuantity'])->name('products.update.quantity');

Route::get('/basket', [App\Http\Controllers\BasketsController::class, 'List'], function () {
    return view("Basket");
})->name('Basket');

Route::post('/basket/{id}', [App\Http\Controllers\BasketsController::class, 'remove_btn'], function () {
    return view("basket");
})->name('remove_btn');

Route::get('/purchases', [App\Http\Controllers\PurchasesController::class, 'List'], function () {
    return view("Purchases");
})->name('Purchases');
Route::post('/basket', [App\Http\Controllers\BasketsController::class, 'buy_all'], function () {
    return view("basket");
})->name('Basket');

Route::post('/updateAmount/{id}', [App\Http\Controllers\BasketsController::class, 'updateAmount'], function () {
    return view("basket");
})->name('updateAmount');

Route::get('products/filter/{productCat}', [App\Http\Controllers\ProductController::class, 'filterByCategory'])->name('products.filter.category');

Route::get('products/filter/{type}', [App\Http\Controllers\ProductController::class, 'filterByCategory'])->name('products.filter.type');

Route::get('products/filter/', [App\Http\Controllers\ProductController::class, 'filterByPrice'])->name('products.filter.price');

Route::get('products', [App\Http\Controllers\ProductController::class, 'product_search'])->name('Products');


Route::get('/aboutus', function () {
    return view("Aboutus");
})->name('Aboutus');
// Basket page route

// Contact us page route
Route::get('/contacus', [App\Http\Controllers\contactUsController::class, 'showForm'], function () {
    return view("Contactus");
})->name('Contactus');
Route::post('/contacus', [App\Http\Controllers\contactUsController::class, 'sendForm'], function () {
    return view("Contactus");
})->name('Contactus.send');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');



// admin routes 
Route::prefix('admin')->middleware(['auth', 'AdminSystem'])->group(function () {

    Route::get('/adminhome', [App\Http\Controllers\HomeController::class, 'adminhome'])->name('admin.adminhome');
    Route::get('/adminhome', [App\Http\Controllers\Controller::class, 'search'])->name('admin.adminhome');
    Route::get('/', function () {
        return view("HomePage");
    })->name('admin.HomePage');

    Route::get('/products', [App\Http\Controllers\ProductController::class, 'ProductList'], function () {
        return view("Products");
    })->name('admin.Products');

    Route::post('admin/addproduct', [App\Http\Controllers\ProductController::class, 'addNewProducts'])->name('admin.addnewproduct');

    Route::get('/addproduct', function () {
        return view("AddProduct");
    })->name('admin.AddProducts');

    Route::get('/basket', function () {
        return view("Basket");
    })->name('admin.Basket');

    Route::get('/aboutus', function () {
        return view("Aboutus");
    })->name('admin.Aboutus');

    Route::get('/contactus', function () {
        return view('Contactus');
    })->name('admin.Contactus');

    Route::get('/login', function () {
        return view('login');
    })->name('admin.login');

    Route::get('/register', function () {
        return view('register');
    })->name('admin.register');
});

// employee routes 
Route::prefix('employee')->middleware(['auth', 'isEmployee'])->group(function () {
    Route::get('/products', function () {
        return view("Products");
    })->name('employee.Products');
});
