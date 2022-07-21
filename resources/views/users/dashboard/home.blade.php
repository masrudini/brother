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
    <link rel="icon" href="{{ url('images/icon.ico') }}">
    <noscript>
        <link rel="stylesheet" href="{{ url('portal_template/assets/css/noscript.css') }}" />
    </noscript>

</head>

<body class="is-preload">

    <!-- Wrapper -->
    <div id="wrapper">

        <!-- Header -->
        <header id="header" class="alt">
            <a href="/" class="logo"><strong>Brother Transport</strong></a>
            <nav>
                <a href="#menu">Welcome To Our Website</a>
            </nav>
        </header>

        <!-- Menu -->
        <nav id="menu">
            <ul class="links">
                <h3>Silahkan Login</h3>
                <a class="btn btn-outline-light px-5 py-3" href="/login">Login</a>
            </ul>
        </nav>

        <!-- Main -->
        <div id="main">
            <div class="inner">
                @if ($kendaraans->isNotEmpty())
                    <header class="major">
                        <h2>Kendaraan Tersedia :</h2>
                    </header>
                    <section class="tiles">
                        @foreach ($kendaraans as $kendaraan)
                            @if ($kendaraan->available_status == '1')
                                <article class="rounded">
                                    <span class="image">
                                        <img
                                            src="{{ url('storage') }}/{{ $kendaraan->detailKendaraan->tampak_depan }}" />
                                    </span>
                                    <header class="major">
                                        <h4>{{ $kendaraan->jenisKendaraan->tipe }}
                                            {{ $kendaraan->jenisKendaraan->merek }} <br>
                                            Harga/hari: Rp.
                                            {{ number_format($kendaraan->harga_sewa, 2, ',', '.') }}<br>
                                            Tahun: {{ $kendaraan->tahun_rakitan }}
                                        </h4>
                                        <button type="button" class="butoon" data-bs-toggle="modal"
                                            data-bs-target="#exampleModal">
                                            Pesan
                                        </button>
                                        <a href="/detail-guest/{{ $kendaraan->id }}" class="button">Detail</a>
                                    </header>
                                </article>
                            @endif
                        @endforeach
                        <div class="modal fade text-center" id="exampleModal" tabindex="-1"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel" style="color: black">
                                            Anda Belum
                                            Login</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body" style="color: black;">
                                        Untuk Melakukan Pemesanan Silahkan Login Terlebih Dahulu &#128512;
                                    </div>
                                    <div class="modal-footer">
                                        <a class="btn btn-outline-dark px-5 py-3" href="/login">Login</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                    <div class="d-flex justify-content-end my-3">
                        {{ $kendaraans->links() }}
                    </div>
                @else
                    <div class="d-flex justify-content-center">
                        <h1>Maaf Kendaraan Tidak Tersedia</h1>
                    </div>
                @endif
            </div>
        </div>
        @include('users/includes/footer')

    </div>

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous">
    </script>
    <script src="{{ url('portal_template/assets/js/jquery.min.js') }}"></script>
    <script src="{{ url('portal_template/assets/js/jquery.scrolly.min.js') }}"></script>
    <script src="{{ url('portal_template/assets/js/jquery.scrollex.min.js') }}"></script>
    <script src="{{ url('portal_template/assets/js/browser.min.js') }}"></script>
    <script src="{{ url('portal_template/assets/js/breakpoints.min.js') }}"></script>
    <script src="{{ url('portal_template/assets/js/util.js') }}"></script>
    <script src="{{ url('portal_template/assets/js/main.js') }}"></script>

</body>

</html>
