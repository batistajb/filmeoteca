<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
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
    }
}
