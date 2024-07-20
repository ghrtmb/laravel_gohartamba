<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use App\Models\Hari_model;
use App\Models\Pelajaran_model;
use App\Models\Jadwal;
use Illuminate\Http\Request;

class JadwalController extends Controller
{
    public function index()
    {
        //Query builder biaya
        $myjadwal   = new Jadwal();
        $jadwal     = $myjadwal->list_jadwal();
        $page_title = 'Daftar Jadwal';
        return view('jadwal.index', compact('jadwal', 'page_title'));
    }

    public function create()
    {
        $guru = Guru::get();
        $pelajaran = Pelajaran_model::get();
        $hari = Hari_model::get();
        $page_title = 'Tambah Data Jadwal';
        return view('Jadwal.add', compact('guru', 'pelajaran', 'hari', 'page_title'));
    }

    public function store(Request $request)
    {
        $jadwal = new Jadwal();
        $jadwal->nama_jadwal = $request->nama_jadwal;
        $jadwal->hari_id = $request->hari_id;
        $jadwal->jam_mulai = $request->jam_mulai;
        $jadwal->guru_id = $request->guru_id;
        $jadwal->pelajaran_id = $request->pelajaran_id;
        $jadwal->save();
        return redirect()->route('jadwal.index')->with(['success' => 'Data Berhasil Ditambahkan!']);
    }


    public function show(string $jadwal_id)
    {
        //
    }


    public function edit(string $jadwal_id)
    {
        $jadwal = Jadwal::find($jadwal_id);
        $guru = Guru::get();
        $pelajaran = Pelajaran_model::get();
        $hari = Hari_model::get();
        $page_title = 'Ubah Data Jadwal';
        return view('Jadwal.edit', compact('jadwal', 'guru', 'hari', 'pelajaran', 'page_title'));
    }

    public function update(Request $request, string $jadwal_id)
    {
        $jadwal = Jadwal::find($jadwal_id);
        $jadwal->nama_jadwal = $request->nama_jadwal;
        $jadwal->hari_id = $request->hari_id;
        $jadwal->jam_mulai = $request->jam_mulai;
        $jadwal->guru_id = $request->guru_id;
        $jadwal->pelajaran_id = $request->pelajaran_id;
        $jadwal->update();
        return redirect()->route('jadwal.index')->with(['success' => 'Data Berhasil Diubah!']);
    }


    public function destroy(string $jadwal_id)
    {
        Jadwal::destroy($jadwal_id);
        return redirect()->route('jadwal.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }
}
