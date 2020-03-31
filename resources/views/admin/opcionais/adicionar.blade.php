@extends('layouts.app')

@section('content')

    <div class="container">
        <h5 class="center">Adicionar Opcional</h5>
        <div class="divider"></div>
        <br>
            <div class="row">
                <nav>
                    <div class="nav-wrapper path grey darken-4">
                        <div class="col s12">
                            <a href="{{ route('admin.principal') }}" class="breadcrumb">Início</a>
                            <a href="{{ route('admin.opcionais') }}" class="breadcrumb">Lista de Opcionais</a>                    
                            <a class="breadcrumb">Adicionar Modelo</a>                    
                        </div>
                    </div>
                </nav>
            </div>
            <div class="row">
                <form action="{{ route('admin.opcionais.salvar') }}" method="post">
                    {{ csrf_field() }}  <!-- //Helper que cria token para dar segurança para o formulário -->
                    @include('admin.opcionais._form')

                    <button class="btn btn1">Adicionar <i class="material-icons right">add</i> </button>
                </form>
            </div>
    </div>

@endsection
