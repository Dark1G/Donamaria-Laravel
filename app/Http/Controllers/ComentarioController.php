<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use App\User;
use App\Comentario;

class ComentarioController extends Controller
{
    public function index() {
        $comentarios = Comentario::all();
        
        foreach($comentarios as $comentario) {
            $comentario->user = User::find($comentario->user);
        }
        
        if (is_null($comentarios)) {
            return redirect()->route("index")->withErrors("Erro ao carregar comentários. Por favor, tente mais tarde.");
        }
        else {
            return view("comentarios.index", compact("comentarios"));
        }
    }
    
    public function create() {
    	
        
        return view("comentarios.create", compact("comentarios"));
    }
    
    public function store(Request $dados) {
        $comentario = Comentario::create($dados->all());
        
        if(is_null($comentario)) {
            return redirect()->route("comentario.index")->withErrors("Erro ao criar comentário. Por favor, tente novamente.");  
        }
        else {
            return redirect()->route("comentario.index")->with("Comentario feito com sucesso!");
        }
    }
    
    public function show($id) {
        $comentario = Comentario::findOrFail($id); 
        
        if (is_null($comentario)) {
            return redirect()->route("comentario.index")->withErrors("Erro ao carregar comentário. Por favor, tente novamente.");
        }
        else {
            return view("comentarios.item", compact("comentario")); 
        }
    }
    
    public function edit($id) {
        $comentario = Comentario::findOrFail($id);
        
        if (is_null($comentario)) {
            return redirect()->route("comentario.index")->withErrors("Erro ao carregar comentário. Por favor, tente novamente.");
        }
        else {
            return view("comentarios.edit", compact("comentario", "users"));
        }
    }
    
    public function update(Request $dados, $id) {
        $comentario = Comentario::findOrFail($id);
        
        if (is_null($comentario)) {
            return redirect()->route("comentario.index")->withErrors("Erro ao carregar comentario. Por favor, tente novamente.");
        }
        else {
            $dados_comentario = $dados->all();
            $comentario->fill($dados_comentario)->save();
            
            return redirect()->route("comentario.index")->with("flash_message", "Comentário atualizado com sucesso!");
        }
    }
    
    public function destroy($id) {
        $comentario = Comentario::findOrFail($id);
        
        if (is_null($comentario)) {
            return redirect()->route("comentario.index")->withErrors("Erro ao apagar comentário. Por favor, tente novamente.");
        }
        else {
            $comentario -> delete();
            return redirect()->route("comentario.index")->with("flash_message", "Comentário apagado com sucesso!");
        }
    }
}
