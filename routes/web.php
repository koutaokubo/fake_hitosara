<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StoreController;
use App\Http\Controllers\ReserveController;
use App\Http\Controllers\HomeFormController;
use App\Http\Controllers\ContactFormController;
use App\Http\Controllers\FavoriteController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\MypageController;
use App\Http\Controllers\ChangePasswordController;

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
    Route::get('/reserve/list', [ReserveController::class, 'getReserveList'])->name('reserve.list');
});

//ログアウト
Route::get('/logout',[LoginController::class, "logout"]);


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

//メニュー
Route::post('/menu', [MenuController ::class ,'store']);
Route::get('/menu/create/{id}', [MenuController ::class ,'create']);
Route::post('/menu/confirm', [MenuController ::class ,'confirm']);
Route::get('/menu/list/{id}', [MenuController ::class ,'list']);
Route::get('/menu/edit/{id}', [MenuController ::class ,'edit']);
Route::post('/menu/update', [MenuController ::class ,'update']);
Route::post('/menu/delete', [MenuController ::class ,'destroy']);

Route::post('/store/confirm', [StoreController ::class ,'confirm']);
Route::get('/store/detail/', [StoreController::class, 'storeDetail'])->name('store.detail');

Route::resource('/store', StoreController::class)
    ->names(['index' => 'Store.index',
]);

Route::get('mypage/delete',[MypageController::class, 'delete']);

Route::resource('/mypage', MypageController::class)
->except(['create', 'store', 'show']);



Route::get('/reserve/list', [ReserveController::class, 'getReserveList'])->name('reserve.list');

Route::resource('/reserve', ReserveController::class)
    ->names(['index' => 'reserve.index',
            'create' => 'reserve.create',
            'store' => 'reserve.store',
            'edit' => 'reserve.edit',
            'update' => 'reserve.update',
            'destroy' => 'reserve.delete',
            ])
    ->middleware('auth');

Route::post('/reserve/confirm', [ReserveController::class, 'reserveConfirm'])->name('reserve.confirm');

Route::get('/favorite', [FavoriteController::class, 'getFavoriteStores'])->name('favorite');

Route::post('/favorite', [FavoriteController::class, 'toggleFavorite'])->name('togglefavorite');