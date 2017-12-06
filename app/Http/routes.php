<?php


Route::group(['prefix' => LaravelLocalization::setLocale(),'middleware' => ['localize','web','localeSessionRedirect','localizationRedirect']], function() {
    Route::auth();
    Route::get('/admin', 'AdminController@index');   
});

Route::group(['prefix' => LaravelLocalization::setLocale(),'middleware' => ['localize','web','localeSessionRedirect','localizationRedirect']], function() {
	Route::get('/admin/users','UserController@all');
	Route::get('/admin/delete-user/{id}','UserController@delete');
	Route::get('/admin/approve-user/{id}','UserController@approve');

	Route::get('/admin/create-event','EventController@create');
	Route::post('/admin/save-event','EventController@save');
	Route::get('/admin/edit-event/{id}','EventController@edit');
	Route::post('/admin/update-event','EventController@update');
	Route::get('/admin/delete-event/{id}','EventController@delete');
	Route::get('/admin/events','EventController@all');

	Route::get('/admin/create-photoreport','PhotoreportController@create');
	Route::post('/admin/save-photoreport','PhotoreportController@save');
	Route::get('/admin/upload-photos/{id}','PhotoreportController@uploadPhotos');
	Route::get('/admin/edit-photoreport/{id}','PhotoreportController@edit');
	Route::post('/admin/update-photoreport','PhotoreportController@update');
	Route::get('/admin/delete-photoreport/{id}','PhotoreportController@delete');
	Route::get('/admin/photoreports','PhotoreportController@all');	

	Route::get('/admin/create-news','NewsController@create');
	Route::post('/admin/save-news','NewsController@save');
	Route::get('/admin/edit-news/{id}','NewsController@edit');
	Route::post('/admin/update-news','NewsController@update');
	Route::get('/admin/delete-news/{id}','NewsController@delete');
	Route::get('/admin/news','NewsController@all');			
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

Route::group(['middleware' => 'web'], function () {
	Route::post('upload-photos', ['as' => 'upload-photos', 'uses' =>'PhotoreportController@uploadPhoto']);
	Route::post('delete-photo', ['as' => 'delete-photo', 'uses' =>'PhotoreportController@deletePhoto']);
	
});
