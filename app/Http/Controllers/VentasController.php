<?php
// filepath: c:\Users\Admin\Desktop\estudio\ADMINIX\ADMINIX\app\Http\Controllers\VentasController.php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

class VentasController extends Controller
{
    public function index()
    {
        // Retorna una vista para la sección de ventas
        return view('ventas.index');
    }
}