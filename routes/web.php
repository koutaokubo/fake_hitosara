<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StoreController;
use App\Http\Controllers\ReserveController;
use App\Http\Controllers\HomeFormController;
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

<<<<<<< HEAD
=======
Route::resource('/reserve', ReserveController::class)
    ->names(['index' => 'reserve.index',
            'create' => 'reserve.create',
            'store' => 'reserve.store'
            ])
    ->middleware('auth');

Route::get('/home', [HomeFormController::class, 'index']);

Route::post('/like/{id}', [HomeFormController::class, 'index']);
>>>>>>> a750a54c376eaa33ac7e5b5ebdb4dcd9514d7151
