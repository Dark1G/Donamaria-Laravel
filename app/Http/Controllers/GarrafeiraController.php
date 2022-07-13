<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Garrafeira;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;

class GarrafeiraController extends Controller
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
            return view("garrafas.index", compact("garrafas"));
        }
    }
}
