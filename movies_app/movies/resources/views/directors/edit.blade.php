@extends('master')
@section('title', 'Edit Director')

@section('content')

    <form action="{{ url('director/' . $director->id) }}" method="POST">
        <input type="hidden" name="_method" value="PUT">
        <h1>Edit Director</h1>

        <p>
            <input value="{{ $director->first_name }}" type="text" name="first_name" placeholder="First Name">
        </p>

        <p>
            <input value="{{ $director->last_name }}" type="text" name="last_name" placeholder="Last Name">
        </p>

        <p>
            <input value="{{ $director->country }}" type="text" name="country" placeholder="Country">
        </p>

        <p>
            <input value="{{ $director->birthdate }}" type="date" name="birthdate" placeholder="Birthdate">
        </p>


        <p class="submit">
            <input type="submit" value="edit director">
            <a href="{{ url() }}">back</a>
        </p>
    </form>

@endsection