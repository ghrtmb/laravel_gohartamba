@extends('layout.main')
@section('content')
    <div class="card">
        <div class="card-header">
            <h4>{{ $page_title }}</h4>
        </div>
        <form method="POST" action="{{ url('guru/' . $guru->guru_id) }}">
            @csrf
            @method('PUT')
            <div class="card-body">
                <div class="row mb-3">
                    <label for="guru_id" class="col-2 col-form-label">ID Guru</label>
                    <div class="col-6">
                        <input type="text" class="form-control-plaintext" id="guru_id" name="guru_id"
                            value="{{ $guru->guru_id }}">
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="nama_guru" class="col-2 col-form-label">Nama Guru</label>
                    <div class="col-6">
                        <input type="text" class="form-control form-control-sm @error('nama_guru') is-invalid @enderror"
                            id="nama_guru" name="nama_guru" value="{{ $guru->nama_guru }}">
                        @error('nama_guru')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="alamat" class="col-2 col-form-label">Alamat</label>
                    <div class="col-10">
                        <textarea class="form-control form-control-sm @error('alamat') is-invalid @enderror" id="alamat" name="alamat"
                            rows="3">{{ $guru->alamat }}</textarea>
                        @error('alamat')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="phone" class="col-2 col-form-label">Handphone</label>
                    <div class="col-4">
                        <input type="text" class="form-control form-control-sm @error('phone') is-invalid @enderror"
                            id="phone" name="phone" value="{{ $guru->phone }}">
                        @error('phone')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="alamat" class="col-2 col-form-label">Gender</label>
                    <div class="col-3">
                        <select class="form-select form-select-sm @error('gender') is-invalid @enderror" name="gender"
                            id="gender">
                            <option value="" selected>-Pilih-</option>
                            <option value="Laki-laki" {{ $guru->gender == 'Laki-laki' ? 'selected' : '' }}>Laki-laki
                            </option>
                            <option value="Perempuan" {{ $guru->gender == 'Perempuan' ? 'selected' : '' }}>Perempuan
                            </option>
                        </select>
                        @error('gender')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
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
