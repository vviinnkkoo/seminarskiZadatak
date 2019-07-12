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
                    <th></th>
                    <th></th>
                    
                </tr>
            </thead>
            <tbody>
                @foreach ($movies as $movie)
                <tr>                
                    <th scope="row"><img src="{{ Storage::url($movie->coverPhoto) }}" style="width:70px; height:auto;" /></th>
                    <td>{{ $movie->name }}</td>
                    <td>{{ App\Genre::find($movie->genre_id)->name }}</td>
                    <td>{{ $movie->length }}</td>
                    <td>{{ $movie->year }}</td>
                    <td></td>
                    <td></td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>




@endsection