@extends('master')
@section('title',  isset( $title ) ? $title : 'all movies')

@section('content')

    <h1>
        {{ $title or 'all movies' }}
        
        @if( isset($director) )
        <a href="{{ url('director/' . $director->id . '/edit')}}">edit</a>
        <a href="{{ url('director/' . $director->id . '/delete')}}">x</a>
        @endif
    </h1> 

    @if( count($movies) )
        <table>
            <thead>
                <tr>
                    {{-- @foreach( collect($movies[0])->except(['id', 'summary', 'director_id'])->keys() as $columm)
                        <th>{{ $columm }}</th>
                    @endforeach --}}
                    <th>director</th>
                    <th>title</th>
                    <th>year</th>
                    <th>gross</th>
                    <th>genre</th>
                    <th>edit</th>
                </tr>
            </thead>

            <tbody>
                @each( '_partials.movie', $movies, 'movie' )
            </tbody>
            <tfoot>
                <tr>
                    <th colspan="4" class="gross-th">
                        {{ number_format(collect($movies)->sum('gross'), 2) }}
                    </th>
                </tr>
            </tfoot>
        </table>

        @if( app('request')->is('/') )
            @include('_partials.pagination')
        @endif

    @else
        <p>no movies :(</p>
    @endif
@endsection