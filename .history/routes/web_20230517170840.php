<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TestController;

use App\Http\Controllers\Client\MainController;
use App\Http\Controllers\Client\BlogController;
use App\Http\Controllers\Client\CheckoutController;

use App\Http\Controllers\Admin\AdminBlogController;
use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Admin\UserImpersonateController;

use App\Http\Livewire\Client\QuickProductDetailComponent;
use App\Http\Livewire\Client\ShopComponent;
use App\Http\Livewire\Client\CartComponent;
use App\Http\Livewire\Client\WishlistComponent;
use App\Http\Livewire\Client\ProductDetailComponent;
use App\Http\Livewire\Client\CheckoutComponent;

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
    Route::post('/mail', [MainController::class,'mail'])->name('mail');
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

    Route::middleware('auth','admin')->prefix('admin')->name('admin.')->group(function(){
        Route::get('/',[AdminDashboardController::class,'index'])->name('dashboard');
        Route::middleware(['role:manager-products-full|manager-product|super-admin'])->group(function(){
            Route::get('/product',AdminProductComponent::class)->name('product')
                ->middleware(['can:products list']);
            Route::get('/products-detail',AdminProductDetailComponent::class)->name('product.detail')
                ->middleware(['can:products detail']);
            Route::get('/products-comment',AdminProductCommentComponent::class)->name('product.comment')
                ->middleware(['can:products category']);
            Route::get('/brand',AdminBrandComponent::class)->name('brand')
                ->middleware(['can:products brand']);
            Route::get('/category',AdminCategoryComponent::class)->name('product.category')
                ->middleware(['can:products comment']);
        });
        Route::prefix('blog')->middleware(['role:manager-blogs-full|manager-blogs|super-admin'])
            ->name('blog.')->group(function(){
                Route::group(['middleware' => ['permission:blogs list']], function(){
                    Route::get('/',[AdminBlogController::class,'index'])->name('index');
                    Route::post('/change-featured',[AdminBlogController::class,'change'])
                        ->name('change-featured');
                });
                Route::group(['middleware' => ['permission:blog add']], function(){
                    Route::get('/create',[AdminBlogController::class,'create'])->name('create');
                    Route::post('/store',[AdminBlogController::class,'store'])->name('store');
                });
                Route::get('/{id}/edit',[AdminBlogController::class,'edit'])->name('edit');
                Route::post('/update',[AdminBlogController::class,'update'])->name('update');
                Route::post('/{id}/destroy',[AdminBlogController::class,'destroy'])->name('destroy');
                Route::get('/blog-category',AdminBlogCategoryComponent::class)->name('category')
                    ->middleware(['can:blog category']);
                Route::get('/blog-comment',AdminBlogCommentComponent::class)->name('comment')
                    ->middleware(['can:blog comment']);
        });

        Route::group(['middleware' => ['role:manager-orders-full|manager-orders|super-admin']], function(){
            Route::get('/order',AdminOrderComponent::class)->name('order')->middleware(['can:order processing']);
            Route::get('/order-finished',AdminOrderHistoryComponent::class)->name('order-finished')
                ->middleware(['can:order finished']);
        });
        Route::group(['middleware' => ['role:super-admin']], function () {
            Route::get('/user',AdminUserComponent::class)->name('user');
            Route::get('/role',AdminRoleComponent::class)->name('role');
            Route::get('/permission',AdminPermissionComponent::class)->name('permission');
            Route::get('impersonate/{id}',[UserImpersonateController::class,'impersonate'])
                ->name('impersonate');
            });
        });
        Route::get('impersonate_leave',[UserImpersonateController::class,'impersonate_leave'])
            ->name('impersonate_leave');

    Route::get('/dashboard', function () {
        return view('dashboard');
    })->middleware(['auth', 'verified'])->name('dashboard');

    Route::middleware('auth')->group(function () {
        Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
        Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    });

    require __DIR__.'/auth.php';
