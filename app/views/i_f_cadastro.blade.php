@extends('/templates/default')
@section('conteudo')
<div class="row">
    <div class="col-md-1"></div>
    <div class="col-md-8">
        <h1>ORDEM DE SERVIÇO</h1>
        
        {{Form::open(array('method'=>'post', 'url'=>'/ordem/'.$cod.'/fechar'))}}
            {{Form::button(' Fechar O.S.', array('type'=>'submit', 'class'=>'btn btn-default glyphicon glyphicon-ok', 'title'=>'Fechar O.S.'))}} 
            <a href="{{URL::to('/')}}"> {{Form::button(' Cancelar', array('class'=>'btn btn-default glyphicon glyphicon-ban-circle', 'title'=>'Cancelar')) }}</a>
            <br /><br />
            @if ( count($errors) > 0)
                <div class="alert alert-danger" role="alert">
                    <strong>Erros encontrados:</strong>
                    <ul>
                        @foreach ($errors->all() as $e)
                            <li>{{ $e }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <div class="input-group">
                <span class="input-group-addon">Ordem nº</span>
                {{Form::text('cod',$cod,array('class'=>'form-control', 'disabled'=>'true'))}}
            </div>
            <br />

            <div class="input-group">
                <span class="input-group-addon">Cliente</span>
                <select class="form-control" name="clientes" disabled="true">
                    @foreach($clientes as $key => $value)
                        <option value="{{$key}}" >{{$key.' - '.$value}}</option>
                    @endforeach
                </select>
            </div>
            <br />
            <div class="input-group">
                <span class="input-group-addon">Funcionário</span>
                <select class="form-control" name="funcionarios" disabled="true">
                    @foreach($funcionarios as $key => $value)
                        <option value="{{$key}}">{{$key.' - '.$value}}</option>
                    @endforeach
                </select>
            </div>

            <hr />
            <a href="{{URL::to('/ordem/'.$cod.'/cadastro/itens')}}"> {{Form::button(' Serviço', array('class'=>'btn btn-sm btn-default glyphicon glyphicon-plus', 'title'=>'Adicionar')) }}</a>
            <br />
            <div class="panel panel-primary">
                <div class="panel-heading"><h4>SERVIÇOS</h4></div>
                <table class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <td><strong>Descrição</strong></td>
                            <td><strong>Quantidade</strong></td>
                            <td><strong>Valor Unitário</strong></td>
                            <td><strong>Valor Total</strong></td>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $totalS = 0; ?>
                        @foreach($itens as$key => $value)        
                            @if($value->tipo == 's')
                                <?php $totalS = $totalS + ($value->valor_ser * $value->quantidade); ?>
                                <tr>
                                    <td>{{$value->titulo}}</td>
                                    <td>{{$value->quantidade}}</td>
                                    <td>R$ {{number_format($value->valor_ser,2,',','.')}}</td>
                                    <td>R$ {{number_format($value->quantidade * $value->valor_ser,2,',','.')}}</td>
                                </tr>
                            @endif
                        @endforeach
                        
                    </tbody>
                </table>
            </div>
            <a href="{{URL::to('/ordem/'.$cod.'/cadastro/itens')}}"> {{Form::button(' Produto', array('class'=>'btn btn-sm btn-default glyphicon glyphicon-plus', 'title'=>'Adicionar')) }}</a>
            <br />
            <div class="panel panel-primary">
                <div class="panel-heading"><h4>PRODUTOS</h4></div>
                <table class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <td><strong>Produto</strong></td>
                            <td><strong>Quantidade</strong></td>
                            <td><strong>Valor Unitário</strong></td>
                            <td><strong>Valor Total</strong></td>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $totalP = 0; ?>
                        @foreach($itens as$key => $value)        
                            @if($value->tipo == 'p')
                                <?php $totalP = $totalP + ($value->valor_pro * $value->quantidade); ?>
                                <tr>
                                    <td>{{$value->nome.' - '.$value->marca.' - '.$value->modelo}}</td>
                                    <td>{{$value->quantidade}}</td>
                                    <td>R$ {{number_format($value->valor_pro,2,',','.')}}</td>
                                    <td>R$ {{number_format($value->quantidade * $value->valor_pro,2,',','.')}}</td>
                                </tr>
                            @endif
                        @endforeach
                        
                    </tbody>
                </table>
            </div>
            <hr />
            
        {{Form::close()}}
        {{Form::open(array('url' => '/ordem/'.$cod.'/cancelar'))}}
                {{Form::hidden('_method', 'DELETE') }}
                {{Form::button(' Excluir O.S.', array('type'=>'submit', 'class'=>'btn btn-default glyphicon glyphicon-remove', 'title'=>'Cancelar')) }}
        {{Form::close() }}
    </div>
</div>        
@stop
