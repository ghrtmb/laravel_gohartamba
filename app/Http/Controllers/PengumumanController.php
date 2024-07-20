<?php

namespace App\Http\Controllers;

use App\Models\Pengumuman_model;
use Illuminate\Http\Request;

class PengumumanController extends Controller
{
    public function index()
    {
        $pengumuman = Pengumuman_model::get();
        $page_title = 'Daftar Pengumuman';
        return view('admin/pengumuman/index', compact('pengumuman', 'page_title'));
    }

    public function create()
    {
        $page_title = 'Tambah Data Pengumuman';
        return view('admin/pengumuman/add', compact('page_title'));
    }

    public function store(Request $request)
    {
        $pengumuman = new Pengumuman_model();
        $pengumuman->judul = $request->judul;
        $pengumuman->isi_pengumuman = $request->isi_pengumuman;
        $pengumuman->tgl_posting = $request->tgl_posting;
        $pengumuman->save();
        return redirect('pengumuman');
    }

    public function show(string $id)
    {
        //
    }

    public function edit(string $id)
    {
        $pengumuman = Pengumuman_model::find($id);
        $page_title = 'Ubah Data Pengumuman';
        return view('admin/pengumuman/edit', compact('pengumuman', 'page_title'));
    }

    public function update(Request $request, string $id)
    {
        $pengumuman = Pengumuman_model::find($id);
        $pengumuman->judul = $request->judul;
        $pengumuman->isi_pengumuman = $request->isi_pengumuman;
        $pengumuman->tgl_posting = $request->tgl_posting;
        $pengumuman->save();
        return redirect('pengumuman');
    }

    public function destroy(string $id)
    {
        $product = Pengumuman_model::findOrFail($id);
        $product->delete();
        return redirect()->route('pengumuman.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }

    public function cetak_pengumuman()
    {
        $pengumuman = Pengumuman_model::get();
        $page_title = 'Cetak Data Pengumuman';
        return view('admin/pengumuman/cetak', compact('pengumuman', 'page_title'));
    }
}
