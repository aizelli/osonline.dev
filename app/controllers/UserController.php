<?php

class UserController extends BaseController {

    public function create() {

        return View::make('u_f_cadastro');
    }

    public function store() {

        $regras = array(
            'nome' => 'required|min:3',
            'usuario' => 'required|between:4,10',
            'password' => 'required|between:6,12',
            're_password' => 'required|same:password'
        );

        $validacao = Validator::make(Input::all(), $regras);

        if ($validacao->fails()) {

            return Redirect::to('usuario/cadastro')->withErrors($validacao)->withInput(Input::except('password', 're_password'));
        } else {

            $user = new User;

            $user->nome = Input::get('nome');
            $user->usuario = Input::get('usuario');
            $user->password = Hash::make(Input::get('password'));
            $user->email = Input::get('email');
            $user->telefone_cont = Input::get('telefone');
            $user->tipo = 0;
            $user->ativo = 1;

            $user->save();

            return View::make('u_f_cadastro')->with('sucesso', TRUE)->with('usuario', $user->usuario);
        }
    }

    public function show($id) {

        $user = User::find($id);

        return View::make('u_visualiza')->with('usuario', $user);
    }

    public function edit($id) {

        $usuario = User::find($id);

        return View::make('u_f_edita')->with('usuario', $usuario);
    }

    public function update($id) {

        $regras = array(
            'nome' => 'required|min:3',
            'email' => 'required',
            'telefone' => 'required',
        );

        $validacao = Validator::make(Input::all(), $regras);

        if ($validacao->fails()) {

            return Redirect::to('usuario/' . $id . '/editar')->withErrors($validacao);
        } else {

            $user = User::find($id);

            $user->nome = Input::get('nome');
            $user->email = Input::get('email');
            $user->telefone_cont = Input::get('telefone');
            $user->ativo = Input::get('ativo');

            $user->save();

            return Redirect::to('usuario/' . $id);
        }
    }

    public function lista() {

        $users = User::paginate(10);

        return View::make('u_lista')->with('usuarios', $users);
    }
    
    public function logIn(){
        $regras = array(
            'usuario'=>'required',
            'senha'=>'required'
        );
        
        $validacao = Validator::make(Input::all(), $regras);
        
        if($validacao->fails()){
            
            return Redirect::to('/')->withErrors($validacao)->withInputs(Input::except('senha'));
        }elseif(Auth::attempt(array('usuario'=>Input::get('usuario'), 'password'=>Input::get('senha')))){
            
            return Redirect::to('/');
        }else{
            
            return Redirect::to('/')->withErrors('Usuário ou Senha inválidos')->withInputs(Input::except('senha'));
        }
    }
    
    public function logOut()
    {
        Auth::logout();
        return Redirect::to('/');
    }

}