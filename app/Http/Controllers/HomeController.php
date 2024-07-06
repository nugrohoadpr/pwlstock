<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Models\Barangkeluar;
use App\Models\Barangmasuk;
use App\Models\Operational;
use App\Models\Stock;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        
        $startDate = Carbon::now()->startOfMonth();
        $endDate = Carbon::now()->endOfMonth();

        
        $totalOmzet = Barangkeluar::whereBetween('tanggal', [$startDate, $endDate])
            ->sum(DB::raw('hargajual * (ukuran37 + ukuran38 + ukuran39 + ukuran40 + ukuran41 + ukuran42 + ukuran43 + ukuran44)'));

        $totalOperational = Operational::whereBetween('tanggal', [$startDate, $endDate])
            ->sum('biaya');

        $totalAsetBarang = Stock::sum(DB::raw('
            (ukuran37 + ukuran38 + ukuran39 + ukuran40 + ukuran41 + ukuran42 + ukuran43 + ukuran44) * hpp'));

        $totalBarangTerjual = Barangkeluar::whereBetween('tanggal', [$startDate, $endDate])
            ->sum(DB::raw('ukuran37 + ukuran38 + ukuran39 + ukuran40 + ukuran41 + ukuran42 + ukuran43 + ukuran44'));

        $totalProfit = Barangkeluar::whereBetween('tanggal', [$startDate, $endDate])
            ->sum('profit');

        return view('umum.dashboard', compact(
            'totalOmzet',
            'totalOperational',
            'totalAsetBarang',
            'totalBarangTerjual',
            'totalProfit'
        ));
    }
}
