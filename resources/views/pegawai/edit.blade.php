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

    {{-- Form Edit Data  --}}
    <div class="w-full px-6 py-6 mx-auto">
        <div class="flex flex-wrap justify-center -mx-3">
            <div class="flex-none w-full max-w-7xl px-3 py-6">
                <div
                    class="relative flex flex-col min-w-0 mb-6 break-words bg-white border-0 border-transparent border-solid shadow-xl rounded-2xl bg-clip-border">
                    <div class="p-6 pb-0 m-6 border-b-0 border-b-solid rounded-t-2xl border-b-transparent">
                        <h2 class="text-3xl font-bold mb-9">{{ $title }}</h2>
                        
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


                                <form action="{{ route('pegawai.update', $dataPegawai->id) }}" method="post" class="grid grid-cols-1 md:grid-cols-2 gap-7 items-center w-full mb-0 align-top border-collapse">
                                    @csrf
                                    @method('PUT')

                                    <!-- Nama Pegawai -->
                                    <div>
                                        <label for="nama_lengkap" class="block mb-2 text-base font-medium">Nama Pegawai</label>
                                        <input type="text" name="nama_lengkap" id="nama_lengkap" value="{{ old('nama_lengkap', $dataPegawai->nama_lengkap) }}" required
                                            class="bg-gray-50 border border-gray-300 text-sm rounded-lg block w-full p-2.5">
                                            @error('nama_lengkap')
                                            <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                                        @enderror
                                    </div>
        
                                    <!-- No. Telepon -->
                                    <div>
                                        <label for="nomor_telepon" class="block mb-2 text-base font-medium">No. Telepon</label>
                                        <input type="number" name="nomor_telepon" id="nomor_telepon" value="{{ old('nomor_telepon', $dataPegawai->nomor_telepon) }}" required
                                        class="bg-gray-50 border border-gray-300 text-sm rounded-lg block w-full p-2.5">
                                        @error('nomor_telepon')
                                            <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <!-- Email -->
                                    <div>
                                        <label for="email" class="block mb-2 text-base font-medium">Email</label>
                                        <input type="string" name="email" id="email" value="{{ old('email', $dataPegawai->user->email) }}" required
                                        class="bg-gray-50 border border-gray-300 text-sm rounded-lg block w-full p-2.5">
                                        @error('email')
                                            <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <!-- Alamat -->
                                    <div>
                                        <label for="alamat" class="block mb-2 text-base font-medium">Alamat Rumah</label>
                                        <textarea name="alamat" id="alamat" 
                                        required
                                        class="bg-gray-50 border border-gray-300 text-sm rounded-lg block w-full p-2.5">{{ old('alamat', $dataPegawai->alamat) }}</textarea>
                                        @error('alamat')
                                            <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <!-- Password -->
                                    <div>
                                        <label for="password" class="block mb-2 text-base font-medium">Password Baru (Kosongkan jika tidak diubah)</label>
                                        {{-- HAPUS atribut value dan required --}}
                                        <input type="password" name="password" id="password"
                                            class="bg-gray-50 border border-gray-300 text-sm rounded-lg block w-full p-2.5"
                                            placeholder="Masukkan password baru">
                                        @error('password')
                                            <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div>
                                        <label for="password_confirmation" class="block mb-2 text-base font-medium">Konfirmasi Password Baru</label>
                                        <input type="password" name="password_confirmation" id="password_confirmation"
                                            class="bg-gray-50 border border-gray-300 text-sm rounded-lg block w-full p-2.5"
                                            placeholder="Ketik ulang password baru">
                                    </div>
                                    
                                    <!-- Tombol -->
                                    <div class="md:col-span-2 flex justify-start gap-4 mt-6 pt-8 border-t border-gray-200">
                                        <button type="submit"
                                            class="bg-blue-700 hover:bg-blue-800 text-white focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 focus:outline-none">Simpan</button>
                                            <a href="{{ route('pegawai.index') }}"class="py-2.5 px-5 me-2 mb-2 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100">Batal</a>
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