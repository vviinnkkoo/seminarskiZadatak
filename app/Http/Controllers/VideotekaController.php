<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;

use App\Genre;
use App\Movie;

class VideotekaController extends Controller
{

    // New genre input form
    public function displayNewGenreInput() {
        $genres = Genre::get();
        return view('addgenre', [ 'genres' => $genres ]);
    }





    // New genre input form
    public function displayNewMovieInput() {
        $genres = Genre::get();
        return view('addmovie', [ 'genres' => $genres ]);
    }





    // Display movies
    public function displayMovies() {
        $movies = Movie::get();
        return view('movies', [ 'movies' => $movies ]);
    }





    // INSERT new genre //
    public function insertNewGenre (Request $request) {

        $validator = Validator::make($request->all(), [
        'name' => 'required'
        ]);
        
    
        if ($validator->fails()) {
            return redirect('/add-genre')
                ->withInput()
                ->withErrors($validator);
        }
    
        $genre = new Genre;
        $genre->name = $request->name;
        $genre->save();
    
        return redirect('/add-genre');
    }





    // INSERT new movie //
    public function insertNewMovie (Request $request) {


        $validator = Validator::make($request->all(), [
        'name' => 'required',
        'genre_ID' => 'required',
        'year' => 'required',
        'length' => 'required',
        'coverPhoto' => 'required',
        ]);

        $path = $request->file( 'coverPhoto' )->storeAs( 'cover-photos', Input::file('coverPhoto')->getClientOriginalName() );
        
    
        if ($validator->fails()) {
            return redirect('/add-movie')
                ->withInput()
                ->withErrors($validator);
        }
    
        $movie = new Movie;
        $movie->name = $request->name;
        $movie->genre_ID = $request->genre_ID;
        $movie->year = $request->year;
        $movie->length = $request->length;
        $movie->coverPhoto = $path;
        $movie->save();
    
        return redirect('/add-movie');
    }
}
