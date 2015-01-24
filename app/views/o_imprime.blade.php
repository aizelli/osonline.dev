<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>OS-Online</title>

        <!-- Bootstrap -->
        <link href="{{ URL::to('/')}}/css/bootstrap.min.css" rel="stylesheet">

        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
          <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
        
    </head>

    <body>

        <table class="table table-condensed">
            <tbody>
                <tr>
                    <td><strong>Cliente:</strong> </td><td colspan="4" class="text-capitalize">@foreach($cliente as $value) {{$value->id.' - '.$value->nome}} @endforeach</td>
                </tr>
                <tr>
                    <td><strong>Endereço:</strong> </td><td colspan="2" class="text-capitalize">@foreach($cliente as $value) {{$value->endereco}} @endforeach</td>
                    <td><strong>Bairro:</strong></td><td colspan="2" class="text-capitalize">@foreach($cliente as $value) {{$value->bairro}} @endforeach</td>
                </tr>
                <tr>
                    <td><strong>Cidade:</strong></td><td class="text-capitalize">@foreach($cliente as $value) {{$value->cidade}} @endforeach</td>
                    <td><strong>Estado:</strong></td><td>@foreach($cliente as $value) {{$value->estado}} @endforeach</td>
                    <td><strong>CEP:</strong></td><td>@foreach($cliente as $value) {{$value->cep}} @endforeach</td>
                </tr>
                <tr>
                    <td><strong>Tel Residencial:</strong></td><td>@foreach($cliente as $value) {{$value->telefone_res}} @endforeach</td>
                    <td><strong>Tel Comercial:</strong></td><td>@foreach($cliente as $value) {{$value->telefone_com}} @endforeach</td>
                    <td><strong>Celular:</strong></td><td>@foreach($cliente as $value) {{$value->celular}} @endforeach</td>
                </tr>
                <tr>
                    <td><strong>Produto:</strong></td><td colspan="2" class="text-capitalize">{{$ordem->observacao}}</td>
                    <td><strong>Funcionário:</strong></td><td colspan="2" class="text-capitalize">@foreach($funcionario as $value) {{$value->nome}} @endforeach</td>
                </tr>
            </tbody>
        </table>

        <hr />
        <h3>ORDEM DE SERVIÇO Nº: <em><strong>{{$ordem->id}}</strong></em></h3>
            <h4><small>Data: {{date('d/m/Y - H:m:s', strtotime($ordem->created_at))}}</small><br/>
            <small>Produto: {{$ordem->observacao}}</small><br />
            <small>Funcionário: @foreach($funcionario as $value) {{$value->nome}} @endforeach</small><br />
            </h4>
        <br />
        <h4>SERVIÇOS</h4>
        <table class="table table-bordered table-condensed">
            <thead>
                <tr>
                    <td><strong>Descrição</strong></td>
                    <td><strong>Quantidade</strong></td>
                    <td><strong>Valor Unitário</strong></td>
                    <td><strong>Valor Total</strong></td>
                </tr>
            </thead>
            <tbody>
                <?php $totalS = 0; ?>
                @foreach($itens as$key => $value)        
                @if($value->tipo == 's')
                <?php $totalS = $totalS + ($value->valor_ser * $value->quantidade); ?>
                <tr>
                    <td class="text-capitalize">{{$value->titulo}}</td>
                    <td>{{$value->quantidade}}</td>
                    <td>R$ {{number_format($value->valor_ser,2,',','.')}}</td>
                    <td>R$ {{number_format($value->quantidade * $value->valor_ser,2,',','.')}}</td>
                </tr>
                @endif
                @endforeach
                <tr>
                    <td><strong>Sub-Total</strong></td><td class="text-right" colspan="3"text-align="right" >R$ {{number_format($totalS,2,',','.')}}</td>
                </tr>
            </tbody>
        </table>
        <br />
        <h4>PRODUTOS</h4>
        <table class="table table-bordered table-condensed">
            <thead>
                <tr>
                    <td><strong>Descrição</strong></td>
                    <td><strong>Quantidade</strong></td>
                    <td><strong>Valor Unitário</strong></td>
                    <td><strong>Valor Total</strong></td>
                </tr>
            </thead>
            <tbody>
                <?php $totalP = 0; ?>
                @foreach($itens as$key => $value)        
                @if($value->tipo == 'p')
                <?php $totalP = $totalP + ($value->valor_pro * $value->quantidade); ?>
                <tr>
                    <td class="text-capitalize">{{$value->nome.' - '.$value->marca.' - '.$value->modelo}}</td>
                    <td>{{$value->quantidade}}</td>
                    <td>R$ {{number_format($value->valor_pro,2,',','.')}}</td>
                    <td>R$ {{number_format($value->quantidade * $value->valor_pro,2,',','.')}}</td>
                </tr>
                @endif
                @endforeach
                <tr>
                    <td><strong>Sub-Total</strong></td><td class="text-right" colspan="3" >R$ {{number_format($totalP,2,',','.')}}</td>
                </tr>
            </tbody>
        </table>
        <br />
        <table class="table table-condensed">
            <tbody>
                <tr>
                    <td>TOTAL SERVIÇOS:</td><td colspan="3" class="text-right">R$ {{number_format($totalS,2,',','.')}}</td>
                </tr>
                <tr>
                    <td>TOTAL PRODUTOS:</td><td colspan="3" class="text-right">R$ {{number_format($totalP,2,',','.')}}</td>
                </tr>
                <tr>
                    <td><strong>TOTAL:</strong> </td><td colspan="3" class="text-right"><strong>R$ {{number_format($totalP + $totalS,2,',','.')}}</strong></td>
                </tr>
            </tbody>
        </table>
        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <script src="{{ URL::to('/')}}/js/jquery.min.js"></script>
        <!-- Include all compiled plugins (below), or include individual files as needed -->
        <script src="{{ URL::to('/')}}/js/bootstrap.min.js"></script>
    </body>
</html>