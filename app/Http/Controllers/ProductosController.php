<?php

namespace App\Http\Controllers;
use App\Models\Productos;
use App\Models\Categorias;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Storage;


class ProductosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $productos = Productos::with('categoria')->get(); 
        return view('productos.index', compact('productos'));
    }

    public function pdf()
    {
        $productos = Productos::all();
        $pdf = Pdf::loadView('productos.pdf', compact('productos'));
        return $pdf->stream('productos.pdf'); 
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categorias = Categorias::all(); 
        return view('productos.create', compact('categorias'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    Log::info('Request Data:', $request->all());

    $request->validate([
        'Codigo_serie' => 'required|string|max:255',
        'Descripcion' => 'required|string',
        'cantidad' => 'required|integer|min:1',
        'precio' => 'required|numeric|min:0',
        'categoria_id' => 'required|exists:categorias,id',
        'imagen' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
    ]);

    $productoData = $request->except('imagen');
    $producto = Productos::create($productoData);

    if ($request->hasFile('imagen')) {
        $nombre = $producto->id . '.' . $request->file('imagen')->getClientOriginalExtension();
        $path = $request->file('imagen')->storeAs('public/img', $nombre);
        $producto->imagen = '/storage/img/' . $nombre; // Save the image path
        $producto->save();
    }

    return redirect()->route('admin.productos.index')->with('success', 'Producto creado exitosamente.');
}

    /**
     * Display the specified resource.
     */
    public function show(Productos $producto)
    {
        return view('productos.show', compact('producto'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Productos $producto)
    {
        $categorias = Categorias::all(); 
        return view('productos.edit', compact('producto', 'categorias'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Productos $producto)
    {
        Log::info('Request Data:', $request->all());

        $request->validate([
            'Codigo_serie' => 'required|string|max:50',
            'Descripcion' => 'required|string|max:120',
            'cantidad' => 'required|integer',
            'precio' => 'required|numeric',
            'imagen' => 'nullable|image|max:2048', 
            'categoria_id' => 'required|exists:categorias,id', 
        ]);

        if ($request->hasFile('imagen')) {
            $nombre = $producto->id . '.' . $request->file('imagen')->getClientOriginalExtension();
            $path = $request->file('imagen')->storeAs('public/img', $nombre);
            $producto->imagen = '/storage/img/' . $nombre; 
        }

        $producto->update($request->except('imagen')); 

        return redirect()->route('admin.productos.index')->with('success', 'Producto actualizado exitosamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Productos $producto)
    {
        $producto->delete();

        return redirect()->route('admin.productos.index')->with('success', 'Producto eliminado exitosamente.');
    }
}