@extends('layouts.main')

@section('content')
    <!-- cards -->
    <div class="w-full px-6 py-6 mx-auto">
        <!-- row 1 -->
        <h1 class="text-4xl text-gray-800 font-bold text-center mb-6">Total Stok Bahan Baku</h1>
        <div class="flex flex-wrap -mx-3">
        @if(isset($bahanBakuItems) && $bahanBakuItems->count() > 0)
        @foreach($bahanBakuItems as $item)
            <div class="w-full max-w-full px-3 mb-6 sm:w-1/2 sm:flex-none xl:mb-0 xl:w-1/3">
                <div class="relative flex flex-col min-w-0 break-words bg-white shadow-xl rounded-2xl bg-clip-border">
                    <div class="flex-auto p-4">
                        <div class="flex flex-row -mx-3 items-center">
                            {{-- Nama, Stok, Tanggal --}}
                            <div class="flex-none w-2/3 max-w-full px-3">
                                <div>
                                    <p class="mb-2 text-lg font-semibold leading-normal uppercase">
                                        {{ $item->nama }}  {{-- NAMA BAHAN BAKU --}}
                                    </p>
                                    <h5 class="mb-1 font-bold">
                                        Stok saat ini : {{ $item->stok_aktual }} {{ $item->satuan ?? 'Unit' }} {{-- STOK AKTUAL & SATUAN --}}
                                    </h5>
                                    <p class="mb-0 text-sm"> {{-- Menggunakan kelas yang konsisten --}}
                                        Pembelian Akhir:
                                        <span class="font-semibold">
                                            @if($item->tanggalBeli)
                                            {{ \Carbon\Carbon::parse($item->tanggalBeli)->format('d M Y') }} {{-- TANGGAL BELI TERAKHIR --}}
                                            @else
                                            N/A
                                            @endif
                                        </span>
                                    </p>
                                </div>
                            </div>

                            {{-- Status --}}
                            <div class="px-3 text-right basis-1/3">
                                @php
                                    $statusText = $item->status ?? 'Tidak diketahui'; // Ambil status dari item, beri default
                                    $statusClass = '';
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
                                    <span class="inline-block px-3 py-1 text-xs font-semibold border rounded-md {{ $statusClass }}">
                                        {{ ucfirst($statusText) }}
                                    </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
        </div>
    </div>
    @else
        <div class="w-full px-3">
            <p class="text-center text-gray-500">Tidak ada data bahan baku untuk ditampilkan.</p>
        </div>
    @endif


        <!-- cards row 2 -->
        <div class="flex flex-wrap mt-6 -mx-3">
            <div class="w-full max-w-full px-3">
                <form method="GET" action="{{ route('dashboard') }}" class="flex items-center space-x-2 bg-white p-4 rounded-lg shadow">
                    <label for="year_filter_select" class="text-sm font-medium text-gray-700">Pilih Tahun Grafik:</label>
                    <select name="year" id="year_filter_select" class="block w-auto pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md" onchange="this.form.submit()">
                        @if (!empty($availableYears)) {{-- Menggunakan $availableYears --}}
                            @foreach ($availableYears as $year_option)
                                <option value="{{ $year_option }}" {{ $year_option == $selectedYear ? 'selected' : '' }}> {{-- Menggunakan $selectedYear --}}
                                    {{ $year_option }}
                                </option>
                            @endforeach
                        @else
                            <option value="{{ $selectedYear }}">{{ $selectedYear }}</option> {{-- Menggunakan $selectedYear --}}
                        @endif
                    </select>
                    <noscript><button type="submit" class="px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Tampilkan</button></noscript>
                </form>
            </div>
        </div>
        
        
        <div class="flex flex-wrap mt-6 -mx-3">
            <div class="w-full max-w-full px-3 mt-0 mb-6 lg:mb-0 lg:w-6/12 lg:flex-none">
                <div class="border-black/12.5 shadow-xl relative z-20 flex min-w-0 flex-col break-words rounded-2xl border-0 border-solid bg-white bg-clip-border">
                    <div class="border-black/12.5 mb-0 rounded-t-2xl border-b-0 border-solid p-6 pt-4 pb-0">
                        <h6 class="capitalize text-lg font-bold">{{ $oriSalesTitle ?? 'Grafik Penjualan Ori' }}</h6>
                    </div>
                    <div class="flex-auto p-4">
                        <div>
                            <canvas id="oriSalesChart" height="300"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        
            <div class="w-full max-w-full px-3 mt-0 lg:w-6/12 lg:flex-none">
                <div class="border-black/12.5 shadow-xl relative z-20 flex min-w-0 flex-col break-words rounded-2xl border-0 border-solid bg-white bg-clip-border">
                    <div class="border-black/12.5 mb-0 rounded-t-2xl border-b-0 border-solid p-6 pt-4 pb-0">
                        <h6 class="capitalize text-lg font-bold">{{ $rasaSalesTitle ?? 'Grafik Penjualan Mix' }}</h6>
                    </div>
                    <div class="flex-auto p-4">
                        <div>
                            <canvas id="rasaSalesChart" height="300"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        
        

        <!-- cards row 3 -->

        {{-- <div class="flex flex-wrap mt-6 -mx-3">
            <div class="w-full max-w-full px-3 mt-0 mb-6 lg:mb-0 lg:w-7/12 lg:flex-none">
                <div
                    class="relative flex flex-col min-w-0 break-words bg-white border-0 border-solid shadow-xl border-black-125 rounded-2xl bg-clip-border">
                    <div class="p-4 pb-0 mb-0 rounded-t-4">
                        <div class="flex justify-between">
                            <h6 class="mb-2">Sales by Country</h6>
                        </div>
                    </div>
                    <div class="overflow-x-auto">
                        <table
                            class="items-center w-full mb-4 align-top border-collapse border-gray-200">
                            <tbody>
                                <tr>
                                    <td
                                        class="p-2 align-middle bg-transparent border-b w-3/10 whitespace-nowrap">
                                        <div class="flex items-center px-2 py-1">
                                            <div>
                                                <img src="./assets/img/icons/flags/US.png" alt="Country flag" />
                                            </div>
                                            <div class="ml-6">
                                                <p
                                                    class="mb-0 text-xs font-semibold leading-tight">
                                                    Country:</p>
                                                <h6 class="mb-0 text-sm leading-normal">United
                                                    States</h6>
                                            </div>
                                        </div>
                                    </td>
                                    <td
                                        class="p-2 align-middle bg-transparent border-b whitespace-nowrap">
                                        <div class="text-center">
                                            <p
                                                class="mb-0 text-xs font-semibold leading-tight">
                                                Sales:</p>
                                            <h6 class="mb-0 text-sm leading-normal">2500</h6>
                                        </div>
                                    </td>
                                    <td
                                        class="p-2 align-middle bg-transparent border-b whitespace-nowrap">
                                        <div class="text-center">
                                            <p
                                                class="mb-0 text-xs font-semibold leading-tight">
                                                Value:</p>
                                            <h6 class="mb-0 text-sm leading-normal">$230,900</h6>
                                        </div>
                                    </td>
                                    <td
                                        class="p-2 text-sm leading-normal align-middle bg-transparent border-b whitespace-nowrap">
                                        <div class="flex-1 text-center">
                                            <p
                                                class="mb-0 text-xs font-semibold leading-tight">
                                                Bounce:</p>
                                            <h6 class="mb-0 text-sm leading-normal">29.9%</h6>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td
                                        class="p-2 align-middle bg-transparent border-b w-3/10 whitespace-nowrap">
                                        <div class="flex items-center px-2 py-1">
                                            <div>
                                                <img src="./assets/img/icons/flags/DE.png" alt="Country flag" />
                                            </div>
                                            <div class="ml-6">
                                                <p
                                                    class="mb-0 text-xs font-semibold leading-tight">
                                                    Country:</p>
                                                <h6 class="mb-0 text-sm leading-normal">Germany</h6>
                                            </div>
                                        </div>
                                    </td>
                                    <td
                                        class="p-2 align-middle bg-transparent border-b whitespace-nowrap">
                                        <div class="text-center">
                                            <p
                                                class="mb-0 text-xs font-semibold leading-tight">
                                                Sales:</p>
                                            <h6 class="mb-0 text-sm leading-normal">3.900</h6>
                                        </div>
                                    </td>
                                    <td
                                        class="p-2 align-middle bg-transparent border-b whitespace-nowrap">
                                        <div class="text-center">
                                            <p
                                                class="mb-0 text-xs font-semibold leading-tight">
                                                Value:</p>
                                            <h6 class="mb-0 text-sm leading-normal">$440,000</h6>
                                        </div>
                                    </td>
                                    <td
                                        class="p-2 text-sm leading-normal align-middle bg-transparent border-b whitespace-nowrap">
                                        <div class="flex-1 text-center">
                                            <p
                                                class="mb-0 text-xs font-semibold leading-tight">
                                                Bounce:</p>
                                            <h6 class="mb-0 text-sm leading-normal">40.22%</h6>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td
                                        class="p-2 align-middle bg-transparent border-b w-3/10 whitespace-nowrap">
                                        <div class="flex items-center px-2 py-1">
                                            <div>
                                                <img src="./assets/img/icons/flags/GB.png" alt="Country flag" />
                                            </div>
                                            <div class="ml-6">
                                                <p
                                                    class="mb-0 text-xs font-semibold leading-tight">
                                                    Country:</p>
                                                <h6 class="mb-0 text-sm leading-normal">Great
                                                    Britain</h6>
                                            </div>
                                        </div>
                                    </td>
                                    <td
                                        class="p-2 align-middle bg-transparent border-b whitespace-nowrap">
                                        <div class="text-center">
                                            <p
                                                class="mb-0 text-xs font-semibold leading-tight">
                                                Sales:</p>
                                            <h6 class="mb-0 text-sm leading-normal">1.400</h6>
                                        </div>
                                    </td>
                                    <td
                                        class="p-2 align-middle bg-transparent border-b whitespace-nowrap">
                                        <div class="text-center">
                                            <p
                                                class="mb-0 text-xs font-semibold leading-tight">
                                                Value:</p>
                                            <h6 class="mb-0 text-sm leading-normal">$190,700</h6>
                                        </div>
                                    </td>
                                    <td
                                        class="p-2 text-sm leading-normal align-middle bg-transparent border-b whitespace-nowrap">
                                        <div class="flex-1 text-center">
                                            <p
                                                class="mb-0 text-xs font-semibold leading-tight">
                                                Bounce:</p>
                                            <h6 class="mb-0 text-sm leading-normal">23.44%</h6>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="p-2 align-middle bg-transparent border-0 w-3/10 whitespace-nowrap">
                                        <div class="flex items-center px-2 py-1">
                                            <div>
                                                <img src="./assets/img/icons/flags/BR.png" alt="Country flag" />
                                            </div>
                                            <div class="ml-6">
                                                <p
                                                    class="mb-0 text-xs font-semibold leading-tight">
                                                    Country:</p>
                                                <h6 class="mb-0 text-sm leading-normal">Brasil</h6>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="p-2 align-middle bg-transparent border-0 whitespace-nowrap">
                                        <div class="text-center">
                                            <p
                                                class="mb-0 text-xs font-semibold leading-tight">
                                                Sales:</p>
                                            <h6 class="mb-0 text-sm leading-normal">562</h6>
                                        </div>
                                    </td>
                                    <td class="p-2 align-middle bg-transparent border-0 whitespace-nowrap">
                                        <div class="text-center">
                                            <p
                                                class="mb-0 text-xs font-semibold leading-tight">
                                                Value:</p>
                                            <h6 class="mb-0 text-sm leading-normal">$143,960</h6>
                                        </div>
                                    </td>
                                    <td
                                        class="p-2 text-sm leading-normal align-middle bg-transparent border-0 whitespace-nowrap">
                                        <div class="flex-1 text-center">
                                            <p
                                                class="mb-0 text-xs font-semibold leading-tight">
                                                Bounce:</p>
                                            <h6 class="mb-0 text-sm leading-normal">32.14%</h6>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="w-full max-w-full px-3 mt-0 lg:w-5/12 lg:flex-none">
                <div
                    class="border-black/12.5 shadow-xl relative flex min-w-0 flex-col break-words rounded-2xl border-0 border-solid bg-white bg-clip-border">
                    <div class="p-4 pb-0 rounded-t-4">
                        <h6 class="mb-0">Categories</h6>
                    </div>
                    <div class="flex-auto p-4">
                        <ul class="flex flex-col pl-0 mb-0 rounded-lg">
                            <li
                                class="relative flex justify-between py-2 pr-4 mb-2 border-0 rounded-t-lg rounded-xl text-inherit">
                                <div class="flex items-center">
                                    <div
                                        class="inline-block w-8 h-8 mr-4 text-center text-black bg-center shadow-sm fill-current stroke-none bg-gradient-to-tl from-zinc-800 to-zinc-700 rounded-xl">
                                        <i class="text-white ni ni-mobile-button relative top-0.75 text-xxs"></i>
                                    </div>
                                    <div class="flex flex-col">
                                        <h6 class="mb-1 text-sm leading-normal text-slate-700">
                                            Devices</h6>
                                        <span class="text-xs leading-tight/80">250 in stock, <span
                                                class="font-semibold">346+ sold</span></span>
                                    </div>
                                </div>
                                <div class="flex">
                                    <button
                                        class="group ease-in leading-pro text-xs rounded-3.5xl p-1.2 h-6.5 w-6.5 mx-0 my-auto inline-block cursor-pointer border-0 bg-transparent text-center align-middle font-bold text-slate-700 shadow-none transition-all"><i
                                            class="ni ease-bounce text-2xs group-hover:translate-x-1.25 ni-bold-right transition-all duration-200"
                                            aria-hidden="true"></i></button>
                                </div>
                            </li>
                            <li
                                class="relative flex justify-between py-2 pr-4 mb-2 border-0 rounded-xl text-inherit">
                                <div class="flex items-center">
                                    <div
                                        class="inline-block w-8 h-8 mr-4 text-center text-black bg-center shadow-sm fill-current stroke-none bg-gradient-to-tl from-zinc-800 to-zinc-700 rounded-xl">
                                        <i class="text-white ni ni-tag relative top-0.75 text-xxs"></i>
                                    </div>
                                    <div class="flex flex-col">
                                        <h6 class="mb-1 text-sm leading-normal text-slate-700">
                                            Tickets</h6>
                                        <span class="text-xs leading-tight/80">123 closed, <span
                                                class="font-semibold">15 open</span></span>
                                    </div>
                                </div>
                                <div class="flex">
                                    <button
                                        class="group ease-in leading-pro text-xs rounded-3.5xl p-1.2 h-6.5 w-6.5 mx-0 my-auto inline-block cursor-pointer border-0 bg-transparent text-center align-middle font-bold text-slate-700 shadow-none transition-all"><i
                                            class="ni ease-bounce text-2xs group-hover:translate-x-1.25 ni-bold-right transition-all duration-200"
                                            aria-hidden="true"></i></button>
                                </div>
                            </li>
                            <li
                                class="relative flex justify-between py-2 pr-4 mb-2 border-0 rounded-b-lg rounded-xl text-inherit">
                                <div class="flex items-center">
                                    <div
                                        class="inline-block w-8 h-8 mr-4 text-center text-black bg-center shadow-sm fill-current stroke-none bg-gradient-to-tl from-zinc-800 to-zinc-700 rounded-xl">
                                        <i class="text-white ni ni-box-2 relative top-0.75 text-xxs"></i>
                                    </div>
                                    <div class="flex flex-col">
                                        <h6 class="mb-1 text-sm leading-normal text-slate-700">Error
                                            logs</h6>
                                        <span class="text-xs leading-tight/80">1 is active, <span
                                                class="font-semibold">40 closed</span></span>
                                    </div>
                                </div>
                                <div class="flex">
                                    <button
                                        class="group ease-in leading-pro text-xs rounded-3.5xl p-1.2 h-6.5 w-6.5 mx-0 my-auto inline-block cursor-pointer border-0 bg-transparent text-center align-middle font-bold text-slate-700 shadow-none transition-all"><i
                                            class="ni ease-bounce text-2xs group-hover:translate-x-1.25 ni-bold-right transition-all duration-200"
                                            aria-hidden="true"></i></button>
                                </div>
                            </li>
                            <li
                                class="relative flex justify-between py-2 pr-4 border-0 rounded-b-lg rounded-xl text-inherit">
                                <div class="flex items-center">
                                    <div
                                        class="inline-block w-8 h-8 mr-4 text-center text-black bg-center shadow-sm fill-current stroke-none bg-gradient-to-tl from-zinc-800 to-zinc-700 rounded-xl">
                                        <i class="text-white ni ni-satisfied relative top-0.75 text-xxs"></i>
                                    </div>
                                    <div class="flex flex-col">
                                        <h6 class="mb-1 text-sm leading-normal text-slate-700">Happy
                                            users</h6>
                                        <span class="text-xs leading-tight/80"><span
                                                class="font-semibold">+ 430 </span></span>
                                    </div>
                                </div>
                                <div class="flex">
                                    <button
                                        class="group ease-in leading-pro text-xs rounded-3.5xl p-1.2 h-6.5 w-6.5 mx-0 my-auto inline-block cursor-pointer border-0 bg-transparent text-center align-middle font-bold text-slate-700 shadow-none transition-all"><i
                                            class="ni ease-bounce text-2xs group-hover:translate-x-1.25 ni-bold-right transition-all duration-200"
                                            aria-hidden="true"></i></button>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div> --}}

        {{-- <footer class="pt-4">
            <div class="w-full px-6 mx-auto">
                <div class="flex flex-wrap items-center -mx-3 lg:justify-between">
                    <div class="w-full max-w-full px-3 mt-0 mb-6 shrink-0 lg:mb-0 lg:w-1/2 lg:flex-none">
                        <div class="text-sm leading-normal text-center text-slate-500 lg:text-left">
                            ©
                            <script>
                                document.write(new Date().getFullYear() + ",");
                            </script>
                            made with <i class="fa fa-heart"></i> by
                            <a href="https://www.creative-tim.com"
                                class="font-semibold text-slate-700 dark:text-white" target="_blank">Creative
                                Tim</a>
                            for a better web.
                        </div>
                    </div>
                    <div class="w-full max-w-full px-3 mt-0 shrink-0 lg:w-1/2 lg:flex-none">
                        <ul class="flex flex-wrap justify-center pl-0 mb-0 list-none lg:justify-end">
                            <li class="nav-item">
                                <a href="https://www.creative-tim.com"
                                    class="block px-4 pt-0 pb-1 text-sm font-normal transition-colors ease-in-out text-slate-500"
                                    target="_blank">Creative Tim</a>
                            </li>
                            <li class="nav-item">
                                <a href="https://www.creative-tim.com/presentation"
                                    class="block px-4 pt-0 pb-1 text-sm font-normal transition-colors ease-in-out text-slate-500"
                                    target="_blank">About Us</a>
                            </li>
                            <li class="nav-item">
                                <a href="https://creative-tim.com/blog"
                                    class="block px-4 pt-0 pb-1 text-sm font-normal transition-colors ease-in-out text-slate-500"
                                    target="_blank">Blog</a>
                            </li>
                            <li class="nav-item">
                                <a href="https://www.creative-tim.com/license"
                                    class="block px-4 pt-0 pb-1 pr-0 text-sm font-normal transition-colors ease-in-out text-slate-500"
                                    target="_blank">License</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </footer> --}}
    </div>
    <!-- end cards -->
