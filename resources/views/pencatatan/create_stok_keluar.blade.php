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

    {{-- Form Tambah Data  --}}
    <div class="w-full px-6 py-6 mx-auto">
        <div class="flex flex-wrap justify-center -mx-3">
            <div class="flex-none w-full max-w-7xl px-3 py-6">
                <div
                    class="relative flex flex-col min-w-0 mb-6 break-words bg-white border-0 border-transparent border-solid shadow-xl rounded-2xl bg-clip-border">
                    <div class="p-6 pb-0 m-6 border-b-0 border-b-solid rounded-t-2xl border-b-transparent">
                        <h2 class="text-3xl font-bold mb-9">{{ $title }}</h2>
                        
                        <div class="flex-auto px-0 pt-0 pb-2">
                            <div class="p-0 overflow-x-auto"> 
                                <form class="grid grid-cols-1 md:grid-cols-2 gap-7 items-center w-full mb-0 align-top border-collapse">
        
                                    <!-- Tanggal -->
                                    <div>
                                        <label for="tanggal" class="block mb-2 text-base font-medium">Tanggal</label>
                                        <input type="date" id="tanggal"
                                            class="bg-gray-50 border border-gray-300 text-sm rounded-lg block w-full p-2.5">
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
                                            <option>Stok Masuk</option>
                                            <option>Stok Keluar</option>
                                        </select>
                                    </div>

                                    <!-- Tujuan -->
                                    <div>
                                        <label for="tujuan" class="block mb-2 text-base font-medium">Tujuan</label>
                                        <input type="text" id="tujuan"
                                            class="bg-gray-50 border border-gray-300 text-sm rounded-lg block w-full p-2.5"
                                            placeholder="Masukkan tujuan stok keluar">
                                    </div>

                                    <!-- Keterangan -->
                                    <div class="col-span-2">
                                        <label for="keterangan" class="block mb-2 text-base font-medium">Keterangan</label>
                                        <textarea rows="3" id="keterangan"
                                            class="bg-gray-50 border border-gray-300 text-sm rounded-lg block w-full p-2.5"
                                            placeholder="Tuliskan keterangan"></textarea>
                                    </div>
                                </form>
                            </div>
                        </div>   
    
                        <!-- Tombol -->
                        <div class="my-6 flex gap-4">
                            <button type="submit"
                                class="bg-orange-500 hover:bg-orange-600 text-white font-medium rounded-lg px-5 py-2.5">Tambah</button>
                            <button type="button"
                            onclick="window.location.href='/pencatatan'"    
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