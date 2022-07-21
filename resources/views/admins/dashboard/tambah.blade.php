@extends('admins/layout/main')
@section('container')
    <div class="container">
        <div class="d-sm-flex align-items-center justify-content-start mb-4">
            <h1 class="h3 mb-0 text-gray-800">Form Tambah Kendaraan:</h1>
        </div>
        <form action="/tambah" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="fields">
                <div class="field half">
                    <label for="jenis_kendaraan">Jenis Kendaraan</label>
                    <select class="form-control" id="jenis_kendaraan" name="jenis_kendaraan">
                        @foreach ($jenis_kendaraan as $jk)
                            <option value="{{ $jk->id }}">{{ $jk->tipe }} {{ $jk->pabrikan }}
                                {{ $jk->merek }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="field half ">
                    <label for="foto_depan">Upload Foto Depan</label>
                    <input type="file" class="form-control" id="foto_depan" name="foto_depan" required>
                </div>
                <div class="field half">
                    <label for="plat">Plat</label>
                    <input type="text" class="form-control" id="plat" name="plat" placeholder="Masukkan Plat..." required>
                </div>
                <div class="field half">
                    <label for="foto_samping">Upload Foto Samping</label>
                    <input type="file" class="form-control" id="foto_samping" name="foto_samping" required>
                </div>
                <div class="field half">
                    <label for="warna">Warna</label>
                    <input type="text" class="form-control" id="warna" name="warna" placeholder="Masukkan Warna..."
                        required>
                </div>
                <div class="field half">
                    <label for="foto_belakang">Upload Foto Belakang</label>
                    <input type="file" class="form-control" id="foto_belakang" name="foto_belakang" required>
                </div>
                <div class="field half">
                    <label for="stnk">Nomor STNK</label>
                    <input type="text" class="form-control" id="stnk" name="stnk" placeholder="Masukkan Nomor STNK..."
                        required>
                </div>
                <div class="field half">
                    <label for="foto_dalam">Upload Foto Dalam</label>
                    <input type="file" class="form-control" id="foto_dalam" name="foto_dalam" required>
                </div>
                <div class="field half">
                    <label for="harga">Harga</label>
                    <input type="text" class="form-control" id="harga" name="harga" placeholder="Masukkan Harga..."
                        required>
                </div>
                <div class="field half">
                    <label for="" style="color: hsla(120, 100%, 50%, 0.0);"> test</label>
                    <input type="submit" class="btn btn-primary form-control">
                </div>
                <div class="field half">
                    <label for="tahun">Tahun Rakitan</label>
                    <input type="text" class="form-control" id="tahun" name="tahun" placeholder="Masukkan Tahun..."
                        required>
                </div>
        </form>
    </div>
@endsection
