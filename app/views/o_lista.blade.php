@extends('templates.default')
@section('conteudo')

<br />
<div class="row">
    <div class="col-md-1"></div>
    <div class="col-md-10">
        <div class="panel panel-primary">
            <div class="panel-heading"><h2>LISTA DE ORDENS DE SERVIÇO</h2></div>
            <table class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <td>COD</td>
                        <td>Cliente</td>
                        <td>Funcionário</td>
                        <td>Data de abertura</td>
                        <td>Status</td>
                        <td></td>
                    </tr>
                </thead>
                <tbody>
                    @foreach($ordens as $key => $value)
                        <tr>
                            <td>{{ $value->id }}</td>
                            <td>{{ $value->nome_cli }}</td>
                            <td>{{ $value->nome_fun }}</td>
                            <td>{{date('d/m/Y - H:m:s', strtotime($value->created_at))}}</td>
                            <td>@if($value->aberta == 0) <span class="label label-success">Fechada @else <span class="label label-danger">Aberta @endif</span></td>
                            <td>@if($value->aberta == 0) <a class="btn btn-default glyphicon glyphicon-print" title="Ver cadastro" href="{{ URL::to('ordem/' . $value->id.'/imprimir') }}"></a> @else <a class="btn btn-default glyphicon glyphicon-pencil" title="Ver cadastro" href="{{ URL::to('ordem/' . $value->id.'/adicionar/itens') }}"> @endif</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        {{$ordens->links()}}
    </div>
</div>

@stop