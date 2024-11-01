<?php

namespace App\Http\Controllers;

use App\Imports\ProductosImport;
use App\Models\Producto;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class ProductoController extends Controller
{
    public function productos()
    {
        $productos = Producto::all();
        return view('welcome', compact('productos'));
    }

    public function store(Request $request)
    {
        $mensaje = $this->procesando($request);
        return redirect()->route('dashboard')->banner($mensaje);
    }

    public function procesando(Request $request)
    {
        $archivo = $request->file('file');
        Excel::import(new ProductosImport, $archivo);
        return $archivo->getClientOriginalName() . ' Archivo... Se Subio Correctamente!!';
    }
}
