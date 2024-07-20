@extends('layout.main')
@section('content')
    <div class="card">
        <div class="card-header">
            <h3>{{ $page_title }}</h3>
        </div>
        <form action="{{ route('jadwal.update', $jadwal->jadwal_id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group row mb-3">
                            <label class="form-label col-2">Hari</label>
                            <div class="col-3">
                                <select name="hari_id" id="hari_id" class="form-select">
                                    @foreach ($hari as $item)
                                        <option value="{{ $item->hari_id }}"
                                            {{ $item->hari_id == $jadwal->hari_id ? 'selected' : '' }}>
                                            {{ $item->nama_hari }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group row mb-3">
                            <label class="form-label col-2">Jam Mulai</label>
                            <div class="col-2">
                                <input type="time" name="jam_mulai" class="form-control"
                                    value="{{ $jadwal->jam_mulai }}">
                            </div>
                        </div>
                        <div class="form-group row mb-3">
                            <label class="form-label col-2">Guru</label>
                            <div class="col-5">
                                <select name="guru_id" id="guru_id" class="form-select">
                                    @foreach ($guru as $item)
                                        <option value="{{ $item->guru_id }}"
                                            {{ $item->guru_id == $jadwal->guru_id ? 'selected' : '' }}>
                                            {{ $item->nama_guru }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group row mb-3">
                            <label class="form-label col-2">Pelajaran</label>
                            <div class="col-5">
                                <select name="pelajaran_id" id="pelajaran_id" class="form-select">
                                    @foreach ($pelajaran as $item)
                                        <option value="{{ $item->pelajaran_id }}"
                                            {{ $item->pelajaran_id == $jadwal->pelajaran_id ? 'selected' : '' }}>
                                            {{ $item->nama_pelajaran }} </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
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
