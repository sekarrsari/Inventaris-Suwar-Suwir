@extends('layouts.main')
@section('content')
    <div class="w-full px-6 py-6 mx-auto">
        <div class="flex flex-wrap -mx-3">
            <div class="flex-none w-full max-w-full px-3">
                <div
                    class="relative flex flex-col min-w-0 mb-6 break-words bg-white border-0 border-transparent border-solid shadow-xl rounded-2xl bg-clip-border">
                    <div class="p-6 pb-0 mb-0 border-b-0 border-b-solid rounded-t-2xl border-b-transparent">
                        <div class="flex justify-between items-center mt-3 mb-12">
                            <h3 class="text-4xl text-gray-800 font-bold">Pencatatan Stok Masuk</h3>
                            <div class="flex items-center">
                                @can('create_pencatatan')
                                {{-- Tombol Tambah Stok Masuk --}}
                                <button type="button" onclick="window.location.href='./pencatatan/create'"
                                    class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 focus:outline-none">
                                    Tambah Stok Masuk
                                </button>
                                @endcan
                            </div>
                        </div>


                        {{-- Form Pencarian --}}
                        <form method="GET" action="{{ route('pencatatan.index') }}" class="mb-8">
                            <div class="flex flex-wrap items-end -mx-2">
                                <div class="w-full sm:w-1/2 md:w-1/3 px-2 mb-4">
                                    <label for="search_nama" class="block mb-2 text-sm font-medium text-gray-900">Nama Bahan
                                        Baku</label>
                                    <input type="text" id="search_nama" name="search_nama"
                                        value="{{ request('search_nama') }}"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                        placeholder="Cari nama bahan...">
                                </div>
                                <div class="w-full sm:w-1/2 md:w-1/3 px-2 mb-4">
                                    <label for="search_tanggal" class="block mb-2 text-sm font-medium text-gray-900">Tanggal
                                        Pemesanan</label>
                                    <input type="date" id="search_tanggal" name="search_tanggal"
                                        value="{{ request('search_tanggal') }}"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                                </div>
                                <div class="w-full md:w-1/3 px-2 mb-4 flex items-center space-x-2">
                                    <button type="submit"
                                        class="text-white bg-green-600 hover:bg-green-700 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 focus:outline-none">
                                        Cari
                                    </button>
                                    @if(request()->has('search_nama') || request()->has('search_tanggal'))
                                        <a href="{{ route('pencatatan.index') }}"
                                            class="text-gray-700 bg-gray-200 hover:bg-gray-300 focus:ring-4 focus:ring-gray-100 font-medium rounded-lg text-sm px-5 py-2.5 focus:outline-none">
                                            Reset
                                        </a>
                                    @endif
                                </div>
                            </div>
                        </form>
                        {{-- Akhir Form Pencarian --}}

                        {{-- Notifikasi Sukses --}}
                        @if (session()->has('success'))
                            <div class="p-4 mb-4 text-sm text-green-700 bg-green-100 rounded-lg"
                                role="alert">
                                <span class="font-medium">Berhasil!</span> {{ session('success') }}
                            </div>
                        @endif
                        {{-- Notifikasi Error (jika ada) --}}
                        @if ($errors->any())
                            <div class="p-4 mb-4 text-sm text-red-700 bg-red-100 rounded-lg"
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
                                        <th scope="col"
                                            class="px-6 py-3 font-bold text-left align-middle bg-transparent border-b border-collapse shadow-none border-b-solid tracking-none whitespace-nowrap">
                                            Tanggal Pemesanan</th>
                                        <th scope="col"
                                            class="px-6 py-3 font-bold text-left align-middle bg-transparent border-b border-collapse shadow-none border-b-solid tracking-none whitespace-nowrap">
                                            Nama Bahan Baku</th>
                                        {{-- <th scope="col"
                                            class="px-6 py-3 font-bold text-left align-middle bg-transparent border-b border-collapse shadow-none border-b-solid tracking-none whitespace-nowrap">
                                            Jenis</th> --}}
                                        <th scope="col"
                                            class="px-6 py-3 font-bold text-left align-middle bg-transparent border-b border-collapse shadow-none border-b-solid tracking-none whitespace-nowrap">
                                            Jumlah Stok</th>
                                        {{-- <th scope="col"
                                            class="px-6 py-3 font-bold text-left align-middle bg-transparent border-b border-collapse shadow-none border-b-solid tracking-none whitespace-nowrap">
                                            Satuan</th> --}}
                                        {{-- <th scope="col"
                                            class="px-6 py-3 font-bold text-left align-middle bg-transparent border-b border-collapse shadow-none border-b-solid tracking-none whitespace-nowrap">
                                            Harga Satuan</th> --}}
                                        <th scope="col"
                                            class="px-6 py-3 font-bold text-left align-middle bg-transparent border-b border-collapse shadow-none border-b-solid tracking-none whitespace-nowrap">
                                            Total Harga</th>
                                        <th scope="col"
                                            class="px-6 py-3 font-bold text-left align-middle bg-transparent border-b border-collapse shadow-none border-b-solid tracking-none whitespace-nowrap">
                                            Supplier</th>
                                        {{-- <th scope="col"
                                            class="px-6 py-3 font-bold text-left align-middle bg-transparent border-b border-collapse shadow-none border-b-solid tracking-none whitespace-nowrap">
                                            Bulan</th>
                                        <th scope="col"
                                            class="px-6 py-3 font-bold text-left align-middle bg-transparent border-b border-collapse shadow-none border-b-solid tracking-none whitespace-nowrap">
                                            Musim</th> --}}
                                        <th scope="col"
                                            class="px-6 py-3 font-bold text-left align-middle bg-transparent border-b border-collapse shadow-none border-b-solid tracking-none whitespace-nowrap">
                                        </th>
                                    </tr>
                                </thead>

                                <tbody class="bg-white">
                                    @forelse ($stokMasuk as $stok)
                                        <tr class="text-sm border-b hover:bg-gray-50">
                                            <td
                                                class="px-6 py-3 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                                                {{-- Jika tidak menggunakan pagination --}}
                                                {{-- {{ $loop->iteration }} --}}

                                                {{-- Jika menggunakan pagination, $suppliers harus berupa instance Paginator
                                                --}}
                                                {{ ($stokMasuk->currentPage() - 1) * $stokMasuk->perPage() + $loop->iteration }}
                                            </td>
                                            <td
                                                class="px-6 py-3 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                                                {{ $stok->tanggal ? $stok->tanggal->format('d-m-Y') : '' }}
                                            </td>
                                            <td
                                                class="px-6 py-3 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                                                {{ $stok->nama }}
                                            </td>
                                            {{-- <td
                                                class="px-6 py-3 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                                                {{ $stok->jenis }}</td> --}}
                                            <td
                                                class="px-6 py-3 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                                                {{ $stok->jumlah }} {{ $stok->satuan }}
                                            </td>
                                            {{-- <td
                                                class="px-6 py-3 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                                                {{ $stok->satuan }}</td> --}}
                                            {{-- <td
                                                class="px-6 py-3 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                                                {{ $stok->hargaSatuan }}</td> --}}
                                            <td
                                                class="px-6 py-3 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                                                Rp {{ number_format($stok->totalHarga, 0, ',', '.') }}
                                            </td>
                                            <td
                                                class="px-6 py-3 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                                                {{ $stok->supplier }}
                                            </td>
                                            {{-- <td
                                                class="px-6 py-3 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                                                {{ $stok->bulan }}</td>
                                            <td
                                                class="px-6 py-3 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                                                {{ $stok->musim }}</td> --}}
                                                <td
                                                class="px-6 py-3 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                                                {{-- Tombol Detail (Show) --}}
                                                <a href="{{ route('pencatatan.show', $stok->id) }}"
                                                    class="focus:outline-none text-white bg-blue-500 hover:bg-blue-600 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-xs px-3 py-2 me-1 mb-1">
                                                    Detail
                                                </a>
                                                @canany(['edit_pencatatan', 'delete_pencatatan'])
                                                {{-- Tombol Edit --}}
                                                @can('edit_pencatatan')
                                                <a href="{{ route('pencatatan.edit', $stok->id) }}"
                                                    class="focus:outline-none text-white bg-yellow-400 hover:bg-yellow-500 focus:ring-4 focus:ring-yellow-300 font-medium rounded-lg text-xs px-3 py-2 me-1 mb-1">
                                                    Edit
                                                </a>
                                                @endcan
                                                {{-- Tombol Delete --}}
                                                @can('delete_pencatatan')
                                                <button type="button"
                                                    onclick="showDeleteModal('{{ route('pencatatan.destroy', $stok->id) }}')"
                                                    class="focus:outline-none text-white bg-red-600 hover:bg-red-700 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-xs px-3 py-2 me-1 mb-1">
                                                    Hapus
                                                </button>
                                                @endcan
                                            </td>
                                            @endcanany
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="6" class="text-center py-4 px-6 text-gray-500">
                                                Tidak ada data stok masuk yang ditemukan.
                                                @if(request()->has('search_nama') || request()->has('search_tanggal'))
                                                    <br><a href="{{ route('pencatatan.index') }}"
                                                        class="text-blue-500 hover:underline">Reset pencarian</a>
                                                @endif
                                            </td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                        {{-- Pagination links --}}
                        @if ($stokMasuk->hasPages())
                            <div class="p-4">
                                {{ $stokMasuk->appends(request()->query())->links() }}
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