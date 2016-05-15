<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', 'WelcomeController@index');
Route::get('/welcome', 'WelcomeController@welcome');
Route::post('/search_results', 'WelcomeController@SearchResults');
Route::get('home', 'HomeController@home');
Route::get('getApparels/{$cat}', 'HomeController@SortProduct');
Route::get('myRental', 'HomeController@myRental');
Route::get('myRent', 'HomeController@myRent');
Route::post('/delete_item', 'HomeController@deleteItem');
Route::get('/add_item', 'HomeController@addItem');
Route::post('/add', 'HomeController@Add');
Route::post('/edit_item', 'HomeController@editItem');


Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);
