<nav class="navbar navbar-default navbar-fixed-top" role="navigation">
    <div class="container-fluid">
        <div class="navbar-header">
            <a class="navbar-brand" href="{{URL::to('/')}}">OS-Online</a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
            <ul class="nav navbar-nav">
                @if(Auth::check())
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">O.S. <span class="caret"></span></a>
                    <ul class="dropdown-menu" role="menu">
                        <li><a href="{{URL::to('/ordem/cadastro')}}">Abrir Ordem de Serviço</a></li>
                        <li><a href="{{URL::to('/ordens')}}">Visualizar Ordem de Serviço</a></li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Cadastrar <span class="caret"></span></a>
                    <ul class="dropdown-menu" role="menu">
                        <li><a href="{{URL::to('cliente/cadastro')}}">Clientes</a></li>
                        <li><a href="{{URL::to('fornecedor/cadastro')}}">Fornecedores</a></li>
                        <li><a href="{{URL::to('funcionario/cadastro')}}">Funcionários</a></li>
                        <li><a href="{{URL::to('servico/cadastro')}}">Serviços</a></li>
                        <li><a href="{{URL::to('produto/cadastro')}}">Produtos</a></li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Visualizar <span class="caret"></span></a>
                    <ul class="dropdown-menu" role="menu">
                        <li><a href="{{URL::to('clientes')}}">Clientes</a></li>
                        <li><a href="{{URL::to('fornecedores')}}">Fornecedores</a></li>
                        <li><a href="{{URL::to('funcionarios')}}">Funcionários</a></li>
                        <li><a href="{{URL::to('servicos')}}">Serviços</a></li>
                        <li><a href="{{URL::to('produtos')}}">Produtos</a></li>
                    </ul>
                </li>
                @if(Auth::user()->tipo == 1)
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Usuário <span class="caret"></span></a>
                    <ul class="dropdown-menu" role="menu">
                        <li><a href="{{URL::to('usuario/cadastro')}}">Cadastrar</a></li>
                        <li><a href="{{URL::to('usuarios')}}">Listar</a></li>
                    </ul>
                </li>
                @endif
                
                <li><a href="{{URL::to('logout/usuario')}}" class="dropdown-toggle" role="button" aria-expanded="false">Sair</a></li>
                @endif
            </ul>
        </div><!--/.nav-collapse -->
    </div>
</nav>
