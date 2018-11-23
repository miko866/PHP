<?php

    namespace App;

    class Movie {

        public function getMovies()
        {
            $sql = "
                SELECT 
                    d.first_name|| ' ' || d.last_name AS director,
                    m.id, m.director_id, title, year, gross, genre
                FROM 
                    movies m
                LEFT JOIN 
                    directors d ON m.director_id = d.id
            ";

            
            $limit = 5;
            $page = app('request')->get('page') ?: 1;
            $offset = ($page -1) * $limit;

            $sql .= "
                LIMIT $limit OFFSET $offset
            "; 


            return app('db')->select($sql);
        }

        public function getMovie( $id )
        {
            return app('db')->selectOne("
                SELECT m.*, d.first_name|| ' ' || d.last_name AS director
                FROM movies m
                LEFT JOIN directors d ON m.director_id = d.id
                WHERE m.id = ?

            ", [ $id ] );
        }

        public function getMoviesByDirector( $id )
        {
            return app('db')->select("
                SELECT 
                    d.first_name|| ' ' || d.last_name AS director,
                    m.id, m.director_id, title, year, gross, genre
                FROM movies m
                LEFT JOIN 
                    directors d ON m.director_id = d.id
                WHERE
                    director_id = ?

            ", [$id]);
        }

        public function getMoviesByGenre( $name )
        {
            return app('db')->select("
                SELECT 
                    d.first_name|| ' ' || d.last_name AS director,
                    m.id, m.director_id, title, year, gross, genre
                FROM movies m
                LEFT JOIN 
                    directors d ON m.director_id = d.id
                WHERE
                    genre = ?

            ", [$name]);
        }

        /**
         * Store new movie in DB
         */
        public function createMovie( $data )
        {
            $insert = app('db')->insert("

                INSERT INTO movies
                    (director_id, title, year, gross, genre, summary)
                VALUES
                    (:did, :title, :year, :gross, :genre, :summary)
            ", [
        
                'did'  => $data['director_id'],
                'title' => $data['title'],
                'year' => (int) $data['year'],
                'gross' => (int) $data['gross'],
                'genre' => $data['genre'],
                'summary' => $data['summary'],
            ]);

            return app('db')->getPdo()->lastInsertId();

        }

        public function getMoviesCount() 
        {
            $select = app('db')->selectOne("
                SELECT COUNT(1) AS count
                FROM movies
            ");

            return $select->count;
        }

        public function updateMovie( $id, $data )
        {
            return app('db')->update("

                UPDATE movies SET
                    director_id = :did,
                    title = :title,
                    year = :year,
                    gross = :gross,
                    genre = :genre,
                    summary = :summary
                WHERE id = :id
            ", [
                'id' => $id,
                'did'  => $data['director_id'],
                'title' => $data['title'],
                'year' => (int) $data['year'],
                'gross' => (int) $data['gross'],
                'genre' => $data['genre'],
                'summary' => $data['summary'],
            ]);

        }

        public function deleteMovie( $id )
        {
            return app('db')->delete("

                DELETE FROM movies
                WHERE id = ?
            ", [ $id ]);
        }

    }