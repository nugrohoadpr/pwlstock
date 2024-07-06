<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Operational;

class OperationalController extends Controller
{
    public function index(){
        $operational = operational::all();
        return view('operational.index', compact('operational'));
    }

    public function create(){
        return view('operational.form_tambah');
    }

    public function store(Request $request)
    {
        // Validasi input
        $validatedData = $request->validate([
            'tanggal' => 'required|date',
            'nama' => 'required|string|max:32',
            'biaya' => 'required|integer|min:1',
            'keterangan' => 'required|string|max:128',
        ]);
        Operational::create($validatedData);
        return redirect()->route('operational.index');
    }

    public function edit(Operational $operational){
        return view('operational.form_edit', compact('operational'));
    }

    public function update(Request $request, Operational $operational){
        $isi = $request->validate([
            'tanggal' => 'required|date',
            'nama' => 'required|string|max:32',
            'biaya' => 'required|integer|min:1',
            'keterangan' => 'required|string|max:128',
        ]);
        $operational->update($isi);
        return redirect()->route('operational.index');
    }

    
}
