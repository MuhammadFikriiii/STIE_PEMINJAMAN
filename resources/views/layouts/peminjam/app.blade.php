<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

    <style>
        [x-cloak] {
            display: none !important;
        }

        .sidebar-transition {
            transition: transform 0.3s ease-in-out;
        }

        .sidebar-backdrop {
            position: fixed;
            inset: 0;
            z-index: 30;
            background-color: rgba(0, 0, 0, 0.5);
        }

        @media (max-width: 639px) {
            .sidebar-mobile {
                position: fixed;
                top: 0;
                left: 0;
                height: 100vh;
                z-index: 40;
                transform: translateX(-100%);
            }

            .sidebar-mobile-expanded {
                transform: translateX(0);
            }

            .sidebar-backdrop-mobile {
                position: fixed;
                inset: 0;
                z-index: 35;
                background-color: rgba(0, 0, 0, 0.5);
            }

            .no-scroll {
                overflow: hidden;
                position: fixed;
                width: 100%;
            }
        }

        @media (min-width: 640px) {
            .sidebar-desktop {
                position: fixed;
                top: 0;
                left: 0;
                height: 100vh;
                z-index: 20;
                transform: none !important;
            }

            .main-content-expanded {
                margin-left: 16rem;
                width: calc(100% - 16rem);
            }

            .main-content-collapsed {
                margin-left: 0;
                width: 100%;
            }
        }

        .toggle-button-collapsed {
            transform: rotate(180deg);
        }
    </style>
</head>

