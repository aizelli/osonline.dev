<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of JobController
 *
 * @author alexandre
 */
class JobController extends BaseController {

    public function create() {

        return View::make('j_f_cadastro');
    }

    public function store() {

        $regras = array(
            'titulo' => 'required|min:3',
            'valor_uni' => 'required'
        );

        $validacao = Validator::make(Input::all(), $regras);

        if ($validacao->fails()) {

            return Redirect::to('servico/cadastro')->withErrors($validacao)->withInput(Input::all());
        } else {

            $servico = new Job;

            $servico->titulo = Input::get('titulo');
            $servico->descricao = Input::get('descricao');
            $servico->valor_uni = input::get('valor_uni');
            $servico->ativo = 1;

            $servico->save();

            return View::make('j_f_cadastro')->with('sucesso', TRUE)->with('servico', $servico->titulo);
        }
    }

    public function show($id) {

        $servico = Job::find($id);

        return View::make('j_visualiza')->with('servico', $servico);
    }

    public function edit($id) {
        
        $servico = Job::find($id);
        
        return View::make('j_f_edita')->with('servico', $servico);
    }

    public function update($id) {
        
        $regras = array(
            'titulo' => 'required|min:3',
            'valor_uni' => 'required|numeric'
        );

        $validacao = Validator::make(Input::all(), $regras);

        if ($validacao->fails()) {

            return Redirect::to('servico/'.$id.'/edita')->withErrors($validacao);
        } else {

            $servico = Job::find($id);

            $servico->titulo = Input::get('titulo');
            $servico->descricao = Input::get('descricao');
            $servico->valor_uni = input::get('valor_uni');
            $servico->ativo = Input::get('ativo');

            $servico->save();

            return Redirect::to('servico/'.$id);
        }
    }

    public function lista() {

        $servicos = Job::where('id','>', 0)->paginate(10);

        return View::make('j_lista')->with('servicos', $servicos);
    }

}
