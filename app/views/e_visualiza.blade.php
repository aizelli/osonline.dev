@extends('templates.default')
@section('conteudo')

<br />
<div class="row">
    <div class="col-md-1"></div>
    <div class="col-md-10">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h2>{{ucwords($funcionario->nome)}}</h2>
                <a href="{{URL::to('/funcionarios')}}">{{Form::button(' Voltar', array('type'=>'submit', 'class'=>'btn btn-default glyphicon glyphicon-chevron-left', 'title'=>'Valtar'))}}</a>
                <a href="{{ URL::to('funcionario/' . $funcionario->id . '/editar') }}">{{Form::button(' Editar', array('type'=>'submit', 'class'=>'btn btn-default glyphicon glyphicon-pencil', 'title'=>'Editar'))}}</a>
            </div>
            <table class="table table-bordered">
                <tbody>
                    <tr><td><strong>Status</strong></td><td> @if($funcionario->ativo == 1) <span class="label label-success">Ativo @else <span class="label label-danger">Desativado @endif</span></td></tr>
                    <tr><td>COD</td><td>{{ $funcionario->id }}</td></tr>
                    <tr><td>Nome</td><td>{{ ucwords($funcionario->nome) }}</td></tr>
                    <tr><td>CPF</td><td>{{ $funcionario->cpf }}</td></tr>
                    <tr><td>Cargo</td><td>{{ $funcionario->cargo }}</td></tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

@stop