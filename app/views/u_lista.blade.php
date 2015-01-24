@extends('templates.default')
@section('conteudo')

<br />
<div class="row">
    <div class="col-md-1"></div>
    <div class="col-md-10">
        <div class="panel panel-primary">
            <div class="panel-heading"><h2>LISTA DE USUÁRIOS</h2></div>
            <table class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <td>COD</td>
                        <td>Usuário</td>
                        <td>Nome</td>
                        <td>Status</td>
                        <td></td>
                    </tr>
                </thead>
                <tbody>
                    @foreach($usuarios as $key => $value)
                        <tr>
                            <td>{{ $value->id }}</td>
                            <td>{{ $value->usuario }}</td>
                            <td>{{ $value->nome }}</td>
                            <td>@if($value->ativo == 1) <span class="label label-success">Ativo @else <span class="label label-danger">Desativado @endif</span>@if($value->tipo == 1) <span class="label label-warning">Admin</span>@endif</td>
                            <td><a class="btn btn-default glyphicon glyphicon-eye-open" title="Ver cadastro" href="{{ URL::to('usuario/' . $value->id) }}"></a></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        {{$usuarios->links()}}
    </div>
</div>

@stop