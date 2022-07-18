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

Route::get('/', [\App\Http\Controllers\HomeController::class, 'index']) ->name(name: 'home');

Route::group(['prefix' => '/Home', 'controller' => \App\Http\Controllers\HomeController::class], function (){
    Route::get('/', action:'index')->name(name: 'home')->middleware('auth');
});


Route::group(['prefix' => '/Auth', 'controller' => \App\Http\Controllers\Auth\AuthController::class], function(){

    Route::get('/login', action: 'loginView')->name(name: 'login');
    Route::get('/register', action: 'registerView')->name(name: 'register');


    Route::post('/login', action: 'login')->name(name: 'login');
    Route::post('/register', action: 'register')->name(name: 'register');

    Route::get('logout', action: 'logout')->name(name: 'logout');
});

Route::group(['prefix' => '/Post', 'controller' =>\App\Http\Controllers\Post\PostController::class], function(){
    Route::name('post.')->group(function(){
        Route::post('/save', 'save')->name('save');
    });
});
    

Route::group(['prefix' => '/Category', 'middleware'=> 'auth' ,'controller' => \App\Http\Controllers\CategoryController::class], function(){

    Route::post ('/save', 'save')->name( name: 'category.save');
    Route::post ('/update{category}', 'update')->name( name: 'category.update');
    Route::post ('/delete{category}', 'delete')->name( name: 'category.delete');

});


