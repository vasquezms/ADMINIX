<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class gestionProductosController extends Controller
{
    public function index()
    {
        // Retorna una vista para la sección de gestion-productos
        return view('gestionProductos.index');
    }
}