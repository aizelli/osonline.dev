@extends('templates.default')
@section('conteudo')

<br />
<div class="row">
    <div class="col-md-1"></div>
    <div class="col-md-10">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h2>{{ucwords($p->nome)}} {{ucwords($p->marca)}} </h2>
                <a href="{{ URL::to('/produtos') }}">{{Form::button(' Voltar', array('class'=>'btn btn-default glyphicon glyphicon-chevron-left', 'title'=>'Voltar'))}}</a>
                <a href="{{ URL::to('produto/' . $p->id . '/editar') }}">{{Form::button(' Editar', array('class'=>'btn btn-default glyphicon glyphicon-pencil', 'title'=>'Editar'))}}</a>
            </div>
            <table class="table table-bordered">
                <tbody>
                    @foreach($produto as $key => $value)
                    <tr><td>COD</td><td>{{ $value->id }}</td></tr>
                    <tr><td>Nome</td><td>{{ ucwords($value->nome) }}</td></tr>
                    <tr><td>Observação</td><td>{{ $value->descricao }}</td></tr>
                    <tr><td>Marca</td><td>{{ $value->marca }}</td></tr>
                    <tr><td>Modelo</td><td>{{ $value->modelo }}</td></tr>
                    <tr><td>Fornecedor</td><td>{{ $value->nome_emp }}</td></tr>
                    <tr><td>Quantidade</td><td>{{ $value->quantidade }}</td></tr>
                    <tr><td>Valor Unitário</td><td>{{ $value->valor_uni }}</td></tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@stop