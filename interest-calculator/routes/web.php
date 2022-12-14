<?php

use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () {
//     return view('welcome');
// });
Route::group(['namespace' => 'App\Http\Controllers'], function()
{
    /**
     * Home Routes
     */
    Route::get('/', 'HomeController@index')->name('home.index');
    Route::group(['middleware' => ['guest']], function() {
        /**
         * Register Routes
         */
        Route::get('/register', 'RegisterController@show')->name('register.show');
        Route::post('/register', 'RegisterController@register')->name('register.perform');
        /**
         * Login Routes
         */
        Route::get('/login', 'LoginController@show')->name('login.show');
        Route::post('/login', 'LoginController@login')->name('login.perform');
        /**
         * Forgot Password Routes
         */
        Route::get('/forgot-password', 'LoginController@forgotPasswordShow')->name('forgotpassword.show');
        Route::post('/forgot-password', 'LoginController@forgotPassword')->name('forgotpassword.perform');
    });
    Route::group(['middleware' => ['auth']], function() {
        /**
         * Logout Routes
         */
        Route::get('/logout', 'LogoutController@perform')->name('logout.perform');
        /**
         * Interest Routes
         */
        Route::middleware('can:isUser')->prefix('interest')->group(function () {
            $ctrl = "UserInterestController";
            Route::get('/', "{$ctrl}@index")->name('interest.list');
            Route::get('/create', "{$ctrl}@create")->name('interest.create');
            Route::post('/', "{$ctrl}@store")->name('interest.store');
        });
        Route::middleware('can:isAdmin')->prefix('user')->group(function () {
            $ctrl = "UserController";
            Route::get('/', "{$ctrl}@index")->name('user.list');
        });
    });
});