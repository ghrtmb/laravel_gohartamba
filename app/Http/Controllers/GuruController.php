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
        // echo 'dd'. $search;
        if (!empty($search)) {
            $data = Guru::where('guru.id_guru', 'like', '%' . $search . '%')
                ->orWhere('siswa.nama_guru', 'like', '%' . $search . '%')
                ->paginate(10)->onEachSide(2)->fragment('std');
        } else {
            $data = Guru::paginate(10)->onEachSide(2)->fragment('std');
        }
        return view('guru.index')->with([
            'guru' => $data,
            'search' => $search
        ]);
    }

    public function create()
    {
        return view('guru.add');
    }

    public function store(Request $request)
    {
        $guru = new Guru();
        $guru->id_guru = $request->id_guru;
        $guru->nama_guru = $request->nama_guru;
        $guru->alamat = $request->alamat;
        $guru->gender = $request->gender;
        $guru->phone = $request->phone;
        $guru->save();
        return redirect('guru')->with(['success' => 'Data Berhasil Ditambahkan!']);
    }

    public function show(Guru $guru, $id_guru)
    {
        // echo $id_guru;
        $data = Guru::find($id_guru);
        // dd($data);
        return view('guru.edit')->with([
            'id_guru'      => $id_guru,
            'nama_guru'    => $data->nama_guru,
            'alamat'        => $data->alamat,
            'gender'        => $data->gender,
            'phone'         => $data->phone,
        ]);
    }

    public function edit(string $id)
    {
        $guru = Guru::find($id);
        return view('guru/edit', compact('guru'));
    }

    public function update(Request $request, string $id_guru)
    {
        $data = Guru::find($id_guru);
        $data->nama_guru   = $request->nama_guru;
        $data->alamat       = $request->alamat;
        $data->phone        = $request->phone;
        $data->gender       = $request->gender;
        $data->save();
        return redirect('guru')->with(['success' => 'Data Berhasil Diubah!']);
    }

    public function destroy($id_guru)
    {
        $data = Guru::find($id_guru);
        $data->delete();
        return redirect('guru')->with(['success' => 'Data Berhasil Dihapus!']);
    }
}
