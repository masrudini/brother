@extends('users/layout/main')
@section('container')
    <div class="container" style="height: 500px">
        <div class="d-sm-flex align-items-center justify-content-start mb-4 mt-2">
            <a class="btn mt-2" style="background-color: #2a2f4a;" href="/dashboard"><i class="bi bi-arrow-left"
                    style="color: #ffffff;"></i></a>
            <h1 class="h3 mt-2 text-white-1000 mx-3">Detail Kendaraan :</h1>
        </div>
        @foreach ($kendaraans as $kendaraan)
            <div class="row span-2">
                <div class="col-sm-4">
                    <div class="card mb-4" style="height: 360px">
                        <div class="card-body">
                            <h4 class="card-title" style="color: black;">
                                {{ $kendaraan->jenisKendaraan->tipe }} {{ $kendaraan->jenisKendaraan->merek }}
                            </h4>
                            <h5 class="font-weight-normal" style="color: black;">Plat : {{ $kendaraan->plat }}</h5>
                            <h5 class="font-weight-normal" style="color: black;">Warna : {{ $kendaraan->warna }}</h5>
                            <h5 class="font-weight-normal" style="color: black;">Harga/hari :
                                {{ 'Rp ' . number_format($kendaraan->harga_sewa, 2, ',', '.') }}</h5>
                            <h5 class="font-weight-normal" style="color: black;">Tahun : {{ $kendaraan->tahun_rakitan }}
                            </h5>
                            <h5 class="font-weight-normal" style="color: black;">Kapasitas :
                                {{ $kendaraan->jenisKendaraan->kapasitas }}</h5>
                            <h5 class="font-weight-normal" style="color: black;">CC : {{ $kendaraan->jenisKendaraan->cc }}
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
@endsection
