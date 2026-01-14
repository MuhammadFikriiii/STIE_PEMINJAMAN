@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-gray-200">
    <div class="container mx-auto px-4 py-8 mt-[-30px]">

        <div class="mb-8">
            <h1 class="text-3xl font-bold text-black">Dashboard Admin</h1>
            <p class="text-black">Welcome back, {{ Auth::user()->name }}!</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-8">
            <div class="bg-white rounded-xl p-6 border border-red-600 shadow-lg hover:shadow-xl transition-shadow duration-300">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-black text-sm">Total Ruangan</p>
                        <h3 class="text-3xl font-bold mt-2 text-black text-center"> {{ $totalRuangan }}</h3>
                    </div>
                    <div class="w-14 h-14 rounded-full bg-[#ac1234] flex items-center justify-center">
                        <i class="fas fa-building text-white text-2xl"></i>
                    </div>
                </div>
                <div class="mt-4 pt-4 border-t border-gray-700">
                    <a href="/admin/ruangan" class="text-black hover:text-blue-300 text-sm flex items-center">
                        Lihat detail
                        <i class="fas fa-arrow-right ml-2"></i>
                    </a>
                </div>
            </div>

            <div class="bg-white rounded-xl p-6 border border-red-600 shadow-lg hover:shadow-xl transition-shadow duration-300">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-black text-sm">Total Peminjaman</p>
                        <h3 class="text-3xl font-bold mt-2 text-center">0</h3>
                    </div>
                    <div class="w-14 h-14 rounded-full bg-[#ac1234] flex items-center justify-center">
                        <i class="fas fa-boxes text-white text-2xl"></i>
                    </div>
                </div>
                <div class="mt-4 pt-4 border-t border-gray-700">
                    <a href="#" class="text-black hover:text-blue-300 text-sm flex items-center">
                        Lihat detail
                        <i class="fas fa-arrow-right ml-2"></i>
                    </a>
                </div>
            </div>

            <div class="bg-white rounded-xl p-6 border border-red-600 shadow-lg hover:shadow-xl transition-shadow duration-300">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-black text-sm">Total Users</p>
                        <h3 class="text-3xl font-bold mt-2 text-center">{{ $totalUser }}</h3>
                    </div>
                    <div class="w-14 h-14 rounded-full bg-[#ac1234] flex items-center justify-center">
                        <i class="fas fa-users text-white text-2xl"></i>
                    </div>
                </div>
                <div class="mt-4 pt-4 border-t border-gray-700">
                    <a href="/admin/user" class="text-black hover:text-blue-300 text-sm flex items-center">
                        Lihat detail
                        <i class="fas fa-arrow-right ml-2"></i>
                    </a>
                </div>
            </div>
        </div>

        <div class="mt-8 bg-white rounded-xl p-6 border border-gray-700">
            <h2 class="text-xl font-bold mb-6">Quick Actions</h2>
            <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                <a href="/admin/ruangan" class="bg-[#ac1234] rounded-lg p-4 text-center transition-colors">
                    <i class="fas fa-plus-circle text-white text-2xl mb-2"></i>
                    <p class="font-medium text-white">Tambah Ruangan</p>
                </a>
                <a href="#" class="bg-[#ac1234] rounded-lg p-4 text-center transition-colors">
                    <i class="fas fa-user-plus text-white text-2xl mb-2"></i>
                    <p class="font-medium text-white">Tambah User</p>
                </a>
                <a href="#" class="bg-[#ac1234] rounded-lg p-4 text-center transition-colors">
                    <i class="fas fa-chart-bar text-white text-2xl mb-2"></i>
                    <p class="font-medium text-white">Lihat Report</p>
                </a>
                <a href="#" class="bg-[#ac1234] rounded-lg p-4 text-center transition-colors">
                    <i class="fas fa-cog text-white text-2xl mb-2"></i>
                    <p class="font-medium text-white">Settings</p>
                </a>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        console.log('Dashboard loaded');
    });
</script>
@endpush