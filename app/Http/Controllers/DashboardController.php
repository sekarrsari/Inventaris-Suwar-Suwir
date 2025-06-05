<?php

namespace App\Http\Controllers;

use App\Models\Manajemen;
use App\Models\Penjualan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class DashboardController extends Controller
{
    /**
     * Mendapatkan daftar bulan dengan urutan yang benar.
     * Sebaiknya ini menjadi public static method di Model Penjualan jika sering digunakan.
     * Misalnya: Penjualan::getOrderedBulanList()
     */
    private function getOrderedBulanList()
    {
        // Pastikan Penjualan::BULAN_LIST terdefinisi di model Anda dan berurutan
        if (defined('App\Models\Penjualan::BULAN_LIST')) {
            return Penjualan::BULAN_LIST;
        }
        // Fallback jika tidak terdefinisi di model
        return [
            'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni',
            'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'
        ];
    }
    
    
    // Mengambil daftar tahun unik dari tabel penjualan yang memiliki data.
    private function getAvailableYearsFromPenjualan()
    {
        return Penjualan::select('tahun')
                        ->distinct()
                        ->orderBy('tahun', 'desc') // Tahun terbaru di awal
                        ->pluck('tahun')
                        ->toArray();
    }


    public function index(Request $request)
    {
        $title = "Dashboard";

        // Ambil data bahan baku
        // $singkong = Manajemen::where('nama', 'Singkong')->first();
        // $gulaMerah = Manajemen::where('nama', 'Gula Merah')->first();
        // $perasa = Manajemen::where('nama', 'Perasa Makanan')->first();
        // $data = [
        //     'singkong' => $singkong,
        //     'gulaMerah' => $gulaMerah,
        //     'perasa' => $perasa,
        // ];
        // return view('dashboard', $data);

        $bahanBakuItems = Manajemen::orderBy('updated_at', 'desc')
            ->take(3)
            ->get();

        // --- PERSIAPAN FILTER TAHUN ---
        $availableYears = $this->getAvailableYearsFromPenjualan();
        $requestedYear = $request->input('year', null);
        $selectedYearForCharts = Carbon::now()->year; // Default fallback

        if ($requestedYear && in_array($requestedYear, $availableYears)) {
            $selectedYearForCharts = (int)$requestedYear;
        } elseif (!empty($availableYears)) {
            $selectedYearForCharts = (int)$availableYears[0]; // Default ke tahun terbaru yang ada data
        }
        // Jika $availableYears kosong, $selectedYearForCharts akan tetap tahun ini

        // --- PERSIAPAN DATA UNTUK GRAFIK ---
        $chartMonthLabels = $this->getOrderedBulanList();
        $bulanOrderString = "FIELD(bulan, '" . implode("','", $chartMonthLabels) . "')";

        // Data untuk Grafik Penjualan Ori
        $oriSalesDataForChart = Penjualan::select('bulan', DB::raw('SUM(jumlah_ori) as total_penjualan'))
            ->where('tahun', $selectedYearForCharts)
            ->groupBy('bulan')
            ->orderByRaw($bulanOrderString)
            ->get();

        $oriSalesData = array_fill(0, count($chartMonthLabels), 0);
        foreach ($oriSalesDataForChart as $data) {
            $bulanIndex = array_search($data->bulan, $chartMonthLabels);
            if ($bulanIndex !== false) {
                $oriSalesData[$bulanIndex] = (int)$data->total_penjualan;
            }
        }
        $oriSalesTitle = "Grafik Penjualan Ori Tahun " . $selectedYearForCharts;

        // Data untuk Grafik Penjualan Mix/Rasa
        $rasaSalesDataForChart = Penjualan::select('bulan', DB::raw('SUM(jumlah_rasa) as total_penjualan_rasa'))
            ->where('tahun', $selectedYearForCharts)
            ->groupBy('bulan')
            ->orderByRaw($bulanOrderString)
            ->get();

        $rasaSalesData = array_fill(0, count($chartMonthLabels), 0);
        foreach ($rasaSalesDataForChart as $data) {
            $bulanIndex = array_search($data->bulan, $chartMonthLabels);
            if ($bulanIndex !== false) {
                $rasaSalesData[$bulanIndex] = (int)$data->total_penjualan_rasa;
            }
        }
        $rasaSalesTitle = "Grafik Penjualan Mix Tahun " . $selectedYearForCharts;


        return view('dashboard', [
            'title' => $title,
            'bahanBakuItems' => $bahanBakuItems,
            
            'chartMonthLabels' => $chartMonthLabels, // Label bulan (umum untuk kedua grafik)
            
            'oriSalesData' => $oriSalesData,
            'oriSalesTitle' => $oriSalesTitle,
            
            'rasaSalesData' => $rasaSalesData,
            'rasaSalesTitle' => $rasaSalesTitle,
            
            'selectedYear' => $selectedYearForCharts, // Tahun yang aktif untuk grafik dan filter
            'availableYears' => $availableYears // Daftar tahun untuk dropdown filter
        ]);

    }
}
