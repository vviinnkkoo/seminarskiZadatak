<?php

Auth::routes();

//Route::get('/', 'HomeController@index')->name('home');

Route::get('/add-genre', 'VideotekaController@displayNewGenreInput')->name('genreform');
Route::post('/add-genre', 'VideotekaController@insertNewGenre')->name('genreadd');

Route::get('/add-movie', 'VideotekaController@displayNewMovieInput')->name('movieform');
Route::post('/add-movie', 'VideotekaController@insertNewMovie')->name('movieadd');

Route::get('/', 'VideotekaController@displayMovies')->name('movies1');
Route::get('/{letter}', 'VideotekaController@displayMoviesbyLetter')->name('movies2');

Route::delete('/delete-movie/{id}', 'VideotekaController@deleteMovie')->name('moviedel');
