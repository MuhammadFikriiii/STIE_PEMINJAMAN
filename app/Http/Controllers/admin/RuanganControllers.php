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
        return view('admin.ruangan.index');
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

        dd($data);

        return redirect()->route('admin.ruangan.index')->with('success', 'Ruangan Berhasil Dibuat');
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
