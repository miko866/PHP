<?php

namespace App\Http\Controllers;

use App\Movie;

class MovieController extends Controller
{

    protected $model;

    public function __construct()
    {
        $this->model = new Movie;
    }

    public function index()
    {
        $movies = $this->model->getMovies(); 
        $count = $this->model->getMoviesCount(); 

        return view('movies.index')
            ->with('movies_count', $count)
            ->with('movies', $movies);
    }

    public function show($id)
    {
        $movie = $this->model->getMovie($id);

        return view('movies.show')
            ->with('movie', $movie);
    }
    
    /**
     * New movie form
     */
    public function create()
    {
        return view('movies.create');
    }

    public function edit( $id )
    {
        $movie = $this->model->getMovie($id);
        return view('movies.edit')
            ->with('movie', $movie);
    }

    /**
     * Store new movie in DB
     */
    public function store()
    {
        $id =  $this->model->createMovie(
            app('request')->all()
        );

        return redirect("movie/$id");
    }

    public function update()
    {
        $id =  app('request')->segment(2);
        $data = app('request')->except('_method');

        $this->model->updateMovie($id, $data);

        return redirect("movie/$id");
    }

    public function destroy( $id )
    {
        $this->model->deleteMovie($id);
        return redirect('');
    }
}
