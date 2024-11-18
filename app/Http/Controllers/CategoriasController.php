<?php

namespace App\Http\Controllers;

use App\Models\Categorias;
use Illuminate\Http\Request;
use PHPUnit\Event\TestSuite\Loaded;
use Barryvdh\DomPDF\Facade\Pdf;

class CategoriasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categorias = Categorias::all(); 
        return view('categorias.index', compact('categorias'));
    }

    //public function pdf(){
        //return view('categorias.pdf');
        
        
    //}
    public function pdf()
    {
        $categorias = Categorias::all();
        $pdf = Pdf::loadView('categorias.pdf', compact('categorias'));
        return $pdf->stream('categorias.pdf');
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('categorias.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:50',
            'marca' => 'nullable|string|max:50',
        ]);

        Categorias::create($request->all()); 
        return redirect()->route('admin.categorias.index')->with('success', 'Categoría creada exitosamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Categorias $categoria)
    {
        return view('categorias.show', compact('categoria')); 
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Categorias $categoria)
    {
        return view('categorias.edit', compact('categoria'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Categorias $categoria)
    {
        $request->validate([
            'nombre' => 'required|string|max:50',
            'marca' => 'nullable|string|max:50',
        ]);

        $categoria->update($request->all()); 
        return redirect()->route('admin.categorias.index')->with('success', 'Categoría actualizada exitosamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Categorias $categoria)
    {
        $categoria->delete(); 
        return redirect()->route('admin.categorias.index')->with('success', 'Categoría eliminada exitosamente.');
    }
}
