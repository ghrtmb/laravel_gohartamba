@extends('layout.main')
@section('content')
    <h3>{{ $page_title }}</h3>

    <div class="card">
        <div class="card-header bg-success">
            <a href="{{ route('hari.create') }}" class="btn btn-outline-dark btn-sm shadow-lg"><i class="fas fa-plus"></i>
                Tambah
                Data</a>

        </div>

        <div class="card-body">
            <table class="table table-sm table-stripped table-bordered table-hover table-condensed">
                <thead>
                    <tr>
                        <th class="text-center">No</th>
                        <th>Nama Hari</th>
                        <th class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($hari as $item)
                        <tr>
                            <td align="center" width=5%>{{ $loop->iteration }}</td>
                            <td>{{ $item->nama_hari }}</td>
                            <td align="center" width=15%>
                                <form onsubmit="return confirm('Apakah Anda Yakin ?');"
                                    action="{{ route('hari.destroy', $item->hari_id) }}" method="POST">
                                    <a href="{{ route('hari.edit', $item->hari_id) }}" class="btn btn-sm btn-outline-dark"
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
        </div>
    </div>
@endsection
