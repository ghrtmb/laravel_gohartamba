@extends('layout.main')
@section('content')
<h3>Tambah Data</h3>
<form action="{{ route('pengumuman.store') }}" method="post" enctype="multipart/form-data">
    @csrf
    <table class="table table-borderless">
        <tr>
            <td width="20%">Judul Pengumuman</td>
            <td><input type="text" name="judul" class="form-control"></td>
        </tr>

        <tr>
            <td>Isi Pengumuman</td>
            <td><textarea rows="4" name="isi_pengumuman" class="form-control"></textarea></td>
        </tr>
        <tr>
            <td>Tgl Posting</td>
            <td><input type="date" name="tgl_posting" class="form-control"></td>
        </tr>
        
        {{-- <tr>
            <td>Icon</td>
            <td><input type="file" name="img"></td>
        </tr>--}}
        <tr>
            <td>
                <input class="btn btn-sm btn-success" type="submit" value="Simpan">
                <a class="btn btn-sm btn-danger" href="{{ url()->previous() }}" >Kembali</a>
            </td>
        </tr>
    </table>
</form>
@endsection