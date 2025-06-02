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

<body
    class="m-0 font-[Poppins] flex text-base antialiased font-normal leading-default bg-gray-50 text-black">
    <!-- Sidebar -->
    {{-- @if    (Request::is('/')) --}}
    @include('layouts.partials.header')
    {{-- @endif --}}
    <!-- Main Content -->
    {{-- <div class="flex-1 flex flex-col"> --}}
        <!-- Page Content -->
        {{--
    </div> --}}

    {{-- <div class="relative md:ml-64 w-full"> --}}
        <main class="p-6 max-h-screen overflow-y-auto flex-1 w-full">
            @yield('content')
        </main>
    {{-- </div> --}}
    @stack('scripts')

</body>

@include('layouts.partials.script')

</html>