@extends('layouts.app')

@section('tittle', 'tambah')

@section('content')

    <div class="bg-gray-900 min-h-screen p-6">
        <div class="text-center text-3xl text-white mt-5 mb-5">TAMBAH RUANGAN</div>
        <hr class="border-2 mb-4">

        @if ($errors->any())
            <div class="bg-red-500 text-white p-3 rounded mb-4">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li> {{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('admin.ruangan.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <label for="kode_ruangan" class="text-white">Kode Ruangan:</label>
            <input type="number" id="kode_ruangan" name="kode_ruangan"
                class="text-black w-full rounded-lg p-2 border border-white bg-white"
                placeholder="Masukkan kode ruangan" required>

            <label for="nama_ruangan" class="text-white block mt-2">Nama Ruangan:</label>
            <input type="text" id="nama_ruangan" name="nama_ruangan"
                class="text-black w-full rounded-lg p-2 border border-white mb-3"
                placeholder="Masukkan nama ruangan" required>

            <label class="block mt-2 text-white">Status Ruangan</label>
            <select name="status_ruangan" class="border p-2 w-full rounded">
                <option value="" disabled selected>Pilih Status Ruangan</option>
                <option value="available">Available</option>
                <option value="used">Used</option>
                <option value="maintenance">Maintenance</option>
            </select>
            
            <label class="block mt-2 text-white">Foto Ruangan</label>
            <input type="file" name="foto_ruangan" class="border p-2 w-full bg-white rounded">
            <div class="flex justify-end gap-4">
                <a href="{{ route('admin.ruangan.index') }}" class="bg-blue-500 mt-6 px-4 py-2 rounded text-center text-white font-bold">KEMBALI</a>
            <button type="submit" class="item-center mt-6 text-white block !bg-green-600 hover:!bg-green-800 rounded px-4 py-2">SIMPAN</button>
            </div>
        </form>
    </div>
@endsection