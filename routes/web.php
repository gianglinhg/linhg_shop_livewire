<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TestController;

use App\Http\Controllers\Client\MainController;
use App\Http\Controllers\Client\BlogController;
use App\Http\Controllers\Client\CheckoutController;

use App\Http\Controllers\Admin\AdminBlogController;

use App\Http\Livewire\Client\QuickProductDetailComponent;
use App\Http\Livewire\Client\ShopComponent;
use App\Http\Livewire\Client\CartComponent;
use App\Http\Livewire\Client\WishlistComponent;
use App\Http\Livewire\Client\ProductDetailComponent;
use App\Http\Livewire\Client\CheckoutComponent;

use App\Http\Livewire\Admin\AdminDashboardComponent;
use App\Http\Livewire\Admin\AdminProductComponent;
use App\Http\Livewire\Admin\AdminProductDetailComponent;
use App\Http\Livewire\Admin\AdminProductCommentComponent;
use App\Http\Livewire\Admin\AdminCategoryComponent;
use App\Http\Livewire\Admin\AdminBrandComponent;
use App\Http\Livewire\Admin\AdminBlogComponent;
use App\Http\Livewire\Admin\AdminBlogCategoryComponent;
use App\Http\Livewire\Admin\AdminBlogCommentComponent;
use App\Http\Livewire\Admin\AdminOrderComponent;
use App\Http\Livewire\Admin\AdminOrderHistoryComponent;
use App\Http\Livewire\Admin\AdminUserComponent;
use App\Http\Livewire\Admin\AdminUser2Component;
use App\Http\Livewire\Admin\AdminRoleComponent;
use App\Http\Livewire\Admin\AdminPermissionComponent;



/* TODO:CLIENT */

    Route::get('/', [MainController::class,'home']);
    Route::get('/contact', [MainController::class,'contact'])->name('contact');
    Route::get('/about', [MainController::class,'about'])->name('about');
    Route::get('/cart', CartComponent::class)->name('cart');
    Route::get('/wishlist', WishlistComponent::class)->name('wishlist');
    Route::get('/checkout', [CheckoutController::class,'index'])->name('checkout');
    Route::post('/checkout-store', [CheckoutController::class,'store'])->name('checkout.store');
    Route::get('/shop', ShopComponent::class)->name('shop.index');
    Route::get('/shop/{slug}.html', ProductDetailComponent::class)->name('shop.detail');
    Route::get('/blog', [BlogController::class,'index'])->name('blog.index');
    Route::get('/blog/{slug}.html', [BlogController::class,'read'])->name('blog.read');
    Route::get('/test',[TestController::class,'test'])->name('test');

    Route::get('store-vnpay',[CheckoutController::class, 'storeVnpay'])->name('store-vnpay');


/* TODO:ADMIN */

    Route::middleware(['auth'])->prefix('admin')->name('admin.')->group(function(){
        Route::get('/',AdminDashboardComponent::class)->name('dashboard');
        Route::get('/product',AdminProductComponent::class)->name('product');
        Route::get('/products-detail',AdminProductDetailComponent::class)->name('product.detail');
        Route::get('/products-comment',AdminProductCommentComponent::class)->name('product.comment');
        Route::get('/category',AdminCategoryComponent::class)->name('product.category');
        Route::get('/brand',AdminBrandComponent::class)->name('brand');
        Route::prefix('blog')->name('blog.')->group(function(){
            Route::get('/',[AdminBlogController::class,'index'])->name('index');
            Route::get('/create',[AdminBlogController::class,'create'])->name('create');
            Route::post('/store',[AdminBlogController::class,'store'])->name('store');
            Route::get('/{id}/edit',[AdminBlogController::class,'edit'])->name('edit');
            Route::post('/update',[AdminBlogController::class,'update'])->name('update');
            Route::post('/{id}/destroy',[AdminBlogController::class,'destroy'])->name('destroy');
        });
        // Route::resource('blog', AdminBlogController::class);
        Route::get('/blog-comment',AdminBlogCommentComponent::class)->name('blog.comment');
        Route::get('/blog-category',AdminBlogCategoryComponent::class)->name('blog.category');
        Route::get('/order',AdminOrderComponent::class)->name('order');
        Route::get('/order-finished',AdminOrderHistoryComponent::class)->name('order-finished');
        Route::group(['middleware' => ['role:super-admin']], function () {
            Route::get('/user',AdminUserComponent::class)->name('user');
            Route::get('/role',AdminRoleComponent::class)->name('role');
            Route::get('/permission',AdminPermissionComponent::class)->name('permission');
        });
    });

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
