@extends('/templates/default')
@section('conteudo')
<div class="row">
    <div class="col-md-1"></div>
    <div class="col-md-8">
        <h1>SELECIONAR ITEM</h1>

        {{Form::open(array('method'=>'post', 'url'=>'/ordem/'.$cod.'/cadastro/item'))}}
            {{Form::button(' Adicionar', array('type'=>'submit', 'class'=>'btn btn-default glyphicon glyphicon-ok', 'title'=>'Adicionar'))}} 
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
                <span class="input-group-addon">{{Form::radio('item', 's')}} Serviço</span>
                
                <select class="form-control" name="servico">
                    @foreach($servicos as $key => $value)
                    <option value="{{$key}}" >{{$key.' - '.$value}}</option>
                    @endforeach
                </select>
            </div>
            <br />
            
            <div class="input-group">
                <span class="input-group-addon">{{Form::radio('item', 'p')}} Produto</span>
                <select class="form-control" name="produto">
                    @foreach($produtos as $value)
                    <option value="{{$value->id}}" >{{$value->id.' - '.$value->nome.' - '.$value->modelo.' - '.$value->marca}}</option>
                    @endforeach
                </select>
            </div>
            <br />

            <div class="input-group">
                <span class="input-group-addon">Quantidade</span>
                {{Form::text('quantidade',1,array('class'=>'form-control'))}}
            </div>
            <br />

        {{Form::close()}}
    </div>
</div>        
@stop
