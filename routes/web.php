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
Route::get('/', 'ProductController@index');
Route::get('/get-sub-category/{id}', 'CategoryController@getSubCategoty');
Route::post('/add-product', 'ProductController@addProduct');
Route::post('/add-category', 'CategoryController@addCategory');