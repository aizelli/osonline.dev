<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ProductsController
 *
 * @author alexandre
 */
class ProductController extends BaseController {

    public function create() {

        $fornecedores = Supplier::lists('nome_emp', 'id');
        return View::make('p_f_cadastro')->with('fornecedores', $fornecedores);
    }

    public function store() {

        $regras = array(
            'fornecedores' => 'required',
            'nome' => 'required|min:3',
            'quantidade' => 'required|numeric',
            'valor_uni' => 'required'
        );

        $validacao = Validator::make(Input::all(), $regras);

        if ($validacao->fails()) {

            return Redirect::to('/produto/cadastro')->withErrors($validacao)->withInput(Input::all());
        } else {

            $produto = new Product;

            $produto->suppliers_id = Input::get('fornecedores');
            $produto->nome = Input::get('nome');
            $produto->descricao = Input::get('obs');
            $produto->marca = Input::get('marca');
            $produto->modelo = Input::get('modelo');
            $produto->quantidade = Input::get('quantidade');
            $produto->valor_uni = input::get('valor_uni');

            $produto->save();

            $fornecedores = Supplier::lists('nome_emp', 'id');

            return View::make('p_f_cadastro')->with('sucesso', TRUE)->with('produto', $produto->nome)->with('fornecedores', $fornecedores);
        }
    }

    public function show($id) {

        $produto = DB::table('products')
                ->join('suppliers', 'products.suppliers_id', '=', 'suppliers.id')
                ->where('products.id', '=', $id)
                ->select('products.*', 'suppliers.nome_emp')
                ->get();
        
        $p = Product::find($id);
        return View::make('p_visualiza')->with('produto', $produto)->with('p', $p);
    }

    public function edit($id) {
        
        $fornecedores = Supplier::lists('nome_emp', 'id');

        $produto = DB::table('products')
                ->join('suppliers', 'products.suppliers_id', '=', 'suppliers.id')
                ->where('products.id', '=', $id)
                ->select('products.*', 'suppliers.nome_emp')
                ->get();
        
        return View::make('p_f_edita')->with('produto', $produto)->with('id', $id)->with('fornecedores', $fornecedores);
    }

    public function update($id) {
        
        $regras = array(
            'fornecedores' => 'required',
            'nome' => 'required|min:3',
            'quantidade' => 'required|numeric',
            'valor_uni' => 'required'
        );

        $validacao = Validator::make(Input::all(), $regras);

        if ($validacao->fails()) {

            return Redirect::to('/produto/cadastro')->withErrors($validacao)->withInput(Input::all());
        } else {

            $produto = Product::find($id);

            $produto->suppliers_id = Input::get('fornecedores');
            $produto->nome = Input::get('nome');
            $produto->descricao = Input::get('obs');
            $produto->marca = Input::get('marca');
            $produto->modelo = Input::get('modelo');
            $produto->quantidade = Input::get('quantidade');
            $produto->valor_uni = input::get('valor_uni');

            $produto->save();
            
            return Redirect::to('produto/' . $id);
        }
    }

    public function lista() {

        $produtos = DB::table('products')
                ->join('suppliers', 'products.suppliers_id', '=', 'suppliers.id')
                ->select('products.*', 'suppliers.nome_emp')
                ->where('products.id','>', 0)
                ->paginate(10);

        return View::make('p_lista')->with('produtos', $produtos);
    }

}
