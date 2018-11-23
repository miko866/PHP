@extends('master')
@section('title', 'New Director')

@section('content')

    <form action="{{ url('directors') }}" method="POST">
        <h1>New Director</h1>

        <p>
            <input type="text" name="first_name" placeholder="First Name">
        </p>

        <p>
            <input type="text" name="last_name" placeholder="Last Name">
        </p>

        <p>
            <input type="text" name="country" placeholder="Country">
        </p>

        <p>
            <input type="date" name="birthdate" placeholder="Birthdate">
        </p>

        <p class="submit">
            <input type="submit" value="add new director">
            <a href="{{ url('') }}">back</a>
        </p>
    </form>

@endsection