@extends('layouts.template')

@section('content')
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('users')}}">Usuário </a></li>
                <li class="breadcrumb-item active" aria-current="page">Visualizar</li>
            </ol>
        </nav>
        <div class="row">
            <div class="col-md-12">
                <h2>Informações: <a href="{{url('usuarios/editar/'.$user->id)}}" style="font-size: 30px">{{$user->name}}</a></h2>

                <h3 style="color: yellowgreen">Filmes Favoritos <i class="fas fa-star"></i> </h3>
                <div class="col-12">
                    <div class="table-responsive">
                        <table class="table table-striped table-sm">
                            <thead>
                            <tr>
                                <th>Título</th>
                                <th>Ano de Lançamento</th>
                                <th>Diretor</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse($user->favorites as $favorite)
                                <tr>
                                    <td>{{$favorite->title}}</td>
                                    <td>{{$favorite->year}}</td>
                                    <td>{{$favorite->director}}</td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="3">
                                        <p> Nenhum filme escolhido</p>
                                    </td>
                                </tr>
                            @endforelse
                            </tbody>

                        </table>
                    </div>
                </div><hr/>

                <h3 style="color: yellowgreen">Perfil <i class="fas fa-user"></i></h3>
                <div class="row">
                    <div class="col-9">
                        <div class="table-responsive col-sm-12 ">
                            <table class="table table-striped table-sm">
                                <thead>
                                <tr>
                                    <th>Email</th>
                                    <th>CPF</th>
                                    <th>RG</th>
                                    <th>Titulação</th>
                                    <th>Perfil</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td>{{$user->email}}</td>
                                    <td>{{$user->cpf}}</td>
                                    <td>{{$user->rg}}</td>
                                    <td>{{$user->title}}</td>
                                    <td>{{$user->rule}}</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="table-responsive col-sm-12">
                            <table class="table table-striped table-sm">
                                <thead>
                                <tr>
                                    <th>Telefones</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($user->contacts as $contact)
                                    <tr>
                                        <td>{{$contact->phone}}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div><hr/>
            </div>
        </div>

        <h3 style="color: yellowgreen">Endereços <i class="fas fa-home"></i></h3>
        <div class="col-12">
            <div class="table-responsive">
                <table class="table table-striped table-sm">
                    <thead>
                    <tr>
                        <th>Rua</th>
                        <th>Número</th>
                        <th>Bairro</th>
                        <th>CEP</th>
                        <th>Cidade</th>
                        <th>UF</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($user->addresses as $address)
                        <tr>
                            <td>{{$address->street}}</td>
                            <td>{{$address->number}}</td>
                            <td>{{$address->district}}</td>
                            <td>{{$address->cep}}</td>
                            <td>{{$address->city}}</td>
                            <td>{{$address->uf}}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div><hr/>

@endsection
