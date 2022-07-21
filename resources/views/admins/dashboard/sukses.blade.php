@extends('admins/layout/main')
@section('container')
    <div class="container">
        <div class="d-sm-flex align-items-center justify-content-start mb-4">
            <h1 class="h3 mb-0 text-gray-800">Pesanan Sukses :</h1>
        </div>
        <table class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Kendaraan</th>
                    <th>Total Biaya</th>
                    <th>Tanggal Kembali</th>
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
                </tr>
                <?php $i++; ?>
            @endforeach
        </table>
    </div>
@endsection
