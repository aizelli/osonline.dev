<?php

/*
  |--------------------------------------------------------------------------
  | Application Routes
  |--------------------------------------------------------------------------
  |
  | Here is where you can register all of the routes for an application.
  | It's a breeze. Simply tell Laravel the URIs it should respond to
  | and give it the Closure to execute when that URI is requested.
  |
 */

Route::get('/', 'HomeController@showLogin');
Route::post('/login/usuario', 'UserController@logIn');



Route::group(array('before' => 'auth'), function() {
        
        //Rotas para Cadastro, Visualização e Atualização de USUÁRIOS (USERS)
        Route::get('/usuario/cadastro', 'UserController@create');
        Route::post('/usuario/cadastro', 'UserController@store');
        Route::get('/usuarios', 'UserController@lista');
        Route::get('/usuario/{id}', 'UserController@show');
        Route::get('/usuario/{id}/editar', 'UserController@edit');
        Route::put('/usuario/{id}', 'UserController@update');
        Route::get('/logout/usuario', 'UserController@logOut');

        //Rotas para Cadastro, Visualização e Atualização de CLIENTES (CUSTOMERS)
        Route::get('/cliente/cadastro', 'CustomerController@create');
        Route::post('/cliente/cadastro', 'CustomerController@store');
        Route::get('/clientes', 'CustomerController@lista');
        Route::get('/cliente/{id}', 'CustomerController@show');
        Route::get('/cliente/{id}/editar', 'CustomerController@edit');
        Route::put('/cliente/{id}', 'CustomerController@update');

        //Rotas para Cadastro, Visualização e Atualização de FORNECEDORES (SUPPLIERS)
        Route::get('/fornecedor/cadastro', 'SupplierController@create');
        Route::post('/fornecedor/cadastro', 'SupplierController@store');
        Route::get('/fornecedores', 'SupplierController@lista');
        Route::get('/fornecedor/{id}', 'SupplierController@show');
        Route::get('/fornecedor/{id}/editar', 'SupplierController@edit');
        Route::put('/fornecedor/{id}', 'SupplierController@update');

        //Rotas para Cadastro, Visualização e Atualização de FUNCIONÁRIOS (EMPLYEERS)
        Route::get('/funcionario/cadastro', 'EmployeeController@create');
        Route::post('/funcionario/cadastro', 'EmployeeController@store');
        Route::get('/funcionarios', 'EmployeeController@lista');
        Route::get('/funcionario/{id}', 'EmployeeController@show');
        Route::get('/funcionario/{id}/editar', 'EmployeeController@edit');
        Route::put('/funcionario/{id}', 'EmployeeController@update');

        //Rotas para Cadastro, Visualização e Atualização de SERVIÇOS (JOBS)
        Route::get('/servico/cadastro', 'JobController@create');
        Route::post('/servico/cadastro', 'JobController@store');
        Route::get('/servicos', 'JobController@lista');
        Route::get('/servico/{id}', 'JobController@show');
        Route::get('/servico/{id}/editar', 'JobController@edit');
        Route::put('/servico/{id}', 'JobController@update');

        //Rotas para Cadastro, Visualização e Atualização de PRODUTOS (PRODUCTS)
        Route::get('/produto/cadastro', 'ProductController@create');
        Route::post('/produto/cadastro', 'ProductController@store');
        Route::get('/produtos', 'ProductController@lista');
        Route::get('/produto/{id}', 'ProductController@show');
        Route::get('/produto/{id}/editar', 'ProductController@edit');
        Route::put('/produto/{id}', 'ProductController@update');

        //Rotas para ORDEM DE SERVIÇO (ORDERS)
        Route::get('/ordem/cadastro', 'OrderController@create');
        Route::post('/ordem/cadastro', 'OrderController@store');
        Route::get('/ordem/{id}/adicionar/itens', 'OrderController@adicionaItens');
        Route::get('/ordem/{id}/cadastro/itens', 'ItemController@addItems');
        Route::post('/ordem/{id}/cadastro/item', 'ItemController@gravaItems');
        Route::post('/ordem/{id}/fechar', 'OrderController@fecharOrdem');
        Route::delete('/ordem/{id}/cancelar', 'OrderController@destroy');
        Route::get('/ordem/{id}/imprimir', 'OrderController@imprimeOrdem');
        Route::get('/ordens', 'OrderController@lista');
    });

