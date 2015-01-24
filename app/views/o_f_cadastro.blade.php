@extends('/templates/default')
@section('conteudo')
<div class="row">
    <div class="col-md-1"></div>
    <div class="col-md-8">
        <h1>ABERTURA DE ORDEM DE SERVIÇO</h1>
        
        {{Form::open(array('method'=>'post', 'url'=>'ordem/cadastro'))}}
            {{Form::button(' Abrir O.S.', array('type'=>'submit', 'class'=>'btn btn-default glyphicon glyphicon-ok', 'title'=>'Abrir O.S.'))}} 
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
                    <strong>Ordem nº: {{$ordem}} aberta com sucesso!</strong>
                </div>
            @endif
            
            <div class="input-group">
                <span class="input-group-addon">Cliente</span>
                <select class="form-control" name="clientes">
                    @foreach($clientes as $key => $value)
                    <option value="{{$key}}">{{$key.' - '.$value}}</option>
                    @endforeach
                </select>
                <span class="input-group-addon">*</span>
            </div>
            <br />
            <div class="input-group">
                <span class="input-group-addon">Funcionário</span>
                <select class="form-control" name="funcionarios">
                    @foreach($funcionarios as $key => $value)
                    <option value="{{$key}}">{{$key.' - '.$value}}</option>
                    @endforeach
                </select>
                <span class="input-group-addon">*</span>
            </div>
            <br />
            <div class="input-group">
                <span class="input-group-addon">Produto</span>
                {{Form::text('produto','',array('class'=>'form-control'))}}
            </div>
            <br />

        {{Form::close()}}
    </div>
</div>        
@stop
