<?php

Auth::routes(['register' => false]);

Route::group(['namespace' => 'Admin', 'middleware' => ['auth'], 'prefix' => 'admin', 'as' => 'admin.'], function () {

    Route::redirect('/', '/admin/home');

    Route::get('/home', 'IndexController@index')->name('home');

    Route::resource('permissions', 'PermissionsController')->except(['create', 'show']);

    Route::resource('roles', 'RolesController');

    Route::resource('users', 'UsersController');

    Route::resource('agencies', 'AgencyController');

    Route::post('{agency}/schedule', 'ScheduleController@store')->name('schedule.store');

    Route::delete('schedule/{schedule}', 'ScheduleController@destroy')->name('schedule.destroy');
});

Route::get('/', 'AgencyController@index');

Route::get('/{agency}', 'AgencyController@show');
