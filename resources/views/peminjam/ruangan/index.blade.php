@extends('layouts.app')

@section('content')
    <div class="bg-gray-900 min-h-screen p-4 md:p-6">
        <div class="max-w-7xl mx-auto">
            <h1 class="text-white text-2xl md:text-3xl font-bold mb-6">Daftar Ruangan</h1>

            @if(session('success'))
                <div id="alert" class="bg-green-600 text-white px-4 py-3 rounded-lg mb-6 relative">
                    <span class="font-medium">{{ session('success') }}</span>
                    <button onclick="document.getElementById('alert').style.display='none'"
                        class="absolute top-3 right-4 text-white font-bold text-lg hover:text-gray-200">
                        &times;
                    </button>
                </div>
            @endif

            @if(session('error'))
                <div id="alert" class="bg-red-600 text-white px-4 py-3 rounded-lg mb-6 relative">
                    <span class="font-medium">{{ session('error') }}</span>
                    <button onclick="document.getElementById('alert').style.display='none'"
                        class="absolute top-3 right-4 text-white font-bold text-lg hover:text-gray-200">
                        &times;
                    </button>
                </div>
            @endif

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @forelse ($ruangan as $item)
                    <div
                        class="bg-gray-800 rounded-xl overflow-hidden border border-gray-700 hover:border-gray-600 transition-all duration-300">
                        <div class="h-48 overflow-hidden">
                            @if($item->foto_ruangan)
                                <img src="{{ asset('storage/' . $item->foto_ruangan) }}" alt="{{ $item->nama_ruangan }}"
                                    class="w-full h-full object-cover hover:scale-105 transition-transform duration-300">
                            @else
                                <div class="w-full h-full bg-gray-700 flex items-center justify-center">
                                    <i class="fas fa-image text-gray-500 text-4xl"></i>
                                </div>
                            @endif
                        </div>

                        <div class="absolute top-4 right-4">
                            <span class="px-3 py-1 rounded-full text-xs font-semibold
                                        @if($item->status_ruangan == 'available') 
                                            bg-green-900 text-green-200
                                        @elseif($item->status_ruangan == 'used') 
                                            bg-yellow-900 text-yellow-200
                                        @else 
                                            bg-red-900 text-red-200
                                        @endif">
                                {{ ucfirst($item->status_ruangan) }}
                            </span>
                        </div>

                        <div class="p-5">
                            <div class="mb-4">
                                <h3 class="text-xl font-bold text-white mb-1">{{ $item->nama_ruangan }}</h3>
                                <p class="text-gray-400 text-sm">Kode Ruangan: {{ $item->kode_ruangan }}</p>
                            </div>

                            <div class="mt-6 text-white">
                                @if($item->status_ruangan == 'available')
                                    <a href=""
                                        class="block w-full bg-blue-600 hover:bg-blue-700 text-white text-center font-semibold py-3 px-4 rounded-lg transition duration-300 flex items-center justify-center gap-2">
                                        <i class="fas fa-calendar-plus"></i>
                                        <span>Pinjam Ruangan</span>
                                    </a>
                                @elseif($item->status_ruangan == 'used')
                                    <button
                                        class="w-full !bg-yellow-600 text-white text-center font-semibold py-3 px-4 rounded-lg cursor-not-allowed flex items-center justify-center gap-2">
                                        <i class="fas fa-ban"></i>
                                        <span>Sedang Digunakan</span>
                                    </button>
                                @else
                                    <button
                                        class="w-full !bg-red-500 text-white text-center font-semibold py-3 px-4 rounded-lg cursor-not-allowed flex items-center justify-center gap-2">
                                        <i class="fas fa-tools"></i>
                                        <span>Dalam Perbaikan</span>
                                    </button>
                                @endif
                            </div>

                            <div class="mt-4 pt-4 border-t border-gray-700">
                                <p class="text-gray-400 text-sm">
                                    @if($item->status_ruangan == 'available')
                                        <i class="fas fa-check-circle text-green-500 mr-2"></i>
                                        Ruangan tersedia
                                    @elseif($item->status_ruangan == 'used')
                                        <i class="fas fa-clock text-yellow-500 mr-2"></i>
                                        Ruangan sedang dipinjam
                                    @else
                                        <i class="fas fa-exclamation-triangle text-red-500 mr-2"></i>
                                        Ruangan sedang maintenance
                                    @endif
                                </p>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-span-full bg-gray-800 rounded-xl p-8 text-center">
                        <i class="fas fa-door-closed text-gray-600 text-5xl mb-4"></i>
                        <h3 class="text-xl text-white font-semibold mb-2">Tidak Ada Ruangan</h3>
                        <p class="text-gray-400">Belum ada ruangan yang terdaftar</p>
                    </div>
                @endforelse
            </div>
        </div>
    </div>

    <style>
        button:disabled {
            opacity: 0.7;
        }

        .hover\:scale-105:hover {
            transform: scale(1.05);
        }

        .transition-all {
            transition-property: all;
        }

        .duration-300 {
            transition-duration: 300ms;
        }
    </style>
@endsection