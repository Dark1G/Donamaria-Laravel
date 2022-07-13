<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use App\Pedido;
use App\User;
use App\Ementa;
use App\Garrafeira;

class AdminPedidoController extends Controller
{
    public function __construct() {
        $this->middleware("auth");
    }
    
    public function index() {
        $pedidos = Pedido::all();
        
        foreach($pedidos as $pedido) {
            $pedido->user = User::find($pedido->user);
            $pedido->ementa = Ementa::find($pedido->ementa);
            $pedido->garrafa = Garrafeira::find($pedido->garrafa);
        }
        
        if (is_null($pedidos)) {
            return redirect()->route("index")->withErrors("Erro ao carregar pedidos. Por favor, tente mais tarde.");
        }
        else {
            return view("pedidos.adminindex", compact("pedidos"));
        }
    }

    public function destroy($id) {
        $pedido = Pedido::findOrFail($id);
        
        if (is_null($pedido)) {
            return redirect()->route("pedido.adminindex")->withErrors("Erro ao apagar pedido. Por favor, tente novamente.");
        }
        else {
            $pedido -> delete();
            return redirect()->route("pedido.adminindex")->with("flash_message", "Pedido apagado com sucesso!");
        }
    }
}
