<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Ementa;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;

class EmentaController extends Controller
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
            return view("ementas.index", compact("ementas"));
        }
    }
}
