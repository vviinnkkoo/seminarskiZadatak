@extends('layouts.app')

@section('title', 'Videoteka | Svi filmovi')

@section('content')
    <div class="container-fluid">
    
    <!--<h1 class="display-5">Filmovi</h1>-->

    <!--<a href="/" class="badge badge-primary m-3">&lt;&lt; Povratak na početnu</a>-->

    @include('menu.lettermenu') 

    @if (count($movies) == 0)
        <div class="alert alert-danger" role="alert">
        Trenutno nema niti jednog filma sa odabranim slovom.
        </div>
    @endif
    

    <div>
        @foreach ($movies as $movie)
        <div class="card m-2" style="width:200px; float:left; box-shadow: 0 0 20px #aaa;">
            <img class="card-img-top" src="{{ Storage::url($movie->coverPhoto) }}" style="width:200px; height:auto;" />

            <div class="card-body">
            <h5 class="card-title" style="font-weight:bold;">{{ $movie->name }}</h5>
            </div>

            <ul class="list-group list-group-flush">
                <li class="list-group-item">{{ App\Genre::find($movie->genre_id)->name }}</li>
                <li class="list-group-item">{{ $movie->year }}</li>
            </ul>

            <div class="card-footer">
                <small class="text-muted">Trajanje filma: <span style="font-weight:bold;">{{ $movie->length }}</span> minuta</small>
            </div>

        </div>
        @endforeach
    </div>
    </div>


@endsection