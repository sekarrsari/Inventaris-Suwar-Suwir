<!-- sidenav  -->
<aside {{--
    class=" min-h-screen flex-wrap items-center block w-full p-0 my-4 overflow-y-auto antialiased transition-transform duration-200 -translate-x-full bg-white border-0 shadow-xl max-w-64 ease-nav-brand z-990 xl:ml-6 rounded-2xl xl:left-0 xl:translate-x-0"
    --}}
    class="fixed inset-y-0 flex-wrap items-center justify-between block w-full p-0 my-4 overflow-y-auto antialiased transition-transform duration-200 -translate-x-full bg-white border-0 shadow-xl max-w-64 ease-nav-brand z-990 xl:ml-6 rounded-2xl xl:left-0 xl:translate-x-0"
    aria-expanded="false">
    <div class="h-19">
        <i class="absolute top-0 right-0 p-4 opacity-50 cursor-pointer fas fa-times text-slate-400 xl:hidden"
            sidenav-close></i>
        <a class="block px-8 py-6 m-0 text-sm whitespace-nowrap text-slate-700"
            href="#" target="_blank">
            <img src="{{ asset('/assets/img/logo-mutiara-rasa.jpeg') }}"
                class="inline h-full max-w-full transition-all duration-200 ease-nav-brand max-h-8" alt="main_logo" />
            <img src="{{ asset("./assets/img/logo-mutiara-rasa.jpeg") }}"
                class="hidden h-full max-w-full transition-all duration-200 ease-nav-brand max-h-8" alt="main_logo" />
            @if (Auth::check())
                <span class="ml-1 font-semibold transition-all duration-200 ease-nav-brand">{{ Auth::user()->name }}</span>
            @else
                {{-- Opsional: Tampilkan sesuatu jika tidak ada user login, atau biarkan kosong --}}
                <span class="ml-1 font-semibold transition-all duration-200 ease-nav-brand">Guest</span>
                {{-- Atau bisa juga: <span class="ml-1 font-semibold transition-all duration-200 ease-nav-brand">Admin
                    Candiber</span> --}}
            @endif </a>
    </div>

    <hr class="h-px mt-0 bg-transparent bg-gradient-to-r from-transparent via-black/40 to-transparent" />

    <div class="items-center block w-auto max-h-screen overflow-auto h-sidenav grow basis-full">
        <ul class="flex flex-col pl-0 mb-0">
            <li class="mt-0.5 w-full">
                <a class="py-2.7 {{ $title === "Dashboard" ? 'bg-blue-500/13 rounded-lg font-semibold text-black' : '' }} text-sm ease-nav-brand my-0 mx-2 flex items-center whitespace-nowrap px-4  transition-colors"
                    href="./dashboard">
                    <div
                        class="mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-center stroke-0 text-center xl:p-2.5">
                        <i class="relative top-0 text-sm leading-normal text-blue-500 ni ni-tv-2"></i>
                    </div>
                    <span class="ml-1 duration-300 opacity-100 pointer-events-none ease">Dashboard</span>
                </a>
            </li>

            <li class="mt-0.5 w-full">
                <a class="{{ $title === "Supplier" ? 'bg-blue-500/13 rounded-lg font-semibold text-black' : '' }} py-2.7 text-sm ease-nav-brand my-0 mx-2 flex items-center whitespace-nowrap px-4 transition-colors"
                    href="./supplier">
                    <div
                        class="mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-center stroke-0 text-center xl:p-2.5">
                        <i class="relative top-0 text-sm leading-normal text-blue-500 ni ni-briefcase-24"></i>
                    </div>
                    <span class="ml-1 duration-300 opacity-100 pointer-events-none ease">Manajemen Supplier</span>
                </a>
            </li>

            <li class="mt-0.5 w-full">
                <a class="{{ $title === "Manajemen" ? 'bg-blue-500/13 rounded-lg font-semibold text-black' : '' }} py-2.7 text-sm ease-nav-brand my-0 mx-2 flex items-center whitespace-nowrap px-4 transition-colors"
                    href="./manajemen">
                    <div
                        class="mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-center stroke-0 text-center xl:p-2.5">
                        <i class="relative top-0 text-sm leading-normal text-orange-500 ni ni-archive-2"></i>
                    </div>
                    <span class="ml-1 duration-300 opacity-100 pointer-events-none ease">Manajemen Bahan Baku</span>
                </a>
            </li>

            <li class="mt-0.5 w-full">
                <a class="{{ $title === "Pencatatan" ? 'bg-blue-500/13 rounded-lg font-semibold text-black' : '' }} py-2.7 text-sm ease-nav-brand my-0 mx-2 flex items-center whitespace-nowrap px-4 transition-colors"
                    href="./pencatatan">
                    <div
                        class="mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-center fill-current stroke-0 text-center xl:p-2.5">
                        <i class="relative top-0 text-sm leading-normal text-emerald-500 ni ni-single-copy-04"></i>
                    </div>
                    <span class="ml-1 duration-300 opacity-100 pointer-events-none ease">Pencatatan Stok</span>
                </a>
            </li>

            <li class="mt-0.5 w-full">
                <a class="{{ $title === "Penjualan" ? 'bg-blue-500/13 rounded-lg font-semibold text-black' : '' }} py-2.7 text-sm ease-nav-brand my-0 mx-2 flex items-center whitespace-nowrap px-4 transition-colors"
                    href="./penjualan">
                    <div
                        class="mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-center stroke-0 text-center xl:p-2.5">
                        <i class="relative top-0 text-sm leading-normal text-cyan-500 ni ni-cart"></i>
                    </div>
                    <span class="ml-1 duration-300 opacity-100 pointer-events-none ease">Pencatatan Penjualan</span>
                </a>
            </li>

            <li class="mt-0.5 w-full">
                <a class="py-2.7 text-sm ease-nav-brand my-0 mx-2 flex items-center whitespace-nowrap px-4 transition-colors"
                    href="./pages/rtl.html">
                    <div
                        class="mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-center stroke-0 text-center xl:p-2.5">
                        <i class="relative top-0 text-sm leading-normal text-red-600 ni ni-chart-bar-32"></i>
                    </div>
                    <span class="ml-1 duration-300 opacity-100 pointer-events-none ease">Peramalan Pengadaan</span>
                </a>
            </li>

            <li class="w-full mt-4">
                <h6 class="pl-6 ml-2 text-xs font-bold leading-tight uppercase opacity-60">Account
                    pages</h6>
            </li>

            <li class="mt-0.5 w-full">
                <a class="py-2.7 text-sm ease-nav-brand my-0 mx-2 flex items-center whitespace-nowrap px-4 transition-colors"
                    href="./pages/profile.html">
                    <div
                        class="mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-center stroke-0 text-center xl:p-2.5">
                        <i class="relative top-0 text-sm leading-normal text-slate-700 ni ni-single-02"></i>
                    </div>
                    <span class="ml-1 duration-300 opacity-100 pointer-events-none ease">Profile</span>
                </a>
            </li>
        </ul>
    </div>
