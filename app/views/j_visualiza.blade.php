@extends('templates.default')
@section('conteudo')

<br />
<div class="row">
    <div class="col-md-1"></div>
    <div class="col-md-10">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h2>{{ucwords($servico->titulo)}} </h2>
                <a href="{{URL::to('/servicos')}}">{{Form::button(' Voltar', array('class'=>'btn btn-default glyphicon glyphicon-chevron-left', 'title'=>'Voltar'))}}</a>
                <a href="{{ URL::to('servico/' . $servico->id . '/editar') }}">{{Form::button(' Editar', array('class'=>'btn btn-default glyphicon glyphicon-pencil', 'title'=>'Editar'))}}</a>
            </div>
            <table class="table table-bordered">
                <tbody>
                    <tr><td><strong>Status</strong></td><td> @if($servico->ativo == 1) <span class="label label-success">Ativo @else <span class="label label-danger">Desativado @endif</span></td></tr>
                    <tr><td>COD</td><td>{{ $servico->id }}</td></tr>
                    <tr><td>Título</td><td>{{ ucwords($servico->titulo) }}</td></tr>
                    <tr><td>Descrição</td><td>{{ $servico->descricao }}</td></tr>
                    <tr><td>Valor Unitário</td><td>{{ $servico->valor_uni }}</td></tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

@stop