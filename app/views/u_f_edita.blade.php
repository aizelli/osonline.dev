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

        {{Form::open(array('method'=>'put', 'url'=>'usuario/'.$usuario->id))}}
            {{Form::button(' Atualizar', array('type'=>'submit', 'class'=>'btn btn-default glyphicon glyphicon-ok', 'title'=>'Atualizar'))}} 
            <a href="{{URL::to('/usuarios')}}">{{Form::button(' Cancelar', array('class'=>'btn btn-default glyphicon glyphicon-ban-circle', 'title'=>'Cancelar'))}}</a>
            <br /><br />
            
            <div class="input-group">
                <span class="input-group-addon">Status do Cadastro</span>
                {{Form::select('ativo', array('1'=>'Ativo', '0'=>'Desativado'), $usuario->ativo, array('class'=>'form-control'))}}
            </div>
            <hr />
            <div class="input-group">
                <span class="input-group-addon">Usuário</span>
                {{Form::text('usuario',$usuario->usuario,array('class'=>'form-control', 'disabled'))}}
            </div>
            <br />
            <div class="input-group">
                <span class="input-group-addon">Nome</span>
                {{Form::text('nome',$usuario->nome,array('class'=>'form-control'))}}
            </div>
            <br />
            <div class="input-group">
                <span class="input-group-addon">Email</span>
                {{Form::text('email',$usuario->email,array('class'=>'form-control'))}}
            </div>
            <br />
            <div class="input-group">
                <span class="input-group-addon">Telefone</span>
                {{Form::text('telefone',$usuario->telefone_cont,array('class'=>'form-control'))}}
            </div>
            <br />
            <div class="input-group">
                <span class="input-group-addon">Senha</span>
                {{Form::password('password',array('class'=>'form-control'))}}
            </div>
            <br />
            <div class="input-group">
                <span class="input-group-addon">Confirmar Senha</span>
                {{Form::password('re_password',array('class'=>'form-control'))}}
            </div>
            <br />

        {{Form::close()}}
    </div>
</div>        
@stop