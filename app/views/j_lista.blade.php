@extends('templates.default')
@section('conteudo')

<br />
<div class="row">
    <div class="col-md-1"></div>
    <div class="col-md-10">
        <div class="panel panel-primary">
            <div class="panel-heading"><h2>LISTA DE SERVICOS</h2></div>
            <table class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <td>COD</td>
                        <td>Título</td>
                        <td>Descrição</td>
                        <td>Valor Unitário</td>
                        <td>Status</td>
                        <td></td>
                    </tr>
                </thead>
                <tbody>
                    @foreach($servicos as $key => $value)
                        <tr>
                            <td>{{ $value->id }}</td>
                            <td>{{ $value->titulo }}</td>
                            <td>{{ $value->descricao }}</td>
                            <td>R$ {{ $value->valor_uni }}</td>
                            <td>@if($value->ativo == 1) <span class="label label-success">Ativo @else <span class="label label-danger">Desativado @endif</span></td>
                            <td><a class="btn btn-default glyphicon glyphicon-eye-open" title="Ver cadastro" href="{{ URL::to('servico/' . $value->id) }}"></a></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        {{$servicos->links()}}
    </div>
</div>

@stop
