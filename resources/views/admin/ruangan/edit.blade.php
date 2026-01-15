@extends('layouts.app')

@section('tittle', 'edit ruangan')

@section('content')

    <div class="bg-gray-200 min-h-screen p-6">
        <div class="text-center text-3xl text-black mb-3">EDIT RUANGAN</div>
        <hr class="border-2 mb-4">

        @if ($errors->any())
            <div class="bg-red-500 text-black p-3 rounded mb-4">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li> {{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('admin.ruangan.update', $ruangan->id) }}" 
            method="POST" 
            enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <label class="text-black">Kode Ruangan</label>
            <input type="number" name="kode_ruangan"
                value="{{ old('kode_ruangan', $ruangan->kode_ruangan) }}"
                class="w-full p-2 rounded border border-black" required>

            <label class="text-black block mt-2">Nama Ruangan</label>
            <input type="text" name="nama_ruangan"
                value="{{ old('nama_ruangan', $ruangan->nama_ruangan) }}"
                class="w-full p-2 rounded border border-black" required>

            <label class="text-black mt-2 block">Status Ruangan</label>
            <select name="status_ruangan" class="w-full p-2 rounded border border-black" required>
                <option value="available" {{ $ruangan->status_ruangan=='available'?'selected':'' }}>Available</option>
                <option value="used" {{ $ruangan->status_ruangan=='used'?'selected':'' }}>Used</option>
                <option value="maintenance" {{ $ruangan->status_ruangan=='maintenance'?'selected':'' }}>Maintenance</option>
            </select>

            <label class="text-black mt-2 block">Foto Ruangan</label>
            <input type="file" name="foto_ruangan" class="w-full p-2 bg-white rounded border border-black">
            <p class="text-red-900 italic">*kosongkan jika tidak ingin mengubah gambar*</p>

            <div class="flex justify-end gap-4">
                <a href="{{ route('admin.ruangan.index') }}" class="bg-blue-600 hover:bg-blue-800 mt-6 px-4 py-2 rounded text-center text-white font-bold">KEMBALI</a>
                <button type="submit"
                    class="mt-6 !bg-green-600 hover:!bg-green-800 text-white px-4 py-2 rounded !font-bold">
                    UPDATE
                </button>
            </div>
        </form>
    </div>
@endsection