<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    {{--
    <link rel="apple-touch-icon" sizes="76x76" href="./assets/img/apple-icon.png" /> --}}
    <link rel="icon" type="image/png" href="./assets/img/circle-logo-mutiara-rasa.png" />
    <title>Sistem Inventaris | {{ $title }}</title>
    {{--
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap"
        rel="stylesheet"> --}}

    <!-- Tailwind CDN -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Flowbite CSS -->
    <link href="https://unpkg.com/flowbite@2.3.0/dist/flowbite.min.css" rel="stylesheet" />

    <!-- Flowbite Script -->
    <script src="https://unpkg.com/flowbite@2.3.0/dist/flowbite.min.js"></script>

    @include('layouts.partials.link')
</head>

<body class="m-0 font-[Poppins] antialiased font-normal bg-white text-start text-base leading-default text-black">

    {{-- Navbar --}}
    {{-- <div class="container sticky top-0 z-30">
        <div class="flex flex-wrap -mx-3">
            <div class="w-full max-w-full px-3 flex-0"> --}}
                {{-- Navbar Terbaru --}}
                {{-- <nav
                    class="absolute top-0 left-0 right-0 z-30 flex flex-wrap items-center px-4 py-2 m-6 mb-0 shadow-sm rounded-xl bg-white/80 backdrop-blur-2xl backdrop-saturate-200 lg:flex-nowrap lg:justify-start">
                    <div class="flex items-center justify-between w-full p-0 px-6 mx-auto flex-wrap-inherit">
                        <a class="py-1.75 text-sm mr-4 ml-4 whitespace-nowrap font-bold text-slate-700 lg:ml-0"
                            target="_blank"> Sistem Inventaris Candiber </a>
                        <a class="flex items-center px-4 py-2 mr-2 font-normal transition-all ease-in-out lg-max:opacity-0 duration-250 text-sm text-slate-700 lg:px-2"
                            aria-current="page" href="/dashboard">
                            <i class="mr-1 fa fa-chart-pie opacity-60"></i>
                            Dashboard
                        </a>
                    </div>
                </nav> --}}

                <!-- Navbar LAMA -->
                {{-- <nav
                    class="absolute top-0 left-0 right-0 z-30 flex flex-wrap items-center px-4 py-2 m-6 mb-0 shadow-sm rounded-xl bg-white/80 backdrop-blur-2xl backdrop-saturate-200 lg:flex-nowrap lg:justify-start">
                    <div class="flex items-center justify-between w-full p-0 px-6 mx-auto flex-wrap-inherit">
                        <a class="py-1.75 text-sm mr-4 ml-4 whitespace-nowrap font-bold text-slate-700 lg:ml-0"
                            target="_blank"> Sistem Inventaris Candiber </a>
                        <button navbar-trigger
                            class="px-3 py-1 ml-2 leading-none transition-all ease-in-out bg-transparent border border-transparent border-solid rounded-lg shadow-none cursor-pointer text-lg lg:hidden"
                            type="button" aria-controls="navigation" aria-expanded="false"
                            aria-label="Toggle navigation">
                            <span
                                class="inline-block mt-2 align-middle bg-center bg-no-repeat bg-cover w-6 h-6 bg-none">
                                <span bar1
                                    class="w-5.5 rounded-xs relative my-0 mx-auto block h-px bg-gray-600 transition-all duration-300"></span>
                                <span bar2
                                    class="w-5.5 rounded-xs mt-1.75 relative my-0 mx-auto block h-px bg-gray-600 transition-all duration-300"></span>
                                <span bar3
                                    class="w-5.5 rounded-xs mt-1.75 relative my-0 mx-auto block h-px bg-gray-600 transition-all duration-300"></span>
                            </span>
                        </button>
                        <div navbar-menu
                            class="items-center flex-grow transition-all duration-500 lg-max:overflow-hidden ease lg-max:max-h-0 basis-full lg:flex lg:basis-auto">
                            <ul class="flex flex-col pl-0 mx-auto mb-0 list-none lg:flex-row xl:ml-auto">
                                <li>
                                    <a class="flex items-center px-4 py-2 mr-2 font-normal transition-all ease-in-out lg-max:opacity-0 duration-250 text-sm text-slate-700 lg:px-2"
                                        aria-current="page" href="/dashboard">
                                        <i class="mr-1 fa fa-chart-pie opacity-60"></i>
                                        Dashboard
                                    </a>
                                </li>
                                <li>
                                    <a class="block px-4 py-2 mr-2 font-normal transition-all ease-in-out lg-max:opacity-0 duration-250 text-sm text-slate-700 lg:px-2"
                                        href="../pages/profile.html">
                                        <i class="mr-1 fa fa-user opacity-60"></i>
                                        Profile
                                    </a>
                                </li>
                                <li>
                                    <a class="block px-4 py-2 mr-2 font-normal transition-all ease-in-out lg-max:opacity-0 duration-250 text-sm text-slate-700 lg:px-2"
                                        href="../pages/sign-up.html">
                                        <i class="mr-1 fas fa-user-circle opacity-60"></i>
                                        Registrasi
                                    </a>
                                </li>
                                <li>
                                    <a class="block px-4 py-2 mr-2 font-normal transition-all ease-in-out lg-max:opacity-0 duration-250 text-sm text-slate-700 lg:px-2"
                                        href="../pages/sign-in.html">
                                        <i class="mr-1 fas fa-key opacity-60"></i>
                                        Sign In
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </nav> --}}
            {{-- </div>
        </div>
    </div> --}}

    {{-- Form Login --}}
    @if (session()->has('success'))
        <div class="mb-4 rounded-lg bg-green-100 border border-green-400 text-green-700 px-4 py-3 relative" role="alert">
            <strong class="font-bold">Sukses!</strong> {{ session('success') }}
            <button type="button" class="absolute top-1 right-1 text-green-700" onclick="this.parentElement.remove();">
                &times;
            </button>
        </div>
    @endif

    @if(session('loginError'))
        <div
            class="fixed top-4 left-1/2 transform -translate-x-1/2 z-50 bg-red-100 text-red-700 px-6 py-3 rounded-lg shadow-lg font-bold">
            {{-- <strong>Login Gagal!</strong> --}}
            {{ session('loginError') }}
        </div>
    @endif

    <main class="min-h-screen flex items-center justify-center bg-gray-50">
        <section class="w-full max-w-md p-6 bg-white border-2 border-gray-200 rounded-2xl shadow-md">
            <div class="mb-6 text-center">
                <h4 class="font-bold text-black text-3xl mt-3 mb-5">Login</h4>
                <p class="mb-0">Masukkan email dan password anda</p>
            </div>
            <div class="flex-auto p-6">
                <form role="form" action="/login" method="post">
                    @csrf
                    <div class="mb-4">
                        <label for="email">Email</label>
                        <input type="email" name="email" id="email" placeholder="Email" autofocus required
                            value="{{ old('email') }}"
                            class="@error('email') @enderror focus:shadow-primary-outline text-sm leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding p-3 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:outline-none" />
                        @error('email')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mb-4">
                        <label for="password">Password</label>
                        <input type="password" name="password" id="password" placeholder="Password" required
                            class="focus:shadow-primary-outline text-sm leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding p-3 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:outline-none" />
                    </div>
                    <div class="text-center">
                        <button type="submit"
                            class="inline-block w-full text-lg px-16 py-3.5 mt-6 mb-0 font-bold leading-normal text-center text-white align-middle transition-all bg-blue-500 border-0 rounded-lg cursor-pointer hover:-translate-y-px active:opacity-85 hover:shadow-xs ease-in tracking-tight-rem shadow-md bg-150 bg-x-25">Login</button>
                    </div>
                </form>
            </div>
            <div class="border-black/12.5 rounded-b-2xl border-t-0 border-solid p-6 text-center pt-0 px-1 sm:px-6">
                <p class="mx-auto mb-6 leading-normal text-sm">Don't have an account? <a href="../pages/sign-up.html"
                        class="font-semibold text-transparent bg-clip-text bg-gradient-to-tl from-blue-500 to-violet-500">Sign
                        up</a></p>
            </div>
        </section>
    </main>


    {{-- <main class="mt-0 transition-all duration-200 ease-in-out">
        <section>
            <div class="relative flex items-center min-h-screen p-0 overflow-hidden bg-center bg-cover">
                <div class="container z-1">
                    <div class="flex flex-wrap -mx-3">
                        <div
                            class="flex flex-col w-full max-w-full px-3 mx-auto lg:mx-0 shrink-0 md:flex-0 md:w-7/12 lg:w-5/12 xl:w-4/12 rounded-2xl border-4">
                            <div
                                class="relative flex flex-col min-w-0 break-words bg-transparent border-0 shadow-none lg:py4 rounded-2xl bg-clip-border">
                                <div class="p-6 pb-0 mb-0">
                                    <h4 class="font-bold">Sign In</h4>
                                    <p class="mb-0">Masukkan email dan password anda</p>
                                </div>
                                <div class="flex-auto p-6">
                                    <form role="form">
                                        <div class="mb-4">
                                            <input type="email" placeholder="Email"
                                                class="focus:shadow-primary-outline text-sm leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding p-3 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-fuchsia-300 focus:outline-none" />
                                        </div>
                                        <div class="mb-4">
                                            <input type="password" placeholder="Password"
                                                class="focus:shadow-primary-outline text-sm leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding p-3 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-fuchsia-300 focus:outline-none" />
                                        </div>
                                        <div class="flex items-center pl-12 mb-0.5 text-left min-h-6">
                                            <input id="rememberMe"
                                                class="mt-0.5 rounded-10 duration-250 ease-in-out after:rounded-circle after:shadow-2xl after:duration-250 checked:after:translate-x-5.3 h-5 relative float-left -ml-12 w-10 cursor-pointer appearance-none border border-solid border-gray-200 bg-zinc-700/10 bg-none bg-contain bg-left bg-no-repeat align-top transition-all after:absolute after:top-px after:h-4 after:w-4 after:translate-x-px after:bg-white after:content-[''] checked:border-blue-500/95 checked:bg-blue-500/95 checked:bg-none checked:bg-right"
                                                type="checkbox" />
                                            <label
                                                class="ml-2 font-normal cursor-pointer select-none text-sm text-slate-700"
                                                for="rememberMe">Remember me</label>
                                        </div>
                                        <div class="text-center">
                                            <button type="button"
                                                class="inline-block w-full px-16 py-3.5 mt-6 mb-0 font-bold leading-normal text-center text-white align-middle transition-all bg-blue-500 border-0 rounded-lg cursor-pointer hover:-translate-y-px active:opacity-85 hover:shadow-xs text-sm ease-in tracking-tight-rem shadow-md bg-150 bg-x-25">Sign
                                                in</button>
                                        </div>
                                    </form>
                                </div>
                                <div
                                    class="border-black/12.5 rounded-b-2xl border-t-0 border-solid p-6 text-center pt-0 px-1 sm:px-6">
                                    <p class="mx-auto mb-6 leading-normal text-sm">Don't have an account? <a
                                            href="../pages/sign-up.html"
                                            class="font-semibold text-transparent bg-clip-text bg-gradient-to-tl from-blue-500 to-violet-500">Sign
                                            up</a></p>
                                </div>
                            </div>
                        </div> --}}

                        {{-- INI BUAT GAMBAR --}}
                        {{-- <div
                            class="absolute top-0 right-0 flex-col justify-center hidden w-6/12 h-full max-w-full px-3 pr-0 my-auto text-center flex-0 lg:flex">
                            <div
                                class="relative flex flex-col justify-center h-full bg-cover px-24 m-4 overflow-hidden bg-[url('https://raw.githubusercontent.com/creativetimofficial/public-assets/master/argon-dashboard-pro/assets/img/signin-ill.jpg')] rounded-xl ">
                                <span
                                    class="absolute top-0 left-0 w-full h-full bg-center bg-cover bg-gradient-to-tl from-blue-500 to-violet-500 opacity-60"></span>
                                <h4 class="z-20 mt-12 font-bold text-white">"Attention is the new currency"</h4>
                                <p class="z-20 text-white ">The more effortless the writing looks, the more effort the
                                    writer actually put into the process.</p>
                            </div>
                        </div> --}}

                        {{--
                    </div>
                </div>
            </div>
        </section>
    </main> --}}

    {{-- FOOTER --}}
    {{-- <footer class="py-12">
        <div class="container">
            <div class="flex flex-wrap -mx-3">
                <div class="flex-shrink-0 w-full max-w-full mx-auto mb-6 text-center lg:flex-0 lg:w-8/12">
                    <a href="javascript:;" target="_blank" class="mb-2 mr-4 text-slate-400 sm:mb-0 xl:mr-12"> Company
                    </a>
                    <a href="javascript:;" target="_blank" class="mb-2 mr-4 text-slate-400 sm:mb-0 xl:mr-12"> About Us
                    </a>
                    <a href="javascript:;" target="_blank" class="mb-2 mr-4 text-slate-400 sm:mb-0 xl:mr-12"> Team </a>
                    <a href="javascript:;" target="_blank" class="mb-2 mr-4 text-slate-400 sm:mb-0 xl:mr-12"> Products
                    </a>
                    <a href="javascript:;" target="_blank" class="mb-2 mr-4 text-slate-400 sm:mb-0 xl:mr-12"> Blog </a>
                    <a href="javascript:;" target="_blank" class="mb-2 mr-4 text-slate-400 sm:mb-0 xl:mr-12"> Pricing
                    </a>
                </div>
                <div class="flex-shrink-0 w-full max-w-full mx-auto mt-2 mb-6 text-center lg:flex-0 lg:w-8/12">
                    <a href="javascript:;" target="_blank" class="mr-6 text-slate-400">
                        <span class="text-lg fab fa-dribbble"></span>
                    </a>
                    <a href="javascript:;" target="_blank" class="mr-6 text-slate-400">
                        <span class="text-lg fab fa-twitter"></span>
                    </a>
                    <a href="javascript:;" target="_blank" class="mr-6 text-slate-400">
                        <span class="text-lg fab fa-instagram"></span>
                    </a>
                    <a href="javascript:;" target="_blank" class="mr-6 text-slate-400">
                        <span class="text-lg fab fa-pinterest"></span>
                    </a>
                    <a href="javascript:;" target="_blank" class="mr-6 text-slate-400">
                        <span class="text-lg fab fa-github"></span>
                    </a>
                </div>
            </div>
            <div class="flex flex-wrap -mx-3">
                <div class="w-8/12 max-w-full px-3 mx-auto mt-1 text-center flex-0">
                    <p class="mb-0 text-slate-400">
                        Copyright ©
                        <script>
                            document.write(new Date().getFullYear());
                        </script>
                        Argon Dashboard 2 by Creative Tim.
                    </p>
                </div>
            </div>
        </div>
    </footer> --}}
</body>

@include('layouts.partials.script')

</html>