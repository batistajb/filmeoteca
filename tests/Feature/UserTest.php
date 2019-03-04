<?php

namespace Tests\Feature;

use App\Models\Address;
use App\Models\User;
use App\Services\UserService;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Support\Facades\App;
use Tests\TestCase;

class UserTest extends TestCase
{
    use DatabaseTransactions;

    public function testCreateUser()
    {
        User::create(
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
        $this->assertDatabaseHas('users',['name'=>'Admin User']);
    }

    public  function testCreateUserAddress()
    {
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

       $userAddress = Address::create(
           [
               'street'     =>'Admin User Rua',
               'district'   =>'Admin User Bairro',
               'number'     =>'000',
               'uf'         =>'XX',
               'cep'        =>'00.000-000',
               'city'       =>'Admin User Cidade',
               'user_id'    =>$user->id
           ]
       );
        $this->assertDatabaseHas('users',['name'=>'Admin User']);
        $this->assertDatabaseHas('addresses',['street'=>'Admin User Rua']);
    }

    public function testAddresUser()
    {
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

        $userAddress = Address::create(
            [
                'street'     =>'Admin User Rua',
                'district'   =>'Admin User Bairro',
                'number'     =>'000',
                'uf'         =>'XX',
                'cep'        =>'00.000-000',
                'city'       =>'Admin User Cidade',
                'user_id'    =>$user->id
            ]
        );

        $result = $userAddress->user;

        $this->assertEquals($user->id, $result->id);

    }


}
