@extends('templates.default')
@section('conteudo')

<br />
<div class="row">
    <div class="col-md-1"></div>
    <div class="col-md-10">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h2>{{ucwords($fornecedor->nome_emp)}} </h2>
                <a href="{{URL::to('/fornecedores')}}">{{Form::button(' Voltar', array('class'=>'btn btn-default glyphicon glyphicon-chevron-left', 'title'=>'Voltar'))}}</a>
                <a href="{{ URL::to('fornecedor/' . $fornecedor->id . '/editar') }}">{{Form::button(' Editar', array('class'=>'btn btn-default glyphicon glyphicon-pencil', 'title'=>'Editar'))}}</a>
            </div>
            <table class="table table-bordered">
                <tbody>
                    <tr><td><strong>Status</strong></td><td> @if($fornecedor->ativo == 1) <span class="label label-success">Ativo @else <span class="label label-danger">Desativado @endif</span></td></tr>
                    <tr><td>COD</td><td>{{ $fornecedor->id }}</td></tr>
                    <tr><td>Nome</td><td>{{ ucwords($fornecedor->nome_emp) }}</td></tr>
                    <tr><td>Razão Social</td><td>{{ $fornecedor->razao_social }}</td></tr>
                    <tr><td>CNPJ</td><td>{{ $fornecedor->cnpj }}</td></tr>
                    <tr><td>Inscrição Estadual</td><td>{{ $fornecedor->ie }}</td></tr>
                    <tr><td>CEP</td><td>{{ $fornecedor->cep }}</td></tr>
                    <tr><td>Endereço</td><td>{{ $fornecedor->endereco }}</td></tr>
                    <tr><td>Complemento</td><td>{{ $fornecedor->complemento }}</td></tr>
                    <tr><td>Bairro</td><td>{{ $fornecedor->bairro }}</td></tr>
                    <tr><td>Cidade</td><td>{{ $fornecedor->cidade }}</td></tr>
                    <tr><td>Estado</td><td>{{ $fornecedor->estado }}</td></tr>
                    <tr><td>Pais</td><td>{{ $fornecedor->pais }}</td></tr>
                    <tr><td>Email</td><td>{{ $fornecedor->email }}</td></tr>
                    <tr><td>Nome do Responsável</td><td>{{ $fornecedor->nome_res }}</td></tr>
                    <tr><td>Telefone Celular</td><td>{{ $fornecedor->celular }}</td></tr>
                    <tr><td>Telefone de Contato 1</td><td>{{ $fornecedor->telefone1 }}</td></tr>
                    <tr><td>Telefone de Contato 2</td><td>{{ $fornecedor->telefone2 }}</td></tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

@stop
