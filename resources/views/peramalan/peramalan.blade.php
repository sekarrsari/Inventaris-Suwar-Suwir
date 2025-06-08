@extends('layouts.main')

@section('content')
    <div class="w-full px-6 py-6 mx-auto">
        <div class="flex flex-wrap -mx-3">
            <div class="flex-none w-full max-w-full px-3">
                <div
                    class="relative flex flex-col min-w-0 mb-6 break-words bg-white border-0 border-transparent border-solid shadow-xl rounded-2xl bg-clip-border">
                    <div class="p-6 pb-0 mb-0 border-b-0 border-b-solid rounded-t-2xl border-b-transparent">
                        <div class="flex justify-between items-center mt-3 mb-6">
                            {{-- Judul diubah untuk halaman peramalan --}}
                            <h3 class="text-4xl text-gray-800 font-bold">Peramalan Kebutuhan Singkong</h3>
                            {{-- Tombol "Tambah Penjualan" tidak relevan, jadi bisa dihapus atau dikomentari --}}
                        </div>

                        {{-- Notifikasi Sukses --}}
                        @if (session()->has('success'))
                            <div class="p-4 mb-4 text-sm text-green-700 bg-green-100 rounded-lg" role="alert">
                                <span class="font-medium">Berhasil!</span> {{ session('success') }}
                            </div>
                        @endif

                        {{-- Notifikasi Error dari API --}}
                        @if (session('error'))
                            <div class="p-4 mb-4 text-sm text-red-700 bg-red-100 rounded-lg" role="alert">
                                <span class="font-medium">Gagal!</span> {{ session('error') }}
                            </div>
                        @endif

                        {{-- Notifikasi Error Validasi Laravel --}}
                        @if ($errors->any())
                            <div class="p-4 mb-4 text-sm text-red-700 bg-red-100 rounded-lg" role="alert">
                                <span class="font-medium">Gagal!</span>
                                <ul class="mt-1.5 ml-4 list-disc list-inside">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                    </div>
                    <div class="flex-auto px-6 pt-0 pb-6">
                        {{-- FORM INPUT PERAMALAN --}}
                        <div class="mb-6">
                            <form action="{{ route('peramalan.submit') }}" method="POST">
                                @csrf
                                <div class="mb-4">
                                    <label for="bulan" class="block mb-2 text-sm font-medium text-gray-900">Pilih Bulan untuk Diramalkan</label>
                                    <select id="bulan" name="bulan" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required>
                                        <option value="" disabled selected>-- Silakan pilih bulan --</option>
                                        @php
                                            $daftar_bulan = [
                                                1 => 'Januari', 2 => 'Februari', 3 => 'Maret', 4 => 'April',
                                                5 => 'Mei', 6 => 'Juni', 7 => 'Juli', 8 => 'Agustus',
                                                9 => 'September', 10 => 'Oktober', 11 => 'November', 12 => 'Desember'
                                            ];
                                        @endphp
                                        @foreach ($daftar_bulan as $nomor => $nama)
                                            <option value="{{ $nomor }}" 
                                                @if(old('bulan') == $nomor) 
                                                    selected 
                                                @elseif(isset($hasil) && $hasil['bulan_nomor'] == $nomor) 
                                                    selected 
                                                @endif
                                            >
                                                {{ $nama }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 w-full md:w-auto">
                                    Ramalkan Sekarang
                                </button>
                            </form>
                        </div>


                        {{-- HASIL PERAMALAN (HANYA TAMPIL JIKA ADA DATA) --}}
                        @if (isset($hasil))
                        <div class="border-t border-gray-200 mt-6 pt-6">
                            <h4 class="text-2xl font-bold text-gray-800 mb-4">
                                Hasil Peramalan untuk Bulan: {{ $hasil['bulan_nama'] }}
                            </h4>
                            <div class="grid grid-cols-1 md:grid-cols-3 gap-4 text-center">
                                <div class="bg-gray-100 p-4 rounded-lg">
                                    <p class="text-sm text-gray-600">Musim Diperkirakan</p>
                                    <p class="text-xl font-bold text-blue-600">{{ $hasil['musim'] }}</p>
                                </div>
                                <div class="bg-gray-100 p-4 rounded-lg">
                                    <p class="text-sm text-gray-600">Prediksi Dasar Model</p>
                                    <p class="text-xl font-bold text-gray-800">{{ number_format($hasil['prediksi_dasar'], 0, ',', '.') }} kg</p>
                                </div>
                                <div class="bg-green-100 p-4 rounded-lg border border-green-300">
                                    <p class="text-sm font-semibold text-green-800">Prediksi Disesuaikan</p>
                                    <p class="text-2xl font-extrabold text-green-700">{{ number_format($hasil['prediksi_disesuaikan'], 0, ',', '.') }} kg</p>
                                    <p class="text-xs text-green-600">({{ $hasil['musim'] == 'Hujan' ? 'Dikurangi 20%' : 'Ditambah 10%' }})</p>
                                </div>
                            </div>
                            <p class="text-xs text-gray-500 mt-4 text-center">
                                *Hasil ini merupakan estimasi berdasarkan data historis dan penyesuaian musim. Gunakan sebagai bahan pertimbangan dalam perencanaan.
                            </p>
                        </div>
                        @endif

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection