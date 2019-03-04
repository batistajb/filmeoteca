@extends('layouts.template')

@section('content')
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('users')}}">Usuário</a></li>
                <li class="breadcrumb-item active" aria-current="page">Editar</li>
            </ol>
        </nav>
        @if (session('msg'))
            <div class="alert alert-info alert-dismissible fade show" role="alert">
                <strong>{{ session('msg') }} </strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif

        <div class="row">
            <div class="col-md-12">
                <h1>Edição</h1><hr/>
                <form action="{{route('user.update')}}" method="post">
                        @csrf
                        <div class="row">
                            <div class="col">
                                <label for="name">Nome</label>
                                <input class="form-control" required id="name" name="name" placeholder="Nome" type="text" value="{{$user->name}}">
                            </div>
                            <div class="col">
                                <label for="email">Email</label>
                                <input class="form-control" required id="email" name="email" placeholder="Email" type="email" value="{{$user->email}}">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <label for="cpf" class="cpfl">CPF</label>
                                <input class="form-control cpf" required id="cpf" name="cpf" placeholder="CPF" type="text" value="{{$user->cpf}}">
                            </div>
                            <div class="col">
                                <label for="rg">RG</label>
                                <input class="form-control" id="rg" name="rg" placeholder="RG" type="text" value="{{$user->rg}}">
                            </div>
                            <div class="col">
                                <label for="title">Titulação</label>
                                <input class="form-control" id="title" name="title" placeholder="Titulação" type="text" value="{{$user->title}}">
                            </div>
                        </div><br/>
                        <div class="row">
                            <div class="col">
                                <input type="hidden" name="id" value="{{$user->id}}">
                                <button class="btn btn-success submit" type="submit">Editar</button>
                            </div>
                        </div>
                </form><hr/>
            </div>
            <hr/>
            <h3>Endereços</h3>
            <div class="col-12">
                <div class="table-responsive">
                    <hr/>
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#address">
                        <i class="fas fa-plus-circle"></i>  Inserir novo</button>
                    <br/>
                    <table class="table table-striped table-sm">
                        <thead>
                        <tr>
                            <th>Rua</th>
                            <th>Número</th>
                            <th>Bairro</th>
                            <th>CEP</th>
                            <th>Cidade</th>
                            <th>UF</th>
                            <th class="text-center">Ação</th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse($user->addresses as $address)
                            <tr>
                                <td>{{$address->street}}</td>
                                <td>{{$address->number}}</td>
                                <td>{{$address->district}}</td>
                                <td>{{$address->cep}}</td>
                                <td>{{$address->city}}</td>
                                <td>{{$address->uf}}</td>
                                <td>
                                    <button type="button" class="btn btn-info" data-toggle="modal" data-target="#addressEdit"
                                            data-id="{{$address->id}}"
                                            data-street="{{$address->street}}"
                                            data-district="{{$address->district}}"
                                            data-number="{{$address->number}}"
                                            data-cep="{{$address->cep}}"
                                            data-uf="{{$address->uf}}"
                                            data-city="{{$address->city}}">
                                        <i class="fas fa-edit"></i> Editar</button>

                                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#addressDelete" data-id="{{$address->id}}">
                                        <i class="fas fa-trash"></i> Apagar</button>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7">
                                    <p>Não existe nenhum registro</p>
                                </td>
                            </tr>
                        @endforelse
                        </tbody>

                    </table>
                </div>
            </div><hr/>

            <h3>Telefones</h3>
            <div class="col-12"><hr/>
                <div class="table-responsive col-sm-5 ">
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#phone">
                        <i class="fas fa-plus-circle"></i>  Inserir novo
                    </button> <br/>
                    <table class="table table-striped table-sm">
                        <thead>
                            <tr>
                                <th>Número</th>
                                <th class="text-left">Ação</th>
                            </tr>
                        </thead>
                        <tbody>
                        @forelse($user->contacts as $contact)
                            <tr>
                                <td>{{$contact->phone}}</td>
                                <td class="row text-right">
                                    <button type="button" class="btn btn-info" data-toggle="modal" data-target="#phoneEdit" data-phone="{{$contact->phone}}" data-id="{{$contact->id}}">
                                        <i class="fas fa-edit"></i> Editar</button>
                                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#phoneDelete" data-id="{{$contact->id}}">
                                        <i class="fas fa-trash"></i> Apagar</button>
                                </td>
                            </tr>
                            @empty
                                <tr>
                                    <td colspan="2">
                                        <p>Não existe nenhum registro</p>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table><br/><br/>
                </div>
            </div>
        </div>


        <div class="modal fade" id="address" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Endereço</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="{{route('address.store')}}" method="post">
                            @csrf

                            <div class="form-group">
                                <label for="street">Rua</label>
                                <div class="row">
                                    <div class="col-md-9">
                                        <input class="form-control" required id="street" name="street" placeholder="Rua" type="text" value="">
                                    </div>
                                    <div class="col-lg-3">
                                        <input class="form-control" required id="number" name="number" placeholder="Numero" type="text" value="">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="district">Bairro</label>
                                <input class="form-control" required id="district" name="district" placeholder="Bairro" type="text" value="" >
                            </div>
                            <div class="form-group">
                                <label for="uf">Estado</label>
                                <select class="form-control" name="uf" id="uf" required>
                                    <option value="">Selecione</option>
                                    <option value="AC">AC</option>
                                    <option value="AL">AL</option>
                                    <option value="AM">AM</option>
                                    <option value="BA">BA</option>
                                    <option value="AP">AP</option>
                                    <option value="CE">CE</option>
                                    <option value="DF">DF</option>
                                    <option value="ES">ES</option>
                                    <option value="GO">GO</option>
                                    <option value="MA">MA</option>
                                    <option value="MG">MG</option>
                                    <option value="MS">MS</option>
                                    <option value="MT">MT</option>
                                    <option value="PA">PA</option>
                                    <option value="PB">PB</option>
                                    <option value="PE">PE</option>
                                    <option value="PI">PI</option>
                                    <option value="PR">PR</option>
                                    <option value="RJ">RJ</option>
                                    <option value="RN">RN</option>
                                    <option value="RS">RS</option>
                                    <option value="RO">RO</option>
                                    <option value="RR">RR</option>city
                                    <option value="SC">SC</option>
                                    <option value="SE">SE</option>
                                    <option value="SP">SP</option>
                                    <option value="TO">TO</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="city">Cidade</label>
                                <input class="form-control" required id="city" name="city" placeholder="Cidade" type="text" value="">
                            </div>
                            <div class="form-group">
                                <label for="cep">CEP</label>
                                <input class="form-control cep" required id="cep" name="cep" placeholder="CEP" type="text" value="">
                            </div>
                            <div class="modal-footer">
                                <input type="hidden" value="{{$user->id}}" name="user_id">
                                <button type="submit" class="btn btn-primary">Salvar</button>
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="phone" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Telefone</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="{{route('phone.store')}}" method="post">
                            @csrf
                            <div class="form-group">
                                <label for="phone">Celular</label>
                                <input class="form-control telefone" id="phone" name="phone" required placeholder="Telefone" type="text" value="">
                                <input id="user_id" name="user_id"type="hidden" value="{{$user->id}}">
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-primary">Salvar</button>
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="addressEdit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Endereço</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="{{route('address.update')}}" method="post">
                            @csrf

                            <div class="form-group">
                                <label for="street">Rua</label>
                                <div class="row">
                                    <div class="col-md-9">
                                        <input class="form-control" required id="street" name="street" placeholder="Rua" type="text" value="">
                                    </div>
                                    <div class="col-lg-3">
                                        <input class="form-control" required id="number" name="number" placeholder="Numero" type="text" value="">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="district">Bairro</label>
                                <input class="form-control" required id="district" name="district" placeholder="Bairro" type="text" value="" >
                            </div>
                            <div class="form-group">
                                <label for="uf">Estado</label>
                                <select class="form-control" name="uf" id="uf" required>
                                    <option value="">Selecione</option>
                                    <option value="AC">AC</option>
                                    <option value="AL">AL</option>
                                    <option value="AM">AM</option>
                                    <option value="BA">BA</option>
                                    <option value="AP">AP</option>
                                    <option value="CE">CE</option>
                                    <option value="DF">DF</option>
                                    <option value="ES">ES</option>
                                    <option value="GO">GO</option>
                                    <option value="MA">MA</option>
                                    <option value="MG">MG</option>
                                    <option value="MS">MS</option>
                                    <option value="MT">MT</option>
                                    <option value="PA">PA</option>
                                    <option value="PB">PB</option>
                                    <option value="PE">PE</option>
                                    <option value="PI">PI</option>
                                    <option value="PR">PR</option>
                                    <option value="RJ">RJ</option>
                                    <option value="RN">RN</option>
                                    <option value="RS">RS</option>
                                    <option value="RO">RO</option>
                                    <option value="RR">RR</option>
                                    <option value="SC">SC</option>
                                    <option value="SE">SE</option>
                                    <option value="SP">SP</option>
                                    <option value="TO">TO</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="city">Cidade</label>
                                <input class="form-control" required id="city" name="city" placeholder="Cidade" type="text" value="">
                            </div>
                            <div class="form-group">
                                <label for="cep">CEP</label>
                                <input class="form-control cep" required id="cep" name="cep" placeholder="CEP" type="text" value="">
                            </div>
                            <div class="modal-footer">
                                <input type="hidden" name="user_id" value="{{$user->id}}">
                                <input type="hidden" name="id" id="id" value="">
                                <button type="submit" class="btn btn-primary">Salvar</button>
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="addressDelete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog  alert-danger" role="document">
                <div class="modal-content  alert-danger">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Apagar registro!</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p> Realmente deseja excluir registro?</p>
                        <form action="{{route('address.delete')}}" method="post">
                            @csrf
                            <div class="form-group">
                                <input id="id" name="id"  type="hidden">
                                <button type="submit" class="btn btn-primary">Sim</button>
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>

        <div class="modal fade" id="phoneEdit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Telefone</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="{{route('phone.update')}}" method="get">
                            @csrf
                            <div class="form-group">
                                <label for="phone">Celular</label>
                                <input class="form-control telefone" id="phone" name="phone" placeholder="Telefone" type="text" value="">

                                <input id="phone_id" name="phone_id"  type="hidden">
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-primary">Salvar</button>
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>

        <div class="modal fade" id="phoneDelete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog  alert-danger" role="document">
                <div class="modal-content  alert-danger">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Apagar registro!</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p> Realmente deseja excluir registro?</p>
                        <form action="{{route('phone.delete')}}" method="post">
                            @csrf
                            <div class="form-group">
                                <input id="phone_id" name="phone_id"  type="hidden">
                                <button type="submit" class="btn btn-primary">Sim</button>
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>



