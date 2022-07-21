<!DOCTYPE HTML>
<!--
 Forty by HTML5 UP
 html5up.net | @ajlkn
 Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>

<head>
    <title>{{ $title }} | Page</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css">
    <link rel="stylesheet" href="{{ url('portal_template/assets/css/main.css') }}" />
    <noscript>
        <link rel="stylesheet" href="{{ url('portal_template/assets/css/noscript.css') }}" />
    </noscript>

</head>

<body class="is-preload">

    <!-- Wrapper -->
    <div id="wrapper">

        <!-- Header -->
        <header id="header" class="alt">
            <a href="/" class="logo"><strong>Brother Transport</strong> <span>by MR</span></a>
            <nav>
                <a href="#menu">Welcome To Our Website</a>
            </nav>
        </header>

        <!-- Menu -->
        <nav id="menu">
            <ul class="links">
                <a href="/login">Login</a>
            </ul>
        </nav>
        <div id="main">
            <div class="container" style="height: 500px">
                <div class="d-sm-flex align-items-center justify-content-start mb-4 mt-2">
                    <a class="btn mt-2" style="background-color: #2a2f4a;" href="/"><i class="bi bi-arrow-left"
                            style="color: #ffffff;"></i></a>
                    <h1 class="h3 mt-2 text-white-1000 mx-3">Detail Kendaraan :</h1>
                </div>
                @foreach ($kendaraans as $kendaraan)
                    <div class="row span-2">
                        <div class="col-sm-4">
                            <div class="card mb-4" style="height: 360px">
                                <div class="card-body">
                                    <h4 class="card-title" style="color: black;">
                                        {{ $kendaraan->jenisKendaraan->tipe }}
                                        {{ $kendaraan->jenisKendaraan->merek }}
                                    </h4>
                                    <h5 class="font-weight-normal" style="color: black;">Plat :
                                        {{ $kendaraan->plat }}
                                    </h5>
                                    <h5 class="font-weight-normal" style="color: black;">Warna :
                                        {{ $kendaraan->warna }}
                                    </h5>
                                    <h5 class="font-weight-normal" style="color: black;">Harga/hari :
                                        {{ 'Rp ' . number_format($kendaraan->harga_sewa, 2, ',', '.') }}</h5>
                                    <h5 class="font-weight-normal" style="color: black;">Tahun :
                                        {{ $kendaraan->tahun_rakitan }}
                                    </h5>
                                    <h5 class="font-weight-normal" style="color: black;">Kapasitas :
                                        {{ $kendaraan->jenisKendaraan->kapasitas }}</h5>
                                    <h5 class="font-weight-normal" style="color: black;">CC :
                                        {{ $kendaraan->jenisKendaraan->cc }}
                                    </h5>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="mb-1">
                                <img height="175px" width="300px"
                                    src="{{ url('storage') }}/{{ $kendaraan->detailKendaraan->tampak_depan }}"
                                    class="d-block rounded" alt="...">
                            </div>
                            <div class="my-2">
                                <img height="175px" width="300px"
                                    src="{{ url('storage') }}/{{ $kendaraan->detailKendaraan->tampak_belakang }}"
                                    class="d-block rounded" alt="...">
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="mb-1">
                                <img height="175px" width="300px"
                                    src="{{ url('storage') }}/{{ $kendaraan->detailKendaraan->tampak_samping }}"
                                    class="d-block rounded" alt="...">
                            </div>
                            <div class="my-2">
                                <img height="175px" width="300px"
                                    src="{{ url('storage') }}/{{ $kendaraan->detailKendaraan->tampak_dalam }}"
                                    class="d-block rounded" alt="...">
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        @include('users/includes/footer')

        <!-- Scripts -->
        <script src="{{ url('portal_template/assets/js/jquery.min.js') }}"></script>
        <script src="{{ url('portal_template/assets/js/jquery.scrolly.min.js') }}"></script>
        <script src="{{ url('portal_template/assets/js/jquery.scrollex.min.js') }}"></script>
        <script src="{{ url('portal_template/assets/js/browser.min.js') }}"></script>
        <script src="{{ url('portal_template/assets/js/breakpoints.min.js') }}"></script>
        <script src="{{ url('portal_template/assets/js/util.js') }}"></script>
        <script src="{{ url('portal_template/assets/js/main.js') }}"></script>

</body>

</html>
