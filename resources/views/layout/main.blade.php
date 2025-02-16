<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $page_title ?: 'Laravel 11' }}</title>
    <link href="{{ asset('/') }}assets/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link href="{{ asset('/') }}assets/plugins/fontawesome/css/all.min.css" rel="stylesheet">
</head>

<body>
    <!-- start lwh nav -->
    <nav class="navbar navbar-expand-lg bg-success navbar-dark shadow">
        <div class="container">
            <a class="navbar-brand" href="#">Laravel 11</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">

                    <li class="nav-item">
                        <a class="nav-link {{ request()->segment('1') == '' || request()->segment('1') == 'home' ? 'active' : '' }}"
                            aria-current="page" href="{{ route('home.index') }}">
                            <i class="fas fa-tachometer-alt"></i> Home</a>
                    </li>

                    {{-- <li class="nav-item">
                    <a class="nav-link {{ request()->segment('1') =='perkiraan'  ? 'active' : '' }}" aria-current="page" href="{{ route('perkiraan.index') }}">
                    <i class="fas fa-user"></i> Perkiraan</a>
                    </li> --}}

                    <li class="nav-item">
                        <a class="nav-link {{ request()->segment('1') == 'hari' ? 'active' : '' }}" aria-current="page"
                            href="{{ route('hari.index') }}">
                            <i class="fas fa-calendar"></i> Hari</a>
                    </li>



                    <li class="nav-item">
                        <a class="nav-link {{ request()->segment('1') == 'guru' ? 'active' : '' }}" aria-current="page"
                            href="{{ url('guru') }}">
                            <i class="fas fa-user"></i> Guru</a>
                    </li>

                    {{-- <li class="nav-item">
                <a class="nav-link {{ request()->segment('1') =='kurikulum'  ? 'active' : '' }}" aria-current="page" href="{{ route('kurikulum.index') }}">
                <i class="fas fa-user"></i> Kurikulum</a>
                </li> --}}
                    <li class="nav-item">
                        <a class="nav-link {{ request()->segment('1') == 'pelajaran' ? 'active' : '' }}"
                            aria-current="page" href="{{ route('pelajaran.index') }}">
                            <i class="fas fa-list"></i> Pelajaran </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link {{ request()->segment('1') == 'jadwal' ? 'active' : '' }}"
                            aria-current="page" href="{{ route('jadwal.index') }}">
                            <i class="fas fa-list"></i> Jadwal</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link {{ request()->segment('1') == 'pengumuman' ? 'active' : '' }}"
                            aria-current="page" href="{{ route('pengumuman.index') }}">
                            <i class="fas fa-list"></i> Pengumuman</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link {{ request()->segment('1') == 'jadwal' ? 'active' : '' }}"
                            aria-current="page" href="">
                            <i class="fas fa-user"></i> Logout</a>
                    </li>

                </ul>
            </div>
        </div>
    </nav>
    <!-- end lwh nav -->


    <!-- content -->
    <div class="mt-4">
        <div class="container">
            @yield('content')
        </div>
    </div>
    <!-- end content -->

    <script src="{{ asset('/') }}assets/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        $('#myModal').on('shown.bs.modal', function() {
            $('#myInput').trigger('focus')
        });

        //message with sweetalert
        @if (session('success'))
            Swal.fire({
                icon: "success",
                title: "BERHASIL",
                text: "{{ session('success') }}",
                showConfirmButton: false,
                timer: 2000
            });
        @elseif (session('error'))
            Swal.fire({
                icon: "error",
                title: "GAGAL!",
                text: "{{ session('error') }}",
                showConfirmButton: false,
                timer: 2000
            });
        @endif
    </script>
</body>

</html>
