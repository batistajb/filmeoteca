<?php

namespace App\Http\Controllers\Admin;

use App\Models\Address;
use App\Models\Contact;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function index(){
        $users = User::paginate(5);
        return view('user.index', compact('users'));
    }

    public function create()
    {
        return view('user.create');

    }


    public function store(Request $reques){

        $request = $reques;
        $err = false;
        if(User::where('cpf',$request['cpf'])->count() >= 1){
            $erro = "Já existe uma outra pessoa com esse CPF";
            $err = true;
        }elseif(User::where('rg',$request['rg'])->count() >= 1){
            $erro = "Já existe uma outra pessoa com esse RG";
            $err = true;
        }elseif(User::where('email',$request['email'])->count() >= 1){
            $erro = "Já existe uma outra pessoa com esse E-MAIL";
            $err = true;
        }
        if(!$err){
            $user = new User();
            $user['name'] = $request['name'];
            $user['email'] = $request['email'];
            $user['rg'] = $request['rg'];
            $user['cpf'] = $request['cpf'];
            $user['password'] = ($request['password'] != '' ? bcrypt($request['password']) : bcrypt('123456'));
            $user['rule'] =  'user';
            $user['title'] = $request['title'];
            $user->save();
            $user_id = $user['id'];


            $userAddress = new Address();

            $userAddress['street'] = $request['street'];
            $userAddress['district'] = $request['district'];
            $userAddress['city'] = $request['city'];
            $userAddress['uf'] = $request['uf'];
            $userAddress['cep'] = $request['cep'];
            $userAddress['number'] = $request['number'];
            $userAddress['user_id'] = $user_id;
            $userAddress->save();

            $userContact= new Contact();
            $userContact['phone'] = $request['phone'];
            $userContact['user_id'] = $user_id;
            $userContact->save();


        }
        if($err){
            return view('user.create')->with('erro',$erro);
        }else{

            return redirect()->route('users')->with('msg','Inserido com sucesso!');
        }
    }


    public function edit($id)
    {
       $user = User::find($id);

       return view('user.edit', compact('user'));
    }

    public function update(Request $request)
    {
        $msg = false;
        $erro = false;
        $err = false;


        if(User::where('cpf',$request['cpf'])->count() >= 1)
        {
            $users = User::where('cpf',$request['cpf'])->get();

            foreach ($users as $user)
            {

                if($user->id != $request->id)
                {
                    echo $user->id;
                    echo  $request->id;
                    $request->session()->flash('msg', 'Já existe uma outra pessoa com esse CPF');
                    $err = true;
                }
            }

        }

        if(User::where('rg',$request['rg'])->count() >= 1)
        {
            $users = User::where('rg',$request['rg'])->get();
            foreach ($users as $user)
            {
                if($user->id != $request->id)
                {
                    $request->session()->flash('msg', 'Já existe uma outra pessoa com esse RG');
                    $err = true;
                }
            }

        }
        if(User::where('email',$request['email'])->count() >= 1)
        {
            $users = User::where('email',$request['email'])->get();
            foreach ($users as $user)
            {
                if($user->id != $request->id)
                {
                    $request->session()->flash('msg', 'Já existe uma outra pessoa com esse E-MAIL');
                    $err = true;
                }
            }
        }

        if(!$err)
        {
            $user = User::find($request->id);
            $user->name = $request->name;
            $user->email = $request->email;
            $user->cpf = $request->cpf;
            $user->rg = $request->rg;
            $user->title = $request->title;
            $user['rule'] =  $request->rule ? 'null' : "user";

            $err = $user->save();
            $request->session()->flash('msg', 'Usuário Atualizado com Sucesso');
        }


        $user = User::find($request->id);

        return back()->with('user',$user);
    }


    public function show($id)
    {
        $user = User::find($id);
        return view('user.show', compact('user'));
    }


    public function delete(Request $request)
    {
        $status = false;

        $user = User::find($request->id);
        $session = $user->delete();


        if($status == true)
            $request->session()->flash('msg', 'Falha ao Apagar');
        else
            $request->session()->flash('msg', 'Apagado com Sucesso');

        $user = User::paginate(5);

        return back()->with('user',$user);
    }

    public function updatePhone(Request $request)
    {
        $status = false;
        $erro = false;

        $phone = $request->phone;
        $phone_id = $request->phone_id;
        $user_id = $request->user_id;

       $contact = Contact::find($phone_id);
       $contact->phone=$phone;
       $status = $contact->save();

       if($status == true)
           $request->session()->flash('msg', 'Atualizado com Sucesso');
       else
           $request->session()->flash('msg', 'Falha ao atualizar');

       $user = $contact->user;

        return back()->with('user',$user);
    }

    public function deletePhone(Request $request)
    {
        $status = false;
        $erro = false;

        $contact = Contact::find($request->phone_id);

        $user = $contact->user;

        $status = DB::table('contacts')->where('id','=',$request->phone_id)->delete();

        if($status == true)
            $request->session()->flash('msg', 'Apagado com Sucesso');
        else
            $request->session()->flash('msg', 'Falha ao Apagar');

        return back()->with('user',$user);
    }

    public function storePhone(Request $request)
    {
        $status = false;
        $erro = false;

        $contact = new Contact();
        $contact->user_id =  $request->user_id;
        $contact->phone=  $request->phone;
        $status = $contact->save();
        $user = $contact->user;

        if($status == true)
            $request->session()->flash('msg', 'Inserido com Sucesso');
        else
            $request->session()->flash('msg', 'Falha ao Inserir');
        return back()->with('user',$user);
    }

    public function updateAddress(Request $request)
    {
        $status = false;
        $erro = false;


       $address = Address::find($request->id);
       $address->street   =  $request->street;
       $address->number   =  $request->number;
       $address->district   =  $request->district;
       $address->uf   =  $request->uf;
       $address->city   =  $request->city;
       $address->cep   =  $request->cep;
       $status = $address->save();

        $user = $address->user;

       if($status == true)
           $request->session()->flash('msg', "Endereço Atualizado com Sucesso");
       else
        $request->session()->flash('msg', 'Falha ao Inserir');

        return back()->with('user',$user);
    }

    public function deleteAddress(Request $request)
    {
        $status = false;
        $erro = false;

        $address = Address::find($request->id);

        $user = $address->user;

        $status = DB::table('addresses')->where('id','=',$request->id)->delete();

        if($status == true)
            $request->session()->flash('msg', "Endereço Apagado com Sucesso");
        else
            $request->session()->flash('msg', 'Falha ao Apagar');

        return back()->with('user',$user);
    }

    public function storeAddress(Request $request)
    {

        $status = false;
        $erro = false;

        $address = new Address();
        $address->user_id =  $request->user_id;
        $address->street=  $request->street;
        $address->district=  $request->district;
        $address->uf=  $request->uf;
        $address->city=  $request->city;
        $address->cep=  $request->cep;
        $address->number=  $request->number;

        $status = $address->save();
        $user = $address->user;

        if($status == true)
            $request->session()->flash('msg', "Endereço Inserido com Sucesso");
        else
            $request->session()->flash('msg', "Falha ao Inserir");

        return back()->with('user',$user);
    }

}
