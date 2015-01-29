<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of SupplierController
 *
 * @author alexandre
 */
class SupplierController extends BaseController {

    public function create() {

        return View::make('s_f_cadastro');
    }

    public function store() {

        $regras = array(
            'razao_social' => 'required|min:3',
            'cnpj' => 'required',
            'cep' => 'required',
            'endereco' => 'required',
            'email' => 'required',
            'nome_resp' => 'required',
            'telefone1' => 'required'
        );

        $validacao = Validator::make(Input::all(), $regras);

        if ($validacao->fails()) {

            return Redirect::to('fornecedor/cadastro')->withErrors($validacao)->withInput(Input::all());
        } else {

            $fornecedor = new Supplier;

            $fornecedor->nome_emp = Input::get('nome_emp');
            $fornecedor->razao_social = Input::get('razao_social');
            $fornecedor->cnpj = Input::get('cnpj');
            $fornecedor->ie = Input::get('ie');
            $fornecedor->cep = Input::get('cep');
            $fornecedor->endereco = Input::get('endereco');
            $fornecedor->complemento = Input::get('complemento');
            $fornecedor->bairro = Input::get('bairro');
            $fornecedor->cidade = Input::get('cidade');
            $fornecedor->estado = Input::get('estado');
            $fornecedor->pais = 'BRA';
            $fornecedor->email = Input::get('email');
            $fornecedor->nome_resp = Input::get('nome_resp');
            $fornecedor->celular = Input::get('celular');
            $fornecedor->telefone1 = Input::get('telefone1');
            $fornecedor->telefone2 = Input::get('telefone2');
            $fornecedor->ativo = 1;

            $fornecedor->save();

            return View::make('s_f_cadastro')->with('sucesso', TRUE)->with('fornecedor', $fornecedor->nome_emp);
        }
    }

    public function show($id) {

        $fornecedor = Supplier::find($id);

        return View::make('s_visualiza')->with('fornecedor', $fornecedor);
    }

    public function edit($id) {

        $fornecedor = Supplier::find($id);

        return View::make('s_f_edita')->with('fornecedor', $fornecedor);
    }

    public function update($id) {

        $regras = array(
            'razao_social' => 'required|min:3',
            'cnpj' => 'required',
            'cep' => 'required',
            'endereco' => 'required',
            'email' => 'required',
            'nome_resp' => 'required',
            'telefone1' => 'required'
        );

        $validacao = Validator::make(Input::all(), $regras);

        if ($validacao->fails()) {

            return Redirect::to('fornecedor/' . $id . '/editar')->withErrors($validacao);
        } else {

            $fornecedor = Supplier::find($id);

            $fornecedor->nome_emp = Input::get('nome_emp');
            $fornecedor->razao_social = Input::get('razao_social');
            $fornecedor->cnpj = Input::get('cnpj');
            $fornecedor->ie = Input::get('ie');
            $fornecedor->cep = Input::get('cep');
            $fornecedor->endereco = Input::get('endereco');
            $fornecedor->complemento = Input::get('complemento');
            $fornecedor->bairro = Input::get('bairro');
            $fornecedor->cidade = Input::get('cidade');
            $fornecedor->estado = Input::get('estado');
            $fornecedor->pais = 'BRA';
            $fornecedor->email = Input::get('email');
            $fornecedor->nome_resp = Input::get('nome_resp');
            $fornecedor->celular = Input::get('celular');
            $fornecedor->telefone1 = Input::get('telefone1');
            $fornecedor->telefone2 = Input::get('telefone2');
            $fornecedor->ativo = Input::get('ativo');

            $fornecedor->save();

            return Redirect::to('fornecedor/' . $id);
        }
    }

    public function lista() {

        $fornecedores = Supplier::paginate(10);

        return View::make('s_lista')->with('fornecedores', $fornecedores);
    }

}
