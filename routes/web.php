<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CafeteriaController;
use App\Http\Controllers\SalesController;
use App\Models\cafeteria;
use GuzzleHttp\Middleware;
use Illuminate\Routing\RouteGroup;
use Illuminate\Support\Facades\Auth;

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
    return view('auth.login');
});


/*
Route::get('/cafeteria', function () {
    return view('cafeteria.index');
});

Route::get('/cafeteria/create',[CafeteriaController::class,'create']);
*/

Route::resource('cafeteria',CafeteriaController::class)->middleware('auth');

Auth::routes(['register'=>false,'reset'=>false]);

Route::get('/home', [CafeteriaController::class, 'index'])->name('home');

Route::get('/sales',[SalesController::class, 'index'])->name('sales');
Route::post('/sales/save',[SalesController::class, 'store'])->name('sales.store');
Route::get('/sales/list',[SalesController::class, 'getSales'])->name('sales.list');
 
Route::group(['middleware' => 'auth'], function () {

    Route::get('/', [CafeteriaController::class, 'index'])->name('home');
});

