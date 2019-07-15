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




    
    // Require login
    public function __construct() {
        $this->middleware('auth');
    }





    // New genre input form
    public function displayNewGenreInput() {
        $genres = Genre::get();
        return view('addgenre', [ 'genres' => $genres ]);
    }





    // New genre input form
    public function displayNewMovieInput() {
        $genres = Genre::get()->sortBy('name');
        $movies = Movie::get()->sortBy('name');
        return view('addmovie', [ 'genres' => $genres, 'movies' => $movies ]);
    }





    // Display movies -> SORT BY NAME
    public function displayMovies() {
        $movies = Movie::get()->sortBy('name');
        return view('movies', [ 'movies' => $movies ]);
    }

    // Display movies -> SELECT BY LETTER
    public function displayMoviesbyLetter($letter) {
        $movies = Movie::where('name', 'LIKE', $letter . '%')->get();
        $ltr = $letter;
        return view('movies', [ 'movies' => $movies, 'letter' => $ltr ]);
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

        $path = Storage::putFileAs(
            'public/cover-photos', $request->file('coverPhoto'), Input::file('coverPhoto')->getClientOriginalName()
        );
    
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
    
        return redirect('/');
    }





    // DELETE movie
    public function deleteMovie($id) {
        $movie = Movie::where('id', $id)->first();
        Storage::delete($movie->coverPhoto);
        Movie::findOrFail($id)->delete();
        return redirect('/');
    }
}
