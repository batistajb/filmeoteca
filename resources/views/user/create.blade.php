@extends('layouts.template')

@section('content')
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('users')}}">Usuários</a></li>
                <li class="breadcrumb-item active" aria-current="page">Inserir</li>
            </ol>
        </nav>
        @if (!empty($erro))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Falha ao inserir!</strong>{{ $erro }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif

        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <h1>Cadastro</h1>
                        <div class="login_wrapper">
                            <div class="animate form login_form">
                                <section class="login_content col-md-9">
                                    <form action="{{route('user.store')}}" method="post">
                                        @csrf

                                        <div class="form-group">
                                            <label for="name">Nome</label>
                                            <input class="form-control" required id="name" name="name" placeholder="Nome" type="text" value="">
                                        </div>
                                        <div class="form-group">
                                            <label for="email">Email</label>
                                            <input class="form-control" required id="email" name="email" placeholder="Email" type="email" value="">
                                        </div>

                                        <div class="form-group">
                                            <label for="password">Senha</label>
                                            <input class="form-control" required id="password" name="password" placeholder="Senha" type="password" >
                                        </div>
                                        <div class="form-group">
                                            <label for="cpf" class="cpfl">CPF</label>
                                            <input class="form-control cpf" required id="cpf" name="cpf" placeholder="CPF" type="text" value="">
                                        </div>
                                        <div class="form-group">
                                            <label for="rg">RG</label>
                                            <input class="form-control" id="rg" name="rg" placeholder="RG" type="text" value="">
                                        </div>
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
                                        <div class="form-group">
                                            <label for="phone">Celular</label>
                                            <input class="form-control telefone" id="phone" name="phone" placeholder="Telefone" type="text" value="">
                                        </div>
                                        <div class="form-group">
                                            <label for="title">Titulação</label>
                                            <input class="form-control" id="title" name="title" placeholder="Titulação" type="text" value="">
                                        </div>
                                        <div>
                                            <button class="btn btn-primary submit" type="submit">Cadastrar</button>
                                        </div>
                                    </form>
                                </section>
                            </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('scripts')
    <script type="javascript" src="{{asset('resources/js/mask/jquery.maskedinput.min.js')}}"></script>
    <script>
        $(function(){
            $(".cep").mask("99999-999");
            $(".cpf").mask("999.999.999-99");
            $('.telefone').mask('(99)9?9999-9999');
        })
    </script>
@endsection
