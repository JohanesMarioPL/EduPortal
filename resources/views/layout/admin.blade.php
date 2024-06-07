<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'EduPortal')</title>
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@2.8.2/dist/alpine.js" defer></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
</head>

<body>
<!-- Navbar -->
<nav class="bg-white bg-opacity-50 fixed top-0 w-full z-50 sticky-nav backdrop-filter backdrop-blur-md" x-data="{ open: false }">
    <div class="mx-auto max-w-7xl px-2 sm:px-6 lg:px-8">
        <div class="relative flex h-16 items-center justify-between">
            <!-- Tombol Burger untuk Menu Mobile (hidden on desktop) -->
            <div class="sm:hidden flex items-center">
                <button @click="open = !open"
                        class="text-base-500 hover:bg-gray-700 hover:text-white rounded-md px-3 py-2 text-sm font-medium focus:outline-none">
                    <svg x-show="!open" class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                         xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M4 6h16M4 12h16m-7 6h7"></path>
                    </svg>
                    <svg x-show="open" class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                         xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </button>
            </div>
            <div class="flex flex-1 items-center justify-center sm:items-stretch sm:justify-start">
                <div class="flex flex-shrink-0 items-center">
                    <h1 class="font-bold text-lg text-black">EduPortal</h1>
                </div>
                <!-- Desktop Menu (hidden on small screens) -->
                <div class="hidden sm:flex sm:ml-6">
                    <div class="flex space-x-4">
                        <a href="{{route('admin-users')}}"
                           class="text-base-500 hover:bg-gray-700 hover:text-white rounded-md px-3 py-2 text-sm font-medium">
                            User</a>
                    </div>
                    <div class="flex space-x-4">
                        <a href="{{route('admin-fakultas')}}"
                           class="text-base-500 hover:bg-gray-700 hover:text-white rounded-md px-3 py-2 text-sm font-medium">
                            Fakultas</a>
                    </div>
                    <div class="flex space-x-4">
                        <a href="{{route('admin-prodi')}}"
                           class="text-base-500 hover:bg-gray-700 hover:text-white rounded-md px-3 py-2 text-sm font-medium">
                            Program Studi</a>
                    </div>
                    <div class="flex space-x-4">
                        <a href="{{route('admin-beasiswa')}}"
                           class="text-base-500 hover:bg-gray-700 hover:text-white rounded-md px-3 py-2 text-sm font-medium">
                            Beasiswa</a>
                    </div>
                </div>
            </div>
            <!-- Logout Button for Desktop (hidden on small screens) -->
            <div class="hidden sm:flex items-center">
                <a href="{{ route('logout') }}"
                   class="text-red-500 hover:bg-gray-100 hover:text-red-500 rounded-md px-3 py-2 text-sm font-medium">Logout</a>
            </div>
        </div>
    </div>
    <!-- Menu Mobile -->
    <div class="sm:hidden" x-show="open">
        <div class="px-2 pt-2 pb-3 space-y-1">
            <a href="#" class="text-base-500 hover:bg-gray-700 hover:text-white block rounded-md px-3 py-2 text-base font-medium">User</a>
            <a href="#" class="text-base-500 hover:bg-gray-700 hover:text-white block rounded-md px-3 py-2 text-base font-medium">Fakultas</a>
            <a href="#" class="text-base-500 hover:bg-gray-700 hover:text-white block rounded-md px-3 py-2 text-base font-medium">Program Studi</a>
            <a href="#" class="text-base-500 hover:bg-gray-700 hover:text-white block rounded-md px-3 py-2 text-base font-medium">Beasiswa</a>
        </div>
    </div>
</nav>
<!-- End Navbar -->



<!-- Content -->
<div class="container mx-auto mt-16">
    @yield('content')
</div>
<!-- End Content -->

<!-- Footer -->
<footer class="flex flex-col items-center justify-center bg-zinc-50 text-center text-surface dark:bg-neutral-700 dark:text-white mt-auto">
    <div class="w-full bg-black/5 p-4 text-center">
        Copyright &copy;<script>document.write(new Date().getFullYear());</script> |
        <a href="https://tw-elements.com/">EduPortal</a>
    </div>
</footer>
<!-- End Footer -->
</body>

</html>
