<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

class InventarioController extends Controller
{
    public function index()
    {
        // Retorna una vista para la sección de inventario
        return view('inventario.index');
    }
}