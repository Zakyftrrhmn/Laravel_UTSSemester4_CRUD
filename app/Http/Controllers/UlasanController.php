<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use App\Models\Ulasan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class UlasanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $buku = Buku::all();
        $ulasan = Ulasan::all();
        return view('ulasan.index', compact('ulasan', 'buku'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        $buku = Buku::all();
        return view('ulasan.create', compact('buku'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate(
            [
                'isi_ulasan'   => 'required|max:60',
                'rating'     => 'required|integer',
                'tanggal' => 'required|date',

            ],
        );

        $data = $request->all();
        $data['user_id'] = Auth::user()->id;
        Ulasan::create($data);

        return redirect()->route('ulasan.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Ulasan $ulasan)
    {

        $buku = Buku::all();
        return view('ulasan.show', compact('ulasan', 'buku'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Ulasan $ulasan)
    {

        $buku = Buku::all();
        return view('ulasan.edit', compact('ulasan', 'buku'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Ulasan $ulasan)
    {
        $request->validate(
            [
                'isi_ulasan'   => 'required|max:60',
                'rating'     => 'required|integer',
                'tanggal' => 'required|date',
            ],
        );

        DB::table('ulasans')->where('id', $ulasan->id)->update([
            'isi_ulasan' => $request->isi_ulasan,
            'rating' => $request->rating,
            'tanggal' => $request->tanggal,
        ]);

        return redirect()->route('ulasan.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Ulasan $ulasan)
    {
        $ulasan->delete();
        return redirect()->route('ulasan.index')->with('success', 'Data berhasil di hapus');
    }
}
