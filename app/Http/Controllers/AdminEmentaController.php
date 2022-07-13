<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Ementa;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;

class AdminEmentaController extends Controller
{

    public function __construct() {
        $this->middleware("auth");
    }

    public function index() {
        $ementas = Ementa::all();
        
        if (is_null($ementas)) {
            return redirect()->route("index")->withErrors("Erro ao carregar ementas. Por favor, tente mais tarde.");
        }
        else {
            return view("ementas.adminindex", compact("ementas"));
        }
    }
    
    public function create() {
        return view("ementas.create");
    }
    
    public function store(Request $dados) {
        /*$ementa = Ementa::create($dados->all());*/
        $imagem = "http://localhost/donamaria/storage/app/";
        $ementa = Ementa::create([
                'nome' => Request("nome"),
                'descricao' => Request("descricao"),
                'preco' => Request("preco"),
                'img' => $imagem.Request('img')->store('local')
            ]);
        
        if (is_null($ementa)) {
            return redirect()->route("index")->withErrors("Erro ao criar ementa. Por favor, tente novamente.");
        }
        else {
            return Redirect::route("adminementa.index")->with("Marca inserida com sucesso!");
        }
    }
    
    public function show($id) {
        $ementa = Ementa::findOrFail($id); 
        
        if (is_null($ementa)) {
            return redirect()->route("adminementa.index")->withErrors("Erro ao carregar ementa. Por favor, tente novamente.");
        }
        else {
            return view("ementas.item", compact("ementa")); 
        }
    }
    
    public function edit($id) {
        $ementa = Ementa::findOrFail($id);
        
        if (is_null($ementa)) {
            return redirect()->route("adminementa.index")->withErrors("Erro ao carregar ementa. Por favor, tente novamente.");
        }
        else {
            return view("ementas.edit", compact("ementa"));
        }
    }
    
    public function update(Request $dados, $id) {
        $ementa = Ementa::findOrFail($id);
        
        if (is_null($ementa)) {
            return redirect()->route("adminementa.index")->withErrors("Erro ao carregar ementa. Por favor, tente novamente.");
        }
        else {
            $dados_ementa = $dados->all();
            $ementa->fill($dados_ementa)->save();
            
            return redirect()->route("adminementa.index")->with("flash_message", "Ementa atualizado com sucesso!");
        }
    }
    
    public function destroy($id) {
        $ementa = Ementa::findOrFail($id);
        
        if (is_null($ementa)) {
            return redirect()->route("adminementa.index")->withErrors("Erro ao apagar ementa. Por favor, tente novamente.");
        }
        else {
            $ementa -> delete();
            return redirect()->route("adminementa.index")->with("flash_message", "Ementa apagada com sucesso!");
        }
    }
}
