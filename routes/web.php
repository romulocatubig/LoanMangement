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
Route::get('/home', 'HomeController@index')->name('home');
//User
Route::get('/User', 'create_usercontroller@index');
Route::get('/User/Create', 'create_usercontroller@create');
Route::post('/User/Create', 'create_usercontroller@creates');
Route::get('/User/Edit/{id}', 'create_usercontroller@edit');
Route::post('/User/Edit', 'create_usercontroller@edits');
Route::get('/User/Delete/{id}', 'create_usercontroller@delete');
Route::post('/User/Delete', 'create_usercontroller@deletes');
//Category
Route::get('/Category', 'categorycontroller@index');
Route::get('/Category/Create', 'categorycontroller@create');
Route::post('/Category/Create', 'categorycontroller@creates');
Route::get('/Category/Edit/{id}', 'categorycontroller@edit');
Route::post('/Category/Edit', 'categorycontroller@edits');
//Loan
Route::get('/Loan', 'LoanController@index');
Route::get('/Loan/Create', 'LoanController@create');
Route::post('/Loan/Create', 'LoanController@creates');
//Schedule Payment
Route::get('/Schedule/{id}', 'ScheduleController@index');
Route::get('/Schedule/Create/{id}', 'ScheduleController@create');
Route::post('/Schedule/Create', 'ScheduleController@creates');
Auth::routes();
//Charts
Route::get('/Charts', 'Controller@charts');
Route::get('/Charts/Payment', 'Controller@payments');
Route::get('/Charts/User', 'Controller@users');


