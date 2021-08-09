@extends('layouts.template')

@section('header')

@endsection

@section('content')
            <div class="card">
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
                            <h1 class="h2">Dashboard</h1>
                        </div>
                        <div class="row">

                        </div><hr/>
                        <h2>Filmes Mais Favoritos</h2>
                        <div id="app">
                            @if(!empty($chart))
                                {!! $chart->container() !!}
                            @else
                                <h6>Nenhum dados cadastrado.</h6>
                            @endif
                        </div>
                </div>
            </div>
@endsection

@section('scripts')

    @if(!empty($chart))
        {!! $chart->script() !!}
    @endif


@endsection
