@extends('layouts.app')

@section('content')
<div class="bg-gray-200 min-h-screen p-6">

    @if(session('tambah'))
        <div id="alert" class="bg-green-500 text-white px-4 py-2 rounded-md mb-4 text-center relative">
            <span class="font-bold">{{ session('tambah') }}</span>
            <button onclick="document.getElementById('alert').style.display='none'"
                class="absolute top-1 right-3 text-white font-bold text-lg">
                &times;
            </button>
        </div>
    @endif

    <h2 class="text-2xl text-black font-bold font-awesome mb-4">DAFTAR PENGAJUAN</h2>

    <div class="rounded-lg border shadow-md overflow-x-auto">
        <table class="w-full border text-white">
            <thead>
                <tr class="bg-[#ac1234]">
                    <th class="p-3 border border-red-900">No</th>
                    <th class="p-3 border border-red-900">Nama Peminjam</th>
                    <th class="p-3 border border-red-900">Ruangan</th>
                    <th class="p-3 border border-red-900">No HP</th>
                    <th class="p-3 border border-red-900">Tanggal</th>
                    <th class="p-3 border border-red-900">Waktu</th>
                    <th class="p-3 border border-red-900">Status</th>
                    <th class="p-3 border border-red-900">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($borrowRoom as $item)
                    <tr class="text-center text-black bg-white hover:bg-gray-100">
                        <td class="p-3 border border-red-900">{{ $loop->iteration }}</td>
                        <td class="p-3 border border-red-900">{{ $item->user->name ?? '-' }}</td>
                        <td class="p-3 border border-red-900">{{ $item->room->nama_ruangan ?? '-' }}</td>
                        <td class="p-3 border border-red-900">{{ $item->no_hp }}</td>
                        <td class="p-3 border border-red-900">{{ $item->tgl_pinjam }}</td>
                        <td class="p-3 border border-red-900">{{ substr($item->waktu_mulai, 0, 5) }} - {{ substr($item->waktu_selesai, 0, 5) }}</td>
                        <td class="p-3 border border-red-900">
                            <span class="px-2 py-1 rounded text-sm bg-yellow-600 text-white">
                                {{ $item->status }}
                            </span>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" class="text-center p-4 text-gray-400">
                            Belum ada data peminjaman
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection