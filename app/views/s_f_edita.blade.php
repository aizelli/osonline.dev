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

        {{Form::open(array('method'=>'put', 'url'=>'fornecedor/'.$fornecedor->id))}}
            {{Form::button(' Atualizar', array('type'=>'submit', 'class'=>'btn btn-default glyphicon glyphicon-ok', 'title'=>'Atualizar'))}} 
            <a href="{{URL::to('/fornecedores')}}">{{Form::button(' Cancelar', array('class'=>'btn btn-default glyphicon glyphicon-ban-circle', 'title'=>'Cancelar'))}}</a>
            <br /><br />
            
            <div class="input-group">
                <span class="input-group-addon">Status do Cadastro</span>
                {{Form::select('ativo', array('1'=>'Ativo', '0'=>'Desativado'), $fornecedor->ativo, array('class'=>'form-control'))}}
            </div>
            <hr />
            <div class="input-group">
                <span class="input-group-addon">Nome da Empresa</span>
                {{Form::text('nome_emp',$fornecedor->nome_emp,array('class'=>'form-control'))}}
            </div>
            <br />
            <div class="input-group">
                <span class="input-group-addon">Razão Social</span>
                {{Form::text('razao_social',$fornecedor->razao_social,array('class'=>'form-control'))}}
                <span class="input-group-addon">*</span>
            </div>
            <br />
            <div class="input-group">
                <span class="input-group-addon">CNPJ</span>
                {{Form::text('cnpj',$fornecedor->cnpj,array('class'=>'form-control'))}}
                <span class="input-group-addon">*</span>
            </div>
            <br />
            <div class="input-group">
                <span class="input-group-addon">Inscrição Estadual</span>
                {{Form::text('ie',$fornecedor->ie,array('class'=>'form-control'))}}
            </div>
            <br />
            <div class="input-group">
                <span class="input-group-addon">CEP</span>
                {{Form::text('cep',$fornecedor->cep,array('class'=>'form-control'))}}
                <span class="input-group-addon">*</span>
            </div>
            <br />
            <div class="input-group">
                <span class="input-group-addon">Endereço</span>
                {{Form::text('endereco',$fornecedor->endereco,array('class'=>'form-control'))}}
                <span class="input-group-addon">*</span>
            </div>
            <br />
            <div class="input-group">
                <span class="input-group-addon">Complemento</span>
                {{Form::text('complemento',$fornecedor->complemento,array('class'=>'form-control'))}}
            </div>
            <br />
            <div class="input-group">
                <span class="input-group-addon">Bairro</span>
                {{Form::text('bairro',$fornecedor->bairro,array('class'=>'form-control'))}}
            </div>
            <br />
            <div class="input-group">
                <span class="input-group-addon">Cidade</span>
                {{Form::text('cidade',$fornecedor->cidade,array('class'=>'form-control'))}}
            </div>
            <br />
            <div class="input-group">
                <span class="input-group-addon">Estado</span>
                {{Form::text('estado',$fornecedor->estado,array('class'=>'form-control'))}}
            </div>
            <br />
            <div class="input-group">
                <span class="input-group-addon">País</span>
                {{Form::text('pais',$fornecedor->pais,array('class'=>'form-control'))}}
            </div>
            <br />
            <div class="input-group">
                <span class="input-group-addon">Email</span>
                {{Form::text('email',$fornecedor->email,array('class'=>'form-control'))}}
                <span class="input-group-addon">*</span>
            </div>
            <br />
            <div class="input-group">
                <span class="input-group-addon">Nome do Responsável</span>
                {{Form::text('nome_resp',$fornecedor->nome_resp,array('class'=>'form-control'))}}
                <span class="input-group-addon">*</span>
            </div>
            <br />
            <div class="input-group">
                <span class="input-group-addon">Telefone Celular</span>
                {{Form::text('celular',$fornecedor->celular,array('class'=>'form-control'))}}
            </div>
            <br />
            <div class="input-group">
                <span class="input-group-addon">Telefone Contato 1</span>
                {{Form::text('telefone1',$fornecedor->telefone1,array('class'=>'form-control'))}}
                <span class="input-group-addon">*</span>
            </div>
            <br />
            <div class="input-group">
                <span class="input-group-addon">Telefone Contato 2</span>
                {{Form::text('telefone2',$fornecedor->telefone2,array('class'=>'form-control'))}}
            </div>
            <br />

        {{Form::close()}}
    </div>
</div>        
@stop