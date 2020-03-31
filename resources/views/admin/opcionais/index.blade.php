@extends('layouts.app')

@section('content')
<div class="container">
    <h5 class="center">Lista de Opcionais</h5>
    <div class="divider"></div>
    <br>

        <div class="row">
            <nav>
                <div class="nav-wrapper path grey darken-4">
                    <div class="col s12">
                        <a href="{{ route('admin.principal') }}" class="breadcrumb">Início</a>
                        <a class="breadcrumb">Lista de Opcionais</a>                    
                    </div>
                </div>
            </nav>
        </div>

        <div class="row">      
        
            <a class="btn btn1" href="{{ route('admin.opcionais.adicionar') }}">Adicionar <i class="material-icons right">add</i> </a>        
        
        </div>

        <div class="row">
            <table>
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Titulo</th>                        
                        <th>Ação</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($registros as $registro)
                    <tr>
                        <td>{{ $registro->id }}</td>
                        <td>{{ $registro->tituloOpcional }}</td>                        
                        <td>                                                   
                            <a class="btn btn1" href="{{ route('admin.opcionais.editar',$registro->id) }}">Editar <i class="material-icons right">edit</i></a>                                                
                            <a class="btn btn1" href="javascript: if(confirm('Deletar esse Registro?')){window.location.href = '{{ route('admin.opcionais.deletar',$registro->id) }}'}">Deletar <i class="material-icons right">remove</i></a>
                        </td>
                    </tr>
                @endforeach    
                </tbody>
            </table>          
        </div>

</div>
@endsection