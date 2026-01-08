@extends('layouts.app')

@section('tittle', 'edit user')

@section('content')

    <div class="bg-gray-900 min-h-screen p-6">
        <div class="text-center text-3xl text-white mt-5 mb-5">EDIT USER</div>
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

        <form action="{{ route('admin.user.update', $user->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <label class="text-white">Nama:</label>
            <input type="text" name="name" value="{{ old('name', $user->name) }}"
                class="w-full p-2 rounded" required>

            <label class="text-white mt-2 block">Email:</label>
            <input type="text" name="email" value="{{ old('email', $user->email) }}"
                class="w-full p-2 rounded" required>

            <label class="text-white mt-2 block">Pilih Role:</label>
            <select name="role" class="w-full p-2 rounded" required>
                <option value="admin" {{ $user->role == 'admin' ? 'selected' : '' }}>Admin</option>
                <option value="peminjam" {{ $user->role == 'peminjam' ? 'selected' : '' }}>Peminjam</option>
            </select>

            <label class="text-white mt-2 block">Pilih Role:</label>
            <select name="status" class="w-full p-2 rounded" required>
                <option value="approve" {{ $user->status == 'approve' ? 'selected' : '' }}>Approve</option>
                <option value="pending" {{ $user->status == 'pending' ? 'selected' : '' }}>Pending</option>
            </select>

            <label class="text-white mt-2 block">Password:</label>
            <input type="password" id="password" name="password" class="w-full p-2 rounded">
                <p class="mt-2 text-sm text-gray-500 italic">*Kosongkan jika tidak ingin mengubah password*</p>

            <div class="flex justify-end
             gap-4">
                <a href="{{ route('admin.user.index') }}"
                    class="bg-blue-600 hover:bg-blue-800 mt-6 px-4 py-2 rounded text-center text-white font-bold">KEMBALI</a>
                <button type="submit" class="mt-6 !bg-green-600 hover:!bg-green-800 text-white px-4 py-2 rounded !font-bold">
                    UPDATE
                </button>
            </div>
        </form>
    </div>
@endsection