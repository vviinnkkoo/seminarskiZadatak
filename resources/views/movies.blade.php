@extends('layouts.app')

@section('title', 'Dodaj novi film')

@section('content')
    <div class="container-fluid">
        <h1 class="display-5">Filmovi</h1>
    </div>

    <div class="w-50 p-3">
        <table class="table table-hover table-light table-striped">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Naziv filma</th>
                    <th scope="col">Žanr</th>
                    <th scope="col">Trajanje (min)</th>
                    <th scope="col">Godina</th>
                    
                </tr>
            </thead>
            <tbody>
                @foreach ($movies as $movie)
                <tr>                
                    <th scope="row"><img src="{{ asset($movie->coverPhoto) }}" /></th>
                    <td>{{ $movie->name }}</td>
                    <td>{{ $movie->genre_ID }}</td>
                    <td>{{ $movie->length }}</td>
                    <td>{{ $movie->year }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>




@endsection