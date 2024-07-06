<?php

namespace App\Http\Controllers;
use App\Models\Stock;

use Illuminate\Http\Request;

class StockController extends Controller
{
    public function index(){
        $stocks = stock::all();
        return view('stock.index', compact('stocks'));
    }

    public function create(){
        return view('stock.form_tambah');
    }

    public function store(Request $req){
        $isi = [
            'nama_sepatu'=> $req->input('nama_sepatu') . " " . $req->input('warna'),
            'hpp'=> $req->input('hpp'),
            'ukuran37'=> $req->input('ukuran37' ?? 0),
            'ukuran38'=> $req->input('ukuran38' ?? 0),
            'ukuran39'=> $req->input('ukuran39' ?? 0),
            'ukuran40'=> $req->input('ukuran40' ?? 0),
            'ukuran41'=> $req->input('ukuran41' ?? 0),
            'ukuran42'=> $req->input('ukuran42' ?? 0),
            'ukuran43'=> $req->input('ukuran43' ?? 0),
            'ukuran44'=> $req->input('ukuran44' ?? 0),
        ];
        stock::create($isi);
        return redirect()->route('stock.index');
    }

    public function edit(Stock $stock){
        return view('stock.form_edit', compact('stock'));
    }

    public function update(Request $req, Stock $stock){
        $isi = [
            'nama_sepatu'=> $req->input('nama_sepatu'),
            'hpp'=> $req->input('hpp'),
            'ukuran37'=> $req->input('ukuran37' ?? 0),
            'ukuran38'=> $req->input('ukuran38' ?? 0),
            'ukuran39'=> $req->input('ukuran39' ?? 0),
            'ukuran40'=> $req->input('ukuran40' ?? 0),
            'ukuran41'=> $req->input('ukuran41' ?? 0),
            'ukuran42'=> $req->input('ukuran42' ?? 0),
            'ukuran43'=> $req->input('ukuran43' ?? 0),
            'ukuran44'=> $req->input('ukuran44' ?? 0),
        ];
        $stock->update($isi);
        return redirect()->route('stock.index');
    }

    public function destroy($id){
        $operational = Operational::findOrFail($id);
        $operational->delete();
        return redirect()->route('operational.index');
    }
}
