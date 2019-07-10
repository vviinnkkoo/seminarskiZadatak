<?php

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');
Route::get('/add-genre', 'HomeController@displayNewGenreInput')->name('addgenre');
