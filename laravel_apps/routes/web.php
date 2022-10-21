<?php

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

use App\Http\Controllers\SimpleFinance\ProductController;

Route::get('/', function () {
  return redirect('login');
});

Auth::routes();

Route::get('home', 'HomeController@index')->name('home');
Route::get('dashboard', 'HomeController@index')->name('home.dashboard');

Route::group(['middleware' => 'auth'], function () {
    Route::get('profile', ['as' => 'profile.edit', 'uses' => 'ProfileController@edit']);
    Route::put('profile', ['as' => 'profile.update', 'uses' => 'ProfileController@update']);
    Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'ProfileController@password']);


Route::prefix('products')->group(function () {
    Route::get("/", [ProductController::class, "index"])->name("page.products");
    Route::get("/", [ProductController::class, "create"])->name("page.products");
    Route::post("/", [ProductController::class, "save"])->name("page.products");
    Route::get("/", [ProductController::class, "edit"])->name("page.products");
    Route::put("/", [ProductController::class, "update"])->name("page.products");
    Route::delete("/", [ProductController::class, "destroy"])->name("page.products");
    });
});



