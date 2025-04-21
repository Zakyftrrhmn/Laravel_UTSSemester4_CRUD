<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use App\Models\Peminjaman;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PeminjamanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $buku = Buku::all();
        $peminjaman = Peminjaman::all();
        return view('peminjaman.index', compact('peminjaman', 'buku'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $buku = Buku::all();
        return view('peminjaman.create', compact('buku'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'tanggal_pinjam'   => 'required|date',
            'tanggal_kembali' => 'required|date',
            'status' => 'required|in:Dipinjam,Dikembalikan',
            'buku_id' => 'required',
        ]);

        $buku = Buku::find($request->buku_id);

        // Cek apakah stok mencukupi
        if ($buku->stok < 1) {
            return redirect()->back()->with('error', 'Stok buku tidak mencukupi.');
        }

        // Kurangi stok buku
        $buku->stok -= 1;
        $buku->save();

        // Simpan data peminjaman
        $data = $request->all();
        $data['user_id'] = Auth::user()->id;
        Peminjaman::create($data);

        return redirect()->route('peminjaman.index')->with('success', 'Peminjaman berhasil.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Peminjaman $peminjaman)
    {

        $buku = Buku::all();
        return view('peminjaman.show', compact('peminjaman', 'buku'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Peminjaman $peminjaman)
    {

        $buku = Buku::all();
        return view('peminjaman.edit', compact('peminjaman', 'buku'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Peminjaman $peminjaman)
    {
        $request->validate([
            'tanggal_pinjam'   => 'required|date',
            'tanggal_kembali' => 'required|date',
            'status' => 'required|in:Dipinjam,Dikembalikan',
            'buku_id' => 'required',
        ]);

        $peminjaman->update([
            'tanggal_pinjam' => $request->tanggal_pinjam,
            'tanggal_kembali' => $request->tanggal_kembali,
            'status' => $request->status,
            'buku_id' => $request->buku_id,
        ]);

        if ($peminjaman->status !== 'Dikembalikan' && $request->status === 'Dikembalikan') {
            $buku = Buku::find($request->buku_id);
            $buku->stok += 1;
            $buku->save();
        }


        return redirect()->route('peminjaman.index')->with('success', 'Data berhasil diperbarui.');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Peminjaman $peminjaman)
    {
        $peminjaman->delete();
        return redirect()->route('peminjaman.index')->with('success', 'Data berhasil di hapus');
    }
}