@endsection

@section('scripts')
    <script>
        $('#phoneEdit').on('show.bs.modal', function (event) {
            let button = $(event.relatedTarget);
            let phone = button.data('phone');
            let id = button.data('id');
            let modal = $(this);

            modal.find('.modal-title').text('Editar Telefone'+id);
            modal.find('.modal-body input#phone').val(phone);
            modal.find('.modal-body input#phone_id').val(id);
        });

        $('#phoneDelete').on('show.bs.modal', function (event) {
            let button = $(event.relatedTarget);
            let id = button.data('id');
            let modal = $(this);

            modal.find('.modal-body input#phone_id').val(id);
        });

        $('#addressEdit').on('show.bs.modal', function (event) {
            let button = $(event.relatedTarget);
            let id = button.data('id');
            let street = button.data('street');
            let district = button.data('district');
            let number = button.data('number');
            let cep = button.data('cep');
            let uf = button.data('uf');
            let city = button.data('city');
            let modal = $(this);

            modal.find('.modal-title').text('Editar Endereço');
            modal.find('.modal-body input#id').val(id);
            modal.find('.modal-body input#street').val(street);
            modal.find('.modal-body input#district').val(district);
            modal.find('.modal-body input#number').val(number);
            modal.find('.modal-body input#cep').val(cep);
            modal.find('.modal-body select#uf').val(uf);
            modal.find('.modal-body input#city').val(city);
        });

        $('#addressDelete').on('show.bs.modal', function (event) {
            let button = $(event.relatedTarget);
            let id = button.data('id');
            let modal = $(this);

            modal.find('.modal-body input#id').val(id);
        })
    </script>

    <script type="javascript" src="{{asset('resources/js/mask/jquery.maskedinput.min.js')}}"></script>
    <script>
        $(function(){
            $(".cep").mask("99999-999");
            $(".cpf").mask("999.999.999-99");
            $('.telefone').mask('(99)9?9999-9999');
        })
    </script>
@endsection
