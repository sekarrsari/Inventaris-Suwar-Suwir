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

    {{-- Form Edit Data Bahan Baku --}}
    <div class="w-full px-6 py-6 mx-auto">
        <div class="flex flex-wrap justify-center -mx-3">
            <div class="flex-none w-full max-w-7xl px-3 py-6">
                <div
                    class="relative flex flex-col min-w-0 mb-6 break-words bg-white border-0 border-transparent border-solid shadow-xl rounded-2xl bg-clip-border">
                    <div class="p-6 pb-0 m-6 border-b-0 border-b-solid rounded-t-2xl border-b-transparent">
                        <h2 class="text-3xl font-bold mb-9">Form Edit Bahan Baku</h2>

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

                                <form action="{{ route('manajemen.update', $bahanBaku->id) }}" method="post" class="grid grid-cols-1 md:grid-cols-2 gap-7 items-center w-full mb-0 align-top border-collapse">
                                @csrf
                                @method('PUT')

                                    <!-- Kode Bahan Baku -->
                                    <div>
                                        <label for="kode" class="block mb-2 text-base font-medium">Kode Bahan
                                            Baku</label>
                                        <p class="bg-gray-50 border border-gray-300 text-sm text-gray-500 rounded-lg block w-full p-2.5">
                                            {{ $bahanBaku->kode }}</p>
                                    </div>

                                    <!-- Nama Bahan Baku -->
                                    <div>
                                        <label for="nama" class="block mb-2 text-base font-medium">Nama Bahan
                                            Baku</label>
                                        <input type="text" name="nama" id="nama" value="{{ old('nama', $bahanBaku->nama) }}" required
                                            class="bg-gray-50 border border-gray-300 text-sm rounded-lg block w-full p-2.5">
                                            @error('nama')
                                            <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <!-- Jenis -->
                                    <div>
                                        <label for="jenis" class="block mb-2 text-base font-medium">Jenis</label>
                                        <select name="jenis" id="jenis" required
                                            class="bg-gray-50 border border-gray-300 text-sm rounded-lg block w-full p-2.5">
                                            <option value="Bahan utama" {{ old('jenis', $bahanBaku->jenis) == 'Bahan utama' ? 'selected' : '' }}>Bahan utama</option>
                                            <option value="Tambahan" {{ old('jenis', $bahanBaku->jenis) == 'Tambahan' ? 'selected' : '' }}>Tambahan</option>
                                                    </select>
                                        @error('jenis')
                                        <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                                    @enderror
                                    </div>

                                    <!-- Satuan -->
                                    <div>
                                        <label for="satuan" class="block mb-2 text-base font-medium">Satuan</label>
                                        <select name="satuan" id="satuan" required
                                            class="bg-gray-50 border border-gray-300 text-sm rounded-lg block w-full p-2.5">
                                            <option value="Kg" {{ old('satuan', $bahanBaku->satuan) == 'Kg' ? 'selected' : '' }}>Kg</option>
                                            <option value="Btl" {{ old('satuan', $bahanBaku->satuan) == 'Btl' ? 'selected' : '' }}>Btl</option>
                                                    </select>
                                        @error('satuan')
                                        <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                                    @enderror
                                    </div>

                                    <!-- Supplier -->
                                    <div>
                                        <label for="supplier" class="block mb-2 text-base font-medium">Supplier</label>
                                        <input type="text" name="supplier" id="supplier" value="{{ old('supplier', $bahanBaku->supplier) }}"
                                            required
                                            class="bg-gray-50 border border-gray-300 text-sm rounded-lg block w-full p-2.5">
                                            @error('supplier')
                                            <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <!-- Tanggal Pembelian Terakhir -->
                                    <div>
                                        <label for="tanggalBeli" class="block mb-2 text-base font-medium">Tanggal Pembelian
                                            Terakhir</label>
                                        <input type="date" name="tanggalBeli" id="tanggalBeli" value="{{ old('tanggalBeli', $bahanBaku->tanggalBeli) }}"
                                            required
                                            class="bg-gray-50 border border-gray-300 text-sm rounded-lg block w-full p-2.5">
                                            @error('tanggalBeli')
                                            <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <!-- Harga per Satuan -->
                                    <div>
                                        <label for="harga" class="block mb-2 text-base font-medium">Harga per
                                            satuan</label>
                                        <div class="relative">
                                            <span
                                                class="absolute inset-y-0 left-0 flex items-center pl-3 text-sm text-gray-500">Rp</span>
                                            <input type="number" name="harga" id="harga" value="{{ old('harga', $bahanBaku->harga) }}"
                                                required
                                                class="pl-10 bg-gray-50 border border-gray-300 text-sm rounded-lg block w-full p-2.5">
                                        </div>
                                        @error('harga')
                                        <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                                    @enderror
                                    </div>

                                    <!-- Stok Minimum -->
                                    <div>
                                        <label for="stokMinimum" class="block mb-2 text-base font-medium">Stok Minimum
                                            (Kg)</label>
                                        <input type="number" name="stokMinimum" id="stokMinimum" value="{{ old('stokMinimum', $bahanBaku->stokMinimum) }}" required
                                            class="bg-gray-50 border border-gray-300 text-sm rounded-lg block w-full p-2.5">
                                            @error('stokMinimum')
                                            <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <!-- Status -->
                                    <div>
                                        <label for="status" class="block mb-2 text-base font-medium">Status</label>
                                        <select name="status" id="status" required
                                            class="bg-gray-50 border border-gray-300 text-sm rounded-lg block w-full p-2.5">
                                            <option value="Tersedia" {{ old('status', $bahanBaku->status) == 'Tersedia' ? 'selected' : '' }}>Tersedia</option>
                                            <option value="Hampir habis" {{ old('status', $bahanBaku->status) == 'Hampir habis' ? 'selected' : '' }}>Hampir habis</option>
                                            <option value="Habis" {{ old('status', $bahanBaku->status) == 'Habis' ? 'selected' : '' }}>Habis</option>
                                                    </select>
                                        @error('status')
                                        <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                                    @enderror
                                    </div>

                                    <!-- Tombol -->
                                    <div class="md:col-span-2 flex justify-start gap-4 mt-6 pt-8 border-t border-gray-200">
                                        <button type="submit"
                                            class="focus:outline-none text-white bg-yellow-400 hover:bg-yellow-500 focus:ring-4 focus:ring-yellow-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2">Edit</button>
                                            <a href="{{ route('manajemen.index') }}"class="py-2.5 px-5 me-2 mb-2 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100">Batal</a>
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

</html>

{{-- @extends('layouts.main')
@section('content') --}}

{{-- @endsection --}}