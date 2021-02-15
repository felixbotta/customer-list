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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

# Companies
Route::get('/companies', 'CompaniesController@index')->middleware('auth');
Route::get('/companies/new', 'CompaniesController@new')->middleware('auth');
Route::post('companies/add', 'CompaniesController@add')->middleware('auth');
Route::get('companies/{id}/edit', 'CompaniesController@edit')->middleware('auth');
Route::post('/companies/update/{id}', 'CompaniesController@update')->middleware('auth');
Route::delete('/companies/delete/{id}', 'CompaniesController@delete')->middleware('auth');

# Customers
Route::get('/customers', 'CustomersController@index')->middleware('auth');
Route::get('/customers/new', 'CustomersController@new')->middleware('auth');
Route::post('customers/add', 'CustomersController@add')->middleware('auth');
Route::get('customers/{id}/edit', 'CustomersController@edit')->middleware('auth');
Route::post('/customers/update/{id}', 'CustomersController@update')->middleware('auth');
Route::delete('/customers/delete/{id}', 'CustomersController@delete')->middleware('auth');

