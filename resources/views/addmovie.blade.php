@extends('layouts.app')

@section('title', 'Dodaj novi film')

@section('content')
    <div class="container-fluid">
        <h1 class="display-5">Novi žanr</h1>
    </div>

    @include("common.errors")

    <form method="POST" action="/add-movie" enctype="multipart/form-data">
        {{ csrf_field() }}
        <div class="w-50 p-3">

            <!-- MOVIE NAME -->
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text">Naziv filma</span>
                </div>
                <input type="text" class="form-control" placeholder="Unesi naziv novog filma" name="name" id="name">
            </div>

            <!-- MOVIE GENRE -->
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                <label class="input-group-text" for="year">Žanr filma</label>
                </div>
                <select class="custom-select" id="genre_ID" name="genre_ID">
                    <option selected>Odaberi žanr...</option>
                        @foreach ($genres as $genre)
                            <option value="{{ $genre->id }}">{{ $genre->name }}</option>
                        @endforeach
                </select>
            </div>

            <!-- MOVIE YEAR -->
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                <label class="input-group-text" for="year">Godina filma</label>
                </div>
                <select class="custom-select" id="year" name="year">
                    <option selected>Odaberi godinu...</option>
                @for ($i = 1900; $i < 2020; $i++)
                    <option value="{{ $i }}">{{ $i }}</option>
                @endfor
                </select>
            </div>

            <!-- MOVIE LENGTH -->
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text">Trajanje filma</span>
                </div>
                    <input type="text" class="form-control" id="length" name="length">
                <div class="input-group-append">
                    <span class="input-group-text">u minutama</span>
                </div>
            </div>

            <!-- MOVIE PHOTO -->
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text">Slika filma</span>
                </div>
                <div class="custom-file">
                    <input type="file" class="custom-file-input" id="coverPhoto" name="coverPhoto">
                    <label class="custom-file-label" for="coverPhoto">Odaberi naslovnu sliku filma</label>
                </div>
            </div>

                <button type="submit" class="btn btn-primary">Unesi novi film</button>

        </div>
    </form>
@endsection