<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of EmployeeController
 *
 * @author alexandre
 */
class EmployeeController extends BaseController {

    public function create() {

        return View::make('e_f_cadastro');
    }

    public function store() {

        $regras = array(
            'nome' => 'required|min:3'
        );

        $validacao = Validator::make(Input::all(), $regras);

        if ($validacao->fails()) {

            return Redirect::to('funcionario/cadastro')->withErrors($validacao)->withInputs(Input::all());
        } else {

            $funcionario = new Employee;

            $funcionario->nome = Input::get('nome');
            $funcionario->cpf = Input::get('cpf');
            $funcionario->cargo = Input::get('cargo');
            $funcionario->ativo = 1;

            $funcionario->save();

            return View::make('e_f_cadastro')->with('sucesso', TRUE)->with('funcionario', $funcionario->nome);
        }
    }

    public function show($id) {

        $funcionario = Employee::find($id);

        return View::make('e_visualiza')->with('funcionario', $funcionario);
    }

    public function edit($id) {

        $funcionario = Employee::find($id);

        return View::make('e_f_edita')->with('funcionario', $funcionario);
    }

    public function update($id) {

        $regras = array(
            'nome' => 'required|min:3'
        );

        $validacao = Validator::make(Input::all(), $regras);

        if ($validacao->fails()) {

            return Redirect::to('funcionario/' . $id . '/editar')->withErrors($validacao)->withInputs(Input::all());
        } else {

            $funcionario = Employee::find($id);

            $funcionario->nome = Input::get('nome');
            $funcionario->cpf = Input::get('cpf');
            $funcionario->cargo = Input::get('cargo');
            $funcionario->ativo = Input::get('ativo');

            $funcionario->save();

            return Redirect::to('funcionario/' . $id);
        }
    }

    public function lista() {

        $funcionarios = Employee::paginate(10);

        return View::make('e_lista')->with('funcionarios', $funcionarios);
    }

}
