@extends('master')
@section('title', $movie->title)

@section('content')

    <h1>{{ $movie->title }}</h1>

    <table>
        <theader>
            <tr>
                <th>director</th>
                <th>title</th>
                <th>year</th>
                <th>gross</th>
                <th>genre</th>
                <th>edit</th>
            </tr>
        </theader>
        <tbody>
            @include('_partials.movie')
        </tbody>
        <tfoot>
            <tr class="summary">
                <td colspan="5">{{ $movie->summary }}</td>
            </tr>
        </tfoot>
    </table>

@endsection