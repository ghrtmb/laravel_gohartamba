@extends('layout.main')
@section('content')
    <h3>{{ $page_title }}</h3>
    <div class="card">
        <div class="card-header bg-success-subtle">
            <a href="{{ route('kurikulum.create') }}" class="btn btn-success btn-sm"><i class="fas fa-plus"></i> Tambah
                Data</a>
        </div>
        <div class="card-body">
            <table class="table table-sm table-stripped table-bordered">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Kurikulum</th>
                        <th>Tahun</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($kurikulum as $rows)
                        <tr>
                            <td align="center">{{ $loop->iteration }}. </td>
                            <td>{{ $rows->nama_kurikulum }}</td>
                            <td>{{ $rows->tahun }} </td>
                            <td align="center">
                                <form action="{{ route('kurikulum.destroy', $rows->id) }}" method="POST">
                                    <a href="{{ route('kurikulum.edit', $rows->id) }}">Edit</a>
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger btn-sm">Del</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
