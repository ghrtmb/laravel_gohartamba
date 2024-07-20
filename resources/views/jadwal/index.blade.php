@extends('layout.main')
@section('content')
    <h3>{{ $page_title }}</h3>
    <div class="card">
        <div class="card-header bg-success-subtle">
            <a href="{{ route('jadwal.create') }}" class="btn btn-outline-dark btn-sm shadow"><i class="fas fa-plus"></i>
                Tambah
                Data</a>
        </div>
        <div class="card-body">
            <table class="table table-sm table-stripped table-bordered">
                <thead>
                    <tr>
                        <th class="text-center">No</th>
                        <th>Nama Guru</th>
                        <th>Pelajaran</th>
                        <th>Hari</th>
                        <th>Jam Mulai</th>
                        <th class="text-center">Aksi</th>
                    </tr>
                </thead>
                @foreach ($jadwal as $item)
                    <tbody>
                        <tr>
                            <td align="center">{{ $loop->iteration }}.</td>
                            <td>{{ $item->nama_guru }}</td>
                            <td>{{ $item->nama_pelajaran }}</td>
                            <td>{{ $item->nama_hari }}</td>
                            <td>{{ $item->jam_mulai }} </td>
                            <td align="center" width="15%">

                                <form onsubmit="return confirm('Apakah Anda Yakin ?');"
                                    action="{{ route('jadwal.destroy', $item->jadwal_id) }}" method="POST">
                                    <a href="{{ route('jadwal.edit', $item->jadwal_id) }}"
                                        class="btn btn-sm btn-outline-dark" title="Ubah data"><i
                                            class="fas fa-edit"></i></a>
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
    <script>
        function deleteData(name) {
            pesan = confirm('Yakin data dengan nama : ' + name + ' ini dihapus?');
            if (pesan) return true;
            else return false;
        }
    </script>
@endsection
