@extends('/templates/default')
@section('conteudo')
<div class="row">
    <div class="col-md-1"></div>
    <div class="col-md-5">
        <h1>EDITAR DADOS</h1>

        @if ( count($errors) > 0)
            Erros encontrados:<br />
            <ul>
                @foreach ($errors->all() as $e)
                    <li>{{ $e }}</li>
                @endforeach
            </ul>
        @endif

        {{Form::open(array('method'=>'put', 'url'=>'produto/'.$id))}}
            {{Form::button(' Atualizar', array('type'=>'submit', 'class'=>'btn btn-default glyphicon glyphicon-ok', 'title'=>'Atualizar'))}} 
            <a href="{{URL::to('/produtos')}}">{{Form::button(' Canecelar', array('class'=>'btn btn-default glyphicon glyphicon-ban-circle', 'title'=>'Cancelar'))}}</a>
            <br /><br />
            @foreach($produto as $key => $value)
            
            <div class="input-group">
                <span class="input-group-addon">Nome</span>
                {{Form::text('nome',$value->nome,array('class'=>'form-control'))}}
            </div>
            <br />
            <div class="input-group">
                <span class="input-group-addon">Observação</span>
                {{Form::text('obs',$value->descricao,array('class'=>'form-control'))}}
            </div>
            <br />
            <div class="input-group">
                <span class="input-group-addon">Marca</span>
                {{Form::text('marca',$value->marca,array('class'=>'form-control'))}}
            </div>
            <br />
            <div class="input-group">
                <span class="input-group-addon">Modelo</span>
                {{Form::text('modelo',$value->modelo,array('class'=>'form-control'))}}
            </div>
            <br />
            <div class="input-group">
                <span class="input-group-addon">Fornecedor</span>
                {{Form::select('fornecedores',$fornecedores , $value->suppliers_id, array('class'=>'form-control'))}}
            </div>
            <br />
            <div class="input-group">
                <span class="input-group-addon">Quantidade</span>
                {{Form::text('quantidade',$value->quantidade,array('class'=>'form-control'))}}
            </div>
            <br />
            <div class="input-group">
                <span class="input-group-addon">Valor Unitário</span>
                {{Form::text('valor_uni',$value->valor_uni,array('class'=>'form-control'))}}
            </div>
            <br />
            @endforeach

        {{Form::close()}}
    </div>
</div>        
@stop