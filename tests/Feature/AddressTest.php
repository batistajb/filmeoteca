<?php

namespace Tests\Feature;

use App\Models\Address;
use App\Models\User;
use App\Services\UserService;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Support\Facades\App;
use Tests\TestCase;

class AddressTest extends TestCase
{
    use DatabaseTransactions;



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

        $cont = 5;

        for($i=0; $i<$cont; $i++)
        {
            Address::create(
                [
                    'street'     =>'Admin User Rua'.$i,
                    'district'   =>'Admin User Bairro'.$i,
                    'number'     =>'000'.$i,
                    'uf'         =>'XX'.$i,
                    'cep'        =>'00.000-00'.$i,
                    'city'       =>'Admin User Cidade'.$i,
                    'user_id'    =>$user->id,
                ]
            );
        }

        $addresses= $user->addresses->count();
        $this->assertEquals($cont, $addresses);
    }

}
