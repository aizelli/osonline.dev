<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of OrderController
 *
 * @author alexandre
 */
class OrderController extends BaseController {

    public function create() {

        $cliente = Customer::where('ativo', '=', 1)->orderBy('id')->lists('nome', 'id');
        $funcionario = Employee::where('ativo', '=', 1)->orderBy('id')->lists('nome', 'id');

        return View::make('o_f_cadastro')->with('clientes', $cliente)->with('funcionarios', $funcionario);
    }

    public function store() {

        $regras = array(
            'clientes' => 'required',
            'funcionarios' => 'required'
        );

        $validacao = Validator::make(Input::all(), $regras);

        if ($validacao->fails()) {

            return Redirect::to('/ordem/cadastro')->withErrors($validacao)->withInput(Input::all());
        } else {

            $ordem = new Order;
            
            $ordem->usuario = Auth::user()->usuario;
            $ordem->customers_id = Input::get('clientes');
            $ordem->employees_id = Input::get('funcionarios');
            $ordem->observacao = Input::get('produto');
            $ordem->total = 0;
            $ordem->aberta = 1;

            $ordem->save();

            return Redirect::to('/ordem/' . $ordem->id . '/adicionar/itens');
        }
    }

    public function adicionaItens($id) {

        $itens = DB::table('items')
                ->join('products', 'items.products_id', '=', 'products.id')
                ->join('jobs', 'items.jobs_id', '=', 'jobs.id')
                ->select('items.*', 'products.nome', 'products.marca', 'products.modelo', 'products.valor_uni as valor_pro', 'jobs.titulo', 'jobs.valor_uni as valor_ser')
                ->where('orders_id', '=', $id)
                ->get();

        $ordem = Order::find($id);
        $cliente = Customer::where('id', '=', $ordem->customers_id)->lists('nome', 'id');
        $funcionario = Employee::where('id', '=', $ordem->employees_id)->lists('nome', 'id');

        return View::make('i_f_cadastro')
                        ->with('cod', $id)
                        ->with('clientes', $cliente)
                        ->with('funcionarios', $funcionario)
                        ->with('itens', $itens);
    }

    public function fecharOrdem($id) {

        $ordem = Order::find($id);
        $ordem->aberta = 0;

        $ordem->save();

        return Redirect::to('/ordem/cadastro');
    }

    public function destroy($id) {

        $ordem = Order::find($id);
        $ordem->delete();

        return Redirect::to('/ordem/cadastro');
    }

    public function imprimeOrdem($id) {

        $itens = DB::table('items')
                ->join('products', 'items.products_id', '=', 'products.id')
                ->join('jobs', 'items.jobs_id', '=', 'jobs.id')
                ->select('items.*', 'products.nome', 'products.marca', 'products.modelo', 'products.valor_uni as valor_pro', 'jobs.titulo', 'jobs.valor_uni as valor_ser')
                ->where('orders_id', '=', $id)
                ->get();

        $ordem = Order::find($id);
        $cliente = Customer::where('id', '=', $ordem->customers_id)->get();
        $funcionario = Employee::where('id', '=', $ordem->employees_id)->get();

        return View::make('o_imprime')
                        ->with('cod', $id)
                        ->with('cliente', $cliente)
                        ->with('funcionario', $funcionario)
                        ->with('itens', $itens)
                        ->with('ordem', $ordem);
    }

    public function lista() {

        $ordens = DB::table('orders')
                ->join('customers', 'orders.customers_id', '=', 'customers.id')
                ->join('employees', 'orders.employees_id', '=', 'employees.id')
                ->select('orders.*', 'customers.nome as nome_cli', 'employees.nome as nome_fun')
                ->orderBy('id')
                ->paginate('10');
        
        return View::make('o_lista')->with('ordens', $ordens);
    }
    
    

}
