
    <tr>
        <td>
            <a href="{{ url('director/' . $movie->director_id) }}">
                {{ $movie->director }}
            </a>
        </td>

        <td>
            <a href="{{ url('movie/' . $movie->id) }}">
                <strong>{{ $movie->title }}</strong>
            </a>
        </td>
        
        <td>{{ $movie->year }}</td>
        
        <td>{{  number_format( $movie->gross, 2 ) }}</td>
        
        <td>
            <a href="{{ url( 'genre/' . $movie->genre ) }}">{{ $movie->genre }}</a>
        </td>
        
        <td>
            <a href="{{ url( 'movie/' . $movie->id . '/edit' ) }}">edit</a>
            <a  class="delete" href="{{ url( 'movie/' . $movie->id . '/delete' ) }}">x</a>
        </td>
    </tr>