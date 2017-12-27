<?php


Route::group(['prefix' => LaravelLocalization::setLocale(), 'middleware' => ['localize', 'web', 'localeSessionRedirect', 'localizationRedirect']], function () {
    Route::auth();
    Route::get('/admin', 'AdminController@index');
});

Route::group(['prefix' => LaravelLocalization::setLocale(), 'middleware' => ['localize', 'web', 'localeSessionRedirect', 'localizationRedirect']], function () {
    Route::get('/admin/users', 'UserController@all');
    Route::get('/admin/delete-user/{id}', 'UserController@delete');
    Route::get('/admin/approve-user/{id}', 'UserController@approve');

    Route::get('/admin/players', 'PlayerController@all');
    Route::get('/admin/create-player', 'PlayerController@create');
    Route::post('/admin/save-player', 'PlayerController@save');
    Route::get('/admin/delete-player/{id}', 'PlayerController@delete');
    Route::get('/admin/edit-player/{id}', 'PlayerController@edit');
    Route::post('/admin/update-player', 'PlayerController@update');

    Route::get('/admin/games', 'GameController@all');
    Route::get('/admin/create-game', 'GameController@create');
    Route::post('/admin/save-game-step1', 'GameController@saveStep1');
    Route::post('/admin/save-game-step2', 'GameController@saveStep2');
    Route::post('/admin/save-game-step3', 'GameController@saveStep3');
    Route::get('/admin/create-protocol', 'GameController@createProtocol');
    Route::post('/admin/save-protocol', 'GameController@saveProtocol');

    Route::get('/admin/delete-game/{id}', 'GameController@delete');
    Route::get('/admin/game/{id}', 'GameController@view');


});

Route::group(['prefix' => LaravelLocalization::setLocale(), 'middleware' => ['localize', 'web', 'localeSessionRedirect', 'localizationRedirect']], function () {
    Route::get('/', 'MainController@index');
    Route::get('/home', 'MainController@index');
    Route::get('/rating', 'MainController@rating');
    /*
    Route::get('/photoreport/{slug}','MainController@singlePhotoreport');*/
});