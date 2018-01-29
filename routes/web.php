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

Route::get('/', function () {
    return view('welcome');
});
//User
Route::get('/User', function () {
    return view('User.index', ['name' => 'World']);
});
Route::get('/User/Create', function () {
    return view('User.create', ['name' => 'World']);
});
Route::post('/User/Create', 'create_usercontroller@create');
//
Route::get('/Category', function () {
    return view('Category.index', ['name' => 'World']);
});
Route::get('/Category/Create', function () {
    return view('Category.create', ['name' => 'World']);
});
Route::post('/Category/Create', 'categorycontroller@create');