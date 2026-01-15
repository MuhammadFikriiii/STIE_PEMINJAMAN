@extends('layouts.peminjam.app')

@section('title', 'Pinjam Ruangan')

@section('content')
<div class="bg-gray-200 min-h-screen p-6">
    <div class="text-center text-3xl text-black mb-3">
        PINJAM RUANGAN
    </div>
    <hr class="border-2 mb-6">

    @if ($errors->any())
        <div class="bg-red-600 text-black p-4 rounded mb-4">
            <ul class="list-disc list-inside">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('borrowRooms') }}" method="POST">
        @csrf

        <div class="mb-4">
        <label class="text-black">Nama Peminjam</label>
        <input type="text" class="w-full rounded p-2 bg-white text-black border border-black" value="{{ auth()->user()->name }}" readonly>
        </div>

        <input type="hidden" name="room_id" value="{{ $ruangan->id }}">

        <div class="mb-4">
        <label class="text-black">Ruangan</label>
            <input type="text" class="w-full rounded p-2 bg-white text-black border border-black" value="{{ $ruangan->nama_ruangan }}" readonly>
        </div>

        <div class="mb-4">
        <label class="text-black">Tanggal Pinjam</label>
        <input type="date" name="tgl_pinjam" class="w-full rounded p-2 border border-black" required>
        </div>

        <div class="mb-4">
        <label class="text-black">Waktu Mulai</label>
        <input type="time" name="waktu_mulai" class="w-full rounded p-2 border border-black" required>
        </div>

        <div class="mb-4">
        <label class="text-black">Waktu Selesai</label>
        <input type="time" name="waktu_selesai" class="w-full rounded p-2 border border-black" required>
        </div>

        <div class="mb-6">
        <label class="text-black">No HP / WhatsApp</label>
        <input type="text" name="no_hp" class="w-full rounded p-2 border border-black" placeholder="08xxxxxxxxxx" required>
        </div>

        <div class="flex justify-end gap-4">
            <a href="{{ route('peminjam.ruangan.index') }}"
               class="bg-blue-600 hover:bg-blue-700 px-4 py-2 rounded text-white font-semibold">
                KEMBALI
            </a>

            <button type="submit"
                    class="bg-green-600 hover:bg-green-700 px-4 py-2 rounded text-white font-semibold">
                SIMPAN
            </button>
        </div>
    </form>
</div>
@endsection
