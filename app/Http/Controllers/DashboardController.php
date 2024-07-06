<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Models\Barangkeluar;
use App\Models\Barangmasuk;
use App\Models\Operational;
use App\Models\Stock;

class DashboardController extends Controller
{
    public function showProfitAndOmzet(){
        // Ambil data dari tabel Barangkeluar dan hitung total omzet dan profit per tanggal
        $data = Barangkeluar::select(
            DB::raw('DATE(tanggal) as date'),
            DB::raw('SUM(hargajual * (ukuran37 + ukuran38 + ukuran39 + ukuran40 + ukuran41 + ukuran42 + ukuran43 + ukuran44)) as omset'),
            DB::raw('SUM(profit) as profit')
        )
        ->groupBy('date')
        ->orderBy('date', 'asc')
        ->get();

        return view('umum.profit_omset', ['data' => $data]);
    }
}
