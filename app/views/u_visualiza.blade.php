@extends('templates.default')
@section('conteudo')

<br />
<div class="row">
    <div class="col-md-1"></div>
    <div class="col-md-10">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h2>{{ucwords($usuario->nome)}}</h2>
                <a href="{{URL::to('/usuarios')}}">{{Form::button(' Voltar', array('class'=>'btn btn-default glyphicon glyphicon-chevron-left', 'title'=>'Voltar'))}}</a>
                <a href="{{ URL::to('usuario/' . $usuario->id . '/editar') }}">{{Form::button(' Editar', array('class'=>'btn btn-default glyphicon glyphicon-pencil', 'title'=>'Editarr'))}}</a>
            </div>
            <table class="table table-bordered">
                <tbody>
                    <tr><td><strong>Status</strong></td><td> @if($usuario->ativo == 1) <span class="label label-success">Ativo @else <span class="label label-danger">Desativado @endif</span></td></tr>
                    <tr><td>COD</td><td>{{ $usuario->id }}</td></tr>
                    <tr><td>Usuário</td><td>{{ $usuario->usuario }}</td></tr>
                    <tr><td>Nome</td><td>{{ ucwords($usuario->nome) }}</td></tr>
                    <tr><td>Email</td><td>{{ $usuario->email }}</td></tr>
                    <tr><td>Telefone</td><td>{{ $usuario->telefone_cont }}</td></tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

@stop