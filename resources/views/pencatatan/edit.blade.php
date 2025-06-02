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

    {{-- Form Edit Pencatatan Stok  --}}
    <div class="w-full px-6 py-6 mx-auto">
        <div class="flex flex-wrap justify-center -mx-3">
            <div class="flex-none w-full max-w-7xl px-3 py-6">
                
                <div
                    class="relative flex flex-col min-w-0 mb-6 break-words bg-white border-0 border-transparent border-solid shadow-xl rounded-2xl bg-clip-border">
                    <div class="p-6 pb-0 m-6 border-b-0 border-b-solid rounded-t-2xl border-b-transparent">
                        <h2 class="text-3xl font-bold mb-9">Form Edit Pencatatan Stok</h2>
                        
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

                                <form action="{{ route('pencatatan.update', $stokMasuk->id) }}" method="post" class="grid grid-cols-1 md:grid-cols-2 gap-7 items-center w-full mb-0 align-top border-collapse">
                                    @csrf
                                    @method('PUT')
        
                                    <!-- Tanggal -->
                                    <div>
                                        <label for="tanggal" class="block mb-2 text-base font-medium">Tanggal Pemesanan</label>
                                        <input type="date" name="tanggal" id="tanggal" value="{{ old('tanggal', $stokMasuk->tanggal) }}" required
                                            class="bg-gray-50 border border-gray-300 text-sm rounded-lg block w-full p-2.5">
                                            @error('tanggal')
                                            <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                                        @enderror
                                    </div>
        
                                    <!-- Nama Bahan Baku -->
                                    <div>
                                        <label for="nama" class="block mb-2 text-base font-medium">Nama Bahan Baku</label>
                                        <input type="text" name="nama" id="nama" value="{{ old('nama', $stokMasuk->nama) }}" required
                                            class="bg-gray-50 border border-gray-300 text-sm rounded-lg block w-full p-2.5">
                                            @error('nama')
                                            <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                                        @enderror
                                    </div>
        
                                    <!-- Jumlah -->
                                    <div>
                                        <label for="jumlah" class="block mb-2 text-base font-medium">Jumlah Stok</label>
                                        <input type="number" name="jumlah" id="jumlah" value="{{ old('jumlah', $stokMasuk->jumlah) }}" required
                                        class="bg-gray-50 border border-gray-300 text-sm rounded-lg block w-full p-2.5">
                                        @error('jumlah')
                                            <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <!-- Satuan -->
                                    <div>
                                        <label for="satuan" class="block mb-2 text-base font-medium">Satuan</label>
                                        <select name="satuan" id="satuan" required
                                            class="bg-gray-50 border border-gray-300 text-sm rounded-lg block w-full p-2.5">
                                            <option value="" disabled {{ old('satuan', '') === '' ? 'selected' : '' }}>Pilih salah satu opsi</option>
                                            <option value="Kg" {{ old('satuan', $stokMasuk->satuan) == 'Kg' ? 'selected' : '' }}>Kg</option>
                                            <option value="Btl" {{ old('satuan', $stokMasuk->satuan) == 'Btl' ? 'selected' : '' }}>Btl</option>
                                        </select>
                                        @error('satuan')
                                        <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                                    @enderror
                                    </div>

                                    <!-- Harga Satuan -->
                                    <div>
                                        <label for="hargaSatuan" class="block mb-2 text-base font-medium">Harga Satuan</label>
                                        <div class="relative">
                                            <span
                                                class="absolute inset-y-0 left-0 flex items-center pl-3 text-sm text-gray-500">Rp</span>
                                            <input type="number" name="hargaSatuan" id="hargaSatuan" value="{{ old('hargaSatuan', $stokMasuk->hargaSatuan) }}" required
                                                class="pl-10 bg-gray-50 border border-gray-300 text-sm rounded-lg block w-full p-2.5">
                                        </div>
                                        @error('hargaSatuan')
                                        <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                                    @enderror
                                    </div>

                                    <!-- Total Harga -->
                                    <div>
                                        <label for="totalHarga" class="block mb-2 text-base font-medium">Total Harga</label>
                                        <div class="relative">
                                            <span
                                                class="absolute inset-y-0 left-0 flex items-center pl-3 text-sm text-gray-500">Rp</span>
                                            <input type="number" name="totalHarga" id="totalHarga" value="{{ old('totalHarga', $stokMasuk->totalHarga) }}" required
                                                class="pl-10 bg-gray-50 border border-gray-300 text-sm rounded-lg block w-full p-2.5">
                                        </div>
                                        @error('totalHarga')
                                        <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                                    @enderror
                                    </div>
        
                                    <!-- Supplier -->
                                    <div class="col-span-2">
                                        <label for="supplier" class="block mb-2 text-base font-medium">Supplier</label>
                                        <input type="text" name="supplier" id="supplier" value="{{ old('supplier', $stokMasuk->supplier) }}" required
                                            class="bg-gray-50 border border-gray-300 text-sm rounded-lg block w-full p-2.5">
                                            @error('supplier')
                                            <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                                        @enderror
                                    </div>
                                
                                    <!-- Tombol -->
                                    <div class="md:col-span-2 flex justify-start gap-4 mt-6 pt-8 border-t border-gray-200">
                                        <button type="submit"
                                            class="focus:outline-none text-white bg-yellow-400 hover:bg-yellow-500 focus:ring-4 focus:ring-yellow-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2">Edit</button>
                                            <a href="{{ route('pencatatan.index') }}"class="py-2.5 px-5 me-2 mb-2 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100">Batal</a>
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
{{-- Tambahkan script di bawah ini --}}
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const jumlahInput = document.getElementById('jumlah');
        const hargaSatuanInput = document.getElementById('hargaSatuan');
        const totalHargaInput = document.getElementById('totalHarga');

        function updateTotalHarga() {
            const jumlah = parseFloat(jumlahInput.value) || 0; // Ambil nilai jumlah, default 0 jika kosong/invalid
            const hargaSatuan = parseFloat(hargaSatuanInput.value) || 0; // Ambil nilai harga satuan, default 0 jika kosong/invalid
            
            const total = jumlah * hargaSatuan;
            totalHargaInput.value = total.toFixed(0); // Tampilkan tanpa desimal, atau toFixed(2) untuk 2 desimal
        }

        // Tambahkan event listener ke input jumlah dan harga satuan
        // 'input' event akan memicu fungsi setiap kali nilai berubah
        jumlahInput.addEventListener('input', updateTotalHarga);
        hargaSatuanInput.addEventListener('input', updateTotalHarga);
    });
</script>

</html>