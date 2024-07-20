@extends('layout.main')
@section('content')
<div class="card">
    <form action="{{ route('hari.store') }}" method="post" enctype="multipart/form-data">
        @csrf
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
                            <input type="text" class="form-control" name="nama_hari">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-footer mt-3 text-center">
            <button type="submit" class="btn btn-sm px-5 btn-success">Simpan</button>
            <a class="btn btn-sm px-5 btn-secondary" href="{{ url()->previous() }}" >Kembali</a>
        </div>
    </form>
</div>
@endsection