@endsection

{{-- @push('scripts') atau tempatkan di akhir body --}}
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        // Data umum
        const commonMonthLabels = @json($chartMonthLabels ?? []);
        const activeYear = @json($selectedYear ?? Carbon\Carbon::now()->year);

        // --- Inisialisasi Grafik Penjualan Ori ---
        const oriCtx = document.getElementById('oriSalesChart').getContext('2d');
        const oriSalesDataValues = @json($oriSalesData ?? []);
        const oriSalesChartTitleText = @json($oriSalesTitle ?? 'Grafik Penjualan Ori');

        let oriChartInstance = Chart.getChart("oriSalesChart");
        if (oriChartInstance) {
            oriChartInstance.destroy();
        }
        new Chart(oriCtx, {
            type: 'line',
            data: {
                labels: commonMonthLabels,
                datasets: [{
                    label: 'Jumlah Ori Terjual (Tahun ' + activeYear + ')',
                    data: oriSalesDataValues,
                    borderColor: 'rgb(75, 192, 192)',
                    backgroundColor: 'rgba(75, 192, 192, 0.2)',
                    tension: 0.1,
                    fill: true
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                scales: { y: { beginAtZero: true, title: { display: true, text: 'Jumlah Unit' } }, x: { title: {display: true, text: 'Bulan'} } },
                plugins: { legend: { position: 'top' }, title: { display: true, text: oriSalesChartTitleText } }
            }
        });

        // --- Inisialisasi Grafik Penjualan Mix/Rasa ---
        const rasaCtx = document.getElementById('rasaSalesChart').getContext('2d');
        const rasaSalesDataValues = @json($rasaSalesData ?? []);
        const rasaSalesChartTitleText = @json($rasaSalesTitle ?? 'Grafik Penjualan Mix');

        let rasaChartInstance = Chart.getChart("rasaSalesChart");
        if (rasaChartInstance) {
            rasaChartInstance.destroy();
        }
        new Chart(rasaCtx, {
            type: 'line',
            data: {
                labels: commonMonthLabels,
                datasets: [{
                    label: 'Jumlah Mix Terjual (Tahun ' + activeYear + ')',
                    data: rasaSalesDataValues,
                    borderColor: 'rgb(255, 99, 132)', // Warna berbeda untuk grafik kedua
                    backgroundColor: 'rgba(255, 99, 132, 0.2)',
                    tension: 0.1,
                    fill: true
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                scales: { y: { beginAtZero: true, title: { display: true, text: 'Jumlah Unit' } }, x: { title: {display: true, text: 'Bulan'} } },
                plugins: { legend: { position: 'top' }, title: { display: true, text: rasaSalesChartTitleText } }
            }
        });
    });
</script>
{{-- @endpush --}}
