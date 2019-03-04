<?php

namespace Tests\Unit;

use App\Models\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UserTest extends TestCase
{

    public function testCreateUser()
    {
        User::create(
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

        $this->seeInDatabe('users',['name'=>'admin User']);
    }

}
