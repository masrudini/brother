@extends('admins/layout/main')
@section('container')
    <div class="container">
        <div class="d-sm-flex align-items-center justify-content-start mb-4">
            <h1 class="h3 mb-0 text-gray-800">Belum Kembali :</h1>
        </div>
        <table class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Kendaraan</th>
                    <th>Total Biaya</th>
                    <th>Tanggal Kembali</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <?php $i = 1; ?>
            @foreach ($orders as $order)
                <tr>
                    <td>
                        {{ $i }}
                    </td>
                    <td>
                        {{ $order->atas_nama }}
                    </td>
                    <td>
                        <?php $ids = explode(',', $order->kendaraan_id); ?>
                        @foreach ($ids as $id)
                            {{ $order->firstwhere('kendaraan_id', $id)->kendaraan->jenisKendaraan->merek }}
                            <br>
                        @endforeach
                    </td>
                    <td>
                        <?php
                        $harga = 'Rp ' . number_format($order->total_harga, 2, ',', '.');
                        echo $harga;
                        ?>
                    </td>
                    <td>
                        {{ $order->date_end }}
                    </td>
                    <td>
                        <form action="/pengembalian" method="POST">
                            @csrf
                            <a href="https://wa.me/{{ $order->no_hp }}" target="_blank" class="btn btn-success"><i
                                    class="bi bi-whatsapp"></i></a>
                            <input type="hidden" value="{{ $order->kendaraan_id }}" name="id_kendaraan"
                                id="id_kendaraan">
                            <input type="hidden" value="{{ $order->id }}" name="id_order" id="id_order">
                            <button type="submit" class="btn btn-primary"><i class="bi bi-check-square"></i></button>
                        </form>
                    </td>
                </tr>
                <?php $i++; ?>
            @endforeach
        </table>
    </div>
@endsection
