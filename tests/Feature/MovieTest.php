<?php

namespace Tests\Feature;

use App\Models\Movie;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;

class MovieTest extends TestCase
{
    use DatabaseTransactions;



    public  function testCreateMovie()
    {
        $movie = Movie::create(
            [
                'title'     =>'Filmes título',
                'year'      =>'Filmes ano',
                'director'  =>'Filmes diretor',
                'image'     =>'Filmes imagem',
            ]
        );

        $this->assertDatabaseHas('movies',['title'=>'Filmes título']);
    }

}
