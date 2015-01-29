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

        {{Form::open(array('method'=>'put', 'url'=>'cliente/'.$cliente->id))}}
            {{Form::button(' Atualizar', array('type'=>'submit', 'class'=>'btn btn-default glyphicon glyphicon-ok', 'title'=>'Atualizar'))}} 
            <a href="{{URL::to('/clientes')}}">{{Form::button(' Cancelar', array('class'=>'btn btn-default glyphicon glyphicon-ban-circle', 'title'=>'Cancelar'))}}</a>
            <br /><br />
            
            <div class="input-group">
                <span class="input-group-addon">Status do Cadastro</span>
                {{Form::select('ativo', array('1'=>'Ativo', '0'=>'Desativado'), $cliente->ativo, array('class'=>'form-control'))}}
            </div>
            <hr />
            <div class="input-group">
                <span class="input-group-addon">Nome</span>
                {{Form::text('nome',$cliente->nome,array('class'=>'form-control'))}}
            </div>
            <br />
            <div class="input-group">
                <span class="input-group-addon">CPF</span>
                {{Form::text('cpf',$cliente->cpf,array('class'=>'form-control'))}}
            </div>
            <br />
            <div class="input-group">
                <span class="input-group-addon">RG</span>
                {{Form::text('rg',$cliente->rg,array('class'=>'form-control'))}}
            </div>
            <br />
            <div class="input-group">
                <span class="input-group-addon">Data de Nascimento</span>
                <div class="row">
    
                <div class="col-md-4">
                {{Form::selectRange('dia', 01, 31, date('d', strtotime($cliente->data_nasc)), array('class'=>'form-control'))}}
                </div>
                <div class="col-md-4">
                {{Form::selectMonth('mes', date('m', strtotime($cliente->data_nasc)), array('class'=>'form-control'))}}
                </div>
                 <div class="col-md-4">
                {{Form::selectYear('ano',1920,date(('Y')), date('Y', strtotime($cliente->data_nasc)), array('class'=>'form-control'))}}
                </div>
                </div>
            </div>
            <br />
            <div class="input-group">
                <span class="input-group-addon">Sexo</span>
                {{Form::select('sexo', array('m'=>'Masculino', 'f'=>'Feminino'), $cliente->sexo, array('class'=>'form-control'))}}
            </div>
            <br />
            <div class="input-group">
                <span class="input-group-addon">CEP</span>
                {{Form::text('cep',$cliente->cep,array('class'=>'form-control'))}}
            </div>
            <br />
            <div class="input-group">
                <span class="input-group-addon">Endereço</span>
                {{Form::text('endereco',$cliente->endereco,array('class'=>'form-control'))}}
            </div>
            <br />
            <div class="input-group">
                <span class="input-group-addon">Complemento</span>
                {{Form::text('complemento',$cliente->complemento,array('class'=>'form-control'))}}
            </div>
            <br />
            <div class="input-group">
                <span class="input-group-addon">Bairro</span>
                {{Form::text('bairro',$cliente->bairro,array('class'=>'form-control'))}}
            </div>
            <br />
            <div class="input-group">
                <span class="input-group-addon">Cidade</span>
                {{Form::text('cidade',$cliente->cidade,array('class'=>'form-control'))}}
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
                            ), $cliente->estado, array('class'=>'form-control'))}}
            </div>
            <br />
            <div class="input-group">
                <span class="input-group-addon">Email</span>
                {{Form::text('email',$cliente->email,array('class'=>'form-control'))}}
            </div>
            <br />
            <div class="input-group">
                <span class="input-group-addon">Telefone Celular</span>
                {{Form::text('celular',$cliente->celular,array('class'=>'form-control'))}}
            </div>
            <br />
            <div class="input-group">
                <span class="input-group-addon">Telefone Residencial</span>
                {{Form::text('telefone_res',$cliente->telefone_res,array('class'=>'form-control'))}}
            </div>
            <br />
            <div class="input-group">
                <span class="input-group-addon">Telefone Comercial</span>
                {{Form::text('telefone_com',$cliente->telefone_com,array('class'=>'form-control'))}}
            </div>
            <br />

        {{Form::close()}}
    </div>
</div>        
@stop