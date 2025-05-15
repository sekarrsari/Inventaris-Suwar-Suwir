@extends('layouts.main')
@section('content')
    <div class="w-full px-6 py-6 mx-auto">
        <div class="flex flex-wrap -mx-3">
            <div class="flex-none w-full max-w-full px-3">
                <div
                    class="relative flex flex-col min-w-0 mb-6 break-words bg-white border-0 border-transparent border-solid shadow-xl rounded-2xl bg-clip-border">
                    <div class="p-6 pb-0 mb-0 border-b-0 border-b-solid rounded-t-2xl border-b-transparent">
                        <div class="flex justify-between items-center mt-3 mb-12">
                            <h3 class="text-4xl text-gray-800 font-bold">Pencatatan Stok Masuk & Keluar</h3>
                            <button type="button"
                                onclick="window.location.href='./bahan-baku/create'"
                                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 focus:outline-none">
                                    Tambah
                            </button>
                        </div>
                    </div>
                    <div class="flex-auto px-0 pt-0 pb-2">
                        <div class="p-0 overflow-x-auto">
                            <table
                                class="items-center w-full mb-0 align-top border-collapse text-slate-500">

                                <thead class="text-base font-semibold text-black bg-gray-200">
                                    <tr>
                                        <th scope="col" class="px-6 py-3 font-bold text-left align-middle bg-transparent border-b border-collapse shadow-none border-b-solid tracking-none whitespace-nowrap">Kode Bahan</th>
                                        <th scope="col" class="px-6 py-3 font-bold text-left align-middle bg-transparent border-b border-collapse shadow-none border-b-solid tracking-none whitespace-nowrap">Nama Bahan Baku</th>
                                        <th scope="col" class="px-6 py-3 font-bold text-left align-middle bg-transparent border-b border-collapse shadow-none border-b-solid tracking-none whitespace-nowrap">Jenis</th>
                                        <th scope="col" class="px-6 py-3 font-bold text-left align-middle bg-transparent border-b border-collapse shadow-none border-b-solid tracking-none whitespace-nowrap">Satuan</th>
                                        <th scope="col" class="px-6 py-3 font-bold text-left align-middle bg-transparent border-b border-collapse shadow-none border-b-solid tracking-none whitespace-nowrap">Supplier</th>
                                        <th scope="col" class="px-6 py-3 font-bold text-left align-middle bg-transparent border-b border-collapse shadow-none border-b-solid tracking-none whitespace-nowrap">Pembelian Terakhir</th>
                                        <th scope="col" class="px-6 py-3 font-bold text-left align-middle bg-transparent border-b border-collapse shadow-none border-b-solid tracking-none whitespace-nowrap">Harga per satuan</th>
                                        <th scope="col" class="px-6 py-3 font-bold text-left align-middle bg-transparent border-b border-collapse shadow-none border-b-solid tracking-none whitespace-nowrap">Stok Minimum</th>
                                        <th scope="col" class="px-6 py-3 font-bold text-left align-middle bg-transparent border-b border-collapse shadow-none border-b-solid tracking-none whitespace-nowrap">Status</th>
                                        <th scope="col" class="px-6 py-3 font-bold text-left align-middle bg-transparent border-b border-collapse shadow-none border-b-solid tracking-none whitespace-nowrap"></th>
                                    </tr>
                                </thead>

                                <tbody class="bg-white">
                                    @foreach ($bahanBaku as $bahan)
                                        <tr class="text-sm border-b hover:bg-gray-50">
                                            <td class="px-6 py-3 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                                                {{ $bahan->kode }}</td>
                                            <td class="px-6 py-3 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">{{ $bahan->nama }}</td>
                                            <td class="px-6 py-3 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">{{ $bahan->jenis }}</td>
                                            <td class="px-6 py-3 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">{{ $bahan->satuan }}</td>
                                            <td class="px-6 py-3 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">{{ $bahan->supplier }}</td>
                                            <td class="px-6 py-3 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">{{ $bahan->tanggalBeli }}</td>
                                            <td class="px-6 py-3 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">{{ $bahan->harga }}</td>
                                            <td class="px-6 py-3 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">{{ $bahan->stokMinimum }}</td>
                                            <td class="px-6 py-3 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">{{ $bahan->status }}</td>
                                            <td class="px-6 py-3 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                                                <button type="button" class="focus:outline-none text-white bg-yellow-400 hover:bg-yellow-500 focus:ring-4 focus:ring-yellow-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2">Edit</button>
                                                </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </div>

@endsection