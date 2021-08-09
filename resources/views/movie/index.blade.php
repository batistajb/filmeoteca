@extends('layouts.template')

@section('content')
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('movies')}}">Filmeoteca</a></li>
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

        @if (session('msg'))
            <div class="alert alert-info alert-dismissible fade show" role="alert">
                <h4>{{ session('msg') }} </h4>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif

        <h2>Filmes</h2><hr/>
        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#create">
            <i class="fas fa-plus-circle"></i>  Inserir novo
        </button>
        <br/>
        <br/>
        <div class="table-responsive">
            <table class="table table-striped table-sm">
                <thead>
                <tr>
                    <th>Título</th>
                    <th>Título</th>
                    <th>Ano de Lançamento</th>
                    <th>Diretor</th>
                    <th>Ação</th>
                </tr>
                </thead>
                <tbody>
                @forelse($movies as $movie)
                    <tr>
                        <td> <img src="<?=App::make('url')->to('storage/imageMovie/'.$movie->image);?>" alt="{{ $movie->title }}" style="width: 60px"/> </td>
                        <td>{{$movie->title}}</td>
                        <td>{{$movie->year}}</td>
                        <td>{{$movie->director}}</td>
                        <td>
                            <button type="button" class="btn btn-info" data-toggle="modal" data-target="#edit"
                                    data-id="{{$movie->id}}"
                                    data-title  = "{{$movie->title}}"
                                    data-director = "{{$movie->director}}"
                                    data-year = "{{$movie->year}}">
                                <i class="fas fa-edit"></i>Editar
                            </button>
                            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#delete"
                                    data-id="{{$movie->id}}">
                                <i class="fas fa-trash"></i> Apagar
                            </button>
                        </td>
                    </tr>
                    @empty
                        <tr>
                            <td colspan="4">
                                <p>Não existe nenhum registro</p>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        {{ $movies->links() }}

    <div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Cadastrar Filme</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{route('movie.update')}}" method="post">
                        @csrf

                        <div class="form-group">
                            <label for="title">Título</label>
                            <div class="row">
                                <div class="col-md-9">
                                    <input class="form-control" required id="title" name="title" placeholder="Título" type="text" value="">
                                </div>
                                <div class="col-lg-3">
                                    <input class="form-control" required id="year" name="year" placeholder="Ano" type="number" value="">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="director">Diretor</label>
                            <input class="form-control" required id="director" name="director" placeholder="Diretor" type="text" value="" >
                        </div>

                        <div class="modal-footer">
                            <input id="id" name="id"  type="hidden">
                            <button type="submit" class="btn btn-primary">Salvar</button>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="create" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Editar Filme</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{route('movie.store')}}" method="post" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group">
                            <label for="title">Título</label>
                            <div class="row">
                                <div class="col-md-9">
                                    <input class="form-control" required id="title" name="title" placeholder="Título" type="text" value="">
                                </div>
                                <div class="col-lg-3">
                                    <input class="form-control" required id="year" name="year" placeholder="Ano" type="number" value="">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="director">Diretor</label>
                            <input class="form-control" required id="director" name="director" placeholder="Diretor" type="text" value="" >
                        </div>
                        <div class="form-group">
                            <label for="director">Foto de Capa</label>
                            <input class="form-control" required id="image" name="image" placeholder="Diretor" type="file" value="" >
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
                    <form action="{{route('movie.delete')}}" method="post">
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

        $('#edit').on('show.bs.modal', function (event) {
            let button = $(event.relatedTarget);
            let title = button.data('title');
            let director = button.data('director');
            let year = button.data('year');
            let id = button.data('id');
            let image = button.data('image');
            let modal = $(this);

            modal.find('.modal-title').text('Editar Filme: '+title);
            modal.find('.modal-body input#title').val(title);
            modal.find('.modal-body input#director').val(director);
            modal.find('.modal-body input#year').val(year);
            modal.find('.modal-body input#id').val(id);
        });
        $('#delete').on('show.bs.modal', function (event) {
            let button = $(event.relatedTarget);
            let id = button.data('id');
            let modal = $(this);

            modal.find('.modal-body input#id').val(id);
        });
    </script>
@endsection
