@extends('/templates/default')
@section('conteudo')
<div class="row">
    <div class="col-md-1"></div>
    <div class="col-md-8">
        <h1>CADASTRO DE SERVIÇOS</h1>
        
        {{Form::open(array('method'=>'post', 'url'=>'servico/cadastro'))}}
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
                    <strong>Serviço "{{$servico}}" cadastrado com sucesso!</strong>
                </div>
            @endif
            <div class="input-group">
                <span class="input-group-addon">Título</span>
                {{Form::text('titulo','',array('class'=>'form-control'))}}
                <span class="input-group-addon">*</span>
            </div>
            <br />
            <div class="input-group">
                <span class="input-group-addon">Descrição</span>
                {{Form::text('descricao','',array('class'=>'form-control'))}}
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
