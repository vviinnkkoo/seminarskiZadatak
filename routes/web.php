<?php

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');

Route::get('/add-genre', 'VideotekaController@displayNewGenreInput')->name('genreform');
Route::post('/add-genre', 'VideotekaController@insertNewGenre')->name('genreadd');

Route::get('/add-movie', 'VideotekaController@displayNewMovieInput')->name('movieform');
Route::post('/add-movie', 'VideotekaController@insertNewMovie')->name('movieadd');

Route::get('/movies', 'VideotekaController@displayMovies')->name('movies');
