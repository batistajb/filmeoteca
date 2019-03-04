@extends('layouts.template')

@section('header')
    <meta name="csrf-token" content="{{ csrf_token() }}">
@endsection

@section('content')
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
            <h1 class="h2">Home</h1><hr/>

                <div class="col-lg-12">
                    <div class="row">
                        <div id="carouselExampleIndicators" class="carousel slide my-4" data-ride="carousel">
                    <ol class="carousel-indicators">
                        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                    </ol>
                            @if(!empty($moviesFavorites))
                                <div class="carousel-inner" role="listbox">
                                    <div class="carousel-item active">
                                        <img class="d-block img-fluid" src="<?=App::make('url')->to('storage/app/public/imageMovie/'. $moviesFavorites['image'][0]);?>" alt="{{$moviesFavorites['title'][0]}}" style="width: 900px;height: 500px">
                                        <div class="carousel-caption d-none d-md-block">
                                            <h4>{{$moviesFavorites['title'][0]}}</h4>
                                            <h6>Diretor: {{$moviesFavorites['director'][0]}}</h6>
                                            <p>Ano de Lanaçamento: {{$moviesFavorites['year'][0]}}</p>
                                        </div>
                                    </div>
                                    @if(!empty($moviesFavorites['image'][1]))
                                        <div class="carousel-item">
                                            <img class="d-block img-fluid" src="<?=App::make('url')->to('storage/app/public/imageMovie/'. $moviesFavorites['image'][1]);?>" alt="{{$moviesFavorites['title'][1]}}" style="width: 900px;height: 500px">
                                            <div class="carousel-caption d-none d-md-block">
                                                <h4>{{$moviesFavorites['title'][1]}}</h4>
                                                <h6>{{$moviesFavorites['director'][1]}}</h6>
                                                <p>{{$moviesFavorites['year'][1]}}</p>
                                            </div>
                                        </div>
                                    @endif
                                    @if(!empty($moviesFavorites['image'][2]))
                                        <div class="carousel-item">
                                            <img class="d-block img-fluid" src="<?=App::make('url')->to('storage/app/public/imageMovie/'. $moviesFavorites['image'][2]);?>" alt="{{$moviesFavorites['title'][2]}}" style="width: 900px;height: 500px">
                                            <div class="carousel-caption d-none d-md-block">
                                                <h4>{{$moviesFavorites['title'][2]}}</h4>
                                                <h6>Diretor: {{$moviesFavorites['director'][2]}}</h6>
                                                <p>Ano de Lanaçamento: {{$moviesFavorites['year'][2]}}</p>
                                            </div>
                                        </div>
                                    @endif
                                </div>
                            @else
                                <h6> Nenhum dado cadastrado</h6>
                            @endif
                            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
                    </div>

                <div class="row">
                    @foreach($movies as $movie)
                        <div class="col-lg-4 col-md-6 mb-4">
                            <div class="card h-30">
                                <a><img class="card-img-top" src="<?=App::make('url')->to('storage/app/public/imageMovie/'. $movie->image);?>" alt="" style="width: 275px; height: 150px"></a>
                                <div class="card-body">
                                    <h4 class="card-title">
                                        <a style="color: #4aa0e6">{{$movie->title}}</a>
                                    </h4>
                                    <h5>Lançamento: {{$movie->year}}</h5>

                                        <a class="card-text">Diretor: <i>{{$movie->director}}</i></a>

                                </div>
                                <div class="card-footer">
                                    <div class="row">
                                        @foreach($movie->favorites as $favorite)
                                            @if($favorite->id == Auth::id())
                                                <form id="unlike-form" action="{{ route('unlike') }}" method="POST" style="margin-right: 5px">
                                                    @csrf
                                                    <input type="hidden" name="movie_id" id="movie_id" value="{{$movie->id}}">
                                                    <input type="hidden" name="user_id" id="user_id" value="{{$favorite->id}}">
                                                    <button type="submit" class="btn btn-warning">
                                                        Descurtir <i class="fas fa-heart-broken"></i>
                                                    </button>
                                                </form>
                                            @endif
                                        @endforeach
                                        @empty(!$movie->favorites)
                                            <form id="like-form" action="{{ route('like') }}" method="POST" style="margin-left: 5px">
                                                @csrf
                                                <input type="hidden" name="movie_id" id="movie_id" value="{{$movie->id}}">
                                                <input type="hidden" name="user_id" id="user_id" value="{{Auth::id()}}">
                                                <button type="submit" class="btn btn-info">
                                                    Curtir <i class="fas fa-heart"></i>
                                                </button>
                                            </form>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="row">
                    {{$movies->links()}}
                </div>
                <!-- /.row -->

            </div>


        </div>
    </div>


@endsection

@section('scripts')


@endsection
