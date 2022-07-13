<?php

namespace App\Http\Controllers;

use App\Garrafeira;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;

class AdminGarrafeiraController extends Controller
{

    public function __construct() {
        $this->middleware("auth");
    }

    public function index() {
        $garrafas = Garrafeira::all();
        
        if (is_null($garrafas)) {
            return redirect()->route("index")->withErrors("Erro ao carregar garrafas. Por favor, tente mais tarde.");
        }
        else {
            return view("garrafas.adminindex", compact("garrafas"));
        }
    }
    
    public function create() {
        return view("garrafas.create");
    }
    
    public function store(Request $dados) {

        $imagem = "http://localhost/donamaria/storage/app/";
        $garrafa = Garrafeira::create([
                'nome' => Request("nome"),
                'regiao' => Request("regiao"),
                'tipo' => Request("tipo"),
                'ano' => Request("ano"),
                'descricao' => Request("descricao"),
                'preco' => Request("preco"),
                'img' => $imagem.Request('img')->store('local')
            ]);
        
        if (is_null($garrafa)) {
            return redirect()->route("index")->withErrors("Erro ao criar garrafa. Por favor, tente novamente.");
        }
        else {
            return Redirect::route("admingarrafeira.index")->with("Garrafa inserida com sucesso!");
        }
    }
    
    public function show($id) {
        $garrafa = Garrafeira::findOrFail($id); 
        
        if (is_null($garrafa)) {
            return redirect()->route("admingarrafeira.index")->withErrors("Erro ao carregar garrafa. Por favor, tente novamente.");
        }
        else {
            return view("garrafas.item", compact("garrafa")); 
        }
    }
    
    public function edit($id) {
        $garrafa = Garrafeira::findOrFail($id);
        
        if (is_null($garrafa)) {
            return redirect()->route("admingarrafeira.index")->withErrors("Erro ao carregar garrafa. Por favor, tente novamente.");
        }
        else {
            return view("garrafas.edit", compact("garrafa"));
        }
    }
    
    public function update(Request $dados, $id) {
        $garrafa = Garrafeira::findOrFail($id);
        
        if (is_null($garrafa)) {
            return redirect()->route("admingarrafeira.index")->withErrors("Erro ao carregar garrafa. Por favor, tente novamente.");
        }
        else {
            $dados_garrafa = $dados->all();
            $garrafa->fill($dados_garrafa)->save();
            
            return redirect()->route("admingarrafeira.index")->with("flash_message", "Garrafa atualizado com sucesso!");
        }
    }
    
    public function destroy($id) {
        $garrafa = Garrafeira::findOrFail($id);
        
        if (is_null($garrafa)) {
            return redirect()->route("admingarrafeira.index")->withErrors("Erro ao apagar garrafa. Por favor, tente novamente.");
        }
        else {
            $garrafa -> delete();
            return redirect()->route("admingarrafeira.index")->with("flash_message", "Garrafa apagada com sucesso!");
        }
    }
}
