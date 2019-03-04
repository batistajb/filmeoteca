<?php

namespace Tests\Feature;

use App\Models\Favorite;
use App\Models\Address;
use App\Models\Contact;
use App\Models\Movie;
use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;

class FavoritesTest extends TestCase
{
    use DatabaseTransactions;

    public function testCreateFavorite()
    {

        $cont = 5;

        $user = User::create(
            [
                'name'     =>'Admin User',
                'email'     =>'adminuser@admin.com',
                'password'  =>bcrypt(123456),
                'cpf'       =>'xxx.xxx.xxx-xx',
                'rg'        =>'mg-xx.xxxx',
                'title'     =>'Admin User',
                'rule'      =>'admin'
            ]
        );

        for($i=0; $i<$cont; $i++) {

            Address::create(
                [
                    'street' => 'Admin User Rua' . $i,
                    'district' => 'Admin User Bairro' . $i,
                    'number' => '000' . $i,
                    'uf' => 'XX' . $i,
                    'cep' => '00.000-00' . $i,
                    'city' => 'Admin User Cidade' . $i,
                    'user_id' => $user->id,
                ]
            );
            Contact::create(
                [
                    'phone' => '(01)1234-567' . $i,
                    'user_id' => $user->id,
                ]
            );
            $movie = Movie::create(
                [
                    'title' => 'Filmes título' . $i,
                    'year' => 'Filmes ano' . $i,
                    'director' => 'Filmes diretor' . $i,
                    'image' => 'Filmes imagem' . $i,
                ]
            );
            Favorite::create(
                [
                    'user_id' => $user->id,
                    'movie_id' => $movie->id,
                    'cont' => 1,
                ]);

        }

        $movie->favorites->count();

        $moviesFavorites= $user->favorites->count();


        $this->assertEquals($cont,$moviesFavorites);
    }
}
