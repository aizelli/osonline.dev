@extends('/templates/default')
@section('conteudo')
<div class="row">
    <div class="col-md-1"></div>
    <div class="col-md-8">
        <h1>CADASTRO DE USUÁRIOS</h1>
        
        {{Form::open(array('method'=>'post', 'url'=>'usuario/cadastro'))}}
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
                    <strong>Usuário "{{$usuario}}" cadastrado com sucesso!</strong>
                </div>
            @endif
            <div class="input-group">
                <span class="input-group-addon">Nome</span>
                {{Form::text('nome','',array('class'=>'form-control'))}}
                <span class="input-group-addon">*</span>
            </div>
            <br />
            <div class="input-group">
                <span class="input-group-addon">Usuário</span>
                {{Form::text('usuario','',array('class'=>'form-control'))}}
                <span class="input-group-addon">*</span>
            </div>
            <br />
            <div class="input-group">
                <span class="input-group-addon">Senha</span>
                {{Form::password('password',array('class'=>'form-control'))}}
                <span class="input-group-addon">*</span>
            </div>
            <br />
            <div class="input-group">
                <span class="input-group-addon">Confirmar Senha</span>
                {{Form::password('re_password',array('class'=>'form-control'))}}
                <span class="input-group-addon">*</span>
            </div>
            <br />
            <div class="input-group">
                <span class="input-group-addon">Email</span>
                {{Form::text('email','',array('class'=>'form-control'))}}
            </div>
            <br />
            <div class="input-group">
                <span class="input-group-addon">Telefone</span>
                {{Form::text('telefone','',array('class'=>'form-control'))}}
            </div>
            <br />

        {{Form::close()}}
    </div>
</div>        
@stop