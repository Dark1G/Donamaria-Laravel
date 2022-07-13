<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use App\Pedido;
use App\User;
use App\Ementa;
use App\Garrafeira;

class PedidoController extends Controller
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
            return redirect()->route("empresa")->withErrors("Erro ao carregar pedidos. Por favor, tente mais tarde.");
        }
        else {
            return view("pedidos.index", compact("pedidos"));
        }
    }
    
    public function create() {
        $ementas = Ementa::all();
        $garrafas = Garrafeira::all();
        
        return view("pedidos.create", compact("ementas", "garrafas"));
    }
    
    public function store(Request $dados) {

        $pedido = Pedido::create($dados->all());

        if(is_null($pedido)) {
            return redirect()->route("pedido.index")->withErrors("Erro ao criar pedido. Por favor, tente novamente.");  
        }
        else {
            return redirect()->route("pedido.index")->with("Pedido feito com sucesso!");
        }
    }
    
    public function show($id) {
        $pedido = Pedido::findOrFail($id); 
        $pedido->ementa = Ementa::find($pedido->ementa); 
        $pedido->garrafa = Garrafeira::find($pedido->garrafa);
        
        if (is_null($pedido)) {
            return redirect()->route("pedido.index")->withErrors("Erro ao carregar pedido. Por favor, tente novamente.");
        }
        else {
            return view("pedidos.item", compact("pedido")); 
        }
    }
    
    public function edit($id) {
        $pedido = Pedido::findOrFail($id);
        
        if (is_null($pedido)) {
            return redirect()->route("pedido.index")->withErrors("Erro ao carregar pedido. Por favor, tente novamente.");
        }
        else {
            $ementas = Ementa::all(); 
            $garrafas = Garrafeira::all();
            
            return view("pedidos.edit", compact("pedido", "ementas", "garrafas"));
        }
    }
    
    public function update(Request $dados, $id) {
        $pedido = Pedido::findOrFail($id);
        
        if (is_null($pedido)) {
            return redirect()->route("pedido.index")->withErrors("Erro ao carregar pedido. Por favor, tente novamente.");
        }
        else {
            $dados_pedido = $dados->all();
            $pedido->fill($dados_pedido)->save();
            
            return redirect()->route("pedido.index")->with("flash_message", "Pedido atualizado com sucesso!");
        }
    }
    
    public function destroy($id) {
        $pedido = Pedido::findOrFail($id);
        
        if (is_null($pedido)) {
            return redirect()->route("pedido.index")->withErrors("Erro ao apagar pedido. Por favor, tente novamente.");
        }
        else {
            $pedido -> delete();
            return redirect()->route("pedido.index")->with("flash_message", "Pedido apagado com sucesso!");
        }
    }
}
