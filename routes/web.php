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

/* Create a route with a name from url parameter which is "db_search".
*  This route will call the method getHome located in
*  the controller named "DbSearch". The getHome means we firstly will
*  get to the home page at the time we run the project.
*/
Route::get('db_search', 'DbSearch@getHome');

/* 
*  The route with "/searchDB" right after db_search will call
*  the method searchDB in controller "DbSearch". The browser will only
*  display data which are corresponding to user's input request from 
*  the search textfield.
*/
Route::get('db_search/searchDB', 'DbSearch@searchDB')->name('db_search.searchDB');
