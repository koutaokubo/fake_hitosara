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

Route::get('/home', [HomeFormController::class, 'index']);

Route::post('/store/confirm', [StoreController ::class ,'store']);

Route::resource('/store', StoreController::class);

Route::resource('/reserve', ReserveController::class)
    ->names(['index' => 'reserve.index',
            'create' => 'reserve.create',
            'store' => 'reserve.store'
            ])
    ->middleware('auth');
    
Route::resource('contacts', ContactFormController::class)
    ->except(['destroy']);


