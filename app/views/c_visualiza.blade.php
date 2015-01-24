@extends('templates.default')
@section('conteudo')

<br />
<div class="row">
    <div class="col-md-1"></div>
    <div class="col-md-10">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h2>{{ucwords($cliente->nome)}} </h2>
                <a href="{{ URL::to('/clientes') }}">{{Form::button(' Voltar', array('class'=>'btn btn-default glyphicon glyphicon-chevron-left', 'title'=>'Voltar'))}}</a>
                <a href="{{ URL::to('cliente/' . $cliente->id . '/editar') }}">{{Form::button(' Editar', array('class'=>'btn btn-default glyphicon glyphicon-pencil', 'title'=>'Editar'))}}</a>
            </div>
            <table class="table table-bordered">
                <tbody>
                    <tr><td><strong>Status</strong></td><td> @if($cliente->ativo == 1) <span class="label label-success">Ativo @else <span class="label label-danger">Desativado @endif</span></td></tr>
                    <tr><td>COD</td><td>{{ $cliente->id }}</td></tr>
                    <tr><td>Nome</td><td>{{ ucwords($cliente->nome) }}</td></tr>
                    <tr><td>CPF</td><td>{{ $cliente->cpf }}</td></tr>
                    <tr><td>RG</td><td>{{ $cliente->rg }}</td></tr>
                    <tr><td>Data de Nascimento</td><td>{{ date('d/m/Y', strtotime($cliente->data_nasc)) }}</td></tr>
                    <tr><td>Sexo</td><td>@if($cliente->sexo == 'm')Masculino @else Feminino @endif</td></tr>
                    <tr><td>CEP</td><td>{{ $cliente->cep }}</td></tr>
                    <tr><td>Endereço</td><td>{{ $cliente->endereco }}</td></tr>
                    <tr><td>Complemento</td><td>{{ $cliente->complemento }}</td></tr>
                    <tr><td>Bairro</td><td>{{ $cliente->bairro }}</td></tr>
                    <tr><td>Cidade</td><td>{{ $cliente->cidade }}</td></tr>
                    <tr><td>Estado</td><td>{{ $cliente->estado }}</td></tr>
                    <tr><td>Pais</td><td>{{ $cliente->pais }}</td></tr>
                    <tr><td>Email</td><td>{{ $cliente->email }}</td></tr>
                    <tr><td>Telefone Celular</td><td>{{ $cliente->celular }}</td></tr>
                    <tr><td>Telefone Residencial</td><td>{{ $cliente->telefone_res }}</td></tr>
                    <tr><td>Telefone Comercial</td><td>{{ $cliente->telefone_com }}</td></tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

@stop