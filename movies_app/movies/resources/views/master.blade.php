<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>@yield( 'title' )</title>
    
    {{-- from public --}}
    <link rel="stylesheet" href="{{ url('css/main.css') }}">
    </head>
    <body>
        
        <form action="{{ url('director/choose') }}" method="POST" class="navigation">
            <a href="{{ url('') }}" class="home">Home</a>

            @include('_partials.select', [ 'submit' => true ])

            <a href="{{ url('director/create') }}">new director</a>
            <a href="{{ url('movie/create') }}">new movie</a>
        </form>

        @yield( 'content' )

        {{-- On Real Web don't use, onli little hack for Testen --}}
        <script>
            var delLink = document.querySelector('.delete');
            delLink.onclick = function() {
                return confirm("Are you sure?");
            }
        </script>

    </body>
</html>