<?php

namespace App\Http\Controllers;

use App\Models\Fruta; 
use Illuminate\Http\Request;

class FrutaController extends Controller
{
    
    public function index()
    {
        $frutas = Fruta::all();
        return view('frutas.index', compact('frutas'));
    }

    
    public function create()
    {
        return view('frutas.create');
    }

   
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nombre' => 'required', 
            'color' => 'required',
            'precio' => 'required|numeric',
        ]);
    
        $fruta = Fruta::create($validatedData);
    
        return redirect('/frutas');
    }

    
    public function show($id)
    {
        $fruta = Fruta::findOrFail($id);
        return view('frutas.show', compact('fruta'));
    }

    
    public function edit($id)
    {
        $fruta = Fruta::findOrFail($id);
        return view('frutas.edit', compact('fruta'));
    }

    
    public function update(Request $request, $id)
    {
        $fruta = Fruta::findOrFail($id);
        $fruta->update($request->all());
        return redirect()->route('frutas.index');
    }

    
    public function destroy($id)
    {
        $fruta = Fruta::find($id);
        if($fruta){
            $fruta->delete();
            return redirect()->route('frutas.index')->with('success', 'Fruta eliminada con éxito');
        } else {
            return redirect()->route('frutas.index')->with('error', 'Fruta no encontrada');
        }
    }
}
