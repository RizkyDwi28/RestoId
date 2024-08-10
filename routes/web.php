<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CartController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\UserController;

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

Route::get('/',function(){
    return redirect(route('home'));
});

Route::get('/home', [MenuController::class, 'indexHome'])->name('home');

Route::get('/menu', [MenuController::class, 'index'])->name('menu.index');

Route::get('/menu/sort/{sort_type}', [MenuController::class, 'indexSort'])->name('menu.sort');

Route::get('/menu/detail/{menu_id}', [MenuController::class, 'show'])->name('menu.show');

Route::get('/search/menu',[MenuController::class,'search'])->name('menu.search')->middleware('isUser');

Route::get('/manage/menu', [MenuController::class, 'indexManage'])->name('menu.manage')->middleware('isAdmin');

Route::get('/create/menu', [MenuController::class, 'create'])->name('menu.create')->middleware('isAdmin');

Route::post('/store/menu', [MenuController::class, 'store'])->name('menu.store')->middleware('isAdmin');

Route::get('/edit/menu/{menu_id}', [MenuController::class, 'edit'])->name('menu.edit')->middleware('isAdmin');

Route::put('/update/menu/{menu_id}', [MenuController::class, 'update'])->name('menu.update')->middleware('isAdmin');

Route::delete('/destroy/menu/{menu_id}', [MenuController::class, 'destroy'])->name('menu.destroy')->middleware('isAdmin');

Route::get('/login/page',[AuthController::class, 'loginPage'])->name('login.page')->middleware('isGuest');

Route::get('/login/action',[AuthController::class, 'loginAction'])->name('login.action')->middleware('isGuest');

Route::get('/register/page',[AuthController::class, 'registerPage'])->name('register.page')->middleware('isGuest');

Route::post('/register/action',[AuthController::class, 'registerAction'])->name('register.action')->middleware('isGuest');

Route::get('/logout',[AuthController::class, 'logout'])->name('logout')->middleware('isUser');

Route::post('/add/cart/{menu_id}',[CartController::class, 'addToCart'])->name('add.to.cart')->middleware('isCustomer');

Route::get('/cart/list',[CartController::class, 'cartList'])->name('cart.list')->middleware('isCustomer');

Route::put('/decrease/cart_item/{menu_id}', [CartController::class, 'decrease'])->name('cart_item.decrease')->middleware('isCustomer');

Route::put('/increase/cart_item/{menu_id}', [CartController::class, 'increase'])->name('cart_item.increase')->middleware('isCustomer');

Route::put('/check/out/{cart_id}',[CartController::class, 'checkout'])->name('check.out')->middleware('isCustomer');

Route::delete('/remove/cart/{menu_id}',[CartController::class, 'removeFromCart'])->name('remove.from.cart')->middleware('isCustomer');

Route::get('/history/page',[CartController::class,'historyPage'])->name('history.page')->middleware('isCustomer');

Route::get('/edit/password',[UserController::class,'editPassword'])->name('password.edit')->middleware('isUser');

Route::put('/update/password',[UserController::class,'updatePassword'])->name('password.update')->middleware('isUser');

Route::get('/edit/profile',[UserController::class,'editProfile'])->name('profile.edit')->middleware('isUser');

Route::put('/update/profile',[UserController::class,'updateProfile'])->name('profile.update')->middleware('isUser');