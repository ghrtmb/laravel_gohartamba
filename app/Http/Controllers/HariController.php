<?php

namespace App\Http\Controllers;

use App\Models\Hari_model;
use Illuminate\Http\Request;

class HariController extends Controller
{
    public function index()
    {
        $hari = Hari_model::get();
        $page_title = 'Daftar Hari';
        return view('hari/index', compact('hari', 'page_title'));
    }

    public function create()
    {
        $page_title = 'Tambah Data Hari';
        return view('hari.add', compact('page_title'));
    }

    public function store(Request $request)
    {
        $hari = new Hari_model();
        $hari->nama_hari = $request->nama_hari;
        $hari->created_at = now();
        $hari->save();
        return redirect()->route('hari.index')->with(['success' => 'Data Berhasil Ditambahkan!']);
    }

    public function show(string $id)
    {
        //
    }

    public function edit(string $id)
    {
        $hari = Hari_model::find($id);
        $page_title = 'Ubah Data Hari';
        return view('hari.edit', compact('hari', 'page_title'));
    }

    public function update(Request $request, string $id)
    {
        $hari = Hari_model::find($id);
        $hari->nama_hari = $request->nama_hari;
        $hari->updated_at = now();
        $hari->update();
        return redirect()->route('hari.index')->with(['success' => 'Data Berhasil Diubah!']);
    }

    public function destroy(string $id)
    {
        // $hari = Hari_model::findOrFail($id);
        // $hari->delete();
        Hari_model::destroy($id);
        return redirect()->route('hari.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }
}
