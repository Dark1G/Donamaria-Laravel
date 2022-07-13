<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;

class PageController extends Controller
{
    public function index() {
        return view("index");
    }
    
    public function empresa() {
        return view("pages.empresa");
    }

    public function galeria() {
        return view("pages.galeria");
    }

    public function contactos() {
        return view("pages.contactos");
    }

    public function admin() {
        return view("login");
    }
}
