@extends('templates.default')
@section('conteudo')

<br />
<div class="row">
    <div class="col-md-1"></div>
    <div class="col-md-10">
        <div class="panel panel-primary">
            <div class="panel-heading"><h2>LISTA DE FUNCIONÁRIOS</h2></div>
            <table class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <td>COD</td>
                        <td>Nome</td>
                        <td>CPF</td>
                        <td>Cargo</td>
                        <td>Status</td>
                        <td></td>
                    </tr>
                </thead>
                <tbody>
                    @foreach($funcionarios as $key => $value)
                        <tr>
                            <td>{{ $value->id }}</td>
                            <td>{{ $value->nome }}</td>
                            <td>{{ $value->cpf }}</td>
                            <td>{{ $value->cargo }}</td>
                            <td>@if($value->ativo == 1) <span class="label label-success">Ativo @else <span class="label label-danger">Desativado @endif</span></td>
                            <td><a class="btn btn-default glyphicon glyphicon-eye-open" title="Ver cadastro" href="{{ URL::to('funcionario/' . $value->id) }}"></a></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        {{$funcionarios->links()}}
    </div>
</div>

@stop
