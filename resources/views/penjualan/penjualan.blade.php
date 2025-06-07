@extends('layouts.main')
@section('content')
    <div class="w-full px-6 py-6 mx-auto">
        <div class="flex flex-wrap -mx-3">
            <div class="flex-none w-full max-w-full px-3">
                <div
                    class="relative flex flex-col min-w-0 mb-6 break-words bg-white border-0 border-transparent border-solid shadow-xl rounded-2xl bg-clip-border">
                    <div class="p-6 pb-0 mb-0 border-b-0 border-b-solid rounded-t-2xl border-b-transparent">
                        <div class="flex justify-between items-center mt-3 mb-12">
                            <h3 class="text-4xl text-gray-800 font-bold">Penjualan Bulanan</h3>
                            @can('create_penjualan')
                            <a href="{{ route('penjualan.create') }}"
                                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 focus:outline-none">
                                Tambah Data Penjualan
                            </a>
                            @endcan
                        </div>

                        {{-- Form Filter --}}
                        <form method="GET" action="{{ route('penjualan.index') }}" class="mb-6">
                            <div class="flex flex-wrap items-end gap-4">
                                <div>
                                    <label for="filter_bulan" class="block mb-1 text-sm font-medium text-gray-700">Filter
                                        Bulan:</label>
                                    <select name="filter_bulan" id="filter_bulan"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                                        <option value="">Semua Bulan</option>
                                        @foreach($bulanList as $bulan)
                                            <option value="{{ $bulan }}" {{ $filter_bulan_aktif == $bulan ? 'selected' : '' }}>
                                                {{ $bulan }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div>
                                    <label for="filter_tahun" class="block mb-1 text-sm font-medium text-gray-700">Filter
                                        Tahun:</label>
                                    <select name="filter_tahun" id="filter_tahun"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                                        <option value="">Semua Tahun</option>
                                        @foreach($tahunList as $tahun)
                                            <option value="{{ $tahun }}" {{ $filter_tahun_aktif == $tahun ? 'selected' : '' }}>
                                                {{ $tahun }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <button type="submit"
                                    class="text-white bg-green-600 hover:bg-green-700 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5">
                                    Filter
                                </button>
                                <a href="{{ route('penjualan.index') }}"
                                    class="text-gray-700 bg-gray-200 hover:bg-gray-300 focus:ring-4 focus:ring-gray-100 font-medium rounded-lg text-sm px-5 py-2.5">
                                    Reset
                                </a>
                            </div>
                        </form>


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
                                            No.</th>
                                        {{-- Helper function untuk link sorting --}}
                                        @php
                                            function sortableLink($label, $column, $currentSortBy, $currentSortDir, $requestParams)
                                            {
                                                $sortDir = ($currentSortBy == $column && $currentSortDir == 'asc') ? 'desc' : 'asc';
                                                $icon = '';
                                                if ($currentSortBy == $column) {
                                                    $icon = ($currentSortDir == 'asc') ? '&#9650;' : '&#9660;'; // ▲ ▼
                                                }
                                                // Gabungkan parameter filter yang ada dengan parameter sorting baru
                                                $queryParams = array_merge($requestParams, ['sort_by' => $column, 'sort_direction' => $sortDir]);
                                                return '<a href="' . route('penjualan.index', $queryParams) . '">' . $label . ' ' . $icon . '</a>';
                                            }
                                        @endphp

                                        <th scope="col"
                                            class="px-6 py-3 font-bold text-left align-middle bg-transparent border-b border-collapse shadow-none border-b-solid tracking-none whitespace-nowrap">
                                            {!! sortableLink('Bulan', 'bulan', $sort_by_aktif, $sort_direction_aktif, request()->only(['filter_bulan', 'filter_tahun'])) !!}
                                        </th>
                                        <th scope="col"
                                            class="px-6 py-3 font-bold text-left align-middle bg-transparent border-b border-collapse shadow-none border-b-solid tracking-none whitespace-nowrap">
                                            {!! sortableLink('Tahun', 'tahun', $sort_by_aktif, $sort_direction_aktif, request()->only(['filter_bulan', 'filter_tahun'])) !!}
                                        </th>
                                        <th scope="col"
                                            class="px-6 py-3 font-bold text-left align-middle bg-transparent border-b border-collapse shadow-none border-b-solid tracking-none whitespace-nowrap">
                                            {!! sortableLink('Penjualan Rasa Original (Kg)', 'jumlah_ori', $sort_by_aktif, $sort_direction_aktif, request()->only(['filter_bulan', 'filter_tahun'])) !!}
                                        </th>
                                        <th scope="col"
                                            class="px-6 py-3 font-bold text-left align-middle bg-transparent border-b border-collapse shadow-none border-b-solid tracking-none whitespace-nowrap">
                                            {!! sortableLink('Penjualan Rasa Mix (Kg)', 'jumlah_rasa', $sort_by_aktif, $sort_direction_aktif, request()->only(['filter_bulan', 'filter_tahun'])) !!}
                                        </th>
                                        <th scope="col"
                                            class="px-6 py-3 font-bold text-left align-middle bg-transparent border-b border-collapse shadow-none border-b-solid tracking-none whitespace-nowrap">
                                        </th>
                                    </tr>
                                </thead>

                                <tbody class="bg-white">
                                    @forelse ($dataPenjualan as $jual)
                                        <tr class="text-sm border-b hover:bg-gray-50">
                                            <td
                                                class="px-6 py-3 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                                                {{-- Jika tidak menggunakan pagination --}}
                                                {{-- {{ $loop->iteration }} --}}

                                                {{-- Jika menggunakan pagination, $suppliers harus berupa instance Paginator
                                                --}}
                                                {{ ($dataPenjualan->currentPage() - 1) * $dataPenjualan->perPage() + $loop->iteration }}
                                            </td>
                                            <td
                                                class="px-6 py-3 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                                                {{ $jual->bulan }}
                                            </td>
                                            <td
                                                class="px-6 py-3 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                                                {{ $jual->tahun }}
                                            </td>
                                            <td
                                                class="px-6 py-3 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                                                {{ $jual->jumlah_ori }}
                                            </td>
                                            <td
                                                class="px-6 py-3 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                                                {{ $jual->jumlah_rasa }}
                                            </td>
                                            <td
                                                class="px-6 py-3 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                                                {{-- Tombol Detail (Show) --}}
                                                {{-- <a href="{{ route('penjualan.show', $jual->id) }}"
                                                    class="focus:outline-none text-white bg-blue-500 hover:bg-blue-600 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-xs px-3 py-2 me-1 mb-1">
                                                    Detail
                                                </a> --}}
                                                @canany(['edit_penjualan', 'delete_penjualan'])
                                                    @can('edit_penjualan')
                                                    {{-- Tombol Edit --}}
                                                    <a href="{{ route('penjualan.edit', $jual->id) }}"
                                                        class="focus:outline-none text-white bg-yellow-400 hover:bg-yellow-500 focus:ring-4 focus:ring-yellow-300 font-medium rounded-lg text-xs px-3 py-2 me-1 mb-1">
                                                        Edit
                                                    </a>
                                                    @endcan
                                                    @can('delete_penjualan')
                                                    {{-- Tombol Delete --}}
                                                    <button type="button"
                                                        onclick="showDeleteModal('{{ route('penjualan.destroy', $jual->id) }}')"
                                                        class="focus:outline-none text-white bg-red-600 hover:bg-red-700 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-xs px-3 py-2 me-1 mb-1">
                                                        Hapus
                                                    </button>
                                                    @endcan
                                            </td>
                                            @endcanany
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="10" class="text-center px-6 py-4">Tidak ada data penjualan.</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                        {{-- Pagination links --}}
                        @if ($dataPenjualan->hasPages())
                            <div class="p-4">
                                {{ $dataPenjualan->appends(request()->query())->links() }}
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>


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
                    <svg class="mx-auto mb-4 w-14 h-14 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg">
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