@extends('admins/layout/main')
@section('container')
    <div class="container">
        <div class="d-sm-flex align-items-center justify-content-start mb-4">
            <h1 class="h3 mb-0 text-gray-800">Form Tambah Jenis Kendaraan:</h1>
        </div>
        <form action="/tambah-jenis" method="POST">
            @csrf
            <div class="fields">
                <div class="field half">
                    <label for="tipe">Tipe</label>
                    <select class="form-control" name="tipe" id="tipe">
                        <option value="Mobil">Mobil</option>
                        <option value="Bus">Bus</option>
                    </select>
                </div>
                <div class="field half">
                    <label for="plat"></label>
                    <input type="hidden" class="form-control">
                </div>
                <div class="field half">
                    <label for="pabrikan">Merek</label>
                    <input type="text" class="form-control" id="merek" name="merek" placeholder="Masukkan Merek..."
                        required>
                </div>
                <div class="field half">
                    <label for="plat"></label>
                    <input type="hidden" class="form-control">
                </div>
                <div class="field half">
                    <label for="stnk">CC</label>
                    <input type="text" class="form-control" id="cc" name="cc" placeholder="Masukkan CC..." required>
                </div>
                <div class="field half">
                    <label for="plat"></label>
                    <input type="hidden" class="form-control">
                </div>
                <div class="field half">
                    <label for="kapasitas">Kapasitas</label>
                    <input type="text" class="form-control" id="kapasitas" name="kapasitas"
                        placeholder="Masukkan Kapasitas..." required>
                </div>
                <div class="field half">
                    <label for="plat"></label>
                    <input type="hidden" class="form-control">
                </div>
                <div class="field half">
                    <label for="plat"></label>
                    <button type="submit" class="btn btn-primary mb-2">Tambah</button>
                </div>
            </div>
        </form>
    </div>
@endsection
