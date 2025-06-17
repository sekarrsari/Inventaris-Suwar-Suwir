@extends('layouts.main')
@section('content')
<div class="w-full px-6 py-6 mx-auto">
    <div class="flex flex-wrap justify-center -mx-3">
        <div class="w-full max-w-4xl px-3">
            <div class="relative flex flex-col min-w-0 break-words bg-white border-0 border-transparent border-solid shadow-xl rounded-2xl bg-clip-border">
                <div class="px-8 py-6"> 
                    <h3 class="text-3xl font-bold text-gray-800 mb-6">Profil Akun</h3>
                    
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-x-4 gap-y-8 text-base">
                        {{-- Data dari tabel 'users' --}}
                        <div>
                            <p class="text-base font-semibold text-gray-500">Nama Lengkap</p>
                            <p class="text-gray-800">{{ $user->name }}</p>
                        </div>
                        <div>
                            <p class="text-base font-semibold text-gray-500">Email</p>
                            <p class="text-gray-800">{{ $user->email }}</p>
                        </div>
                        <div>
                            <p class="text-base font-semibold text-gray-500">Peran Akun</p>
                            <p class="text-gray-800 capitalize">{{ $user->getRoleNames()->first() }}</p>
                        </div>

                        {{-- Tampilkan data ini HANYA jika user adalah seorang pegawai --}}
                        @if ($user->profilPegawai)
                            <hr class="my-4">
                            <div>
                                <p class="text-base font-semibold text-gray-500">Nomor Telepon</p>
                                <p class="text-gray-800">{{ $user->profilPegawai->nomor_telepon ?? '-' }}</p>
                            </div>
                            <div>
                                <p class="text-base font-semibold text-gray-500">Alamat</p>
                                <p class="text-gray-800">{{ $user->profilPegawai->alamat ?? '-' }}</p>
                            </div>
                        @endif
                    </div>

                    <div class="mt-8">
                        {{-- Nanti Anda bisa menambahkan tombol untuk edit profil di sini --}}
                        {{-- <a href="#" class="text-white bg-blue-700 hover:bg-blue-800 font-medium rounded-lg text-base px-5 py-2.5">
                            Edit Profil
                        </a> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



@endsection