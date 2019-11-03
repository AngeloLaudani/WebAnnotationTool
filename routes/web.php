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
    return view('home');
});
Route::get('/info', function() {
    return view('info.info-page');
});

Route::get('/login', 'SessionsController@create');
Route::get('/logout', 'SessionsController@destroy');
Route::post('/login', 'SessionsController@store');

Route::get('/forgotten-password', 'PasswordController@create');

Route::get('/register', 'RegistrationController@create');
Route::post('/register', 'RegistrationController@store');

Route::get('/annotations', 'AnnotationsController@index');
Route::get('/dataset-filter', 'AnnotationsController@dataset_filter');
Route::get('/annotation-filter', 'AnnotationsController@annotation_filter');
Route::get('/annotation-page/{image}', 'AnnotationsController@show');
Route::get('/annotation-details/{image}', 'AnnotationsController@details');
Route::get('/class-filter', 'AnnotationsController@class_filter');
Route::post('/annotations/upload-annotation', 'AnnotationsController@store');
Route::post('/annotations/upload-owl-annotation', 'AnnotationsController@store_owl');

Route::get('/load-annotation', 'AnnotoriousController@load');
Route::get('/load-last-annotation', 'AnnotoriousController@load_last');
Route::post('/create-annotation', 'AnnotoriousController@store');
Route::post('/remove-annotation', 'AnnotoriousController@destroy');
Route::post('/update-annotation', 'AnnotoriousController@update');

Route::get('/annotations/upload-domain', 'DomainController@index');
Route::post('/annotations/upload-domain', 'DomainController@store');

Route::get('/user-page/{user}', 'UserController@index');
Route::post('/update-picture', 'UserController@update_picture');
Route::post('/update-name', 'UserController@update_name');
Route::post('/update-email', 'UserController@update_email');
