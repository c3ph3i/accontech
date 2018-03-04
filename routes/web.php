<?php

Auth::routes();

Route::group(['middleware' => 'auth'], function() {
    Route::get('/', 'DashboardController@getHomePage')->name('home');
    Route::post('/places/delete/all', 'PlacesController@destroy')->name('delete_all_places');
    Route::resource('places', 'PlacesController');
    Route::post('/places/{id}', ['uses' => 'PlacesController@update']);
    Route::post('/places/visited/{id}', ['uses' => 'PlacesController@updatePlaceVisitedColumnAJAX']);
});
