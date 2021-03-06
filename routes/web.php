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


Route::get('/', 'StudentController@index')->name('student');
Route::get('student', 'StudentController@index')->name('student');
Route::post('student/all', 'StudentController@showCustomList');
Route::post('student/add', 'StudentController@addStudent');
Route::get('student/all', 'StudentController@allStudent')->name('allStudent');
Route::post('student/pdf', 'StudentController@printPDF')->name('printPDF');