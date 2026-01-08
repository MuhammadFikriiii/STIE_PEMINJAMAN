@extends('layouts.app')

@section('tittle', 'tambah')

@section('content')

    <div class="bg-gray-900 min-h-screen p-6">
        <div class="text-center text-3xl text-white mt-5 mb-5">TAMBAH USER</div>
        <hr class="border-2 mb-4">

        @if ($errors->any())
            <div class="bg-red-500 text-white p-3 rounded mb-4">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>- {{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        
        <form action="{{ route('admin.user.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <label for="name" class="text-white">Nama:</label>
            <input type="text" id="name" name="name"
                class="text-black w-full rounded-lg p-2 border border-white bg-white"
                placeholder="Masukkan username" required>

            <label for="email" class="text-white block mt-2">Email:</label>
            <input type="email" id="email" name="email"
                class="text-black w-full rounded-lg p-2 border border-white mb-3"
                placeholder="Masukkan email" required>

            <label class="block mt-2 text-white">Role:</label>
            <select name="role" class="border p-2 w-full rounded">
                <option value="" disabled selected>Pilih Role</option>
                <option value="admin">Admin</option>
                <option value="peminjam">Peminjam</option>
            </select>
            
            <label class="block mt-2 text-white">Status:</label>
            <select name="status" class="border p-2 w-full rounded">
                <option value="" disabled selected>Pilih Status</option>
                <option value="approve">Approve</option>
                <option value="pending">Pending</option>
            </select>

            <label for="password" class="text-white">Password:</label>
            <input type="password" id="password" name="password"
                class="text-black w-full rounded-lg p-2 border border-white bg-white"
                placeholder="Masukkan password" required>

            <div class="flex justify-end gap-4">
            <button type="submit" class="item-center mt-6 text-white block !bg-green-600 hover:!bg-green-800 rounded px-4 py-2">SIMPAN</button>
            </div>
        </form>
    </div>
@endsection