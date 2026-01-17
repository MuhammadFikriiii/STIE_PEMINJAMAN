<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\BorrowRoom;
use Barryvdh\DomPDF\Facade\Pdf;

class BorrowRoomControllers extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $borrowRoom = BorrowRoom::with(['user', 'room'])->get();

        return view('admin.pengajuan.index', compact('borrowRoom'));
    }

    public function approve($id)
    {
        $item = BorrowRoom::findOrFail($id);
        $item->status = 'diterima';
        $item->save();

        $room = $item->room;
        $room->status_ruangan = 'used';
        $room->save();

        return back()->with('disetujui', 'berhasil');
    }

    public function reject($id)
    {
        $item = BorrowRoom::findOrFail($id);
        $item->status = 'ditolak';
        $item->save();

        return back()->with('tambah', 'Peminjaman Ditolak.');
    }

    public function complete($id)
    {
        $item = BorrowRoom::findOrFail($id);
        $item->status = 'diterima';
        $item->save();

        $room = $item->room;
        $room->status_ruangan = 'available';
        $room->save();

        return back()->with('tambah', 'Peminjaman Selesai. Ruangan kembali Tersedia.');
    }

    public function surat($id)
    {
        $pengajuan = BorrowRoom::with(['user', 'room'])->findOrFail($id);

        $pdf = Pdf::loadView('surat.peminjaman-ruangan', [
            'data' => $pengajuan
        ])->setPaper('A4');

        return $pdf->stream('surat-peminjaman-ruangan.pdf');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
    public function destroy($id)
    {
        $item = BorrowRoom::findOrFail($id);
        $item->delete();

        return back()->with('tambah', 'data peminjaman berhasil dihapus.');
    }
}
