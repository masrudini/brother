@extends('admins/layout/main')
@section('container')
    <div class="container">
        <div class="d-flex justify-content-start mb-4">
            <h1 class="h3 mb-0 text-gray-800">Daftar Kendaraan :</h1>
        </div>
        <a href="/admin/tambah" class="btn btn-primary mb-2">Tambah Kendaraan</a>
        <table class="table table-bordered table-hover table-sm">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Merek</th>
                    <th>Harga</th>
                    <th>Gambar</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <?php $i = 1; ?>
            @foreach ($kendaraans as $kendaraan)
                <tr>
                    <td>
                        {{ $i }}
                    </td>
                    <td>
                        {{ $kendaraan->jenisKendaraan->merek }}
                    </td>
                    <td>
                        Rp {{ number_format($kendaraan->harga_sewa, 2, ',', '.') }}
                    </td>
                    <td>
                        <img src="{{ url('storage') }}/{{ $kendaraan->detailKendaraan->tampak_depan }}" alt=""
                            style="width: 250px">
                    </td>
                    <td>
                        @if ($kendaraan->available_status == 0)
                            Sedang Dipesan
                        @else
                            Kendaraan Ready
                        @endif
                    </td>
                    <td>
                        <form action="/delete-kendaraan" method="POST">
                            @csrf
                            <a href="/admin/kendaraan/detail/{{ $kendaraan->id }}" class="btn btn-success"><i
                                    class="bi bi-eye"></i></a>
                            <a href="/admin/kendaraan/edit/{{ $kendaraan->id }}" class="btn btn-primary"><i
                                    class="bi bi-pencil-square"></i></a>
                            <input type="hidden" value="{{ $kendaraan->id }}" name="kendaraan_id" id="kendaraan_id">
                            <button type="submit" class="btn btn-danger"><i class="bi bi-trash"></i></button>
                        </form>
                    </td>
                </tr>
                <?php $i++; ?>
            @endforeach
        </table>
    </div>
@endsection
