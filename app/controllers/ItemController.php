<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ItemController
 *
 * @author alexandre
 */
class ItemController extends BaseController {

    public function addItems($id) {

        $servicos = Job::where('ativo', '=', 1)->orderBy('id')->lists('titulo', 'id');
        $produtos = Product::select('id', 'nome', 'marca', 'modelo')->where('quantidade', '>', 0)->get();

        return View::make('i_cadastro_itens')->with('servicos', $servicos)->with('produtos', $produtos)->with('cod', $id);
    }

    public function gravaItems($id) {

        $servicos = Job::where('ativo', '=', 1)->orderBy('id')->lists('titulo', 'id');
        $produtos = Product::select('id', 'nome', 'marca', 'modelo')->where('quantidade', '>', 0)->get();
        
        if (Input::get('item') == 'p') {
            $quant = Product::select('quantidade')->where('id', '=', Input::get('produto'))->get();

            foreach ($quant as $value) {
                if (Input::get('quantidade') < 1) {

                    return View::make('i_cadastro_itens')->withErrors('Quantidade deve ser maior que 0.')->with('servicos', $servicos)->with('produtos', $produtos)->with('cod', $id);
                } elseif (Input::get('quantidade') > $value->quantidade) {

                    return View::make('i_cadastro_itens')->withErrors('Quantidade do estoque insuficiente.')->with('servicos', $servicos)->with('produtos', $produtos)->with('cod', $id);
                } else {
                    $item = new Item;

                    $item->orders_id = $id;

                    $item->products_id = Input::get('produto');
                    $item->jobs_id = 0;
                    $item->tipo = Input::get('item');

                    $item->quantidade = Input::get('quantidade');

                    $item->save();
                    
                    $produto = Product::find(Input::get('produto'));
                    $produto->quantidade = $produto->quantidade - Input::get('quantidade');
                    
                    $produto->save();
                    
                    return Redirect::to('/ordem/' . $id . '/adicionar/itens');
                }
            }
        } elseif (Input::get('item') == 's') {
            $item = new Item;

            $item->orders_id = $id;

            $item->jobs_id = Input::get('servico');
            $item->products_id = 0;
            $item->tipo = Input::get('item');

            $item->quantidade = Input::get('quantidade');

            $item->save();
            
            return Redirect::to('/ordem/' . $id . '/adicionar/itens');
        }else{
            return View::make('i_cadastro_itens')->withErrors('Selecione um tipo item.')->with('servicos', $servicos)->with('produtos', $produtos)->with('cod', $id);
        }
    }

}
