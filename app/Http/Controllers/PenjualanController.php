<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Penjualan;
use Illuminate\Validation\Rule; // Untuk validasi unique

class PenjualanController extends Controller
{
    // Daftar bulan untuk digunakan di form
    private function getBulanList()
    {
        return Penjualan::BULAN_LIST;
    }

    private function getTahunList()
    {
        // Ambil daftar tahun unik dari data penjualan yang ada, urutkan descending
        // Tambahkan juga tahun saat ini dan beberapa tahun ke depan/belakang jika perlu
        $uniqueTahun = Penjualan::select('tahun')->distinct()->orderBy('tahun', 'desc')->pluck('tahun')->toArray();
        $currentYear = date('Y');
        if (!in_array($currentYear, $uniqueTahun)) {
            $uniqueTahun[] = $currentYear;
        }
        // Anda bisa menambahkan logika untuk range tahun yang lebih dinamis jika diperlukan
        // Misalnya, 5 tahun ke belakang dan 1 tahun ke depan dari tahun terbaru yang ada data
        rsort($uniqueTahun); // Pastikan urutan descending
        return $uniqueTahun;
    }


    /**
     * Display a listing of the resource.
     */

    public function index(Request $request)
    {
        // Mengambil data penjualan diurutkan berdasarkan tahun dan kemudian berdasarkan urutan bulan
        // $jual = Penjualan::orderBy('tahun', 'desc')
        //     ->orderByRaw("FIELD(bulan, '" . implode("','", $this->getBulanList()) . "')")
        //     ->paginate(10);

        // return view('penjualan.penjualan', [
        //     "title" => "Penjualan",
        //     "dataPenjualan" => $jual,

        // ]);

        $query = Penjualan::query();

        // Filter berdasarkan tahun
        if ($request->filled('filter_tahun')) {
            $query->where('tahun', $request->filter_tahun);
        }

        // Filter berdasarkan bulan
        if ($request->filled('filter_bulan')) {
            $query->where('bulan', $request->filter_bulan);
        }

        // Sorting
        $sort_by = $request->get('sort_by', 'tahun'); // Default sort by tahun
        $sort_direction = $request->get('sort_direction', 'desc'); // Default sort direction desc

        if ($sort_by == 'bulan') {
            // Untuk sorting bulan, kita butuh urutan yang benar, bukan alphabetical
            $bulanOrderString = "FIELD(bulan, '" . implode("','", $this->getBulanList()) . "')";
            if ($sort_direction === 'desc') {
                // Untuk FIELD, urutan descending berarti mengurutkan dari akhir daftar ke awal
                // Jika ingin Januari (akhir daftar jika sort desc) tampil dulu, maka FIELD harus asc
                // Atau bisa juga dengan membalik array bulan jika directionnya desc, tapi FIELD asc/desc lebih straightforward
                $query->orderByRaw($bulanOrderString . " " . $sort_direction);
                // Jika ingin tahun tetap jadi prioritas utama saat sort bulan
                if ($request->get('sort_by_fallback_tahun', 'true') === 'true') {
                    $query->orderBy('tahun', $sort_direction === 'asc' ? 'asc' : 'desc');
                }
            } else {
                $query->orderByRaw($bulanOrderString . " " . $sort_direction);
                if ($request->get('sort_by_fallback_tahun', 'true') === 'true') {
                    $query->orderBy('tahun', $sort_direction === 'asc' ? 'asc' : 'desc');
                }
            }
        } elseif (in_array($sort_by, ['tahun', 'jumlah_ori', 'jumlah_rasa', 'created_at'])) {
            $query->orderBy($sort_by, $sort_direction);
            // Jika sorting utama bukan bulan, maka default sort sekunder berdasarkan urutan bulan
            if ($sort_by != 'bulan') { // hindari duplikasi jika sort utama sudah bulan
                $bulanOrderString = "FIELD(bulan, '" . implode("','", $this->getBulanList()) . "')";
                $query->orderByRaw($bulanOrderString); // default ASC untuk bulan sebagai secondary sort
            }
        } else {
            // Default sorting jika parameter tidak valid
            $query->orderBy('tahun', 'desc');
            $bulanOrderString = "FIELD(bulan, '" . implode("','", $this->getBulanList()) . "')";
            $query->orderByRaw($bulanOrderString);
        }


        $penjualans = $query->paginate(10)->appends($request->query()); // appends agar filter & sort tetap ada di pagination

        return view('penjualan.penjualan', [
            "title" => "Data Penjualan",
            "dataPenjualan" => $penjualans,
            "bulanList" => $this->getBulanList(),
            "tahunList" => $this->getTahunList(), // Kirim daftar tahun ke view
            "filter_bulan_aktif" => $request->filter_bulan, // Kirim filter aktif
            "filter_tahun_aktif" => $request->filter_tahun, // Kirim filter aktif
            "sort_by_aktif" => $sort_by,
            "sort_direction_aktif" => $sort_direction,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('penjualan.create', [
            "title" => "Tambah Data Penjualan",
            "bulanList" => $this->getBulanList(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'bulan' => [
                'required',
                Rule::in($this->getBulanList()),
                Rule::unique('penjualans')->where(function ($query) use ($request) {
                    return $query->where('tahun', $request->tahun);
                })
            ],
            'tahun' => 'required|digits:4|integer|min:1900|max:' . (date('Y') + 5),
            'jumlah_ori' => 'required|integer|min:0',
            'jumlah_rasa' => 'required|integer|min:0',
        ], [
            'bulan.unique' => 'Kombinasi bulan dan tahun ini sudah tercatat.',
        ]);

        Penjualan::create($validatedData);

        return redirect('/penjualan')
            ->with('success', 'Data penjualan berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    // public function show(Penjualan $penjualan) // Route model binding
    // {
    //     return view('penjualan.show', [
    //         "title" => "Detail Data Penjualan",
    //         "penjualan" => $penjualan, // Menggunakan key "penjualan" (singular)
    //     ]);
    // }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Penjualan $penjualan) // Route model binding
    {
        return view('penjualan.edit', [
            "title" => "Edit Data Penjualan",
            "dataPenjualan" => $penjualan,
            "bulanList" => $this->getBulanList(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Penjualan $penjualan)
    {
        $validatedData = $request->validate([
            'bulan' => [
                'required',
                Rule::in($this->getBulanList()),
                Rule::unique('penjualans')->where(function ($query) use ($request) {
                    return $query->where('tahun', $request->tahun);
                })->ignore($penjualan->id)
            ],
            'tahun' => 'required|digits:4|integer|min:1900|max:' . (date('Y') + 5),
            'jumlah_ori' => 'required|integer|min:0',
            'jumlah_rasa' => 'required|integer|min:0',
        ], [
            'bulan.unique' => 'Kombinasi bulan dan tahun ini sudah ada untuk entri lain.',
        ]);

        $penjualan->update($validatedData);

        return redirect('/penjualan')
            ->with('success', 'Data penjualan berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Penjualan $penjualan)
    {
        try {
            $penjualan->delete();
            return redirect('/penjualan')
                ->with('success', 'Data penjualan berhasil dihapus.');
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect('/penjualan')
                ->with('error', 'Gagal menghapus data penjualan. Mungkin terkait dengan data lain.');
        }
    }
}
