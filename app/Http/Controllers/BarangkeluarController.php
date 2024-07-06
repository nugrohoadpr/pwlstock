<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Stock;
use App\Models\Barangkeluar;
use Illuminate\Support\Facades\DB;

class BarangkeluarController extends Controller
{
    public function index(){
        $barangkeluars = Barangkeluar::with('stock')->get();
        return view('barangkeluar.index', compact('barangkeluars'));
    }

    public function create(){
        $namastock = stock::all();
        return view('barangkeluar.form_tambah', compact('namastock'));
    }

    public function store(Request $request){
        $validatedData = $request->validate([
            'tanggal' => 'required|date',
            'nama_sepatu_id' => 'required|exists:stocks,id',
            'jenis_keluar' => 'required|string|max:16',
            'link' => 'required|string|max:256',
            'hargajual' => 'required|integer',
            'ukuran37' => 'nullable|integer|min:0',
            'ukuran38' => 'nullable|integer|min:0',
            'ukuran39' => 'nullable|integer|min:0',
            'ukuran40' => 'nullable|integer|min:0',
            'ukuran41' => 'nullable|integer|min:0',
            'ukuran42' => 'nullable|integer|min:0',
            'ukuran43' => 'nullable|integer|min:0',
            'ukuran44' => 'nullable|integer|min:0',
        ]);

        $stock = Stock::find($validatedData['nama_sepatu_id']);
        $hpp = $stock->hpp;

        $totalUnits = $validatedData['ukuran37'] + $validatedData['ukuran38'] +
                      $validatedData['ukuran39'] + $validatedData['ukuran40'] +
                      $validatedData['ukuran41'] + $validatedData['ukuran42'] +
                      $validatedData['ukuran43'] + $validatedData['ukuran44'];
        $totalHpp = $hpp * $totalUnits;
        $profit = ($validatedData['hargajual'] * $totalUnits) - $totalHpp;

        $validatedData['profit'] = $profit;
        Barangkeluar::create($validatedData);

        $stock->ukuran37 -= $validatedData['ukuran37'];
        $stock->ukuran38 -= $validatedData['ukuran38'];
        $stock->ukuran39 -= $validatedData['ukuran39'];
        $stock->ukuran40 -= $validatedData['ukuran40'];
        $stock->ukuran41 -= $validatedData['ukuran41'];
        $stock->ukuran42 -= $validatedData['ukuran42'];
        $stock->ukuran43 -= $validatedData['ukuran43'];
        $stock->ukuran44 -= $validatedData['ukuran44'];

        // Pastikan tidak ada stok yang menjadi negatif
        if ($stock->ukuran37 < 0 || $stock->ukuran38 < 0 || $stock->ukuran39 < 0 || 
            $stock->ukuran40 < 0 || $stock->ukuran41 < 0 || $stock->ukuran42 < 0 || 
            $stock->ukuran43 < 0 || $stock->ukuran44 < 0) {
            return redirect()->back()->withErrors(['error' => 'Stok tidak cukup untuk ukuran tertentu']);
        }

        // Simpan perubahan pada stok
        $stock->save();

        return redirect()->route('barangkeluar.index');
    }

    public function edit($id){
        $barangkeluar = Barangkeluar::findOrFail($id);
        $stocks = stock::all();
        return view('barangkeluar.form_edit', compact('barangkeluar', 'stocks'));
    }

