@extends('layout.main')
@section('content')
    <h3>Daftar Guru</h3>
    <div class="card">
        <div class="card-header bg-success-subtle">
            <a href="{{ route('guru.create') }}" class="btn btn-outline-dark btn-sm shadow-lg"><i class="fas fa-plus"></i>
                Tambah
                Data</a>
        </div>
        <div class="card-body">

            <form method="GET">
                <div class="row mb-3">
                    <label for="search" class="col-1 col-form-label">Cari Data</label>
                    <div class="col-6">
                        <input type="text" class="form-control form-control-sm" placeholder="Pencarian" name="search"
                            autofocus value="{{ $search }}">
                    </div>
                </div>
            </form>
            <table class="table table-sm table-stripped table-bordered">
                <thead>
                    <tr>
                        <th class="text-center">No</th>
                        <th>ID Guru</th>
                        <th>Nama</th>
                        <th>Alamat</th>
                        <th>Gender</th>
                        <th class="text-center" width="10%">Aksi</th>
                    </tr>
                </thead>

                <tbody>
                    <!-- agar nomor berjalan pada pagination -->
                    @php
                        $nomor = 1 + ($guru->currentPage() - 1) * $guru->perPage();
                    @endphp
                    @foreach ($guru as $item)
                        <tr>
                            <!-- <td>{{ $loop->iteration }}</td> -->
                            <td align="center">{{ $nomor++ }}</td>
                            <td>{{ $item->guru_id }}</td>
                            <td>{{ $item->nama_guru }}</td>
                            <td>{{ $item->alamat }}</td>
                            <td>{{ $item->gender }}</td>
                            <td align="center" width="15%">
                                <form onsubmit="return confirm('Apakah Anda Yakin ?');"
                                    action="{{ route('guru.destroy', $item->guru_id) }}" method="POST">
                                    <a href="{{ route('guru.edit', $item->guru_id) }}" class="btn btn-sm btn-outline-dark"
                                        title="Ubah data"><i class="fas fa-edit"></i></a>
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-outline-dark" title="Hapus data"><i
                                            class="fas fa-trash-alt"></i></button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $guru->links() }}
            {!! $guru->appends(Request::except('page'))->render() !!}

        </div>
    </div>
@endsection
