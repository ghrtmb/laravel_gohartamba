@extends('layout.main')
@section('content')
    <div class="card">
        <form action="{{ route('hari.update', $hari->hari_id) }}" method="post">
            @csrf
            @method('put')
            <div class="card-header">
                <h3 class="card-title">{{ $page_title }}</h3>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-12">
                        <div class="form-group row">
                            <div class="col-3 float-right">
                                <label for="nama_hari" class="form-label">Nama Hari</label>
                            </div>
                            <div class="col-6">
                                <input type="text" class="form-control" name="nama_hari" value="{{ $hari->nama_hari }}">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-footer mt-3 text-center">
                <button type="submit" class="btn btn-sm px-5 btn-success"><i class="fas fa-check"></i> Simpan</button>
                <a class="btn btn-sm px-5 btn-secondary" href="{{ url()->previous() }}"><i class="fas fa-times"></i>
                    Kembali</a>
            </div>
        </form>
    </div>
@endsection
