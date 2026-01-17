<?php

namespace App\Http\Controllers\peminjam;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Ruangan;
use App\Models\BorrowRoom;
use Illuminate\Support\Facades\Auth;

class BorrowRoomControllers extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $borrowRoom = BorrowRoom::with(['user', 'room'])->where('user_id', Auth::id())->orderBy('created_at', 'desc')->get();

        return view('peminjam.peminjaman.index', compact('borrowRoom'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($ruangan)
    {
        $ruangan = Ruangan::findOrFail($ruangan);

        return view('peminjam.ruangan.pinjamruangan', compact('ruangan'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'room_id' => 'required|exists:rooms,id',
            'tgl_pinjam' => 'required|date',
            'waktu_mulai' => 'required',
            'waktu_selesai' => 'required|after:waktu_mulai',
            'no_hp' => 'required',
        ]);

        BorrowRoom::create([
            'user_id' => auth()->id(),
            'room_id' => $request->room_id,
            'no_hp' => $request->no_hp,
            'tgl_pinjam' => $request->tgl_pinjam,
            'waktu_mulai' => $request->waktu_mulai,
            'waktu_selesai' => $request->waktu_selesai,
            'status' => 'diajukan',
        ]);

        return redirect()->route('peminjam.peminjaman.index')->with('tambah', 'Peminjaman ruangan berhasil diajukan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
