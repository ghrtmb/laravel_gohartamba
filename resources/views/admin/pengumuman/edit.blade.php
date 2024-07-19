@extends('layout.main')
@section('content')
<h3>Edit Data</h3>
<form action="{{ route('pengumuman.update', $pengumuman->id_pengumuman) }}" method="post">
    @csrf
    @method('put')
    <table class="table table-borderless">
        <tr>
            <td width="20%">Judul pengumuman</td>
            <td><input type="text" class="form-control" name="judul" value="{{ $pengumuman->judul }}"></td>
        </tr>
        <tr>
            <td>Isi pengumuman</td>
            <td><textarea rows="4" class="form-control" name="isi_pengumuman">{{ $pengumuman->isi_pengumuman }}</textarea></td>
        </tr>
        <tr>
            <td>Tgl posting</td>
            <td><input type="date" class="form-control" name="tgl_posting" value="{{ $pengumuman->tgl_posting }}"></td>
        </tr>
        <tr>
            <td>
                <input class="btn btn-sm btn-success" type="submit" value="Simpan">
                <a class="btn btn-sm btn-danger" href="{{ url()->previous() }}" >Kembali</a>
            </td>
        </tr>
    </table>
</form>
@endsection