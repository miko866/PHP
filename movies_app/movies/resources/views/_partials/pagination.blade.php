<?php

    $limit = 5;

    $page_count = ceil($movies_count / $limit);
    $current_page = (int) app('request')->get('page') ?: 1;
?>

@if( $page_count > 2 )

    <p class="pagination">
        @for( $i = 1; $i <= $page_count; $i++ )

            {{-- if current page, strong instead of link --}}
            @if( $i == $current_page )
                <strong>{{ $i }}</strong>
            @else
            <a href="{{ url("?page=$i") }}">{{ $i }}</a>
            @endif
        @endfor
    </p>

@endif
        