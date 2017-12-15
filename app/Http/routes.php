<?php


Route::group(['prefix' => LaravelLocalization::setLocale(),'middleware' => ['localize','web','localeSessionRedirect','localizationRedirect']], function() {
    Route::auth();
    Route::get('/admin', 'AdminController@index');   
});

Route::group(['prefix' => LaravelLocalization::setLocale(),'middleware' => ['localize','web','localeSessionRedirect','localizationRedirect']], function() {
	Route::get('/admin/users','UserController@all');
	Route::get('/admin/delete-user/{id}','UserController@delete');
	Route::get('/admin/approve-user/{id}','UserController@approve');


    Route::get('/admin/players','PlayerController@all');
    Route::get('/admin/create-player','PlayerController@create');
    Route::post('/admin/save-player','PlayerController@save');
    Route::get('/admin/delete-player/{id}','PlayerController@delete');
    Route::get('/admin/edit-player/{id}','PlayerController@edit');
    Route::post('/admin/update-player','PlayerController@update');


    Route::get('/admin/games/{type}','GameController@all');




});

Route::group(['prefix' => LaravelLocalization::setLocale(),'middleware' => ['localize','web','localeSessionRedirect','localizationRedirect']], function() {
	Route::get('/','MainController@index');
	Route::get('/home','MainController@index');
	Route::get('/about','MainController@about');
	Route::get('/clever','MainController@clever');	
	Route::get('/contacts','MainController@contacts');
	Route::get('/news','MainController@news');
	Route::get('/news/{slug}','MainController@singleNews');
	Route::get('/events','MainController@events');
	Route::get('/event/{slug}','MainController@event');
	Route::get('/photoreports','MainController@photoreports');
	Route::get('/photoreport/{slug}','MainController@singlePhotoreport');
});
/*
Route::group(['middleware' => 'web'], function () {
	Route::post('upload-photos', ['as' => 'upload-photos', 'uses' =>'PhotoreportController@uploadPhoto']);
	Route::post('delete-photo', ['as' => 'delete-photo', 'uses' =>'PhotoreportController@deletePhoto']);
	
});


*/
