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

<body
    class="m-0 font-[Poppins] flex text-base antialiased font-normal leading-default bg-gray-50 text-black">

    {{-- Form Tambah Data Bahan Baku  --}}
    <div class="w-full px-6 py-6 mx-auto">
        <div class="flex flex-wrap justify-center -mx-3">
            <div class="flex-none w-full max-w-7xl px-3 py-6">
                <div
                    class="relative flex flex-col min-w-0 mb-6 break-words bg-white border-0 border-transparent border-solid shadow-xl rounded-2xl bg-clip-border">
                    <div class="p-6 pb-0 m-6 border-b-0 border-b-solid rounded-t-2xl border-b-transparent">
                        <h2 class="text-3xl font-bold mb-9">Form Tambah Bahan Baku</h2>
                        
                        <div class="flex-auto px-0 pt-0 pb-2">
                            <div class="p-0 overflow-x-auto"> 
                                <form class="grid grid-cols-1 md:grid-cols-2 gap-7 items-center w-full mb-0 align-top border-collapse">
        
                                    <!-- Kode Bahan Baku -->
                                    <div>
                                        <label for="kode" class="block mb-2 text-base font-medium">Kode Bahan Baku</label>
                                        <input type="text" id="kode" value="B005"
                                            class="bg-gray-50 border border-gray-300 text-sm rounded-lg block w-full p-2.5"
                                            readonly>
                                    </div>
        
                                    <!-- Nama Bahan Baku -->
                                    <div>
                                        <label for="nama" class="block mb-2 text-base font-medium">Nama Bahan Baku</label>
                                        <input type="text" id="nama"
                                            class="bg-gray-50 border border-gray-300 text-sm rounded-lg block w-full p-2.5"
                                            placeholder="Masukkan nama bahan baku">
                                    </div>
        
                                    <!-- Jenis -->
                                    <div>
                                        <label for="jenis" class="block mb-2 text-base font-medium">Jenis</label>
                                        <select id="jenis"
                                            class="bg-gray-50 border border-gray-300 text-sm rounded-lg block w-full p-2.5"
                                            placeholder ="Pilih salah satu opsi">
                                            <option>Bahan utama</option>
                                            <option>Tambahan</option>
                                        </select>
                                    </div>
        
                                    <!-- Satuan -->
                                    <div>
                                        <label for="satuan" class="block mb-2 text-base font-medium">Satuan</label>
                                        <select id="satuan"
                                            class="bg-gray-50 border border-gray-300 text-sm rounded-lg block w-full p-2.5">
                                            <option>Pilih salah satu opsi</option>
                                            <option>Kg</option>
                                            <option>Liter</option>
                                        </select>
                                    </div>
        
                                    <!-- Supplier -->
                                    <div>
                                        <label for="supplier" class="block mb-2 text-base font-medium">Supplier</label>
                                        <input type="text" id="supplier"
                                            class="bg-gray-50 border border-gray-300 text-sm rounded-lg block w-full p-2.5"
                                            placeholder="Masukkan nama supplier">
                                    </div>
        
                                    <!-- Tanggal Pembelian Terakhir -->
                                    <div>
                                        <label for="tanggal" class="block mb-2 text-base font-medium">Tanggal Pembelian
                                            Terakhir</label>
                                        <input type="date" id="tanggal"
                                            class="bg-gray-50 border border-gray-300 text-sm rounded-lg block w-full p-2.5">
                                    </div>
        
                                    <!-- Harga per Satuan -->
                                    <div>
                                        <label for="harga" class="block mb-2 text-base font-medium">Harga per satuan</label>
                                        <div class="relative">
                                            <span
                                                class="absolute inset-y-0 left-0 flex items-center pl-3 text-sm text-gray-500">Rp</span>
                                            <input type="number" id="harga"
                                                class="pl-10 bg-gray-50 border border-gray-300 text-sm rounded-lg block w-full p-2.5"
                                                placeholder="0">
                                        </div>
                                    </div>
        
                                    <!-- Stok Minimum -->
                                    <div>
                                        <label for="stok" class="block mb-2 text-base font-medium">Stok Minimum (Kg)</label>
                                        <input type="number" id="stok"
                                            class="bg-gray-50 border border-gray-300 text-sm rounded-lg block w-full p-2.5"
                                            placeholder="0">
                                    </div>
        
                                    <!-- Status -->
                                    <div>
                                        <label for="status" class="block mb-2 text-base font-medium">Status</label>
                                        <select id="status"
                                            class="bg-gray-50 border border-gray-300 text-sm rounded-lg block w-full p-2.5" 
                                            placeholder="Pilih salah satu opsi">
                                            <option>Tersedia</option>
                                            <option>Hampir habis</option>
                                            <option>Habis</option>
                                        </select>
                                    </div>
                                </form>
                            </div>
                        </div>   
    
                        <!-- Tombol -->
                        <div class="my-6 flex gap-4">
                            <button type="submit"
                                class="bg-orange-500 hover:bg-orange-600 text-white font-medium rounded-lg px-5 py-2.5">Tambah</button>
                            <button type="button"
                            onclick="window.location.href='/bahan-baku'"    
                            class="bg-white border border-gray-300 text-gray-700 font-medium rounded-lg px-5 py-2.5">Batal</button>
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