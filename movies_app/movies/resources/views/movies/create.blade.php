@extends('master')
@section('title', 'New Movie')

@section('content')

    <form action="{{ url('movies') }}" method="POST">
        <h1>New Movie</h1>

        <p>
            <input type="text" name="title" placeholder="Title">
        </p>

        <p>
            <input type="text" name="year" placeholder="Year">
        </p>

        <p>
            <input type="text" name="gross" placeholder="Gross">
        </p>

        <p>
            <input type="text" name="genre" placeholder="Genre">
        </p>

        <p>
            @include('_partials.select', [ 'submit' => false ])
        </p>

        <p>
            <textarea name="summary" placeholder="About this movie"></textarea>
        </p>

        <p class="submit">
            <input type="submit" value="add new movie">
            <a href="{{ url('') }}">back</a>
        </p>
    </form>

@endsection