@extends('/templates/default')
@section('conteudo')
<div class="row">
    <div class="col-md-1"></div>
    <div class="col-md-8">
        <h1>CADASTRO DE PRODUTOS</h1>
        
        {{Form::open(array('method'=>'post', 'url'=>'produto/cadastro','class'=>'form-horizontal'))}}
            {{Form::button(' Cadastrar', array('type'=>'submit', 'class'=>'btn btn-default glyphicon glyphicon-ok', 'title'=>'Cadastrar'))}} 
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
            @if ( isset($sucesso) )
                <div class="alert alert-success" role="alert">
                    <strong>Produto "{{$produto}}" cadastrado com sucesso!</strong>
                </div>
            @endif
            <div class="input-group">
                <span class="input-group-addon">Fornecedor</span>
                {{Form::select('fornecedores',$fornecedores , null, array('class'=>'form-control'))}}
                <span class="input-group-addon">*</span>
            </div>
            <br />
            <div class="input-group">
                <span class="input-group-addon">Nome</span>
                {{Form::text('nome','',array('class'=>'form-control'))}}
                <span class="input-group-addon">*</span>
            </div>
            <br />
            <div class="input-group">
                <span class="input-group-addon">Observação</span>
                {{Form::text('obs','',array('class'=>'form-control'))}}
            </div>
            <br />
            <div class="input-group">
                <span class="input-group-addon">Marca</span>
                {{Form::text('marca','',array('class'=>'form-control'))}}
            </div>
            <br />
            <div class="input-group">
                <span class="input-group-addon">Modelo</span>
                {{Form::text('modelo','',array('class'=>'form-control'))}}
            </div>
            <br />
            <div class="input-group">
                <span class="input-group-addon">Quantidade</span>
                {{Form::text('quantidade','',array('class'=>'form-control'))}}
                <span class="input-group-addon">*</span>
            </div>
            <br />
            <div class="input-group">
                <span class="input-group-addon">Valor Unitário</span>
                {{Form::text('valor_uni','',array('class'=>'form-control'))}}
                <span class="input-group-addon">*</span>
            </div>
            <br />

        {{Form::close()}}
    </div>
</div>        
@stop
