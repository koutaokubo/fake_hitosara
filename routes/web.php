<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StoreController;
use App\Http\Controllers\ReserveController;
use App\Http\Controllers\HomeFormController;
use App\Http\Controllers\ContactFormController;
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

Route::get('/home', [HomeFormController::class, 'index']);

//すべてのユーザーに権限
// Route::group(['middleware' => ['auth', 'can:user-higher']], function () {
//     // ユーザ一覧
//     Route::get('/account', 'AccountController@index')->name('account.index');
// });

// システム管理者のみ
Route::group(['middleware' => ['auth', 'can:system-only']], function () {

});

// 店舗管理者以上
Route::group(['middleware' => ['auth', 'can:admin-higher']], function () {
    
});



Route::resource('contacts', ContactFormController::class)
    ->except(['destroy']);




Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::post('/store/confirm', [StoreController ::class ,'store']);

Route::resource('/store', StoreController::class);
Route::post('/store/confirm', [StoreController ::class ,'confirm']);

Route::get('/store/detail/', [StoreController::class, 'storeDetail'])->name('store.detail');

Route::resource('/store', StoreController::class);
// Route::resource('/store', StoreController::class);

Route::resource('/reserve', ReserveController::class)
    ->names(['index' => 'reserve.index',
            'create' => 'reserve.create',
            'store' => 'reserve.store'
            ])
    ->middleware('auth');


Route::resource('/reserve', ReserveController::class)
    ->names(['index' => 'reserve.index',
            'create' => 'reserve.create',
            'store' => 'reserve.store'
            ])
    ->middleware('auth');
    
// Route::get('/store/show/', [ReserveController::class, 'getFavoriteUsers'])->name('store.show');

Route::post('/reserve/confirm', [ReserveController::class, 'reserveConfirm'])->name('reserve.confirm');
