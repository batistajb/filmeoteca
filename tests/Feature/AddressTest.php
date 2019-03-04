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



    public  function testCreateUserAddress($id)
    {
       $userAddress = Address::create(
           [
               'street'     =>'Admin User Rua',
               'district'   =>'Admin User Bairro',
               'number'     =>'000',
               'uf'         =>'XX',
               'cep'        =>'00.000-000',
               'city'       =>'Admin User Cidade',
               'user_id'    =>$id
           ]
       );
       $addreeses = Address::where('user_id',$id)->count();
        $this->$addreeses;
    }

}
