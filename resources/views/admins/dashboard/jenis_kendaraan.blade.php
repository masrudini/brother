@extends('admins/layout/main')
@section('container')
    <div class="container">
        <div class="d-flex justify-content-start mb-4">
            <h1 class="h3 mb-0 text-gray-800">Daftar Kendaraan :</h1>
        </div>
        <a href="/admin/tambah-jenis-kendaraan" class="btn btn-primary mb-2">Tambah Jenis Kendaraan</a>
        <table class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Tipe</th>
                    <th>Merek</th>
                    <th>Kapasitas</th>
                    <th>CC</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <?php $i = 1; ?>
            @foreach ($jenis_kendaraans as $jk)
                <tr>
                    <td>
                        {{ $i }}
                    </td>
                    <td>
                        {{ $jk->tipe }}
                    </td>
                    <td>
                        {{ $jk->merek }}
                    </td>
                    <td>
                        {{ $jk->kapasitas }} orang
                    </td>
                    <td>
                        {{ $jk->cc }} CC
                    </td>
                    <td>
                        <form action="/delete-jenis" method="POST">
                            @csrf
                            <input type="hidden" value="{{ $jk->id }}" name="jenis_kendaraan_id"
                                id="jenis_kendaraan_id">
                            <button type="submit" class="btn btn-danger"><i class="bi bi-trash"></i></button>
                        </form>
                    </td>
                </tr>
                <?php $i++; ?>
            @endforeach
        </table>
    </div>
@endsection
