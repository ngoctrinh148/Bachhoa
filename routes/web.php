<?php


use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ProductsController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\Frontend\RatingController;
use App\Http\Controllers\Frontend\FrontendController;
use App\Http\Controllers\Frontend\CartController;
use App\Http\Controllers\Frontend\CheckoutController;
use App\Http\Controllers\Frontend\ReviewController;
use App\Http\Controllers\Frontend\UserController;
use App\Http\Controllers\Frontend\WishlistController;
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

Route::get('/hehe', function () {
    return view('welcome');
});


Route::get('/', [FrontendController::class, 'index']);
Route::get('category', [FrontendController::class, 'category']);
Route::get('view-category/{slug}', [FrontendController::class, 'viewcategory']);
Route::get('category/{cate_slug}/{prod_slug}', [FrontendController::class, 'viewproducts']);

Route::get('product-list', [FrontendController::class,'productslist']);
Route::post('search-product', [FrontendController::class,'searchproduct']);
Route::get('orther-products/{id}', [FrontendController::class,'ortherproduct']);

Route::get('sidebar-cate', [FrontendController::class,'sidecate']);

Route::post('add-to-cart', [CartController::class, 'addToCart']);
Route::post('deleta-cart-item', [CartController::class, 'deleteproduct']);
Route::post('update-quantity', [CartController::class, 'updatequantity']);
Route::post('add-to-wishlist', [WishlistController::class,'addToWishlist']);
Route::post('deleta-wishlist-item', [WishlistController::class,'deletewishlist']);

Route::get('load-cart-data', [CartController::class,'cartcount']);
Route::get('load-wishlist-data', [WishlistController::class,'wishlistcount']);

Route::middleware(['auth'])->group(function () {
    Route::get('cart', [CartController::class, 'viewcart']);
    Route::get('checkout', [CheckoutController::class,'index']);
    Route::post('place-order', [CheckoutController::class,'placeorder']);
    Route::get('my-order', [UserController::class,'index']);
    Route::get('view-order/{id}', [UserController::class,'view']);
    Route::get('cancel-order/{id}', [UserController::class,'cancel']);
    Route::post('add-reason', [UserController::class,'addreason']);
    Route::get('delete-order/{id}', [UserController::class,'delete']);
    Route::get('success-order/{id}', [UserController::class,'success']);
    Route::get('wishlist', [WishlistController::class,'index']);
    Route::post('/proceed-to-pay', [CheckoutController::class,'paycheck']);
    Route::post('/add-rating', [RatingController::class,'add']);

    Route::post('add-review', [ReviewController::class,'create']);
    Route::get('delete-review/{productsid}/{id}', [ReviewController::class,'delete']);

});



Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::post('/save-event', [EventController::class, 'addEvent']);
Route::middleware(['auth', 'isAdmin'])->group(function () {
    Route::get('/dashboard', 'App\Http\Controllers\Admin\FrontendController@index');

    Route::get('dashboard', [DashboardController::class, 'index']);


    Route::get('categories', [CategoryController::class, 'index']);
    Route::get('add-category', [CategoryController::class, 'add']);
    Route::post('insert-category', [CategoryController::class, 'insert']);
    Route::get('edit-category/{id}', [CategoryController::class, 'edit']);
    Route::post('update-category/{id}', [CategoryController::class, 'update']);
    Route::get('delete-category/{id}', [CategoryController::class, 'delete']);

    Route::get('products', [ProductsController::class, 'index']);
    Route::get('add-products', [ProductsController::class, 'add']);
    Route::post('insert-products', [ProductsController::class, 'insert']);
    Route::get('edit-products/{id}', [ProductsController::class, 'edit']);
    Route::post('update-products/{id}', [ProductsController::class, 'update']);
    Route::get('delete-products/{id}', [ProductsController::class, 'delete']);

    Route::get('orders', [OrderController::class,'index']);
    Route::get('admin/view-order/{id}', [OrderController::class,'view']);
    Route::put('update-order/{id}', [OrderController::class,'updateorder']);
    Route::get('order-delivering', [OrderController::class,'orderdelivering']);
    Route::get('order-delivered', [OrderController::class,'orderdelivered']);
    Route::get('order-cancaled', [OrderController::class,'ordercanceled']);


    Route::get('users', [DashboardController::class,'users']);
    Route::get('view-user/{id}', [DashboardController::class,'viewuser']);
    Route::get('delete-user/{id}', [DashboardController::class,'deleteuser']);
    Route::post('update-role/{id}', [DashboardController::class, 'updaterole']);

    Route::get('print-bill/{id}', [DashboardController::class,'printbill']);

    Route::get('details', [DashboardController::class,'details']);
    Route::get('delete-details/{id}', [DashboardController::class, 'deletedetails']);
});




require __DIR__ . '/auth.php';
