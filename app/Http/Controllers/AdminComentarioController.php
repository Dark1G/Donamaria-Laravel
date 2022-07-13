<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use App\User;
use App\Comentario;

class AdminComentarioController extends Controller
{

    public function __construct() {
        $this->middleware("auth");
    }

    public function index() {
        $comentarios = Comentario::all();
        
        foreach($comentarios as $comentario) {
            $comentario->user = User::find($comentario->user);
        }
        
        if (is_null($comentarios)) {
            return redirect()->route("index")->withErrors("Erro ao carregar comentários. Por favor, tente mais tarde.");
        }
        else {
            return view("comentarios.adminindex", compact("comentarios"));
        }
    }

    public function destroy($id) {
        $comentario = Comentario::findOrFail($id);
        
        if (is_null($comentario)) {
            return redirect()->route("admincomentario.index")->withErrors("Erro ao apagar comentário. Por favor, tente novamente.");
        }
        else {
            $comentario -> delete();
            return redirect()->route("admincomentario.index")->with("flash_message", "Comentário apagado com sucesso!");
        }
    }
}
