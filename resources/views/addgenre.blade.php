@extends('layouts.app')

@section('title', 'Videoteka | Dodaj novi žanr')

@section('content')
    <div class="container-fluid">
        <h1 class="display-5">Novi žanr</h1>
    </div>

    @include("common.errors")

    <form method="POST" action="/add-genre">
        {{ csrf_field() }}
        <div class="w-50 p-3">

            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text">Naziv žanra</span>
                </div>
                <input type="text" class="form-control" placeholder="Unesi naziv novog žanra" id="name" name="name">
            </div>

                <button type="submit" class="btn btn-primary">Unesi novi žanr</button>

        </div>
    </form>

    <div class="w-50 p-3">
        <table class="table table-hover table-light table-striped">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Naziv žanra</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($genres as $genre)
                <tr>
                    <th scope="row">{{ $genre->id }}</th>
                    <td>{{ $genre->name }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>


@endsection