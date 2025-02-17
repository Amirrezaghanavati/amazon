<?php

use App\Http\Controllers\Admin\Content\CommentController;
use App\Http\Controllers\Admin\Content\FaqController;
use App\Http\Controllers\Admin\Content\MenuController;
use App\Http\Controllers\Admin\Content\PageController;
use App\Http\Controllers\Admin\Content\PostController;
use App\Http\Controllers\Admin\Market\BrandController;
use App\Http\Controllers\Admin\Market\CommentController as ProductCommentController;
use App\Http\Controllers\Admin\Market\CopanController;
use App\Http\Controllers\Admin\Market\DeliveryController;
use App\Http\Controllers\Admin\Market\PaymentController;
use App\Http\Controllers\Admin\Market\ProductCategoryController;
use App\Http\Controllers\Admin\Market\ProductController;
use App\Http\Controllers\Admin\Market\ProductImageController;
use App\Http\Controllers\Admin\Setting\WebSettingController;
use App\Http\Controllers\Admin\Ticket\TicketAdminController;
use App\Http\Controllers\Admin\Ticket\TicketCategoryController;
use App\Http\Controllers\Admin\Ticket\TicketController;
use App\Http\Controllers\Auth\OtpLoginController;
use App\Http\Controllers\Home\Customer\AddressController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';

// Admin

Route::prefix('admin')->middleware(['auth', 'admin'])->name('admin.')->group(function () {

    // Dashboard
    Route::view('/', 'admin.index');

    // Content
    Route::prefix('content')->name('content.')->group(function () {
        Route::resource('menus', MenuController::class);
        Route::get('faqs/{faq}/status', [FaqController::class, 'status'])->name('faqs.status');
        Route::resource('faqs', FaqController::class);
        Route::resource('pages', PageController::class);
        Route::get('comments/{comment}/status', [CommentController::class, 'status'])->name('comments.status');
        Route::resource('comments', CommentController::class);
        Route::resource('posts', PostController::class);
    });

    Route::prefix('ticket')->name('ticket.')->group(function () {
        Route::resource('ticket-categories', TicketCategoryController::class);
        Route::resource('ticket-admins', TicketAdminController::class);
        Route::post('tickets/answer/{ticket}', [TicketController::class, 'answer'])->name('tickets.answer');
        Route::get('tickets/change-status/{ticket}', [TicketController::class, 'changeStatus'])->name('tickets.changeStatus');
        Route::resource('tickets', TicketController::class);
    });

    Route::prefix('market')->name('market.')->group(function () {
        Route::get('{comment}/status', [ProductCommentController::class, 'status'])->name('comments.status');
        Route::resource('comments', ProductCommentController::class);
        Route::resource('product-categories', ProductCategoryController::class);
        Route::resource('brands', BrandController::class);
        Route::resource('products', ProductController::class);
        Route::prefix('product-images')->name('product-images.')->controller(ProductImageController::class)->group(function () {
            Route::get('{product}', 'index')->name('index');
            Route::post('{product}', 'store')->name('store');
            Route::delete('{product}/{productImage}', 'destroy')->name('destroy');
        });
        Route::resource('coupons', CopanController::class);
        Route::resource('deliveries', DeliveryController::class);
        Route::resource('payments', PaymentController::class);
    });


    Route::prefix('setting')->name('setting.')->group(function () {
        Route::prefix('web-setting')->controller(WebSettingController::class)->name('web-setting.')->group(function () {
            Route::get('/', 'index')->name('index');
            Route::get('{setting}/set', 'set')->name('set');
            Route::put('{setting}/', 'update')->name('update');
        });
    });
});

Route::prefix('customer')->name('customer.')->group(function () {
    Route::resource('addresses', AddressController::class);
});

Route::prefix('otp')->name('otp.')->controller(OtpLoginController::class)->group(function () {
    Route::post('send', 'sendOtp')->name('send');
    Route::get('verify/{token}', 'showVerifyForm')->name('verify.form');
    Route::post('verify', 'verifyOtp')->name('verify');
});
