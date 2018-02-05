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
Route::get('/Login', 'HomeController@index')->name('home');
//User
Route::get('/User', 'create_usercontroller@index');
Route::get('/User/Create', 'create_usercontroller@create');
Route::post('/User/Create', 'create_usercontroller@creates');
Route::get('/User/Edit/{id}', 'create_usercontroller@edit');
Route::post('/User/Edit', 'create_usercontroller@edits');
Route::get('/User/Delete/{id}', 'create_usercontroller@delete');
Route::post('/User/Delete', 'create_usercontroller@deletes');
//User
Route::get('/Member', 'MemberController@index');
Route::get('/Member/Create', 'MemberController@create');
Route::post('/Member/Create', 'MemberController@creates');
Route::get('/Member/Edit/{id}', 'MemberController@edit');
Route::post('/Member/Edit', 'MemberController@edits');
Route::get('/Member/Update/{id}', 'MemberController@update');
Route::get('/Member/Delete/{id}', 'MemberController@delete');
Route::post('/Member/Delete', 'MemberController@deletes');
//Category
Route::get('/Category', 'categorycontroller@index');
Route::get('/Category/Create', 'categorycontroller@create');
Route::post('/Category/Create', 'categorycontroller@creates');
Route::get('/Category/Edit/{id}', 'categorycontroller@edit');
Route::post('/Category/Edit', 'categorycontroller@edits');
Route::get('/Category/Update/{id}', 'categorycontroller@update');
//Loan
Route::get('/Loan', 'LoanController@index');
Route::get('/Loan/Approved', 'LoanController@approved_loan');
Route::get('/Loan/Paid', 'LoanController@paid_loan');
Route::get('/Loan/Rejected', 'LoanController@rejected_loan');
Route::get('/Loan/Create/{id}', 'LoanController@create');
Route::post('/Loan/Create/{id}', 'LoanController@create');
Route::post('/Loan/Create', 'LoanController@create');
Route::get('/Loan/Approved/{id}', 'LoanController@approved');
Route::get('/Loan/Rejected/{id}', 'LoanController@rejected');
Route::get('/Loan/Cancelled/{id}', 'LoanController@cancelled');
Route::get('/Loan/Uncancelled/{id}', 'LoanController@uncancelled');
Route::get('/Loan/Amortization/{id}', 'LoanController@amortization');
//Schedule Payment
Route::get('/Schedule/{id}', 'ScheduleController@index');
Route::get('/Schedule/Create/{id}', 'ScheduleController@create');
Route::post('/Schedule/Create', 'ScheduleController@creates');
Route::get('/Scheme', 'ScheduleController@scheme');
Route::post('/Scheme', 'ScheduleController@scheme');
Auth::routes();
//Charts
Route::get('/Charts', 'Controller@charts');
Route::get('/Charts/Payment', 'Controller@payments');
Route::get('/Charts/User', 'Controller@users');


