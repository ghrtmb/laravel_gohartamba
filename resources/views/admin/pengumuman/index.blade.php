@extends('layout.main')
@section('content')
    <h3>{{ $page_title }}</h3>
    <div class="card">
        <div class="card-header bg-success-subtle">
            <a href="{{ route('pengumuman.create') }}" class="btn btn-outline-dark shadow-lg btn-sm"><i
                    class="fas fa-plus"></i> Tambah
                Data</a>
            <a href="{{ route('cetak_pengumuman') }}" target="_BLANK" class="btn btn-outline-dark shadow-lg btn-sm"><i
                    class="fas fa-print"></i> Cetak Data</a>

        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-12">
                    <table class="table table-bordered table-condensed table-hover">
                        <tr>
                            <th scope="col" class="text-center">No</th>
                            <th scope="col">Judul</th>
                            <th scope="col">Isi Pengumuman</th>
                            <th scope="col">Tgl Posting</th>
                            <th scope="col" class="text-center">Aksi</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach ($pengumuman as $item)
                                <tr>
                                    <td align="center">{{ $loop->iteration }}</td>
                                    <td>{{ $item->judul }}</td>
                                    <td>{{ $item->isi_pengumuman }}</td>
                                    <td>{{ $item->tgl_posting ? date('d M Y', strtotime($item->tgl_posting)) : '-' }}</td>
                                    <td align="center" width="15%">
                                        <form onsubmit="return confirm('Apakah Anda Yakin ?');"
                                            action="{{ route('pengumuman.destroy', $item->id_pengumuman) }}" method="POST">
                                            <a href="{{ route('pengumuman.edit', $item->id_pengumuman) }}"
                                                class="btn btn-sm btn-outline-dark"><i class="fas fa-edit"></i></a>
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-outline-dark"><i
                                                    class="fas fa-trash-alt"></i></button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
