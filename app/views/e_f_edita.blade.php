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

        {{Form::open(array('method'=>'put', 'url'=>'funcionario/'.$funcionario->id))}}
            {{Form::button(' Atualizar', array('type'=>'submit', 'class'=>'btn btn-default glyphicon glyphicon-ok', 'title'=>'Atualizar'))}} 
            <a href="{{URL::to('/funcionarios')}}">{{Form::button(' Cancelar', array('type'=>'submit', 'class'=>'btn btn-default glyphicon glyphicon-ban-circle', 'title'=>'Cancelar'))}}</a>
            <br /><br />
            
            <div class="input-group">
                <span class="input-group-addon">Status do Cadastro</span>
                {{Form::select('ativo', array('1'=>'Ativo', '0'=>'Desativado'), $funcionario->ativo, array('class'=>'form-control'))}}
            </div>
            <hr />
            <div class="input-group">
                <span class="input-group-addon">Nome</span>
                {{Form::text('nome',$funcionario->nome,array('class'=>'form-control'))}}
            </div>
            <br />
            <div class="input-group">
                <span class="input-group-addon">CPF</span>
                {{Form::text('cpf',$funcionario->cpf,array('class'=>'form-control'))}}
            </div>
            <br />
            <div class="input-group">
                <span class="input-group-addon">Cargo</span>
                {{Form::text('cargo',$funcionario->cargo,array('class'=>'form-control'))}}
            </div>
            <br />

        {{Form::close()}}
    </div>
</div>        
@stop