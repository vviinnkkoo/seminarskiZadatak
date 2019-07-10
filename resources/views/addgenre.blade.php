@extends('layouts.app')

@section('title', 'Početna stranica')

@section('content')
    <div class="container-fluid">
        <h1 class="display-5">Novi žanr</h1>
    </div>

    <form method="POST" action="/new-genre" style="w-50">

        <div class="w-50">
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="genre">Naziv žanra</span>
                </div>
                <input type="text" class="form-control" placeholder="Unesi naziv novog žanra">
            </div>
                <button type="submit" class="btn btn-primary">Unesi novi žanr</button>
        </div>
    </form>
@endsection