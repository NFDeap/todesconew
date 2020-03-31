@extends('layouts.app')

@section('content')

    <div class="container">
        <h5 class="center">Editar Opcional</h5>
        <div class="divider"></div>
        <br>
            <div class="row">
                <nav>
                    <div class="nav-wrapper path grey darken-4">
                        <div class="col s12">
                            <a href="{{ route('admin.principal') }}" class="breadcrumb">Início</a>
                            <a href="{{ route('admin.opcionais') }}" class="breadcrumb">Lista de Opcionais</a>                    
                            <a class="breadcrumb">Editar Opcional</a>                    
                        </div>
                    </div>
                </nav>
            </div>
            <div class="row">
                <form action="{{ route('admin.opcionais.atualizar',$registro->id) }}" method="post">
                    {{ csrf_field() }}  <!-- //Helper que cria token para dar segurança para o formulário -->
                    <input type="hidden" name="_method" value="put">
                    @include('admin.opcionais._form')

                    <button class="btn btn1">Atualizar <i class="material-icons right">cached</i> </button>
                </form>
            </div>
    </div>

@endsection
