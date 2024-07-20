@extends('layout.main')
@section('content')
    <div class="card">
        <div class="card-header">
            <h4>{{ $page_title }}</h4>

        </div>
        <form method="POST" action="{{ route('pelajaran.store') }}">
            @csrf
            <div class="card-body">

                <div class="row mb-3">
                    <label for="nama_pelajaran" class="col-2 col-form-label">Nama Pelajaran</label>
                    <div class="col-10">
                        <input type="text"
                            class="form-control form-control-sm @error('nama_pelajaran') is-invalid @enderror"
                            id="nama_pelajaran" name="nama_pelajaran">
                        @error('nama_pelajaran')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
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
