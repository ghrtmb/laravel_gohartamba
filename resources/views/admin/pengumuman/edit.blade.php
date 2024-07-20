@extends('layout.main')
@section('content')
    <div class="card">
        <div class="card-header">
            <h4>{{ $page_title }}</h4>
        </div>
        <form action="{{ route('pengumuman.update', $pengumuman->id_pengumuman) }}" method="post">
            @csrf
            @method('put')
            <div class="card-body">
                <div class="form-group row mb-3">
                    <label class="form-label col-2">Judul Pengumuman</label>
                    <div class="col-10">
                        <input type="text" name="judul" class="form-control" value="{{ $pengumuman->judul }}">
                    </div>
                </div>

                <div class="form-group row mb-3">
                    <label class="form-label col-2">Isi Pengumuman</label>
                    <div class="col-10">
                        <textarea rows="4" name="isi_pengumuman" class="form-control">{{ $pengumuman->isi_pengumuman }}</textarea>
                    </div>
                </div>
                <div class="form-group row mb-3">
                    <label class="form-label col-2">Tgl Posting</label>
                    <div class="col-3">
                        <input type="date" name="tgl_posting" class="form-control"
                            value="{{ $pengumuman->tgl_posting }}">
                    </div>
                </div>
            </div>

            <div class="card-footer text-center">
                <button type="submit" class="btn btn-sm px-5 btn-success">Simpan</button>
                <a class="btn btn-sm btn-secondary px-5" href="{{ url()->previous() }}">Kembali</a>
            </div>
        </form>
    </div>
@endsection
