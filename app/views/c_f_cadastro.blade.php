@extends('/templates/default')
@section('conteudo')
<div class="row">
    <div class="col-md-1"></div>
    <div class="col-md-8">
        <h1>CADASTRO DE CLIENTES</h1>
        
        {{Form::open(array('method'=>'post', 'url'=>'cliente/cadastro'))}}
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
                    <strong>Cliente "{{$cliente}}" cadastrado com sucesso!</strong>
                </div>
            @endif
            <div class="input-group">
                <span class="input-group-addon">Nome</span>
                {{Form::text('nome','',array('class'=>'form-control'))}}
                <span class="input-group-addon">*</span>
            </div>
            <br />
            <div class="input-group">
                <span class="input-group-addon">CPF</span>
                {{Form::text('cpf','',array('class'=>'form-control'))}}
                <span class="input-group-addon">*</span>
            </div>
            <br />
            <div class="input-group">
                <span class="input-group-addon">RG</span>
                {{Form::text('rg','',array('class'=>'form-control'))}}
            </div>
            <br />
            <div class="input-group">
                <span class="input-group-addon">Data de Nascimento</span>
                <div class="row">
    
                <div class="col-md-4">
                {{Form::selectRange('dia', 01, 31, date(('d')), array('class'=>'form-control'))}}
                </div>
                <div class="col-md-4">
                {{Form::selectMonth('mes', date(('M')), array('class'=>'form-control'))}}
                </div>
                 <div class="col-md-4">
                {{Form::selectYear('ano',1920,date(('Y')), date(('Y')), array('class'=>'form-control'))}}
                </div>
                </div>
            </div>
            <br />
            <div class="input-group">
                <span class="input-group-addon">Sexo</span>
                {{Form::select('sexo', array('m'=>'Masculino', 'f'=>'Feminino'), 'm', array('class'=>'form-control'))}}
            </div>
            <br />
            <div class="input-group">
                <span class="input-group-addon">CEP</span>
                {{Form::text('cep','',array('class'=>'form-control'))}}
            </div>
            <br />
            <div class="input-group">
                <span class="input-group-addon">Endereço</span>
                {{Form::text('endereco','',array('class'=>'form-control'))}}
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
                {{Form::select('estado', array(
                            'AC'=>'Acre',
                            'AL'=>'Alagoas',
                            'AP'=>'Amapá',
                            'AM'=>'Amazonas',
                            'BA'=>'Bahia',
                            'CE'=>'Ceará',
                            'DF'=>'Distrito Federal',
                            'ES'=>'Espírito Santo',
                            'GO'=>'Goiás',
                            'MA'=>'Maranhão',
                            'MT'=>'Mato Grosso',
                            'MS'=>'Mato Grosso do Sul',
                            'MG'=>'Minas Gerais',
                            'PA'=>'Pará',
                            'PB'=>'Paraíba',
                            'PR'=>'Paraná',
                            'PE'=>'Pernambuco',
                            'PI'=>'Piauí',
                            'RJ'=>'Rio de Janeiro',
                            'RN'=>'Rio Grande do Norte',
                            'RS'=>'Rio Grande do Sul',
                            'RO'=>'Rondônia',
                            'RR'=>'Roraima',
                            'SC'=>'Santa Catarina',
                            'SP'=>'São Paulo',
                            'SE'=>'Sergipe',
                            'TO'=>'Tocantins'
                            ), 'SP', array('class'=>'form-control'))}}
            </div>
            <br />
            <div class="input-group">
                <span class="input-group-addon">Email</span>
                {{Form::text('email','',array('class'=>'form-control'))}}
            </div>
            <br />
            <div class="input-group">
                <span class="input-group-addon">Telefone Celular</span>
                {{Form::text('celular','',array('class'=>'form-control'))}}
            </div>
            <br />
            <div class="input-group">
                <span class="input-group-addon">Telefone Residencial</span>
                {{Form::text('telefone_res','',array('class'=>'form-control'))}}
            </div>
            <br />
            <div class="input-group">
                <span class="input-group-addon">Telefone Comercial</span>
                {{Form::text('telefone_com','',array('class'=>'form-control'))}}
            </div>
            <br />

        {{Form::close()}}
    </div>
</div>        
@stop
