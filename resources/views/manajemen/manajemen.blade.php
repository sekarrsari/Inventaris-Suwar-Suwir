@extends('layouts.main')
@section('content')
    <div class="w-full px-6 py-6 mx-auto">
        <div class="flex flex-wrap -mx-3">
            <div class="flex-none w-full max-w-full px-3">
                <div
                    class="relative flex flex-col min-w-0 mb-6 break-words bg-white border-0 border-transparent border-solid shadow-xl rounded-2xl bg-clip-border">
                    <div class="p-6 pb-0 mb-0 border-b-0 border-b-solid rounded-t-2xl border-b-transparent">
                        <div class="flex justify-between items-center mt-3 mb-12">
                            <h3 class="text-4xl text-gray-800 font-bold">Manajemen Bahan Baku</h3>
                            <a href="{{ route('manajemen.create') }}"
                                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 focus:outline-none">
                                Tambah Bahan Baku
                            </a>
                        </div>
                        {{-- Notifikasi Sukses --}}
                        @if (session()->has('success'))
                            <div class="p-4 mb-4 text-sm text-green-700 bg-green-100 rounded-lg dark:bg-green-200 dark:text-green-800"
                                role="alert">
                                <span class="font-medium">Berhasil!</span> {{ session('success') }}
                            </div>
                        @endif
                        {{-- Notifikasi Error (jika ada) --}}
                        @if ($errors->any())
                            <div class="p-4 mb-4 text-sm text-red-700 bg-red-100 rounded-lg dark:bg-red-200 dark:text-red-800"
                                role="alert">
                                <span class="font-medium">Gagal!</span>
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                    </div>
                    <div class="flex-auto px-0 pt-0 pb-2">
                        <div class="p-0 overflow-x-auto">
                            <table class="items-center w-full mb-0 align-top border-collapse text-slate-500">

                                <thead class="text-base font-semibold text-black bg-gray-200">
                                    <tr>
                                        <th scope="col"
                                            class="px-6 py-3 font-bold text-left align-middle bg-transparent border-b border-collapse shadow-none border-b-solid tracking-none whitespace-nowrap">
                                            Kode Bahan</th>
                                        <th scope="col"
                                            class="px-6 py-3 font-bold text-left align-middle bg-transparent border-b border-collapse shadow-none border-b-solid tracking-none whitespace-nowrap">
                                            Nama Bahan Baku</th>
                                        <th scope="col"
                                            class="px-6 py-3 font-bold text-left align-middle bg-transparent border-b border-collapse shadow-none border-b-solid tracking-none whitespace-nowrap">
                                            Jenis</th>
                                        {{-- <th scope="col"
                                            class="px-6 py-3 font-bold text-left align-middle bg-transparent border-b border-collapse shadow-none border-b-solid tracking-none whitespace-nowrap">
                                            Satuan</th> --}}
                                        <th scope="col"
                                            class="px-6 py-3 font-bold text-left align-middle bg-transparent border-b border-collapse shadow-none border-b-solid tracking-none whitespace-nowrap">
                                            Supplier</th>
                                        <th scope="col"
                                            class="px-6 py-3 font-bold text-left align-middle bg-transparent border-b border-collapse shadow-none border-b-solid tracking-none whitespace-nowrap">
                                            Pembelian Terakhir</th>
                                        <th scope="col"
                                            class="px-6 py-3 font-bold text-left align-middle bg-transparent border-b border-collapse shadow-none border-b-solid tracking-none whitespace-nowrap">
                                            Harga per satuan</th>
                                        {{-- <th scope="col"
                                            class="px-6 py-3 font-bold text-left align-middle bg-transparent border-b border-collapse shadow-none border-b-solid tracking-none whitespace-nowrap">
                                            Stok Minimum</th> --}}
                                        <th scope="col"
                                            class="px-6 py-3 font-bold text-left align-middle bg-transparent border-b border-collapse shadow-none border-b-solid tracking-none whitespace-nowrap">
                                            Status</th>
                                        <th scope="col"
                                            class="px-6 py-3 font-bold text-left align-middle bg-transparent border-b border-collapse shadow-none border-b-solid tracking-none whitespace-nowrap">
                                        </th>
                                    </tr>
                                </thead>

                                <tbody class="bg-white">
                                    @forelse ($bahanBaku as $bahan)
                                        <tr class="text-sm border-b hover:bg-gray-50">
                                            <td
                                                class="px-6 py-3 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                                                {{ $bahan->kode }}
                                            </td>
                                            <td
                                                class="px-6 py-3 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                                                {{ $bahan->nama }}</td>
                                            <td
                                                class="px-6 py-3 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                                                {{ $bahan->jenis }}</td>
                                            {{-- <td
                                                class="px-6 py-3 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                                                {{ $bahan->satuan }}</td> --}}
                                            <td
                                                class="px-6 py-3 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                                                {{ $bahan->supplier }}</td>
                                            <td
                                                class="px-6 py-3 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                                                {{ $bahan->tanggalBeli }}</td>
                                            <td
                                                class="px-6 py-3 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                                                {{ $bahan->harga }}</td>
                                            {{-- <td
                                                class="px-6 py-3 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                                                {{ $bahan->stokMinimum }}</td> --}}
                                            <td
                                                class="px-6 py-3 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                                                @php
                                                    $statusText = $bahan->status; // Mengambil status langsung dari data
                                                    $statusClass = '';
                                                    // Menggunakan nilai $statusText yang sudah ada atau ditentukan di atas
                                                    if (strtolower($statusText) === 'tersedia') {
                                                        $statusClass = 'border-green-500 text-green-700 bg-green-100';
                                                    } elseif (strtolower($statusText) === 'hampir habis') {
                                                        $statusClass = 'border-yellow-500 text-yellow-700 bg-yellow-100';
                                                    } elseif (strtolower($statusText) === 'habis') {
                                                        $statusClass = 'border-red-500 text-red-700 bg-red-100';
                                                    } else {
                                                        $statusClass = 'border-gray-400 text-gray-700 bg-gray-100'; // Default class
                                                    }
                                                @endphp
                                                <span class="px-3 py-1 text-xs font-semibold border rounded-md {{ $statusClass }}">
                                                    {{ ucfirst($statusText) }}
                                                </span>
                                            </td>
                                            <td
                                                class="px-6 py-3 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                                                {{-- Tombol Detail (Show) --}}
                                                <a href="{{ route('manajemen.show', $bahan->id) }}" class="focus:outline-none text-white bg-blue-500 hover:bg-blue-600 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-xs px-3 py-2 me-1 mb-1">
                                                    Detail
                                                </a>
                                                {{-- Tombol Edit --}}
                                                <a href="{{ route('manajemen.edit', $bahan->id) }}" class="focus:outline-none text-white bg-yellow-400 hover:bg-yellow-500 focus:ring-4 focus:ring-yellow-300 font-medium rounded-lg text-xs px-3 py-2 me-1 mb-1">
                                                    Edit
                                                </a>
                                                {{-- Tombol Delete --}}
                                                <button type="button"
                                                    onclick="showDeleteModal('{{ route('manajemen.destroy', $bahan->id) }}')"
                                                    class="focus:outline-none text-white bg-red-600 hover:bg-red-700 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-xs px-3 py-2 me-1 mb-1">
                                                    Hapus
                                                </button>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="10" class="text-center px-6 py-4">Tidak ada data bahan baku.</td>
                                        </tr>
                                    @endforelse
                                </tbody>

                                {{-- TABEL LAMA --}}
                                {{-- HEADER TABEL --}}
                                {{-- <thead class="align-bottom">
                                    <tr>
                                        <th
                                            class="px-6 py-3 font-bold text-left uppercase align-middle bg-transparent border-b border-collapse shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                            Kode Bahan Baku</th>
                                        <th
                                            class="px-6 py-3 font-bold text-left uppercase align-middle bg-transparent border-b border-collapse shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                            Nama Bahan Baku</th>
                                        <th
                                            class="px-6 py-3 pl-2 font-bold text-left uppercase align-middle bg-transparent border-b border-collapse shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                            Jenis</th>
                                        <th
                                            class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b border-collapse shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                            Satuan</th>
                                        <th
                                            class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b border-collapse shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                            Supplier</th>
                                        <th
                                            class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b border-collapse shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                            Tanggal Pembelian Terakhir</th>
                                        <th
                                            class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b border-collapse shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                            Harga per satuan</th>
                                        <th
                                            class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b border-collapse shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                            Stok Minimum (Kg)</th>
                                        <th
                                            class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b border-collapse shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                            Status</th>
                                        <th
                                            class="px-6 py-3 font-semibold capitalize align-middle bg-transparent border-b border-collapse border-solid shadow-none tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                        </th>
                                    </tr>
                                </thead> --}}

                                {{-- ISI TABEL --}}
                                {{-- <tbody>
                                    <tr>
                                        <td
                                            class="p-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                                            <div class="flex px-2 py-1">
                                                <div>
                                                    <img src="../assets/img/team-2.jpg"
                                                        class="inline-flex items-center justify-center mr-4 text-sm text-white transition-all duration-200 ease-in-out h-9 w-9 rounded-xl"
                                                        alt="user1" />
                                                </div>
                                                <div class="flex flex-col justify-center">
                                                    <h6 class="mb-0 text-sm leading-normal">John Michael
                                                    </h6>
                                                    <p class="mb-0 text-xs leading-tight text-slate-400">
                                                        john@creative-tim.com</p>
                                                </div>
                                            </div>
                                        </td>
                                        <td
                                            class="p-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                                            <p class="mb-0 text-xs font-semibold leading-tight">
                                                Manager</p>
                                            <p class="mb-0 text-xs leading-tight text-slate-400">
                                                Organization</p>
                                        </td>
                                        <td
                                            class="p-2 text-sm leading-normal text-center align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                                            <span
                                                class="bg-gradient-to-tl from-emerald-500 to-teal-400 px-2.5 text-xs rounded-1.8 py-1.4 inline-block whitespace-nowrap text-center align-baseline font-bold uppercase leading-none text-white">Online</span>
                                        </td>
                                        <td
                                            class="p-2 text-center align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                                            <span class="text-xs font-semibold leading-tight text-slate-400">23/04/18</span>
                                        </td>
                                        <td
                                            class="p-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                                            <a href="javascript:;"
                                                class="text-xs font-semibold leading-tight text-slate-400">
                                                Edit </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td
                                            class="p-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                                            <div class="flex px-2 py-1">
                                                <div>
                                                    <img src="../assets/img/team-3.jpg"
                                                        class="inline-flex items-center justify-center mr-4 text-sm text-white transition-all duration-200 ease-in-out h-9 w-9 rounded-xl"
                                                        alt="user2" />
                                                </div>
                                                <div class="flex flex-col justify-center">
                                                    <h6 class="mb-0 text-sm leading-normal">Alexa Liras</h6>
                                                    <p class="mb-0 text-xs leading-tight text-slate-400">
                                                        alexa@creative-tim.com</p>
                                                </div>
                                            </div>
                                        </td>
                                        <td
                                            class="p-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                                            <p class="mb-0 text-xs font-semibold leading-tight">
                                                Programator</p>
                                            <p class="mb-0 text-xs leading-tight text-slate-400">
                                                Developer</p>
                                        </td>
                                        <td
                                            class="p-2 text-sm leading-normal text-center align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                                            <span
                                                class="bg-gradient-to-tl from-slate-600 to-slate-300 px-2.5 text-xs rounded-1.8 py-1.4 inline-block whitespace-nowrap text-center align-baseline font-bold uppercase leading-none text-white">Offline</span>
                                        </td>
                                        <td
                                            class="p-2 text-center align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                                            <span class="text-xs font-semibold leading-tight text-slate-400">11/01/19</span>
                                        </td>
                                        <td
                                            class="p-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                                            <a href="javascript:;"
                                                class="text-xs font-semibold leading-tight text-slate-400">
                                                Edit </a>
                                        </td>
                                    </tr>
                                </tbody> --}}

                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    {{--
    <!-- Header -->
    <div class="mb-8">
        <h1 class="text-2xl md:text-3xl font-bold text-gray-800">Manajemen Bahan Baku</h1>
    </div>

    <!-- Search and Filter -->
    <div class="mb-6 flex flex-col md:flex-row gap-4">
        <div class="relative flex-grow">
            <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                <svg class="w-4 h-4 text-gray-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewBox="0 0 20 20">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                </svg>
            </div>
            <input type="text" id="search"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5"
                placeholder="Type here to search">
        </div>
        <button type="button"
            class="px-4 py-2.5 text-sm font-medium text-white bg-blue-700 hover:bg-blue-800 rounded-lg focus:ring-4 focus:ring-blue-300 whitespace-nowrap">
            Tambah Bahan Baku
        </button>
    </div>

    <!-- Table -->
    <div class="bg-white rounded-lg shadow overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-sm text-left text-gray-500">
                <!-- Table Header -->
                <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                    <tr>
                        <th scope="col" class="px-6 py-3">Kode Bahan</th>
                        <th scope="col" class="px-6 py-3">Nama Bahan Baku</th>
                        <th scope="col" class="px-6 py-3">Jenis</th>
                        <th scope="col" class="px-6 py-3">Satuan</th>
                        <th scope="col" class="px-6 py-3">Supplier</th>
                        <th scope="col" class="px-6 py-3">Pembelian Terakhir</th>
                        <th scope="col" class="px-6 py-3">Harga per satuan</th>
                        <th scope="col" class="px-6 py-3">Stok Minimum</th>
                        <th scope="col" class="px-6 py-3">Status</th>
                        <th scope="col" class="px-6 py-3">Aksi</th>
                    </tr>
                </thead>
                <!-- Table Body -->
                <tbody>
                    <!-- Row 1 -->
                    <tr class="bg-white border-b hover:bg-gray-50">
                        <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">EK01</td>
                        <td class="px-6 py-4">Singileng</td>
                        <td class="px-6 py-4">Bahan utama</td>
                        <td class="px-6 py-4">Kg</td>
                        <td class="px-6 py-4">Petani Gorontalo</td>
                        <td class="px-6 py-4">2025-05-06</td>
                        <td class="px-6 py-4">5000</td>
                        <td class="px-6 py-4">100</td>
                        <td class="px-6 py-4">
                            <span
                                class="bg-green-100 text-green-800 text-xs font-medium px-2.5 py-0.5 rounded">Tersedia</span>
                        </td>
                        <td class="px-6 py-4">
                            <button class="font-medium text-blue-600 hover:underline">Edit</button>
                        </td>
                    </tr>
                    <!-- Row 2 -->
                    <tr class="bg-white border-b hover:bg-gray-50">
                        <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">EK02</td>
                        <td class="px-6 py-4">Olu Manih</td>
                        <td class="px-6 py-4">Bahan utama</td>
                        <td class="px-6 py-4">Kg</td>
                        <td class="px-6 py-4">Pedagang Mongondow</td>
                        <td class="px-6 py-4">2025-05-06</td>
                        <td class="px-6 py-4">10000</td>
                        <td class="px-6 py-4">50</td>
                        <td class="px-6 py-4">
                            <span
                                class="bg-green-100 text-green-800 text-xs font-medium px-2.5 py-0.5 rounded">Tersedia</span>
                        </td>
                        <td class="px-6 py-4">
                            <button class="font-medium text-blue-600 hover:underline">Edit</button>
                        </td>
                    </tr>
                    <!-- Row 3 -->
                    <tr class="bg-white border-b hover:bg-gray-50">
                        <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">EK03</td>
                        <td class="px-6 py-4">Perona Makaram</td>
                        <td class="px-6 py-4">Tambahan</td>
                        <td class="px-6 py-4">Liter</td>
                        <td class="px-6 py-4">Toko ASW</td>
                        <td class="px-6 py-4">2025-05-06</td>
                        <td class="px-6 py-4">25000</td>
                        <td class="px-6 py-4">10</td>
                        <td class="px-6 py-4">
                            <span class="bg-red-100 text-red-800 text-xs font-medium px-2.5 py-0.5 rounded">Hampir
                                Habis</span>
                        </td>
                        <td class="px-6 py-4">
                            <button class="font-medium text-blue-600 hover:underline">Edit</button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <!-- Pagination -->
    <nav class="mt-6 flex items-center justify-between" aria-label="Table navigation">
        <span class="text-sm font-normal text-gray-500">Showing <span class="font-semibold text-gray-900">1-3</span> of
            <span class="font-semibold text-gray-900">3</span></span>
        <ul class="inline-flex -space-x-px text-sm h-8">
            <li>
                <a href="#"
                    class="flex items-center justify-center px-3 h-8 ml-0 leading-tight text-gray-500 bg-white border border-gray-300 rounded-l-lg hover:bg-gray-100 hover:text-gray-700">Previous</a>
            </li> --}}


    {{-- HTML untuk Modal Konfirmasi Hapus --}}
    <div id="deleteConfirmationModal" tabindex="-1" aria-hidden="true"
        class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-modal md:h-full">
        <div class="relative p-4 w-full max-w-md h-full md:h-auto">
            {{-- Latar belakang semi-transparan saat modal aktif --}}
            <div id="modalBackdrop"
                class="fixed inset-0 bg-gray-900 bg-opacity-50 transition-opacity duration-300 ease-in-out"
                style="display: none;"></div>

            {{-- Konten Modal --}}
            <div class="relative bg-white rounded-lg shadow transform transition-all duration-300 ease-in-out scale-95 opacity-0"
                id="modalContent" style="display: none;">
                <button type="button"
                    class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center"
                    onclick="hideDeleteModal()">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                            clip-rule="evenodd"></path>
                    </svg>
                </button>
                <div class="p-6 text-center">
                    <svg class="mx-auto mb-4 w-14 h-14 text-red-600" fill="none" stroke="currentColor"
                        viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                    <h3 class="mb-5 text-lg font-semibold text-black">
                        Apakah Anda yakin ingin menghapus data ini?
                    </h3>
                    <form id="deleteModalForm" method="POST" action=""> {{-- Action akan diisi oleh JavaScript --}}
                        @csrf
                        @method('DELETE')
                        <button type="submit"
                            class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center mr-2">
                            Ya, Hapus
                        </button>
                        <button type="button" onclick="hideDeleteModal()"
                            class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10">
                            Batal
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>


    {{-- JavaScript untuk Modal --}}
    @push('scripts')
        <script>
            const deleteModalElement = document.getElementById('deleteConfirmationModal');
            const deleteModalForm = document.getElementById('deleteModalForm');
            const modalBackdrop = document.getElementById('modalBackdrop');
            const modalContent = document.getElementById('modalContent'); // Tambahkan ini

            function showDeleteModal(actionUrl) {
                deleteModalForm.action = actionUrl;
                deleteModalElement.classList.remove('hidden');
                deleteModalElement.classList.add('flex'); // Untuk memposisikan modal di tengah

                // Tampilkan backdrop dan konten modal dengan sedikit animasi
                modalBackdrop.style.display = 'block';
                modalContent.style.display = 'block';
                setTimeout(() => { // Beri sedikit waktu untuk display block sebelum transisi
                    modalBackdrop.classList.remove('opacity-0');
                    modalBackdrop.classList.add('opacity-100');
                    modalContent.classList.remove('opacity-0', 'scale-95');
                    modalContent.classList.add('opacity-100', 'scale-100');
                }, 10);


            }

            function hideDeleteModal() {
                // Sembunyikan dengan animasi
                modalBackdrop.classList.remove('opacity-100');
                modalBackdrop.classList.add('opacity-0');
                modalContent.classList.remove('opacity-100', 'scale-100');
                modalContent.classList.add('opacity-0', 'scale-95');

                setTimeout(() => { // Tunggu animasi selesai sebelum menyembunyikan total
                    deleteModalElement.classList.add('hidden');
                    deleteModalElement.classList.remove('flex');
                    modalBackdrop.style.display = 'none';
                    modalContent.style.display = 'none';
                    deleteModalForm.action = '';
                }, 300); // Sesuaikan dengan durasi transisi Tailwind (default 300ms)
            }

            if (modalBackdrop) {
                modalBackdrop.addEventListener('click', function (event) {
                    if (event.target === modalBackdrop) {
                        hideDeleteModal();
                    }
                });
            }

            document.addEventListener('keydown', function (event) {
                if (event.key === "Escape" && !deleteModalElement.classList.contains('hidden')) {
                    hideDeleteModal();
                }
            });
        </script>
    @endpush
@endsection