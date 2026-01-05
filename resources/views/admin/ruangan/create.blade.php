@extends('layouts.app')
@section('content')

    <div class="bg-gray-900 w-full">
        <form action="{{ route('admin.ruangan.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <label for="kode_ruangan" class="text-white">Kode Ruangan:</label>
            <input type="number" id="kode_ruangan" name="kode_ruangan"
                class="text-black w-full rounded-lg p-2 mt-2 border border-white mr-10 mb-3 bg-black"
                placeholder="Masukkan kode ruangan" required>

            <label for="nama_ruangan" class="text-white">Nama Ruangan:</label>
            <input type="text" id="nama_ruangan" name="nama_ruangan"
                class="text-black w-full rounded-lg p-2 mt-2 border border-white mr-10 mb-3"
                placeholder="Masukkan nama ruangan" required>

            <label class="block mb-1 text-white">Status Ruangan</label>
            <select name="status_ruangan" class="border p-2 w-full bg-red-600">
                <option value="available">Available</option>
                <option value="used">Used</option>
                <option value="maintenance">Maintenance</option>
            </select>
            
            <label class="block mb-1 text-white">Foto Ruangan</label>
            <input type="file" name="foto_ruangan" class="border p-2 w-full">
            <button type="submit">Simpan</button>
        </form>
    </div>
@endsection