    public function update(Request $request, Barangkeluar $barangkeluar){
        $validatedData = $request->validate([
            'tanggal' => 'required|date',
            'nama_sepatu_id' => 'required|exists:stocks,id',
            'jenis_keluar' => 'required|string|max:1',
            'link' => 'required|string|max:256',
            'hargajual' => 'required|integer',
            'ukuran37' => 'nullable|integer|min:0',
            'ukuran38' => 'nullable|integer|min:0',
            'ukuran39' => 'nullable|integer|min:0',
            'ukuran40' => 'nullable|integer|min:0',
            'ukuran41' => 'nullable|integer|min:0',
            'ukuran42' => 'nullable|integer|min:0',
            'ukuran43' => 'nullable|integer|min:0',
            'ukuran44' => 'nullable|integer|min:0',
        ]);

        $oldData = $barangkeluar->toArray();
        $oldUnits = $oldData['ukuran37'] + $oldData['ukuran38'] +
                    $oldData['ukuran39'] + $oldData['ukuran40'] +
                    $oldData['ukuran41'] + $oldData['ukuran42'] +
                    $oldData['ukuran43'] + $oldData['ukuran44'];

        $newUnits = $validatedData['ukuran37'] + $validatedData['ukuran38'] +
                    $validatedData['ukuran39'] + $validatedData['ukuran40'] +
                    $validatedData['ukuran41'] + $validatedData['ukuran42'] +
                    $validatedData['ukuran43'] + $validatedData['ukuran44'];

        $unitDifference = $newUnits - $oldUnits;

        // Ambil data stok dari tabel stocks
        $stock = Stock::find($validatedData['nama_sepatu_id']);
        if (!$stock) {
            return redirect()->back()->withErrors(['error' => 'Stock not found']);
        }

        $hpp = $stock->hpp;

        $totalUnits = $stock->ukuran37 + $stock->ukuran38 +
                    $stock->ukuran39 + $stock->ukuran40 +
                    $stock->ukuran41 + $stock->ukuran42 +
                    $stock->ukuran43 + $stock->ukuran44;

        $totalHpp = $hpp * $totalUnits;
        $profit = ($validatedData['hargajual'] * $unitDifference) - ($hpp * $unitDifference);

        $validatedData['profit'] = $profit;

        $barangkeluar->update($validatedData);

        $stock->ukuran37 -= $unitDifference['ukuran37'];
        $stock->ukuran38 -= $unitDifference['ukuran38'];
        $stock->ukuran39 -= $unitDifference['ukuran39'];
        $stock->ukuran40 -= $unitDifference['ukuran40'];
        $stock->ukuran41 -= $unitDifference['ukuran41'];
        $stock->ukuran42 -= $unitDifference['ukuran42'];
        $stock->ukuran43 -= $unitDifference['ukuran43'];
        $stock->ukuran44 -= $unitDifference['ukuran44'];

        if ($stock->ukuran37 < 0 || $stock->ukuran38 < 0 || $stock->ukuran39 < 0 || 
            $stock->ukuran40 < 0 || $stock->ukuran41 < 0 || $stock->ukuran42 < 0 || 
            $stock->ukuran43 < 0 || $stock->ukuran44 < 0) {
            return redirect()->back()->withErrors(['error' => 'Stok tidak cukup untuk ukuran tertentu']);
        }

        $stock->save();
        return redirect()->route('barangkeluar.index');
    }

    public function destroy(Barangkeluar $barangkeluar){
        $stock = Stock::find($barangkeluar->nama_sepatu_id);
        if (!$stock) {
            return redirect()->back()->withErrors(['error' => 'Stock not found']);
        }

        $stock->ukuran37 += $barangkeluar->ukuran37 ?? 0;
        $stock->ukuran38 += $barangkeluar->ukuran38 ?? 0;
        $stock->ukuran39 += $barangkeluar->ukuran39 ?? 0;
        $stock->ukuran40 += $barangkeluar->ukuran40 ?? 0;
        $stock->ukuran41 += $barangkeluar->ukuran41 ?? 0;
        $stock->ukuran42 += $barangkeluar->ukuran42 ?? 0;
        $stock->ukuran43 += $barangkeluar->ukuran43 ?? 0;
        $stock->ukuran44 += $barangkeluar->ukuran44 ?? 0;

        $stock->save();

        $barangkeluar->delete();

        return redirect()->route('barangkeluar.index');
    }

}
