<?php

namespace App\Http\Controllers;
use App\User;
use App\perfil;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;

class UserController extends Controller
{
    public function index() {
        $users = User::all();
        
        foreach($users as $user) {
            $user->perfil = Perfil::find($user->perfil);
        }
        
        if (is_null($users)) {
            return redirect()->route("index")->withErrors("Erro ao carregar utilizadores. Por favor, tente mais tarde.");
        }
        else {
            return view("utilizadores.index", compact("users"));
        }
    }
    
    public function show($id) {
        $user = User::findOrFail($id); 
        
        if (is_null($user)) {
            return redirect()->route("utilizador.index")->withErrors("Erro ao carregar utilizadores. Por favor, tente novamente.");
        }
        else {
            return view("utilizadores.item", compact("user")); 
        }
    }
    
    public function edit($id) {
        $user = User::findOrFail($id);
        
        if (is_null($user)) {
            return redirect()->route("utilizador.index")->withErrors("Erro ao carregar utilizador. Por favor, tente novamente.");
        }
        else {
            return view("utilizadores.edit", compact("user"));
        }
    }
    
    public function update(Request $dados, $id) {
        $user = User::findOrFail($id);
        
        if (is_null($user)) {
            return redirect()->route("utilizador.index")->withErrors("Erro ao carregar utilizador. Por favor, tente novamente.");
        }
        else {
            $dados_user = $dados->all();
            $user->fill($dados_user)->save();
            
            return redirect()->route("utilizador.index")->with("flash_message", "Comentário atualizado com sucesso!");
        }
    }
    
    public function destroy($id) {
        $user = User::findOrFail($id);
        
        if (is_null($user)) {
            return redirect()->route("utilizador.index")->withErrors("Erro ao apagar utilizador. Por favor, tente novamente.");
        }
        else {
            $user -> delete();
            return redirect()->route("utilizador.index")->with("flash_message", "Utilizador apagado com sucesso!");
        }
    }
}
