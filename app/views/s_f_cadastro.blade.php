@extends('/templates/default')
@section('conteudo')
<div class="row">
    <div class="col-md-1"></div>
    <div class="col-md-8">
        <h1>CADASTRO DE FORNECEDORES</h1>
        

        {{Form::open(array('method'=>'post', 'url'=>'fornecedor/cadastro'))}}
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
                    <strong>Fornecedor "{{$fornecedor}}" cadastrado com sucesso!</strong>
                </div>
            @endif    
            <div class="input-group">
                <span class="input-group-addon">Nome da Empresa</span>
                {{Form::text('nome_emp','',array('class'=>'form-control'))}}
            </div>
            <br />
            <div class="input-group">
                <span class="input-group-addon">Razão Social</span>
                {{Form::text('razao_social','',array('class'=>'form-control'))}}
                <span class="input-group-addon">*</span>
            </div>
            <br />
            <div class="input-group">
                <span class="input-group-addon">CNPJ</span>
                {{Form::text('cnpj','',array('class'=>'form-control'))}}
                <span class="input-group-addon">*</span>
            </div>
            <br />
            <div class="input-group">
                <span class="input-group-addon">Inscrição Estadual</span>
                {{Form::text('ie','',array('class'=>'form-control'))}}
            </div>
            <br />
            <div class="input-group">
                <span class="input-group-addon">CEP</span>
                {{Form::text('cep','',array('class'=>'form-control'))}}
                <span class="input-group-addon">*</span>
            </div>
            <br />
            <div class="input-group">
                <span class="input-group-addon">Endereço</span>
                {{Form::text('endereco','',array('class'=>'form-control'))}}
                <span class="input-group-addon">*</span>
            </div>
            <br />
            <div class="input-group">
                <span class="input-group-addon">Complemento</span>
                {{Form::text('complemento','',array('class'=>'form-control'))}}
            </div>
            <br />
            <div class="input-group">
                <span class="input-group-addon">Bairro</span>
                {{Form::text('bairro','',array('class'=>'form-control'))}}
            </div>
            <br />
            <div class="input-group">
                <span class="input-group-addon">Cidade</span>
                {{Form::text('cidade','',array('class'=>'form-control'))}}
            </div>
            <br />
            <div class="input-group">
                <span class="input-group-addon">Estado</span>
                {{Form::text('estado','',array('class'=>'form-control'))}}
            </div>
            <br />
            <div class="input-group">
                <span class="input-group-addon">País</span>
                {{Form::text('pais','',array('class'=>'form-control'))}}
            </div>
            <br />
            <div class="input-group">
                <span class="input-group-addon">Email</span>
                {{Form::text('email','',array('class'=>'form-control'))}}
                <span class="input-group-addon">*</span>
            </div>
            <br />
            <div class="input-group">
                <span class="input-group-addon">Nome do Responsável</span>
                {{Form::text('nome_resp','',array('class'=>'form-control'))}}
                <span class="input-group-addon">*</span>
            </div>
            <br />
            <div class="input-group">
                <span class="input-group-addon">Telefone Celular</span>
                {{Form::text('celular','',array('class'=>'form-control'))}}
            </div>
            <br />
            <div class="input-group">
                <span class="input-group-addon">Telefone Contato 1</span>
                {{Form::text('telefone1','',array('class'=>'form-control'))}}
                <span class="input-group-addon">*</span>
            </div>
            <br />
            <div class="input-group">
                <span class="input-group-addon">Telefone Contato 2</span>
                {{Form::text('telefone2','',array('class'=>'form-control'))}}
            </div>
            <br />

        {{Form::close()}}
    </div>
</div>        
@stop

