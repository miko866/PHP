<?php

namespace App\Http\Controllers;

use App\Movie;
use App\Director;

class DirectorController extends Controller
{

    protected $movie;
    protected $director;

    public function __construct()
    {
        $this->movie = new Movie;
        $this->director = new Director;
    }

    // get Name from all one
    public function index()
    {
        return $this->director->getDirectors();
    }

    // 
    public function show($id)
    {
        $movies = $this->movie->getMoviesByDirector($id);
        $director = $this->director->getDirector($id);

        return view('movies.index')
            ->with('title', $director->name)
            ->with('director', $director)
            ->with('movies', $movies);
    }

    /**
     * New director form
     */
    public function create()
    {
        return view('directors.create');
    }

    public function edit( $id )
    {
        $director = $this->director->getDirector($id);
        return view('directors.edit')
            ->with('director', $director);
    }

    /**
     * Redirect to director page on select 
     * 
     */
    public function choose()
    {
        $id = app('request')->input('director_id');
        return redirect("director/$id");
    }
    
    /**
     * Store new director in DB
     */
    public function store()
    {
        $id =  $this->director->createDirector(
            app('request')->all()
        );

        return redirect("director/$id");
    }

    public function update()
    {
        $id =  app('request')->segment(2);
        $data = app('request')->except('_method');

        $this->director->updateDirector($id, $data);

        return redirect("director/$id");
    }

}
