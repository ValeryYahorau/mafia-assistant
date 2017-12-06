<?php

Route::group(['prefix' => LaravelLocalization::setLocale(),'middleware' => ['web','localize','localeSessionRedirect','localizationRedirect']], function() {
	Route::get('/','MainController@index');
	Route::get('/intro','MainController@intro');
	Route::get('/contacts','MainController@contacts');
	Route::get('/items/{title}','MainController@category');
	Route::get('/item/{slug}','MainController@item');
	Route::get('/news','MainController@news');
	Route::get('/news/{slug}','MainController@singleNews');

});

Route::group(['prefix' => LaravelLocalization::setLocale(),'middleware' => ['web','localize','localeSessionRedirect','localizationRedirect']], function() {
    Route::auth();
    Route::get('/admin', 'AdminController@index');   
});

Route::group(['prefix' => LaravelLocalization::setLocale(),'middleware' => ['web','localize','localeSessionRedirect','localizationRedirect']], function() {
	Route::get('/admin/users','UserController@all');
	Route::get('/admin/delete-user/{id}','UserController@delete');
	Route::get('/admin/approve-user/{id}','UserController@approve');

	Route::get('/admin/create-seo','SEOController@create');
	Route::get('/admin/create-seo-default','SEOController@create');
	Route::post('/admin/save-seo','SEOController@save');
	Route::get('/admin/edit-seo/{id}','SEOController@edit');
	Route::post('/admin/update-seo','SEOController@update');
	Route::get('/admin/delete-seo/{id}','SEOController@delete');
	Route::get('/admin/seo','SEOController@all');

	Route::get('/admin/create-category','CategoryController@create');
	Route::post('/admin/save-category','CategoryController@save');
	Route::get('/admin/upload-category/{id}','CategoryController@uploadPhotos');
	Route::get('/admin/edit-category/{id}','CategoryController@edit');
	Route::post('/admin/update-category','CategoryController@update');
	Route::get('/admin/delete-category/{id}','CategoryController@delete');
	Route::get('/admin/category','CategoryController@all');	

	Route::get('/admin/create-item','ItemController@create');
	Route::post('/admin/save-item','ItemController@save');
	Route::get('/admin/upload-photos/{id}','ItemController@uploadPhotos');
	Route::get('/admin/edit-item/{id}','ItemController@edit');
	Route::post('/admin/update-item','ItemController@update');
	Route::get('/admin/delete-item/{id}','ItemController@delete');
	Route::get('/admin/item','ItemController@all');	

	Route::get('/admin/create-news','NewsController@create');
	Route::post('/admin/save-news','NewsController@save');
	Route::get('/admin/edit-news/{id}','NewsController@edit');
	Route::post('/admin/update-news','NewsController@update');
	Route::get('/admin/delete-news/{id}','NewsController@delete');
	Route::get('/admin/news','NewsController@all');	
	
	Route::get('/admin/create-property','PropertyController@create');
	Route::post('/admin/save-property','PropertyController@save');
	Route::get('/admin/edit-property/{id}','PropertyController@edit');
	Route::post('/admin/update-property','PropertyController@update');
	Route::get('/admin/delete-property/{id}','PropertyController@delete');
	Route::get('/admin/properties','PropertyController@all');
});

Route::group(['middleware' => 'web'], function () {

	Route::post('upload-photos', ['as' => 'upload-photos', 'uses' =>'ItemController@uploadPhoto']);
	Route::post('delete-photo', ['as' => 'delete-photo', 'uses' =>'ItemController@deletePhoto']);
	
});