</aside>

<!-- end sidenav -->

<main class="relative h-full flex-1 transition-all duration-200 ease-in-out xl:ml-68 rounded-xl">
    <!-- Navbar -->
    <nav class="relative flex flex-wrap items-center justify-between px-0 py-2 mx-6 transition-all ease-in shadow-none duration-250 rounded-2xl lg:flex-nowrap lg:justify-start"
        navbar-main navbar-scroll="false">
        <div class="flex items-center justify-between w-full px-4 py-1 mx-auto flex-wrap-inherit">
            <nav>
                <!-- breadcrumb -->
                <ol class="flex flex-wrap pt-1 mr-12 bg-transparent rounded-lg sm:mr-16">
                    <li class="text-sm leading-normal">
                        <a class="text-gray-400 opacity-70" href="javascript:;">{{ $title }}</a>
                    </li>
                    <li class="text-sm pl-2 capitalize leading-normal text-gray-400 before:float-left before:pr-2 before:text-gray-400 before:content-['>']"
                        aria-current="page"></li>
                </ol>
                <h6 class="mb-0 font-bold text-xl text-gray-700 capitalize">{{ $title }}</h6>
            </nav>


            <div class="flex items-center mt-2 grow sm:mt-0 sm:mr-6 md:mr-0 lg:flex lg:basis-auto">
                <div class="flex items-center md:ml-auto md:pr-4">
                    <ul class="flex flex-row justify-end pl-0 mb-0 list-none md-max:w-full">
                        @auth
                            <li>
                                <button id="dropdownNavbarLink" data-dropdown-toggle="dropdownNavbar"
                                    class="flex items-center justify-between w-full py-2 px-3 text-gray-900 rounded-sm hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 md:w-auto">Selamat
                                    datang, {{ auth()->user()->name }}
                                    <svg class="w-2.5 h-2.5 ms-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                        fill="none" viewBox="0 0 10 6">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2" d="m1 1 4 4 4-4" />
                                    </svg></button>
                                <!-- Dropdown menu -->
                                <div id="dropdownNavbar"
                                    class="z-10 hidden font-normal bg-white divide-y divide-gray-100 rounded-lg shadow-sm w-44">
                                    <ul class="py-2 text-sm text-gray-700" aria-labelledby="dropdownLargeButton">
                                        <li>
                                            <a href="/dashboard" class="block px-4 py-2 hover:bg-gray-100">
                                                {{-- <i
                                                    class="relative top-0 text-sm leading-normal text-blue-500 ni ni-tv-2"></i>
                                                --}}
                                                Dashboard
                                            </a>
                                        </li>
                                        {{-- <li>
                                            <a href="#" class="block px-4 py-2 hover:bg-gray-100">Settings</a>
                                        </li>
                                        <li>
                                            <a href="#" class="block px-4 py-2 hover:bg-gray-100">Earnings</a>
                                        </li> --}}
                                    </ul>
                                    <div class="py-1">
                                        <form action="/logout" method="post">
                                            @csrf
                                            <button type="submit"
                                                class="block w-full px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 text-left">
                                                Logout
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </li>

                        @else
                            {{-- Login --}}
                            <li class="flex items-center">
                                <a href="./login"
                                    class="block px-0 py-2 text-sm font-semibold text-black transition-all ease-nav-brand">
                                    <i class="fa fa-user sm:mr-1"></i>
                                    <span class="hidden sm:inline">Login</span>
                                </a>
                            </li>
                        @endauth
                        {{-- HAMBURGER --}}
                        <li class="flex items-center pl-4 xl:hidden ml-auto">
                            <a href="javascript:;" class="block p-0 text-sm text-white transition-all ease-nav-brand"
                                sidenav-trigger>
                                <div class="w-4.5 overflow-hidden">
                                    <i
                                        class="ease mb-0.75 relative block h-0.5 rounded-sm bg-blue-500 transition-all"></i>
                                    <i
                                        class="ease mb-0.75 relative block h-0.5 rounded-sm bg-blue-500 transition-all"></i>
                                    <i class="ease relative block h-0.5 rounded-sm bg-blue-500 transition-all"></i>
                                </div>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>

    <!-- end Navbar -->