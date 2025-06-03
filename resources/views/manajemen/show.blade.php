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

    {{-- Detail Data Bahan Baku --}}
    <div class="w-full px-6 py-6 mx-auto">
        <div class="flex flex-wrap justify-center -mx-3">
            <div class="flex-none w-full max-w-7xl px-3 py-6">
                <div
                    class="relative flex flex-col min-w-0 mb-6 break-words bg-white border-0 border-transparent border-solid shadow-xl rounded-2xl bg-clip-border">
                    <div class="p-6 pb-0 m-6 border-b-0 border-b-solid rounded-t-2xl border-b-transparent">
                        <h2 class="text-3xl font-bold mb-9">Detail Bahan Baku - {{ $bahanBaku->nama }}</h2>

                        <div class="flex-auto px-0 pt-0 pb-2">
                            <div class="p-0 overflow-x-auto">
                                <form action="{{ route('manajemen.store', $bahanBaku->id) }}" method="post" class="grid grid-cols-1 md:grid-cols-2 gap-7 items-center w-full mb-0 align-top border-collapse">
                                @csrf
                                @method('PUT')

                                    <!-- Kode Bahan Baku -->
                                    <div>
                                        <label for="kode" class="block mb-2 text-base font-medium">Kode Bahan
                                            Baku</label>
                                        <p class="bg-gray-50 border border-gray-300 text-sm rounded-lg block w-full p-2.5">
                                            {{ $bahanBaku->kode }}</p>
                                    </div>

                                    <!-- Nama Bahan Baku -->
                                    <div>
                                        <label for="nama" class="block mb-2 text-base font-medium">Nama Bahan
                                            Baku</label>
                                        <input type="text" name="nama" id="nama" value="{{ old('nama', $bahanBaku->nama) }}" disabled
                                            class="bg-gray-50 border border-gray-300 text-sm rounded-lg block w-full p-2.5">
                                    </div>

                                    <!-- Jenis -->
                                    <div>
                                        <label for="jenis" class="block mb-2 text-base font-medium">Jenis</label>
                                        <p name="jenis" id="jenis" disabled
                                            class="bg-gray-50 border border-gray-300 text-sm rounded-lg block w-full p-2.5">
                                            {{ $bahanBaku->jenis }}</p>
                                    </div>

                                    <!-- Satuan -->
                                    <div>
                                        <label for="satuan" class="block mb-2 text-base font-medium">Satuan</label>
                                        <p name="satuan" id="satuan" disabled
                                            class="bg-gray-50 border border-gray-300 text-sm rounded-lg block w-full p-2.5">
                                            {{ $bahanBaku->satuan }}</p>
                                    </div>

                                    <!-- Supplier -->
                                    <div>
                                        <label for="supplier" class="block mb-2 text-base font-medium">Supplier</label>
                                        <input type="text" name="supplier" id="supplier" value="{{ old('supplier', $bahanBaku->supplier) }}"
                                        disabled
                                            class="bg-gray-50 border border-gray-300 text-sm rounded-lg block w-full p-2.5">
                                    </div>

                                    <!-- Tanggal Pembelian Terakhir -->
                                    <div>
                                        <label for="tanggalBeli" class="block mb-2 text-base font-medium">Tanggal Pembelian
                                            Terakhir</label>
                                        <input type="date" name="tanggalBeli" id="tanggalBeli" value="{{ old('tanggalBeli', $bahanBaku->tanggalBeli) }}"
                                        disabled
                                            class="bg-gray-50 border border-gray-300 text-sm rounded-lg block w-full p-2.5">
                                    </div>

                                    <!-- Harga per Satuan -->
                                    <div>
                                        <label for="harga" class="block mb-2 text-base font-medium">Harga per
                                            satuan</label>
                                        <div class="relative">
                                            <span
                                                class="absolute inset-y-0 left-0 flex items-center pl-3 text-sm text-gray-500">Rp</span>
                                            <input type="number" name="harga" id="harga" value="{{ old('harga', $bahanBaku->harga) }}"
                                            disabled
                                                class="pl-10 bg-gray-50 border border-gray-300 text-sm rounded-lg block w-full p-2.5">
                                        </div>
                                    </div>

                                    <!-- Stok Minimum -->
                                    <div>
                                        <label for="stokMinimum" class="block mb-2 text-base font-medium">Stok Minimum
                                            (Kg)</label>
                                        <input type="number" name="stokMinimum" id="stokMinimum" value="{{ old('stokMinimum', $bahanBaku->stokMinimum) }}" disabled
                                            class="bg-gray-50 border border-gray-300 text-sm rounded-lg block w-full p-2.5">
                                    </div>

                                    <!-- Status -->
                                    <div>
                                        <label for="status" class="block mb-2 text-base font-medium">Status</label>
                                        <p name="status" id="status" disabled
                                            class="bg-gray-50 border border-gray-300 text-sm rounded-lg block w-full p-2.5">
                                            {{ $bahanBaku->status }}</p>
                                    </div>

                                    <!-- Tombol -->
                                    <div class="md:col-span-2 flex justify-start gap-4 mt-6 pt-8 border-t border-gray-200">
                                            <a href="{{ route('manajemen.index') }}"class="py-2.5 px-5 me-2 mb-2 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-blue-700 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100">Kembali</a>
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