<body class="dark:bg-gray-900 min-h-screen" x-data="{
        sidebarOpen: true,
        mobileSidebarOpen: false,
        initialized: false
        }" x-cloak>

    <div x-show="mobileSidebarOpen && window.innerWidth < 640"
        x-transition:enter="transition-opacity ease-linear duration-300" x-transition:enter-start="opacity-0"
        x-transition:enter-end="opacity-100" x-transition:leave="transition-opacity ease-linear duration-300"
        x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0" @click="mobileSidebarOpen = false"
        class="sidebar-backdrop-mobile sm:hidden" :class="{ 'hidden': !mobileSidebarOpen }">
    </div>

    <div class="flex min-h-screen w-full">
        <aside id="default-sidebar" class="w-64 bg-gray-800 border-e border-default sidebar-transition" :class="{
                   'sidebar-mobile': window.innerWidth < 640,
                   'sidebar-mobile-expanded': mobileSidebarOpen && window.innerWidth < 640,
                   'sidebar-desktop': window.innerWidth >= 640,
                   'hidden': !sidebarOpen && window.innerWidth >= 640
               }" aria-label="Sidebar">
            <div class="h-full px-3 py-4 overflow-y-auto">
                <div class="flex items-center justify-between mb-5 px-2">
                    <h2 class="text-xl font-bold text-heading text-white">SIPERU</h2>

                    <button type="button"
                        @click="if(window.innerWidth < 640) { mobileSidebarOpen = false } else { sidebarOpen = false }"
                        class="sm:hidden text-gray-500 hover:text-gray-700">
                        <svg class="w-6 h-6" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24"
                            height="24" fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>

                <ul class="space-y-2 font-medium">
                    <li>
                        <a href=""
                            class="flex items-center px-2 py-3 text-body rounded-base hover:bg-gray-700 hover:text-fg-brand group transition-colors duration-150"
                            @click="if(window.innerWidth < 640) mobileSidebarOpen = false">
                            <i class="fas fa-tachometer-alt text-white"></i>
                            <span class="ms-3 text-white">Dashboard</span>
                        </a>
                    </li>
                    <li>
                        <a href="/peminjam/ruangan"
                            class="flex items-center px-2 py-3 text-body rounded-base hover:bg-gray-700 hover:text-fg-brand group transition-colors duration-150"
                            @click="if(window.innerWidth < 640) mobileSidebarOpen = false">
                            <i class="fas fa-door-open text-white"></i>
                            <span class="flex-1 ms-3 whitespace-nowrap text-white">Ruangan</span>
                        </a>
                    </li>
                    <li>
                        <a href="/peminjam/peminjaman"
                            class="flex items-center px-2 py-3 text-body rounded-base hover:bg-gray-700 hover:text-fg-brand group transition-colors duration-150"
                            @click="if(window.innerWidth < 640) mobileSidebarOpen = false">
                            <i class="fas fa-user text-white"></i>
                            <span class="flex-1 ms-3 whitespace-nowrap text-white">Peminjaman</span>
                        </a>
                    </li>
                </ul>
            </div>
        </aside>

        <div class="flex-1 flex flex-col min-h-screen w-full transition-all duration-300 ease-in-out" :class="{
            'main-content-expanded': sidebarOpen && window.innerWidth >= 640,
            'main-content-collapsed': !sidebarOpen && window.innerWidth >= 640
        }">
            <nav class="bg-gray-800 border-b border-gray-700 fixed top-0 left-0 right-0 z-30 transition-all duration-300 ease-in-out"
                :class="{
                'ml-64': sidebarOpen && window.innerWidth >= 640,
                'ml-0': !sidebarOpen && window.innerWidth >= 640
            }">
                <div class="px-4 sm:px-6 lg:px-8">
                    <div class="flex justify-between h-16">
                        <div class="flex items-center">
                            <button type="button"
                                @click="if(window.innerWidth < 640) { mobileSidebarOpen = true } else { sidebarOpen = !sidebarOpen }"
                                class="inline-flex items-center p-2 text-sm text-white rounded-lg hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-gray-600">
                                <span class="sr-only">Open sidebar</span>
                                <svg class="w-6 h-6" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24"
                                    height="24" fill="none" viewBox="0 0 24 24">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-width="2"
                                        d="M5 7h14M5 12h14M5 17h10" />
                                </svg>
                            </button>
                        </div>

                        <div class="flex items-center space-x-4">
                            <div class="relative" x-data="{ open: false }">
                                <button @click="open = !open"
                                    class="flex items-center space-x-3 text-white hover:text-white focus:outline-none">
                                    <div
                                        class="w-8 h-8 rounded-full bg-blue-500 flex items-center justify-center text-white">
                                        <span
                                            class="text-white font-semibold">{{ strtoupper(substr(Auth::user()->name, 0, 1)) }}</span>
                                    </div>
                                    <span>{{ Auth::user()->name }}</span>
                                    <i class="fas fa-chevron-down text-sm"></i>
                                </button>

                                <div x-show="open" x-cloak @click.away="open = false"
                                    x-transition:enter="transition ease-out duration-100"
                                    x-transition:enter-start="transform opacity-0 scale-95"
                                    x-transition:enter-end="transform opacity-100 scale-100"
                                    x-transition:leave="transition ease-in duration-75"
                                    x-transition:leave-end="transform opacity-0 scale-95"
                                    class="absolute right-0 mt-2 w-48 bg-gray-800 rounded-md shadow-lg py-1 z-50 border border-gray-700">
                                    <form method="POST" action="{{ route('logout') }}">
                                        @csrf
                                        <button type="submit"
                                            class="block w-full text-left px-4 py-2 text-sm text-white hover:bg-gray-700 hover:text-white">
                                            <i class="fas fa-sign-out-alt mr-2"></i> Log Out
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </nav>

            <main class="flex-1 p-4 sm:p-6 overflow-auto bg-gray-50 dark:bg-gray-900 mt-16">
                <div class="max-w-7xl mx-auto">
                    @yield('content')
                </div>
            </main>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            document.addEventListener('keydown', function (event) {
                if (event.key === 'Escape') {
                    const isMobile = window.innerWidth < 640;
                    if (isMobile) {
                        Alpine.$data(document.body).mobileSidebarOpen = false;
                    }
                }
            });

            function handleResize(initial = false) {
                const isDesktop = window.innerWidth >= 640;
                const alpineData = Alpine.$data(document.body);

                if (initial && !alpineData.initialized) {
                    // SET AWAL TANPA TRANSISI
                    alpineData.sidebarOpen = isDesktop;
                    alpineData.mobileSidebarOpen = false;
                    alpineData.initialized = true;
                    return;
                }

                if (isDesktop) {
                    alpineData.mobileSidebarOpen = false;
                    alpineData.sidebarOpen = true;
                } else {
                    alpineData.sidebarOpen = false;
                }

                document.body.classList.toggle(
                    'no-scroll',
                    !isDesktop && alpineData.mobileSidebarOpen
                );
            }

            handleResize(true);

            window.addEventListener('resize', handleResize);

            const observer = new MutationObserver(function () {
                const isMobile = window.innerWidth < 640;
                const alpineData = Alpine.$data(document.body);

                if (isMobile) {
                    if (alpineData.mobileSidebarOpen) {
                        document.body.classList.add('no-scroll');
                    } else {
                        document.body.classList.remove('no-scroll');
                    }
                }
            });

            observer.observe(document.body, {
                attributes: true,
                attributeFilter: ['x-data']
            });
        });
    </script>

    @stack('scripts')
</body>

</html>