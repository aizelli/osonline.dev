@extends('templates.default')
@section('conteudo')

<br />
<div class="row">
    <div class="col-md-1"></div>
    <div class="col-md-10">
        <div class="panel panel-primary">
            <div class="panel-heading"><h2>LISTA DE PRODUTOS</h2></div>
            <table class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <td>COD</td>
                        <td>Nome</td>
                        <td>Marca</td>
                        <td>Fornecedor</td>
                        <td>Observação</td>
                        <td>Quantidade</td>
                        <td></td>
                    </tr>
                </thead>
                <tbody>
                    @foreach($produtos as $key => $value)
                    @if($value->quantidade <= 5 )<tr class="danger"> @else<tr> @endif
                            <td>{{ $value->id }}</td>
                            <td>{{ $value->nome }}</td>
                            <td>{{ $value->marca }}</td>
                            <td>{{ $value->nome_emp }}</td>
                            <td>{{ $value->descricao }}</td>
                            <td>{{ $value->quantidade }}</td>
                            <td><a class="btn btn-default glyphicon glyphicon-eye-open" title="Ver cadastro" href="{{ URL::to('produto/' . $value->id) }}"></a></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        {{$produtos->links()}}
    </div>
</div>

@stop