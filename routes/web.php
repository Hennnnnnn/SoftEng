<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DiscussionController;
use App\Http\Controllers\LeaderboardController;
use App\Http\Controllers\MarketplaceController;
use App\Http\Controllers\RecyclingItemController;
use App\Http\Controllers\VoucherController;

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

Route::get('/', [
    HomeController::class, 'index'
]);

// Route::get('/', [
//     VoucherController::class, 'showMyVoucher'
// ]);
// Route::get('/leaderboard', function () {
//     return view('pages.leaderboard');
// });

Route::get('/leaderboard', [
    LeaderboardController::class, 'show'
])->middleware(['auth', 'verified'])->name('leaderboard');

Route::middleware('auth')->group(function() {
    Route::get('/diy-list', [HomeController::class, 'show'])->name('diy-list');;
    Route::get('/diy-list/add', [HomeController::class, 'add'])->name('diy-list.add');
    Route::post('/diy-list/create', [HomeController::class, 'create'])->name('diy-list.create');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware('auth')->group(function () {
    Route::get('/voucher', [VoucherController::class, 'showVoucherList'])->name('voucher.list');
});

Route::middleware('auth')->group(function() {
    Route::get('/discussion', [DiscussionController::class, 'show'])->name('discussion.show');
    Route::post('/discussion/store', [DiscussionController::class, 'store'])->name('discussion.store');
    Route::post('/post/{postId}/like', [DiscussionController::class, 'addLike'])->name('discussion.like');
    Route::delete('/post/{postId}/unlike', [DiscussionController::class, 'removeLike'])->name('discussion.unlike');

});

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/marketplace', [MarketplaceController::class, 'show'])->name('marketplace');
    Route::get('/marketplace/create', [MarketplaceController::class, 'view'])->name('marketplace.create');
    Route::post('/marketplace/update', [MarketplaceController::class, 'store'])->name('marketplace.store');
});

Route::middleware('auth')->group(function () {
    Route::get('/recycle', [RecyclingItemController::class, 'create'])->name('recycle.create');
    Route::post('/recycle', [RecyclingItemController::class, 'store'])->name('recycle.store');
});

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/myVouchers', [VoucherController::class, 'showMyVoucher'])->name('myVouchers');
    Route::get('/vouchersList', [VoucherController::class, 'showVoucherList'])->name('vouchersList');
});



Route::middleware('auth')->group(function() {
    Route::get('/user/profile', [UserController::class, 'index'])->name('user.profile.index');
    Route::get('/user/profile/edit', [UserController::class, 'edit'])->name('user.profile.update.index');
    Route::match(['put', 'patch'], '/user/profile/edit', [UserController::class, 'updateProfile'])->name('user.profile.update');
    Route::post('/user/{user}/follow', [UserController::class, 'follow'])->name('user.follow');
    Route::post('/user/{user}/unfollow', [UserController::class, 'unfollow'])->name('user.unfollow');
});



Route::get('/test', [UserController::class, 'index']);

require __DIR__ . '/auth.php';
