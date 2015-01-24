@extends('templates.default')
@section('conteudo')
<div class="container">
    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6 text-center">
            @if(Auth::check())
                <img src="{{ URL::to('/')}}/img/logo_default.png" class="img-rounded img-responsive">
            @else
                <div class="panel panel-primary">
                    <div class="panel-heading"><h2>LOGIN</h2></div>
                    <div class="panel panel-body">
                        {{Form::open(array('method'=>'post', 'url'=>'login/usuario/'))}}
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

                            <div class="input-group">
                                <span class="input-group-addon">Usuário</span>
                                {{Form::text('usuario','',array('class'=>'form-control'))}}
                            </div>
                            <br />
                            <div class="input-group">
                                <span class="input-group-addon">Senha</span>
                                {{Form::password('senha',array('class'=>'form-control'))}}
                            </div>
                            <br />
                            {{Form::submit('Login', array('class'=>'btn btn-default'))}}

                        {{Form::close()}}
                    </div>
                </div>

            @endif
        </div>
        <div class="col-md-3"></div>
    </div> 
</div>
@stop