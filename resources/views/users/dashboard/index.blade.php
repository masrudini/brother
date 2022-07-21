@extends('users/layout/main')
@section('container')
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
                                    <img src="{{ url('storage') }}/{{ $kendaraan->detailKendaraan->tampak_depan }}" />
                                </span>
                                <header class="major">
                                    <h4>{{ $kendaraan->jenisKendaraan->tipe }}
                                        {{ $kendaraan->jenisKendaraan->merek }} <br>
                                        Harga/hari: Rp. {{ number_format($kendaraan->harga_sewa, 2, ',', '.') }}<br>
                                        Tahun: {{ $kendaraan->tahun_rakitan }}
                                    </h4>
                                    <form action="select" method="POST">
                                        @csrf
                                        <input type="hidden" value="{{ $kendaraan->id }}" name="kendaraan_id">
                                        <input type="hidden" value="{{ auth()->user()->id }}" name="user_id">
                                        <button type="submit">Pesan</button>
                                        <a href="/detail/{{ $kendaraan->id }}" class="button">Detail</a>
                                    </form>
                                </header>
                            </article>
                        @endif
                    @endforeach
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
    <div id="main">
        <section>
            @if ($order_kendaraans->isNotEmpty())
                <div class="inner">
                    <header class="major">
                        <h2>Pesanan Anda :</h2>
                    </header>
                    <div class="row">
                        @foreach ($order_kendaraans as $ok)
                            @if ($ok->user_id == auth()->user()->id)
                                <div class="col-4">
                                    <div style="position: relative;">
                                        <form action="cancel" method="post">
                                            @csrf
                                            <input type="hidden" value="{{ $ok->kendaraan_id }}" name="kendaraan_id">
                                            <button class="btn-close"
                                                style="position: absolute; left:10px; top:10px;"></button>
                                        </form>
                                        <img class="rounded" height="275px" width="350px"
                                            src="{{ url('storage') }}/{{ $ok->kendaraan->detailKendaraan->tampak_depan }}" />
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    </div>
                    <a href="/order" class="btn btn-outline-light">Pesan Sekarang</a>
                </div>
            @endif
        </section>
    </div>
@endsection
