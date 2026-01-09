@extends('layouts.app')

@section('content')
    <div class="bg-gray-900 min-h-screen p-6">

        <div class="flex justify-between items-center mb-4">
            <h1 class="text-white text-2xl font-bold">Data User</h1>
            <a href="{{ route('admin.user.create') }}"
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
                    <tr class="bg-dark">
                        <th class="p-3 border">No</th>
                        <th class="p-3 border">Nama</th>
                        <th class="p-3 border">Email</th>
                        <th class="p-3 border">Role</th>
                        <th class="p-3 border">Status</th>
                        <th class="p-3 border">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($user as $item)
                        <tr class="text-center bg-gray-800 hover:bg-gray-700">
                            <td class="p-2 border">
                                {{ $user->firstItem() + $loop->index }}
                            </td>
                            <td class="p-2 border">{{ $item->name }}</td>
                            <td class="p-2 border">{{ $item->email }}</td>
                            <td class="p-2 border">{{ $item->role }}</td>
                            <td class="p-2 border">
                                <span class="px-2 py-1 rounded text-sm
                                            @if($item->status == 'approve') bg-green-600
                                            @else bg-yellow-600
                                            @endif">
                                    {{ ucfirst($item->status) }}
                                </span>
                            </td>
                            <td class="p-2 border">
                                <div class="flex flex-wrap justify-center gap-2">
                                    <a href="{{ route('admin.user.edit', $item->id) }}"
                                        class="bg-blue-500 px-3 py-1 rounded text-white text-xs sm:text-sm flex items-center justify-center">
                                        <i class="fa-solid fa-pen-to-square"></i>
                                        <span class="hidden sm:inline ml-1">Edit</span>
                                    </a>

                                    <form action="{{ route('admin.user.destroy', $item->id) }}" method="POST" class="inline">
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
    <div class="mt-4 flex justify-center">
            {{ $user->onEachSide(1)->links() }}
        </div>
@endsection