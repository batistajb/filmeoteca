<?php

namespace Tests\Feature;

use App\Models\Contact;
use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;

class ContactTest extends TestCase
{
    use DatabaseTransactions;



    public  function testCreateUserContact()
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
            Contact::create(
                [
                    'phone'     => '1234-56789',
                    'user_id'    =>$user->id,
                ]
            );
        }

        $contacts= $user->contacts->count();
        $this->assertEquals($cont, $contacts);
    }

}
