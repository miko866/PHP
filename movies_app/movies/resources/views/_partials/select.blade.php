<?php 

    $selected = false;
    if ( isset($director) ) $selected = $director->id;
    elseif ( isset($movie) ) $selected = $movie->director_id;

?>


<?php $dir_model = new \App\Director; ?>

<select name="director_id" onchange="{{ $submit ? 'this.form.submit()' : '' }}">
    <option value="">All directors</option>
    @foreach( $dir_model->getDirectors() as $director )
        <option 
            {{ $selected === $director->id ? 'selected' : ''  }}
            value="{{ $director->id }}">{{ $director->name }}
        </option>
    @endforeach
</select>