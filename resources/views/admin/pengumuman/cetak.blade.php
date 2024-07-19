@extends('layout.main')
@section('content')

<div class="printableArea">
    <h3>Data Pengumuman</h3>
    <table class="table table-bordered" border="1" width="75%">
        <tr>
            <td class="text-center">No</td>
            <td>Judul Pengumuman</td>
            <td>Isi Pengumuman</td>
            <td>Tanggal Posting</td>
        </tr>
    
        @foreach($pengumuman as $item)
            <tr>
                <td align="center">{{ $loop->iteration }}.</td>
                <td>{{ $item->judul }}</td>
                <td>{{ $item->isi_pengumuman }}</td>
                <td>{{ $item->tgl_posting ? date('d F Y', strtotime($item->tgl_posting)) : '-' }}</td>
            </tr>
        @endforeach
    </table>
</div>

<!-- Tombol cetak -->
<br>
<button class="btn btn-primary" onclick="printTable('')">Cetak Tabel</button>

<a class="btn btn-danger" href="{{ url()->previous() }}" >Kembali</a>

<script src="https://code.jquery.com/jquery-3.7.1.slim.js" integrity="sha256-UgvvN8vBkgO0luPSUl2s8TIlOSYRoGFAX4jlCIm9Adc=" crossorigin="anonymous"></script>
<!-- Script untuk fungsi cetak -->
<script>
    function printTable() {
        w = window.open();
        w.document.write($('.printableArea').html());
        w.print();
        w.close();
    }
</script>

@endsection