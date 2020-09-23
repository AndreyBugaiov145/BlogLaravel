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

Route::get('/','CatalogController@showAll')->name('catalog');

Route::get('/publication/{id}','CatalogController@showPublication')->name('publication');

Route::get('/tagPublication/{id}','CatalogController@showPublicationByTag')->name('tagPublication');
Route::get('/userPublication/{id}','CatalogController@showPublicationByUser')->name('userPublication');
Route::get('/creataPublication','CatalogController@creataPublication')->name('creataPublication')->middleware('auth');
Route::post('/creataPublicationSubmit','CatalogController@creataPublicationSubmit')->name('creataPublicationSubmit')->middleware('auth');

Route::get('/updatePublication/{id}','CatalogController@updatePublication')->name('updatePublication')->middleware('auth');
Route::post('/updatePublicationSubmit/{id}','CatalogController@updatePublicationSubmit')->name('updatePublicationSubmit')->middleware('auth');

Route::get('/clonePublication/{id}','CatalogController@clonePublication')->name('clonePublication')->middleware('auth');
Route::post('/clonePublicationSubmit/{id}','CatalogController@clonePublicationSubmit')->name('clonePublicationSubmit')->middleware('auth');


Route::get('/deletePublication/{id}','CatalogController@deletePublication')->name('deletePublication')->middleware('auth');

Route::get('/registration', function () {
    return view('registration');
});

Auth::routes();
