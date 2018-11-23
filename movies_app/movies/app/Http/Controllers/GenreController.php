<?php

namespace App\Http\Controllers;

use App\Movie;
use App\Genre;

class GenreController extends Controller
{

    protected $movie;
    protected $genre;

    public function __construct()
    {
        $this->movie = new Movie;
        $this->director = new Genre;
    }

    public function index()
    {
        return $this->genre->getDirectors();
    }

    public function show($name)
    {
        $movies = $this->movie->getMoviesByGenre($name);

        return view('movies.index')
            ->with('title', 'genre/' . $name)
            ->with('movies', $movies);
    }

    
}
