<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LeadController;
use App\Http\Controllers\ForumPostController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\HomeController;

Route::get('/', [HomeController::class, 'index'])->name('home');


Route::get('/hello', function () {
    return view('hello', [
        'name' => 'Laravel',
        'greeting' => 'Hello, Laravel!'
    ]);
});

Route::view('/contact-us','contact')->name('contact');

/*Route::get('/contact',function () {
    return view('contact');
});*/

/*Route::get('/', function () {
    return view('welcome');
});*/
// routes/web.php
/*Route::get('/', function () {
    return view('home');
})->name('home');*/

Route::view('/about', 'about')->name('about');
Route::view('/teams', 'teams')->name('teams');
Route::view('/news', 'news')->name('news');
Route::view('/partners', 'partners')->name('partners');


use App\Http\Controllers\ProductController;

Route::get('/shop', [ProductController::class, 'index'])->name('shop.index');
Route::get('/shop/{id}', [ProductController::class, 'show'])->name('shop.show');

use App\Http\Controllers\CartController;

Route::post('/cart/add', [CartController::class, 'addToCart'])->name('cart.add');
Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
Route::post('/cart/update/{id}', [CartController::class, 'updateQuantity'])->name('cart.update');
Route::delete('/cart/remove/{id}', [CartController::class, 'remove'])->name('cart.remove');

use App\Http\Controllers\CheckoutController;

Route::get('/checkout', [CheckoutController::class, 'index'])->name('checkout.index');
Route::post('/checkout', [CheckoutController::class, 'process'])->name('checkout.process');
Route::get('/checkout/thankyou', [CheckoutController::class, 'thankyou'])->name('checkout.thankyou');



// Display News for the User Side
Route::get('/news', [NewsController::class, 'showNews'])->name('news');
Route::get('/news/{id}', [NewsController::class, 'show'])->name('news.show');




Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
    /*
    Route::get('/leads', [LeadController::class,'index'])->name('leads.index');
    Route::get('/leads/create', [LeadController::class,'create'])->name('leads.create');
    Route::post('/leads/store', [LeadController::class,'store'])->name('leads.store');
    Route::post('/leads/edit', [LeadController::class,'store'])->name('leads.edit');*/

    //leads routes for testing
    Route::controller(LeadController::class)->group(function (){
        Route::get('/leads','index')->name('leads.index');
        Route::get('/leads/create','create')->name('leads.create');
        Route::post('/leads','store')->name('leads.store');
        Route::get('/leads/{id}','show')->name('leads.show');
        Route::get('/leads/edit','edit')->name('leads.edit');
        Route::patch('/leads/update','update')->name('leads.update');
        Route::delete('/leads/destroy','destroy')->name('leads.delete');
    });

    // Forum routes
    Route::resource('forum', ForumPostController::class);

});

use App\Http\Controllers\AdminAuthController;
use App\Http\Controllers\AdminDashboardController;


Route::prefix('admin')->group(function () {
    Route::get('login', [AdminAuthController::class, 'showLoginForm'])->name('admin.login');
    Route::post('login', [AdminAuthController::class, 'login']);
    Route::get('register', [AdminAuthController::class, 'showRegisterForm'])->name('admin.register');
    Route::post('register', [AdminAuthController::class, 'register']);
    Route::post('admin/logout', [AdminAuthController::class, 'logout'])->name('admin.logout');


    Route::middleware('auth:admin')->group(function () {
        Route::get('dashboard', [AdminDashboardController::class, 'index'])->name('admin.dashboard');
        Route::get('orders', [AdminDashboardController::class, 'viewOrders'])->name('admin.orders');
        Route::get('orders/{id}', [AdminDashboardController::class, 'viewOrderDetails'])->name('admin.orders.details');

        // Admin Shop Routes
        Route::get('shop', [AdminDashboardController::class, 'viewProducts'])->name('admin.shop');
        Route::get('shop/create', [AdminDashboardController::class, 'createProduct'])->name('admin.shop.create');
        Route::post('shop/store', [AdminDashboardController::class, 'storeProduct'])->name('admin.shop.store');
        Route::get('shop/edit/{id}', [AdminDashboardController::class, 'editProduct'])->name('admin.shop.edit');
        Route::post('shop/update/{id}', [AdminDashboardController::class, 'updateProduct'])->name('admin.shop.update');
        Route::delete('shop/destroy/{id}', [AdminDashboardController::class, 'destroyProduct'])->name('admin.shop.destroy');


        //News Routes
        Route::get('news', [NewsController::class, 'index'])->name('admin.news.index');
        Route::get('news/create', [NewsController::class, 'create'])->name('admin.news.create');
        Route::post('news/store', [NewsController::class, 'store'])->name('admin.news.store');
        Route::get('news/edit/{id}', [NewsController::class, 'edit'])->name('admin.news.edit');
        Route::post('news/update/{id}', [NewsController::class, 'update'])->name('admin.news.update');
        Route::delete('news/destroy/{id}', [NewsController::class, 'destroy'])->name('admin.news.destroy');
    });
});


