@extends('admins/layout/main')
@section('container')
    <div class="container">
        <div class="d-sm-flex align-items-center justify-content-start mb-4">
            <a class="btn" style="background-color: #4e73df;" href="/admin/kendaraan"><i class="bi bi-arrow-left"
                    style="color: #ffffff;"></i></a>
            <h1 class="h3 mb-0 text-gray-800 mx-3">Detail Kendaraan :</h1>
        </div>
        @foreach ($kendaraans as $kendaraan)
            <div class="row span-2">
                <div class="col-sm-4">
                    <div class="card" style="height: 350px">
                        <div class="card-body">
                            <h4 class="card-title">
                                {{ $kendaraan->jenisKendaraan->tipe }} {{ $kendaraan->jenisKendaraan->pabrikan }}
                                {{ $kendaraan->jenisKendaraan->merek }}
                            </h4>
                            <p class="card-text ">
                            <h5 class="font-weight-normal">Plat : {{ $kendaraan->plat }}</h5>
                            </p>
                            <p class="card-text">
                            <h5 class="font-weight-normal">Warna : {{ $kendaraan->warna }}</h5>
                            </p>
                            <p class="card-text">
                            <h5 class="font-weight-normal">Harga/hari :
                                {{ 'Rp ' . number_format($kendaraan->harga_sewa, 2, ',', '.') }}</h5>
                            </p>
                            <p class="card-text">
                            <h5 class="font-weight-normal">Tahun : {{ $kendaraan->tahun_rakitan }}</h5>
                            </p>
                            <p class="card-text">
                            <h5 class="font-weight-normal">Kapasitas : {{ $kendaraan->jenisKendaraan->kapasitas }}</h5>
                            </p>
                            <p class="card-text">
                            <h5 class="font-weight-normal">CC : {{ $kendaraan->jenisKendaraan->cc }}</h5>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-sm-5">
                    <div class="card" style="height: 350px">
                        <div class="card-body">
                            <h5 class="card-title">
                                Foto {{ $kendaraan->jenisKendaraan->tipe }} :
                            </h5>
                            <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="true">
                                <div class="carousel-indicators">
                                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0"
                                        class="active" aria-current="true" aria-label="Slide 1"></button>
                                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"
                                        aria-label="Slide 2"></button>
                                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"
                                        aria-label="Slide 3"></button>
                                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="3"
                                        aria-label="Slide 4"></button>
                                </div>
                                <div class="carousel-inner">
                                    <div class="carousel-item active">
                                        <img height="270px"
                                            src="{{ url('storage') }}/{{ $kendaraan->detailKendaraan->tampak_depan }}"
                                            class="d-block w-100" alt="...">
                                    </div>
                                    <div class="carousel-item">
                                        <img height="270px"
                                            src="{{ url('storage') }}/{{ $kendaraan->detailKendaraan->tampak_samping }}"
                                            class="d-block w-100" alt="...">
                                    </div>
                                    <div class="carousel-item">
                                        <img height="270px"
                                            src="{{ url('storage') }}/{{ $kendaraan->detailKendaraan->tampak_belakang }}"
                                            class="d-block w-100" alt="...">
                                    </div>
                                    <div class="carousel-item">
                                        <img height="270px"
                                            src="{{ url('storage') }}/{{ $kendaraan->detailKendaraan->tampak_dalam }}"
                                            class="d-block w-100" alt="...">
                                    </div>
                                </div>
                                <button class="carousel-control-prev" type="button"
                                    data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Previous</span>
                                </button>
                                <button class="carousel-control-next" type="button"
                                    data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Next</span>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
