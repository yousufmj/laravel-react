<?php

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
 */

Route::get('/entries', 'ContactEntriesController@index');
Route::post('/entries', 'ContactEntriesController@create');

// Add routes for possible future use
Route::get('entries/{id}', 'ContactEntriesController@findOne');
Route::delete('entries/{id}', 'ContactEntriesController@delete');
