@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-gray-900 text-gray-100">
    <div class="container mx-auto px-4 py-8">
        <!-- Page Header -->
        <div class="mb-8">
            <h1 class="text-3xl font-bold">Dashboard Overview</h1>
            <p class="text-gray-400">Welcome back, {{ Auth::user()->name }}!</p>
        </div>

        <!-- Stats Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-8">
            <!-- Total Peminjaman Ruangan Card -->
            <div class="bg-gray-800 rounded-xl p-6 border border-gray-700 shadow-lg hover:shadow-xl transition-shadow duration-300">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-gray-400 text-sm">Total Ruangan</p>
                        <h3 class="text-3xl font-bold mt-2"> {{ $totalRuangan }}</h3>
                    </div>
                    <div class="w-14 h-14 rounded-full bg-blue-500/20 flex items-center justify-center">
                        <i class="fas fa-building text-blue-400 text-2xl"></i>
                    </div>
                </div>
                <div class="mt-4 pt-4 border-t border-gray-700">
                    <a href="#" class="text-blue-400 hover:text-blue-300 text-sm flex items-center">
                        Lihat detail
                        <i class="fas fa-arrow-right ml-2"></i>
                    </a>
                </div>
            </div>

            <!-- Total Peminjaman Barang Card -->
            <div class="bg-gray-800 rounded-xl p-6 border border-gray-700 shadow-lg hover:shadow-xl transition-shadow duration-300">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-gray-400 text-sm">Total Peminjaman</p>
                        <h3 class="text-3xl font-bold mt-2">892</h3>
                    </div>
                    <div class="w-14 h-14 rounded-full bg-purple-500/20 flex items-center justify-center">
                        <i class="fas fa-boxes text-purple-400 text-2xl"></i>
                    </div>
                </div>
                <div class="mt-4 pt-4 border-t border-gray-700">
                    <a href="#" class="text-blue-400 hover:text-blue-300 text-sm flex items-center">
                        Lihat detail
                        <i class="fas fa-arrow-right ml-2"></i>
                    </a>
                </div>
            </div>

            <!-- Total User Card -->
            <div class="bg-gray-800 rounded-xl p-6 border border-gray-700 shadow-lg hover:shadow-xl transition-shadow duration-300">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-gray-400 text-sm">Total Users</p>
                        <h3 class="text-3xl font-bold mt-2 text-center">{{ $totalUser }}</h3>
                    </div>
                    <div class="w-14 h-14 rounded-full bg-green-500/20 flex items-center justify-center">
                        <i class="fas fa-users text-green-400 text-2xl"></i>
                    </div>
                </div>
                <div class="mt-4 pt-4 border-t border-gray-700">
                    <a href="/admin/user" class="text-blue-400 hover:text-blue-300 text-sm flex items-center">
                        Lihat detail
                        <i class="fas fa-arrow-right ml-2"></i>
                    </a>
                </div>
            </div>
        </div>

        <!-- Recent Activity Section -->
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
            <!-- Recent Peminjaman Ruangan -->
            <div class="bg-gray-800 rounded-xl p-6 border border-gray-700">
                <div class="flex justify-between items-center mb-6">
                    <h2 class="text-xl font-bold">Peminjaman Ruangan Terbaru</h2>
                    <a href="#" class="text-blue-400 hover:text-blue-300 text-sm">Lihat semua</a>
                </div>
                <div class="space-y-4">
                    @for($i = 1; $i <= 5; $i++)
                    <div class="flex items-center justify-between p-3 hover:bg-gray-700 rounded-lg transition-colors">
                        <div class="flex items-center">
                            <div class="w-10 h-10 rounded-lg bg-blue-500/20 flex items-center justify-center mr-3">
                                <i class="fas fa-calendar-alt text-blue-400"></i>
                            </div>
                            <div>
                                <p class="font-medium">Ruang Meeting {{ $i }}</p>
                                <p class="text-sm text-gray-400">Hari ini, 10:00 - 12:00</p>
                            </div>
                        </div>
                        <span class="px-3 py-1 rounded-full text-xs {{ $i % 2 == 0 ? 'bg-green-500/20 text-green-400' : 'bg-yellow-500/20 text-yellow-400' }}">
                            {{ $i % 2 == 0 ? 'Selesai' : 'Berlangsung' }}
                        </span>
                    </div>
                    @endfor
                </div>
            </div>

            <!-- Recent Peminjaman Barang -->
            <div class="bg-gray-800 rounded-xl p-6 border border-gray-700">
                <div class="flex justify-between items-center mb-6">
                    <h2 class="text-xl font-bold">Peminjaman Barang Terbaru</h2>
                    <a href="#" class="text-blue-400 hover:text-blue-300 text-sm">Lihat semua</a>
                </div>
                <div class="space-y-4">
                    @for($i = 1; $i <= 5; $i++)
                    <div class="flex items-center justify-between p-3 hover:bg-gray-700 rounded-lg transition-colors">
                        <div class="flex items-center">
                            <div class="w-10 h-10 rounded-lg bg-purple-500/20 flex items-center justify-center mr-3">
                                <i class="fas fa-box text-purple-400"></i>
                            </div>
                            <div>
                                <p class="font-medium">Proyektor {{ $i }}</p>
                                <p class="text-sm text-gray-400">Peminjam: User {{ $i }}</p>
                            </div>
                        </div>
                        <span class="px-3 py-1 rounded-full text-xs bg-blue-500/20 text-blue-400">
                            Dipinjam
                        </span>
                    </div>
                    @endfor
                </div>
            </div>
        </div>

        <!-- Quick Actions -->
        <div class="mt-8 bg-gray-800 rounded-xl p-6 border border-gray-700">
            <h2 class="text-xl font-bold mb-6">Quick Actions</h2>
            <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                <a href="/admin/ruangan" class="bg-gray-700 hover:bg-gray-600 rounded-lg p-4 text-center transition-colors">
                    <i class="fas fa-plus-circle text-blue-400 text-2xl mb-2"></i>
                    <p class="font-medium"></p>
                </a>
                <a href="#" class="bg-gray-700 hover:bg-gray-600 rounded-lg p-4 text-center transition-colors">
                    <i class="fas fa-user-plus text-green-400 text-2xl mb-2"></i>
                    <p class="font-medium">Tambah User</p>
                </a>
                <a href="#" class="bg-gray-700 hover:bg-gray-600 rounded-lg p-4 text-center transition-colors">
                    <i class="fas fa-chart-bar text-yellow-400 text-2xl mb-2"></i>
                    <p class="font-medium">Lihat Report</p>
                </a>
                <a href="#" class="bg-gray-700 hover:bg-gray-600 rounded-lg p-4 text-center transition-colors">
                    <i class="fas fa-cog text-gray-400 text-2xl mb-2"></i>
                    <p class="font-medium">Settings</p>
                </a>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    // You can add any dashboard-specific JavaScript here
    document.addEventListener('DOMContentLoaded', function() {
        console.log('Dashboard loaded');
    });
</script>
@endpush