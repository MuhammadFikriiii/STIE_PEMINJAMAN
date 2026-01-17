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
                        <th class="p-3 border border-red-900">Surat</th>
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
                            <td class="p-3 border border-red-900">{{ substr($item->waktu_mulai, 0, 5) }} -
                                {{ substr($item->waktu_selesai, 0, 5) }}
                            </td>
                            <td class="p-3 border border-red-900">
                                <span
                                    class="px-2 py-1 rounded text-sm text-white
                                                    {{ $item->status === 'diterima' ? 'bg-green-600' : ($item->status === 'ditolak' ? 'bg-red-600' : 'bg-yellow-600') }}">
                                    {{ $item->status }}
                                </span>
                            </td>
                            <td class="p-3 border border-red-900 text-center">
                                <a href="{{ route('pengajuan.surat', $item->id) }}" target="_blank"
                                    class="text-red-600 hover:text-red-800 text-xl">
                                    <i class="fa fa-file-pdf"></i>
                                </a>
                            </td>
                            <td class="p-3 border border-red-900">
                                <div class="flex items-center justify-center gap-2">

                                    @if($item->status == 'diajukan')
                                        <form action="{{ route('pengajuan.approve', $item->id) }}" method="POST">
                                            @csrf @method('PATCH')
                                            <button type="submit" title="Setuju" onclick="return confirm('Setujui peminjaman ini?')"
                                                class="bg-green-500 hover:bg-green-600 text-white p-2 rounded">
                                                <i class="fa fa-check"></i>
                                            </button>
                                        </form>

                                        <form action="{{ route('pengajuan.reject', $item->id) }}" method="POST">
                                            @csrf @method('PATCH')
                                            <button type="submit" title="Tolak" onclick="return confirm('Tolak peminjaman ini?')"
                                                class="bg-red-500 hover:bg-red-600 text-white p-2 rounded">
                                                <i class="fa fa-times"></i>
                                            </button>
                                        </form>

                                    @elseif($item->status == 'diterima')
                                        <form action="{{ route('pengajuan.complete', $item->id) }}" method="POST">
                                            @csrf @method('PATCH')
                                            <button type="submit" title="Selesaikan Peminjaman"
                                                onclick="return confirm('Selesaikan peminjaman ini? Ruangan akan kembali Available.')"
                                                class="bg-blue-500 hover:bg-blue-600 text-white px-3 py-1 rounded text-sm font-bold">
                                                Selesai
                                            </button>
                                        </form>

                                    @elseif($item->status == 'ditolak')
                                        <form action="{{ route('pengajuan.destroy', $item->id) }}" method="POST">
                                            @csrf @method('DELETE')
                                            <button type="submit" title="Hapus Data"
                                                onclick="return confirm('Hapus data ini permanen?')"
                                                class="text-red-600 hover:text-red-800 text-lg">
                                                <i class="fa fa-trash"></i>
                                            </button>
                                        </form>
                                    @else
                                        <span class="text-gray-400 text-xs italic">Closed</span>
                                    @endif

                                </div>
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