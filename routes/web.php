<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;

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

//Root route
Route::get('/', function () {
    return redirect()->route('register.index');
});

//Homepage route
Route::view('home', 'welcome')->name('home');

//Register route
Route::name('register.')->group(function()
{
    Route::get('register', [RegisterController::class, 'index'])->name('index');
    Route::post('register/submit', [RegisterController::class, 'registerViaOrm'])->name('submit');
});