@extends('layouts.peminjam.app')

@section('content')
<div class="bg-gray-900 min-h-screen p-6">

    @if(session('tambah'))
        <div id="alert" class="bg-green-500 text-white px-4 py-2 rounded-md mb-4 text-center relative">
            <span class="font-bold">{{ session('tambah') }}</span>
            <button onclick="document.getElementById('alert').style.display='none'"
                class="absolute top-1 right-3 text-white font-bold text-lg">
                &times;
            </button>
        </div>
    @endif

    <div class="rounded-lg border shadow-md overflow-x-auto">
        <table class="w-full border text-white">
            <thead>
                <tr class="bg-dark">
                    <th class="p-3 border">No</th>
                    <th class="p-3 border">Nama Peminjam</th>
                    <th class="p-3 border">Ruangan</th>
                    <th class="p-3 border">No HP</th>
                    <th class="p-3 border">Tanggal</th>
                    <th class="p-3 border">Waktu</th>
                    <th class="p-3 border">Status</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($borrowRoom as $item)
                    <tr class="text-center bg-gray-800 hover:bg-gray-700">
                        <td class="p-3 border">{{ $loop->iteration }}</td>
                        <td class="p-3 border">{{ $item->user->name ?? '-' }}</td>
                        <td class="p-3 border">{{ $item->room->nama_ruangan ?? '-' }}</td>
                        <td class="p-3 border">{{ $item->no_hp }}</td>
                        <td class="p-3 border">{{ $item->tgl_pinjam }}</td>
                        <td class="p-3 border">{{ $item->waktu_mulai }} - {{ $item->waktu_selesai }}</td>
                        <td class="p-3 border">
                            <span class="px-2 py-1 rounded text-sm bg-yellow-600">
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