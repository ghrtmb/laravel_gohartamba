@extends('layout.main')
@section('content')
    <div class="card">
        <div class="card-header">
            <h4>{{ $page_title }}</h4>
        </div>
        <form action="{{ route('pengumuman.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="card-body">
                <div class="form-group row mb-3">
                    <label class="form-label col-2">Judul Pengumuman</label>
                    <div class="col-10">
                        <input type="text" name="judul" class="form-control">
                    </div>
                </div>

                <div class="form-group row mb-3">
                    <label class="form-label col-2">Isi Pengumuman</label>
                    <div class="col-10">
                        <textarea rows="4" name="isi_pengumuman" class="form-control"></textarea>
                    </div>
                </div>
                <div class="form-group row mb-3">
                    <label class="form-label col-2">Tgl Posting</label>
                    <div class="col-3">
                        <input type="date" name="tgl_posting" class="form-control">
                    </div>
                </div>
            </div>

            <div class="card-footer text-center">
                <button type="submit" class="btn btn-sm px-5 btn-success"><i class="fas fa-check"></i> Simpan</button>
                <a class="btn btn-secondary btn-sm px-5" href="{{ url()->previous() }}"><i class="fas fa-times"></i>
                    Kembali</a>
            </div>
        </form>
    </div>
@endsection
