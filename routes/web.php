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
 
 use App\User;

Route::get('/', function () {
    return view('welcome');
});
//['name' => 'World']
//User
Route::get('/User', function () {
	$list_user = User::All();
    return view('User.index')->with(['list_user' => $list_user]);
});
Route::get('/User/Create', function () {
    return view('User.create', ['name' => 'World']);
});
Route::post('/User/Create', 'create_usercontroller@create');
Route::get('/User/Edit/{id}', function ($id) {
	$list_user = DB::table('users')->where('id', $id)->get();
    return view('User.edit')->with(['list_user' => $list_user]);
});
Route::post('/User/Edit', 'create_usercontroller@edit');
Route::get('/User/Delete/{id}', function ($id) {
	$list_user = DB::table('users')->where('id', $id)->get();
    return view('User.delete')->with(['list_user' => $list_user]);
});
Route::post('/User/Delete', 'create_usercontroller@delete');
//Category
Route::get('/Category', function () {
    return view('Category.index', ['name' => 'World']);
});
Route::get('/Category/Create', function () {
    return view('Category.create', ['name' => 'World']);
});
Route::post('/Category/Create', 'categorycontroller@create');