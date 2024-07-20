@extends('layout.main')
@section('content')
    <div class="card">
        <div class="card-header bg-success-subtle">
            <h3>{{ $page_title }} Summary</h3>
        </div>
        <div class="card-body">
            <div class="row">
                @foreach ($data as $row)
                    <div class="col-2" title="Total data dari {{ $row['nama'] }}">
                        <div class="card text-center">
                            <div class="card-header bg-success">
                                <span class="text-bg-success">{{ $row['nama'] }}</span>
                            </div>
                            <div class="card-body bg-success-subtle">
                                <h1>{{ $row['jumlah'] }}</h1>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
