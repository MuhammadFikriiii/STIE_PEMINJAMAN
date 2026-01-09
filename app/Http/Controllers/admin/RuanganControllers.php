<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Ruangan;

class RuanganControllers extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $ruangan = Ruangan::latest()->paginate(10);

        return view('admin.ruangan.index', compact('ruangan'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.ruangan.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'kode_ruangan' => 'required|unique:rooms|integer',
            'nama_ruangan' => 'required|string',
            'status_ruangan' => 'required|in:available,used,maintenance',
            'foto_ruangan' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $path = $request->file('foto_ruangan')->store('ruangan', 'public');

        $data = [
            'kode_ruangan' => $request->kode_ruangan,
            'nama_ruangan' => $request->nama_ruangan,
            'status_ruangan' => $request->status_ruangan,
            'foto_ruangan' => $path,
        ];

        Ruangan::create($data);

        // dd($data);

        return redirect()->route('admin.ruangan.index')->with('tambah', 'Ruangan Berhasil Dibuat');
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
    public function edit($id)
    {
        $ruangan = Ruangan::findOrFail($id);

        return view('admin.ruangan.edit', compact('ruangan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $ruangan = Ruangan::findOrFail($id);

        $request->validate([
            'kode_ruangan' => 'required|integer|unique:rooms,kode_ruangan,' . $id,
            'nama_ruangan' => 'required|string',
            'status_ruangan' => 'required|in:available,used,maintenance',
            'foto_ruangan' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        if ($request->hasFile('foto_ruangan')) {
            if ($ruangan->foto_ruangan && file_exists(public_path('storage/' . $ruangan->foto_ruangan))) {
                unlink(public_path('storage/' . $ruangan->foto_ruangan));
            }

            $foto = $request->file('foto_ruangan')->store('ruangan', 'public');
            $ruangan->foto_ruangan = $foto;
        }

        $ruangan->kode_ruangan = $request->kode_ruangan;
        $ruangan->nama_ruangan = $request->nama_ruangan;
        $ruangan->status_ruangan = $request->status_ruangan;
        $ruangan->save();

        return redirect()->route('admin.ruangan.index')->with('update', 'Data ruangan berhasil diperbarui');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $ruangan = Ruangan::findOrFail($id);

        if ($ruangan->foto_ruangan && file_exists(public_path('storage/' . $ruangan->foto_ruangan))) {
            unlink(public_path('storage/' . $ruangan->foto_ruangan));
        }

        $ruangan->delete();

        return redirect()->route('admin.ruangan.index')->with('delete', 'Data ruangan berhasil dihapus');
    }

}
