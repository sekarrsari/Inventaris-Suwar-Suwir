<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="icon" type="image/png" href="./assets/img/circle-logo-mutiara-rasa.png" />
    <title>Sistem Inventaris | {{ $title }}</title>

    <!-- Tailwind CDN -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Flowbite CSS -->
    <link href="https://unpkg.com/flowbite@2.3.0/dist/flowbite.min.css" rel="stylesheet" />

    <!-- Flowbite Script -->
    <script src="https://unpkg.com/flowbite@2.3.0/dist/flowbite.min.js"></script>

    @include('layouts.partials.link')
</head>

<body class="m-0 font-[Poppins] flex text-base antialiased font-normal leading-default bg-gray-50 text-black">

    {{-- Form Tambah Data Supplier --}}
    <div class="w-full px-6 py-6 mx-auto">
        <div class="flex flex-wrap justify-center -mx-3">
            <div class="flex-none w-full max-w-7xl px-3 py-6">
                <div
                    class="relative flex flex-col min-w-0 mb-6 break-words bg-white border-0 border-transparent border-solid shadow-xl rounded-2xl bg-clip-border">
                    <div class="p-6 pb-0 m-6 border-b-0 border-b-solid rounded-t-2xl border-b-transparent">
                        <h2 class="text-3xl font-bold mb-9">Form Tambah Data Supplier</h2>

                        <div class="flex-auto px-0 pt-0 pb-2">
                            <div class="p-0 overflow-x-auto">
                                @if ($errors->any() && !request()->isMethod('get')) {{-- Hanya tampilkan jika bukan GET request awal --}}
                                <div class="mb-4 p-4 bg-red-100 text-red-700 border border-red-400 rounded">
                                    <p class="font-bold">Terdapat kesalahan pada input Anda:</p>
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif


                                <form action="{{ route('supplier.store') }}" method="post" class="grid grid-cols-1 md:grid-cols-2 gap-7 items-center w-full mb-0 align-top border-collapse">
                                @csrf

                                    <!-- Nama Supplier -->
                                    <div>
                                        <label for="namaSupplier" class="block mb-2 text-base font-medium">Nama Supplier</label>
                                        <input type="text" name="namaSupplier" id="namaSupplier" value="{{ old('namaSupplier') }}" required
                                            class="bg-gray-50 border border-gray-300 text-sm rounded-lg block w-full p-2.5"
                                            placeholder="Masukkan nama Supplier">
                                            @error('namaSupplier')
                                            <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <!-- Bahan Baku -->
                                    <div>
                                        <label for="bahan" class="block mb-2 text-base font-medium">Bahan
                                            Baku</label>
                                        <input type="text" name="bahan" id="bahan" value="{{ old('bahan') }}" required
                                            class="bg-gray-50 border border-gray-300 text-sm rounded-lg block w-full p-2.5"
                                            placeholder="Masukkan bahan baku">
                                            @error('bahan')
                                            <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <!-- Tanggal Mulai Kerjasama -->
                                    <div>
                                        <label for="tanggal" class="block mb-2 text-base font-medium">Tanggal Mulai Kerjasama</label>
                                        <input type="date" name="tanggal" id="tanggal" value="{{ old('tanggal') }}"
                                            required
                                            class="bg-gray-50 border border-gray-300 text-sm rounded-lg block w-full p-2.5">
                                            @error('tanggal')
                                            <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <!-- No. Telepon -->
                                    <div>
                                        <label for="telepon" class="block mb-2 text-base font-medium">No. Telepon</label>
                                        <input type="text" name="telepon" id="telepon" value="{{ old('telepon') }}"
                                            required
                                            class="bg-gray-50 border border-gray-300 text-sm rounded-lg block w-full p-2.5" 
                                            placeholder="Masukkan No. Telepon">
                                            @error('telepon')
                                            <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <!-- Alamat -->
                                    <div>
                                        <label for="alamat" class="block mb-2 text-base font-medium">Alamat Supplier</label>
                                        <textarea type="text" name="alamat" id="alamat" value="{{ old('alamat') }}"
                                            required
                                            class="bg-gray-50 border border-gray-300 text-sm rounded-lg block w-full p-2.5"
                                            placeholder="Masukkan alamat"></textarea>
                                            @error('alamat')
                                            <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <!-- Status -->
                                    <div>
                                        <label for="status" class="block mb-2 text-base font-medium">Status</label>
                                        <select name="status" id="status" required
                                            class="bg-gray-50 border border-gray-300 text-sm rounded-lg block w-full p-2.5">
                                            <option value="" disabled {{ old('status', '') === '' ? 'selected' : '' }}>Pilih salah satu opsi</option>
                                            <option value="Aktif" {{ old('status') == 'Aktif' ? 'selected' : '' }}>
                                                Aktif</option>
                                            <option value="Tidak Aktif" {{ old('status') == 'Tidak Aktif' ? 'selected' : '' }}>Tidak Aktif</option>
                                            <option value="Dalam Peninjauan" {{ old('status') == 'Dalam Peninjauan' ? 'selected' : '' }}>Dalam Peninjauan
                                            </option>
                                        </select>
                                        @error('status')
                                        <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                                    @enderror
                                    </div>

                                    <!-- Tombol -->
                                    <div class="md:col-span-2 flex justify-start gap-4 mt-6 pt-8 border-t border-gray-200">
                                        <button type="submit"
                                            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 focus:outline-none">Simpan</button>
                                            <a href="{{ route('supplier.index') }}"class="py-2.5 px-5 me-2 mb-2 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100">Batal</a>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

@include('layouts.partials.script')

{{-- Handle stok minimum supaya otomatis ambil satuan yang diinputkan --}}
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const satuanSelect = document.getElementById('satuan');
        const labelStokMinimum = document.getElementById('labelStokMinimum');
        const baseLabelText = 'Stok Minimum'; // Teks dasar label

        // Fungsi untuk memperbarui label stok minimum
        function updateLabelStokMinimum() {
            const selectedSatuan = satuanSelect.value;
            if (selectedSatuan) {
                labelStokMinimum.textContent = `${baseLabelText} (${selectedSatuan})`;
            } else {
                // Jika tidak ada satuan yang dipilih, kembali ke teks dasar atau sembunyikan satuan
                labelStokMinimum.textContent = baseLabelText;
                // Atau jika ingin placeholder seperti (Pilih Satuan Dulu)
                // labelStokMinimum.textContent = `${baseLabelText} (Pilih Satuan Dulu)`;
            }
        }

        // Panggil fungsi saat halaman pertama kali dimuat (untuk menghandle old value)
        updateLabelStokMinimum();

        // Tambahkan event listener untuk perubahan pada select satuan
        satuanSelect.addEventListener('change', updateLabelStokMinimum);
    });
</script>


</html>

{{-- @extends('layouts.main')
@section('content') --}}

{{-- @endsection --}}