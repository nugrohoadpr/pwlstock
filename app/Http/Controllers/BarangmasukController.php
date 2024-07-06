<?php

namespace App\Http\Controllers;
use App\Models\Stock;
use App\Models\Barangmasuk;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class BarangmasukController extends Controller
{
    public function index(){
        $barangmasuks = Barangmasuk::with('stock')->get();
        return view('barangmasuk.index', compact('barangmasuks'));
    }

    public function create(){
        $namastock = stock::all();
        return view('barangmasuk.form_tambah', compact('namastock'));
    }

    public function store(Request $request){
        // Validasi input
        $validatedData = $request->validate([
            'nama_sepatu_id' => 'required|exists:stocks,id',
            'type' => 'required|string|in:RETUR,NEW',
            'ukuran37' => 'nullable|integer|min:0',
            'ukuran38' => 'nullable|integer|min:0',
            'ukuran39' => 'nullable|integer|min:0',
            'ukuran40' => 'nullable|integer|min:0',
            'ukuran41' => 'nullable|integer|min:0',
            'ukuran42' => 'nullable|integer|min:0',
            'ukuran43' => 'nullable|integer|min:0',
            'ukuran44' => 'nullable|integer|min:0',
        ]);
        $barangMasuk = BarangMasuk::create($validatedData);

        $stock = Stock::find($validatedData['nama_sepatu_id']);
        if ($stock) {
            $stock->increment('ukuran37', $validatedData['ukuran37'] ?? 0);
            $stock->increment('ukuran38', $validatedData['ukuran38'] ?? 0);
            $stock->increment('ukuran39', $validatedData['ukuran39'] ?? 0);
            $stock->increment('ukuran40', $validatedData['ukuran40'] ?? 0);
            $stock->increment('ukuran41', $validatedData['ukuran41'] ?? 0);
            $stock->increment('ukuran42', $validatedData['ukuran42'] ?? 0);
            $stock->increment('ukuran43', $validatedData['ukuran43'] ?? 0);
            $stock->increment('ukuran44', $validatedData['ukuran44'] ?? 0); 
            $stock->save();
        } else {
            return redirect()->route('barangmasuk.index')->withErrors('Stok tidak ditemukan.');
        }
    
        return redirect()->route('barangmasuk.index');
    }

    public function edit($id){
        $barangmasuk = Barangmasuk::findOrFail($id);
        $stock = stock::all();
        return view('barangmasuk.form_edit', compact('barangmasuk', 'stock'));
    }

    public function update(Request $request, BarangMasuk $barangmasuk){
        DB::beginTransaction();
    
        try {
            $validatedData = $request->validate([
                'nama_sepatu_id' => 'required|exists:stocks,id',
                'type' => 'required|string|in:RETUR,NEW',
                'ukuran37' => 'nullable|integer|min:0',
                'ukuran38' => 'nullable|integer|min:0',
                'ukuran39' => 'nullable|integer|min:0',
                'ukuran40' => 'nullable|integer|min:0',
                'ukuran41' => 'nullable|integer|min:0',
                'ukuran42' => 'nullable|integer|min:0',
                'ukuran43' => 'nullable|integer|min:0',
                'ukuran44' => 'nullable|integer|min:0',
            ]);
    
            // Simpan data asli sebelum diperbarui
            $originalData = $barangmasuk->only(['ukuran37', 'ukuran38', 'ukuran39', 'ukuran40', 'ukuran41', 'ukuran42', 'ukuran43', 'ukuran44']);
            
            // Perbarui data barang masuk
            $barangmasuk->update($validatedData);
    
            // Temukan stok yang terkait berdasarkan nama_sepatu_id
            $stock = Stock::find($validatedData['nama_sepatu_id']);
            if (!$stock) {
                DB::rollBack();
                return redirect()->route('barangmasuk.index')->withErrors('Stok tidak ditemukan.');
            }
    
            for ($i = 37; $i <= 44; $i++) {
                $key = 'ukuran' . $i;
    
                $newQty = $validatedData[$key] ?? 0;
                $oldQty = $originalData[$key] ?? 0;
    
                $diff = $newQty - $oldQty;
                
                if ($diff != 0) {
                    // Cek apakah pengurangan stok memungkinkan
                    if ($diff < 0 && $stock->$key < abs($diff)) {
                        DB::rollBack();
                        return redirect()->route('barangmasuk.index')->withErrors("Stok untuk ukuran $i tidak cukup untuk dikurangi.");
                    }
                    // Perbarui stok
                    $stock->increment($key, $diff);
                }
            }
    
            // Simpan perubahan stok
            $stock->save();
    
            // Commit transaksi
            DB::commit();
    
            return redirect()->route('barangmasuk.index')->with('success', 'Data berhasil diperbarui dan stok terupdate');
        } catch (\Exception $e) {
            // Rollback transaksi jika terjadi kesalahan
            DB::rollBack();
            return redirect()->route('barangmasuk.index')->withErrors('Terjadi kesalahan saat memperbarui data barang masuk.');
        }
    }
    
    
    public function destroy($id){
        DB::beginTransaction();

        try {
            // Temukan barang masuk berdasarkan ID
            $barangmasuk = Barangmasuk::findOrFail($id);

            // Ambil data ukuran dari barang masuk yang akan dihapus
            $namaSepatuId = $barangmasuk->nama_sepatu_id;
            $ukuran37 = $barangmasuk->ukuran37;
            $ukuran38 = $barangmasuk->ukuran38;
            $ukuran39 = $barangmasuk->ukuran39;
            $ukuran40 = $barangmasuk->ukuran40;
            $ukuran41 = $barangmasuk->ukuran41;
            $ukuran42 = $barangmasuk->ukuran42;
            $ukuran43 = $barangmasuk->ukuran43;
            $ukuran44 = $barangmasuk->ukuran44;

            // Hapus data barang masuk
            $barangmasuk->delete();

            // Temukan stok yang terkait berdasarkan nama_sepatu_id
            $stock = Stock::where('id', $namaSepatuId)->first();

            if ($stock) {
                // Kurangi stok berdasarkan ukuran yang dihapus
                $stock->decrement('ukuran37', $ukuran37 ?? 0);
                $stock->decrement('ukuran38', $ukuran38 ?? 0);
                $stock->decrement('ukuran39', $ukuran39 ?? 0);
                $stock->decrement('ukuran40', $ukuran40 ?? 0);
                $stock->decrement('ukuran41', $ukuran41 ?? 0);
                $stock->decrement('ukuran42', $ukuran42 ?? 0);
                $stock->decrement('ukuran43', $ukuran43 ?? 0);
                $stock->decrement('ukuran44', $ukuran44 ?? 0);
                $stock->save();
            } else {
                // Rollback transaksi jika stok tidak ditemukan
                DB::rollBack();
                return redirect()->route('barangmasuk.index')->withErrors('Stok tidak ditemukan.');
            }

            // Commit transaksi
            DB::commit();

            return redirect()->route('barangmasuk.index')->with('success', 'Data berhasil dihapus dan stok terupdate');
        } catch (\Exception $e) {
            // Rollback transaksi jika terjadi kesalahan
            DB::rollBack();
            return redirect()->route('barangmasuk.index')->withErrors('Terjadi kesalahan saat menghapus data barang masuk.');
        }
    }
}
