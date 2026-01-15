@extends('layouts.app')

@section('content')
    <div class="bg-gray-200 min-h-screen p-6">

        <div class="flex justify-between items-center mb-4">
            <h1 class="text-black text-2xl font-bold">Data Ruangan</h1>
            <a href="{{ route('admin.ruangan.create') }}"
                class="bg-green-600 hover:bg-green-800 text-white px-4 py-2 rounded font-bold">
                TAMBAH
            </a>
        </div>
        @if (session('tambah'))
            <div id="alert" class="bg-green-500 text-white px-4 py-2 rounded-md mb-4 text-center relative">
                <span class="font-bold">{{ session('tambah') }}</span>
                <button onclick="document.getElementById('alert').style.display='none'"
                    class="absolute top-1 right-3 text-white font-bold text-lg">
                    &times;
                </button>
            </div>
        @endif

        @if (session('update'))
            <div id="alert" class="bg-blue-500 text-white px-4 py-2 rounded-md mb-4 text-center relative">
                <span class="font-bold">{{ session('update') }}</span>
                <button onclick="document.getElementById('alert').style.display='none'"
                    class="absolute top-1 right-3 text-white font-bold text-lg">
                    &times;
                </button>
            </div>
        @endif

        @if (session('delete'))
            <div id="alert" class="bg-red-500 text-white px-4 py-2 rounded-md mb-4 text-center relative">
                <span class="font-bold">{{ session('delete') }}</span>
                <button onclick="document.getElementById('alert').style.display='none'"
                    class="absolute top-1 right-3 text-white font-bold text-lg">
                    &times;
                </button>
            </div>
        @endif

        <div class="rounded-lg border shadow-md overflow-x-auto">
            <table class="w-full border text-white">
                <thead>
                    <tr class="bg-[#ac1234]">
                        <th class="p-3 border border-red-900">No</th>
                        <th class="p-3 border border-red-900">Kode Ruangan</th>
                        <th class="p-3 border border-red-900">Nama Ruangan</th>
                        <th class="p-3 border border-red-900">Status</th>
                        <th class="p-3 border border-red-900">Foto</th>
                        <th class="p-3 border border-red-900">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($ruangan as $item)
                        <tr class="text-center bg-white text-black">
                            <td class="p-2 border border-red-900">{{ $loop->iteration }}</td>
                            <td class="p-2 border border-red-900">{{ $item->kode_ruangan }}</td>
                            <td class="p-2 border border-red-900">{{ $item->nama_ruangan }}</td>
                            <td class="p-2 border border-red-900">
                                <span class="px-2 py-1 rounded text-sm text-white
                                                        @if($item->status_ruangan == 'available') bg-green-600
                                                        @elseif($item->status_ruangan == 'used') bg-yellow-600
                                                        @else bg-red-600
                                                        @endif">
                                    {{ ucfirst($item->status_ruangan) }}
                                </span>
                            </td>
                            <td class="p-2 border border-red-900">
                                @if($item->foto_ruangan)
                                    <a href="{{ asset('storage/' . $item->foto_ruangan) }}" target="_blank">
                                        <img src="{{ asset('storage/' . $item->foto_ruangan) }}"
                                            class="w-24 h-12 object-cover mx-auto rounded cursor-pointer hover:opacity-80">
                                    </a>
                                @else
                                    <span class="text-gray-400">Tidak ada</span>
                                @endif
                            </td>
                            <td class="p-2 border border-red-900">
                                <div class="flex flex-wrap justify-center gap-2">
                                    <a href="{{ route('admin.ruangan.edit', $item->id) }}"
                                        class="bg-blue-500 px-3 py-1 rounded text-white text-xs sm:text-sm flex items-center justify-center">
                                        <i class="fa-solid fa-pen-to-square"></i>
                                        <span class="hidden sm:inline ml-1">Edit</span>
                                    </a>

                                    <form action="{{ route('admin.ruangan.destroy', $item->id) }}" method="POST" class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button onclick="return confirm('Hapus data?')"
                                            class="bg-red-600 px-3 py-1 rounded text-white text-xs sm:text-sm flex items-center justify-center">
                                            <i class="fa-solid fa-trash"></i>
                                            <span class="hidden sm:inline ml-1">Hapus</span>
                                        </button>
                                    </form>
                                </div>
                            </td>

                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center p-4 text-gray-400">
                                Data ruangan belum ada
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection