<?php

class CustomerController extends BaseController {

    public function create() {

        return View::make('c_f_cadastro');
    }

    public function store() {

        $regras = array(
            'nome' => 'required|min:3',
            'cpf' => 'required|numeric',
            'rg' => 'numeric',
            'cep' => 'numeric'
        );
        
        $messages =array(
            'nome.required' => 'Especifique o <strong>Nome</strong>.',
            'nome.min' => 'O <strong>Nome</strong> digitado é muito curto.',
            'cpf.required' => 'Especifique o <strong>CPF</strong>.',
            'cpf.numeric' => 'O <strong>CPF</strong> deve conter apenas números.',
            'rg.numeric' => 'O <strong>RG</strong> deve conter apenas números.',
            'cep.numeric' => 'O <strong>CEP</strong> deve conter apenas números.'
        );

        $validacao = Validator::make(Input::all(), $regras, $messages);

        if ($validacao->fails()) {

            return Redirect::to('cliente/cadastro')->withErrors($validacao)->withInput(Input::all());
        } else {

            $cliente = new Customer;

            $cliente->nome = Input::get('nome');
            $cliente->cpf = Input::get('cpf');
            $cliente->rg = Input::get('rg');
            $cliente->data_nasc = Input::get('ano') . '/' . Input::get('mes') . '/' . Input::get('dia');
            $cliente->sexo = Input::get('sexo');
            $cliente->cep = Input::get('cep');
            $cliente->endereco = Input::get('endereco');
            $cliente->complemento = Input::get('complemento');
            $cliente->bairro = Input::get('bairro');
            $cliente->cidade = Input::get('cidade');
            $cliente->estado = Input::get('estado');
            $cliente->pais = 'BRA';
            $cliente->email = Input::get('email');
            $cliente->celular = Input::get('celular');
            $cliente->telefone_res = Input::get('telefone_res');
            $cliente->telefone_com = Input::get('telefone_com');
            $cliente->ativo = 1;

            $cliente->save();

            return View::make('c_f_cadastro')->with('sucesso', TRUE)->with('cliente', $cliente->nome);
        }
    }

    public function show($id) {

        $cliente = Customer::find($id);

        return View::make('c_visualiza')->with('cliente', $cliente);
    }

    public function edit($id) {

        $cliente = Customer::find($id);

        return View::make('c_f_edita')->with('cliente', $cliente);
    }

    public function update($id) {

        $regras = array(
            'nome' => 'required|min:3',
            'cpf' => 'required'
        );

        $validacao = Validator::make(Input::all(), $regras);

        if ($validacao->fails()) {

            return Redirect::to('cliente/' . $id . '/editar')->withErrors($validacao);
        } else {

            $cliente = Customer::find($id);

            $cliente->nome = Input::get('nome');
            $cliente->cpf = Input::get('cpf');
            $cliente->rg = Input::get('rg');
            $cliente->data_nasc = Input::get('ano') . '/' . Input::get('mes') . '/' . Input::get('dia');
            $cliente->sexo = Input::get('sexo');
            $cliente->cep = Input::get('cep');
            $cliente->endereco = Input::get('endereco');
            $cliente->complemento = Input::get('complemento');
            $cliente->bairro = Input::get('bairro');
            $cliente->cidade = Input::get('cidade');
            $cliente->estado = Input::get('estado');
            $cliente->pais = 'BRA';
            $cliente->email = Input::get('email');
            $cliente->celular = Input::get('celular');
            $cliente->telefone_res = Input::get('telefone_res');
            $cliente->telefone_com = Input::get('telefone_com');
            $cliente->ativo = Input::get('ativo');

            $cliente->save();

            return Redirect::to('cliente/' . $id);
        }
    }

    public function lista() {

        $clientes = Customer::paginate(10);

        return View::make('c_lista')->with('clientes', $clientes);
    }

}
