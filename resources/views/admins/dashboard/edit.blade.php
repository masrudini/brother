@extends('admins/layout/main')
@section('container')
    <div class="container">
        <div class="d-sm-flex align-items-center justify-content-start mb-4">
            <a class="btn" style="background-color: #4e73df;" href="/admin/kendaraan"><i class="bi bi-arrow-left"
                    style="color: #ffffff;"></i></a>
            <h1 class="h3 mb-0 text-gray-800 mx-3">Edit Kendaraan :</h1>
        </div>
        <form action="/edit" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="fields">
                <div class="field half">
                    <label for="jenis_kendaraan">Jenis Kendaraan</label>
                    <select class="form-control" id="jenis_kendaraan" name="jenis_kendaraan">
                        @foreach ($kendaraans as $k)
                            <?php $tipepabrikan = "{$k->jenisKendaraan->tipe} {$k->jenisKendaraan->merek}"; ?>
                        @endforeach
                        @foreach ($jenis_kendaraans as $jk)
                            <?php
                            if ("{$jk->tipe} {$jk->merek}" == $tipepabrikan) {
                                echo '<option selected value="' . $jk->id . '">' . $jk->tipe . ' ' . $jk->merek . '</option>';
                            } else {
                                echo '<option value="' . $jk->id . '">' . $jk->tipe . ' ' . $jk->merek . '</option>';
                            }
                            ?>
                        @endforeach
                    </select>
                </div>
                @foreach ($kendaraans as $kendaraan)
                    <div class="field half ">
                        <label for="foto_depan">Upload Foto Depan</label>
                        <input type="hidden" value="{{ $kendaraan->detailKendaraan->tampak_depan }}" name="old-depan"
                            id="old-depan">
                        <input type="file" class="form-control" id="foto_depan" name="foto_depan">
                    </div>
                    <div class="field half">
                        <label for="plat">Plat</label>
                        <input type="text" value="{{ $kendaraan->plat }}" class="form-control" id="plat" name="plat"
                            placeholder="Masukkan Plat...">
                    </div>
                    <div class="field half">
                        <label for="foto_samping">Upload Foto Samping</label>
                        <input type="hidden" value="{{ $kendaraan->detailKendaraan->tampak_samping }}" name="old-samping"
                            id="old-samping">
                        <input type="file" class="form-control" id="foto_samping" name="foto_samping">
                    </div>
                    <div class="field half">
                        <label for="warna">Warna</label>
                        <input type="text" value="{{ $kendaraan->warna }}" class="form-control" id="warna" name="warna"
                            placeholder="Masukkan Warna...">
                    </div>
                    <div class="field half">
                        <label for="foto_belakang">Upload Foto Belakang</label>
                        <input type="hidden" value="{{ $kendaraan->detailKendaraan->tampak_belakang }}"
                            name="old-belakang" id="old-belakang">
                        <input type="file" class="form-control" id="foto_belakang" name="foto_belakang">
                    </div>
                    <div class="field half">
                        <label for="stnk">Nomor STNK</label>
                        <input type="text" value="{{ $kendaraan->nomor_stnk }}" class="form-control" id="stnk"
                            name="stnk" placeholder="Masukkan Nomor STNK...">
                    </div>
                    <div class="field half">
                        <label for="foto_dalam">Upload Foto Dalam</label>
                        <input type="hidden" value="{{ $kendaraan->detailKendaraan->tampak_dalam }}" name="old-dalam"
                            id="old-dalam">
                        <input type="file" class="form-control" id="foto_dalam" name="foto_dalam">
                    </div>
                    <div class="field half">
                        <label for="harga">Harga Sewa</label>
                        <input type="text" value="{{ $kendaraan->harga_sewa }}" class="form-control" id="harga"
                            name="harga" placeholder="Masukkan Harga...">
                    </div>
                    <div class="field half">
                        <label style="color: hsla(120, 100%, 50%, 0.0);"> test</label>
                        <input type="hidden" value="{{ $kendaraan->id }}" name="kendaraan_id" id="kendaraan_id">
                        <input type="submit" class="btn btn-primary form-control">
                    </div>
                    <div class="field half">
                        <label for="tahun">Tahun Rakitan</label>
                        <input type="text" value="{{ $kendaraan->tahun_rakitan }}" class="form-control" id="tahun"
                            name="tahun" placeholder="Masukkan Tahun...">
                    </div>
                @endforeach
        </form>
    </div>
@endsection
