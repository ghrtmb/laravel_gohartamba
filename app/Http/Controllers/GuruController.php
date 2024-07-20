<?php

namespace App\Http\Controllers;

use App\Models\Guru;
// use App\Http\Requests\StoreGuruRequest;
// use App\Http\Requests\UpdateGuruRequest;
use Illuminate\Http\Request;

class GuruController extends Controller
{
    public function index(Request $request)
    {
        // echo"Test";
        $search = $request->query('search');

        if (!empty($search)) {
            $data = Guru::where('guru.guru_id', 'like', '%' . $search . '%')
                ->orWhere('guru.nama_guru', 'like', '%' . $search . '%')
                ->paginate(10)->onEachSide(2)->fragment('std');
        } else {
            $data = Guru::paginate(10)->onEachSide(2)->fragment('std');
        }
        return view('guru.index')->with([
            'guru' => $data,
            'search' => $search,
            'page_title' => 'Daftar Guru',
        ]);
    }

    public function create()
    {
        $page_title = 'Tambah Data Guru';
        return view('guru.add', compact('page_title'));
    }

    public function store(Request $request)
    {
        $guru = new Guru();
        $guru->guru_id = $request->guru_id;
        $guru->nama_guru = $request->nama_guru;
        $guru->alamat = $request->alamat;
        $guru->gender = $request->gender;
        $guru->phone = $request->phone;
        $guru->save();
        return redirect('guru')->with(['success' => 'Data Berhasil Ditambahkan!']);
    }

    public function show(Guru $guru, $guru_id)
    {
        // echo $guru_id;
        $data = Guru::find($guru_id);
        // dd($data);
        return view('guru.edit')->with([
            'guru_id'      => $guru_id,
            'nama_guru'    => $data->nama_guru,
            'alamat'        => $data->alamat,
            'gender'        => $data->gender,
            'phone'         => $data->phone,
        ]);
    }

    public function edit(string $id)
    {
        $guru = Guru::find($id);
        $page_title = 'Ubah Data Guru';
        return view('guru/edit', compact('guru', 'page_title'));
    }

    public function update(Request $request, string $guru_id)
    {
        $data = Guru::find($guru_id);
        $data->nama_guru   = $request->nama_guru;
        $data->alamat       = $request->alamat;
        $data->phone        = $request->phone;
        $data->gender       = $request->gender;
        $data->save();
        return redirect('guru')->with(['success' => 'Data Berhasil Diubah!']);
    }

    public function destroy($guru_id)
    {
        $data = Guru::find($guru_id);
        $data->delete();
        return redirect('guru')->with(['success' => 'Data Berhasil Dihapus!']);
    }
}
