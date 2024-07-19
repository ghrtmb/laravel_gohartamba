@extends('layout.main')
@section('content')

<h3>Data Guru</h3>
<div class="card">
<div class="card-header">
  <a href="{{ route('guru.create') }}" class="btn btn-primary btn-sm"><i class="fas fa-plus"></i> Tambah Data</a>
</div>
<div class="card-body">
  {{-- @if (session('msg')) 
    <div class="alert alert-success alert-dismissible fade show" role="alert">
      <strong>Berhasil</strong> {{ session('msg') }}
      <button class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
  @endif --}}

  <form method="GET">
    <div class="row mb-3">
    <label for="search" class="col-sm-2 col-form-label">Cari Data</label>
    <div class="col-sm-10">
    <input type="text" class="form-control form-control-sm"  placeholder="Pencarian" name="search" autofocus value="{{ $search }}">
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
            <th class="text-center">Aksi</th>            
        </tr>
    </thead>

    <tbody>
      <!-- agar nomor berjalan pada pagination -->
      @php
        $nomor = 1 + (($guru->currentPage() - 1) * $guru->perPage()); 
      @endphp
        @foreach($guru as $row)
        <tr>
            <!-- <td>{{ $loop->iteration }}</td> -->
            <td align="center">{{ $nomor++ }}</td>
            <td>{{ $row->id_guru }}</td>
            <td>{{ $row->nama_guru }}</td>
            <td>{{ $row->alamat }}</td>
            <td>{{ ($row->gender=='M') ? 'Male' : 'Female' }}</td>
            <td align="center">
                <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('guru.destroy', $row->id_guru) }}" method="POST">
                  <a href="{{ route('guru.edit', $row->id_guru) }}" class="btn btn-sm btn-outline-warning"><i class="fas fa-edit"></i></a>
                  @csrf
                  @method('DELETE')
                  <button type="submit" class="btn btn-sm btn-outline-danger"><i class="fas fa-trash-alt"></i></button>
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

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
  // function deleteData(name){
  //   pesan = confirm('Yakin data dengan nama ${name} ini dihapus?');
  //   if(pesan) return true;
  //   else return false;
  // }
  
  @if(session('success'))
        Swal.fire({
            icon: "success",
            title: "BERHASIL",
            text: "{{ session('success') }}",
            showConfirmButton: false,
            timer: 2000
        });
    @elseif(session('error'))
        Swal.fire({
            icon: "error",
            title: "GAGAL!",
            text: "{{ session('error') }}",
            showConfirmButton: false,
            timer: 2000
        });
    @endif
</script>
@endsection