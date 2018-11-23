@extends('master')
@section('title', 'Edit Movie')

@section('content')

    <form action="{{ url('movie/' . $movie->id) }}" method="POST">
        <input type="hidden" name="_method" value="PUT">
        <h1>Edit Movie</h1>

        <p>
            <input value="{{ $movie->title }}" type="text" name="title" placeholder="Title">
        </p>

        <p>
            <input value="{{ $movie->year }}" type="text" name="year" placeholder="Year">
        </p>

        <p>
            <input value="{{ $movie->gross }}" type="text" name="gross" placeholder="Gross">
        </p>

        <p>
            <input value="{{ $movie->genre }}" type="text" name="genre" placeholder="Genre">
        </p>

        <p>
            @include('_partials.select', [ 'submit' => false ])
        </p>

        <p>
            <textarea name="summary" placeholder="About this movie">
                {{ $movie->summary }}
            </textarea>
        </p>

        <p class="submit">
            <input type="submit" value="edit movie">
            <a href="{{ url() }}">back</a>
        </p>
    </form>

@endsection