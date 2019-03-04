@extends('layouts.template')

@section('content')
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active" aria-current="page">Usuários</li>
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
            <h2>Usuários</h2><hr/>
            <a class="btn btn-success" href="{{route('user.create')}}">
                <i class="fas fa-plus-circle"></i>  Inserir novo
            </a>
            <br/>
            <br/>
            <div class="table-responsive">
                <table class="table table-striped table-sm">
                    <thead>
                    <tr>
                        <th>Nome</th>
                        <th>Endereço de e-mail</th>
                        <th>Cadastrado desde</th>
                        <th>Ação</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($users as $user)
                        <tr>
                            <td><a href="{{url('usuarios/ver/'.$user->id)}}"> {{$user->name}}</a></td>
                            <td>{{$user->email}}</td>
                            <td>{{ date( 'd/m/Y' , strtotime($user->created_at))}}</td>
                            <td>
                                <a class="btn btn-primary" href="{{url('usuarios/ver/'.$user->id)}}">
                                    <i class="fas fa-eye"></i> Ver
                                </a>
                                <a class="btn btn-info" href="{{url('usuarios/editar/'.$user->id)}}">
                                    <i class="fas fa-edit"></i> Editar
                                </a>
                                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#delete"data-id="{{$user->id}}">
                                    <i class="fas fa-trash"></i> Apagar
                                </button>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            {{ $users->links() }}


    <div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                    <form action="{{route('user.delete')}}" method="post">
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

@endsection

@section('scripts')

    <script>

        $('#delete').on('show.bs.modal', function (event) {
            let button = $(event.relatedTarget);
            let id = button.data('id');
            let modal = $(this);

            modal.find('.modal-body input#id').val(id);
        });

    </script>
@endsection
