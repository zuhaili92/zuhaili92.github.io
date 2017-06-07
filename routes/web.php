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

Route::get('/','SessionController@index')->name('login');

Route::post('/login','SessionController@login');

Route::get('/logout','SessionController@destroy');

Route::get('/register','RegistrationController@create');

Route::post('/register','RegistrationController@store')->name('register');

Route::get('/dashboard','HomeController@index')->name('home');

Route::post('/profile', 'HomeController@update')->name('profile');

Route::get('/list-complaint', 'HomeController@listComplaint');

Route::get('/make-complaint', 'HomeController@makeComplaint');

Route::get('/edit-complaint/{id}', 'HomeController@editComplaint');

Route::patch('/edit-complaint/{id}', 'HomeController@updateComplaint');

Route::delete('/delete-complaint/{id}','HomeController@destroyComplaint');

Route::post('/make-complaint', 'HomeController@storeComplaint');

Route::get('/change-password','HomeController@editPassword');

Route::post('/change-password','HomeController@updatePassword');

Route::get('/create-department','HomeController@createDepartment')->name('department');

Route::post('/create-department','HomeController@storeDepartment');

Route::get('/list-department','HomeController@listDepartment');

Route::get('/edit-department/{id}','HomeController@editDepartment');

Route::patch('/edit-department/{id}','HomeController@updateDepartment');

Route::delete('/delete-department/{id}','HomeController@deleteDepartment');
