@extends('layout.main')
@section('content')
    <div class="card">
        <div class="card-header">
            <h3>{{ $page_title }}</h3>

        </div>
        <form method="POST" action="{{ route('pelajaran.update', $pelajaran->pelajaran_id) }}">
            @csrf
            @method('PUT')
            <div class="card-body">

                <div class="row mb-3">
                    <label for="nama_pelajaran" class="col-sm-2 col-form-label">Nama Pelajaran</label>
                    <div class="col-sm-10">
                        <input type="text"
                            class="form-control form-control-sm @error('nama_pelajaran') is-invalid @enderror"
                            id="nama_pelajaran" name="nama_pelajaran" value="{{ $pelajaran->nama_pelajaran }}">
                        @error('nama_pelajaran')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>

            </div>

            <div class="card-footer mt-3 text-center">
                <button type="submit" class="btn btn-sm px-5 btn-success">Simpan</button>
                <a class="btn btn-sm px-5 btn-secondary" href="{{ url()->previous() }}">Kembali</a>
            </div>
        </form>
    </div>
@endsection
