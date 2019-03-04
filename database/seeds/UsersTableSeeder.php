<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('users')->insert(
            [
                'name'     =>'Admin User',
                'email'     =>'admin@admin.com',
                'password'  =>bcrypt(123456),
                'cpf'       =>'111.111.111-11',
                'rg'        =>'mg-11.1111',
                'title'     =>'Admin User',
                'rule'      =>'admin'
            ]
        );



        for ($i=1;$i<16;$i++)
        {
            $favorites = new \App\Models\Favorite();
            $favorites->user_id   = $i;
            $favorites->movie_id  = $i;
            $favorites->save();
            $favorite = \App\Models\Favorite::find($i);
            $favorite->cont =  $favorite->cont + 1;
            $favorite->save();
        }



    }
}
