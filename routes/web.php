<?php

Auth::routes();

Route::group(['middleware' => 'auth'], function() {
    Route::get('/', 'DashboardController@getHomePage')->name('home');
    Route::post('/new', 'DashboardController@addNewLocation')->name('add_new_location');
});
