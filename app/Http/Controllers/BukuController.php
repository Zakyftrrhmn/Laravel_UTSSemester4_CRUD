<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class BukuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $buku = Buku::all();
        return view('buku.index', compact('buku'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('buku.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate(
            [
                'judul'   => 'required|max:45',
                'pengarang' => 'required|max:45',
                'penerbit' => 'required|max:45',
                'tahun'     => 'required|integer',
                'stok'      => 'required|integer',
            ],
        );

        $data = $request->all();
        $data['user_id'] = Auth::user()->id;
        Buku::create($data);

        return redirect()->route('buku.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Buku $buku)
    {
        return view('buku.show', compact('buku'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Buku $buku)
    {
        return view('buku.edit', compact('buku'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $buku)
    {
        $request->validate(
            [
                'judul'   => 'required|max:45',
                'pengarang' => 'required|max:45',
                'penerbit' => 'required|max:45',
                'tahun'     => 'required|integer',
                'stok'      => 'required|integer',
            ],
        );

        DB::table('bukus')->where('id', $buku)->update([
            'judul' => $request->judul,
            'pengarang' => $request->pengarang,
            'penerbit' => $request->penerbit,
            'tahun' => $request->tahun,
            'stok' => $request->stok,
        ]);

        return redirect()->route('buku.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Buku $buku)
    {
        $buku->delete();
        return redirect()->route('buku.index')->with('success', 'Data berhasil di hapus');
    }
}
