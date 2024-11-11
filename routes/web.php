<?php

use App\Http\Controllers\PaymentController;
use App\Livewire\Auth\ForgotPasswordPage;
use App\Livewire\Auth\LoginPage;
use App\Livewire\Auth\RegisterPage;
use App\Livewire\Auth\ResetPasswordPage;
use App\Livewire\Beranda;
use App\Livewire\Cart;
use App\Livewire\Checkout;
use App\Livewire\MyAccount\Alamat;
use App\Livewire\MyAccount\MyAccount;
use App\Livewire\MyAccount\Password;
use App\Livewire\MyOrder\MyOrder;
use App\Livewire\MyOrder\MyOrderDetail;
use App\Livewire\ProductAll;
use App\Livewire\ProductDetail;
use App\Livewire\UmkmPage;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken;
use Illuminate\Support\Facades\Route;

Route::get('/symlink', function () {
    $target = $_SERVER['DOCUMENT_ROOT'] . '/main-app/storage/app/public';
    $link = $_SERVER['DOCUMENT_ROOT'] . '/storage';
    symlink($target, $link);
    echo "Done";
});

Route::get('/', Beranda::class)->name('home');
Route::get('/product', ProductAll::class)->name('product');
Route::get('/products/{slug}', ProductDetail::class)->name('product.detail');
Route::get('/cart', Cart::class)->name('cart');
Route::get('/umkm/{slug}', UmkmPage::class)->name('page.umkm');

Route::post('/midtrans/notification', [PaymentController::class, 'handleNotification'])->withoutMiddleware(VerifyCsrfToken::class);
Route::get('/midtrans/notification', function () {
    abort(404); // Mengarahkan ke halaman 404
});
Route::middleware('guest')->group(function () {

    Route::get('/login', LoginPage::class)->name('login');
    Route::get('/register', RegisterPage::class);
    Route::get('/forgot', ForgotPasswordPage::class)->name('password.request');
    Route::get('/reset/{token}', ResetPasswordPage::class)->name('password.reset');
});
Route::middleware('auth')->group(function () {
    Route::get('/my-account', MyAccount::class)->name('my.account');
    Route::get('/my-account/password', Password::class)->name('my.password');
    Route::get('/my-account/alamat', Alamat::class)->name('my.alamat');
    Route::get('/my-order', MyOrder::class)->name('my-order');
    Route::get('/my-orders/{order_id}', MyOrderDetail::class)->name('my-order.detail');
    Route::get('/checkout/{slug}', Checkout::class)->name('checkout');

    Route::get('/logout', function () {
        auth()->logout();
        return redirect('/');
    });
});
Route::get("/umkm", function () {
    return view("umk");
});
