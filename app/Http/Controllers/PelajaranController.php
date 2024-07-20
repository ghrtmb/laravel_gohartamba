<?php

namespace App\Http\Controllers;

use App\Models\Pelajaran_model;
use Illuminate\Http\Request;

class PelajaranController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pelajaran = Pelajaran_model::get();
        $page_title = 'Daftar Pelajaran';
        return view('pelajaran.index', compact('pelajaran', 'page_title'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $page_title = 'Tambah Data Pelajaran';
        return view('pelajaran.add', compact('page_title'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_pelajaran' => 'required'
        ]);
        $pelajaran = new Pelajaran_model();
        $pelajaran->nama_pelajaran = $request->nama_pelajaran;
        $pelajaran->save();
        return redirect()->route('pelajaran.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Pelajaran_model $pelajaran_model)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $pelajaran_id)
    {

        $pelajaran = Pelajaran_model::find($pelajaran_id);
        $page_title = 'Ubah Data Pelajaran';
        return view('pelajaran.edit', compact('pelajaran', 'page_title'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $pelajaran_id)
    {
        $request->validate([
            'nama_pelajaran' => 'required'
        ]);

        $pelajaran = Pelajaran_model::find($pelajaran_id);
        $pelajaran->nama_pelajaran = $request->nama_pelajaran;
        $pelajaran->update();
        return redirect()->route('pelajaran.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pelajaran_model $pelajaran_model, $pelajaran_id)
    {
        Pelajaran_model::find($pelajaran_id)->delete();
        return redirect()->route('pelajaran.index');
    }
}
