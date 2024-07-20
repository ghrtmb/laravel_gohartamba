@extends('layout.main')
@section('content')
    <h3>{{ $page_title }}</h3>
    <div class="card">
        <div class="card-header bg-success">
            <a href="{{ route('pelajaran.create') }}" class="btn btn-outline-dark btn-sm"><i class="fas fa-plus"></i> Tambah
                Data</a>
        </div>
        <div class="card-body">
            <table class="table table-sm table-stripped table-bordered">
                <thead>
                    <tr>
                        <th class="text-center">No</th>
                        <th>Nama Pelajaran</th>
                        <th class="text-center">Aksi</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($pelajaran as $item)
                        <tr>
                            <td align="center" width="5%">{{ $loop->iteration }}.</td>

                            <td>{{ $item->nama_pelajaran }}</td>
                            <td align="center" width="15%">
                                <form onsubmit="return confirm('Apakah Anda Yakin ?');"
                                    action="{{ route('pelajaran.destroy', $item->pelajaran_id) }}" method="POST">
                                    <a href="{{ route('pelajaran.edit', $item->pelajaran_id) }}"
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
            pesan = confirm('Yakin data dengan nama ${name} ini dihapus?');
            if (pesan) return true;
            else return false;
        }
    </script>
@endsection
