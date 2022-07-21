@extends('admins/layout/main')
@section('container')
    <div class="container">
        <div class="d-sm-flex align-items-center justify-content-start mb-4">
            <h1 class="h3 mb-0 text-gray-800">Belum Dibayar :</h1>
        </div>
        <table class="table table-bordered table-hover table-sm">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Total Biaya</th>
                    <th>Waktu Pemesanan</th>
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
                        <?php
                        $harga = 'Rp ' . number_format($order->total_harga, 2, ',', '.');
                        echo $harga;
                        ?>
                    </td>
                    <td>
                        <?php
                        $date1 = DateTime::createFromFormat('Y-m-d', date('Y-m-d', strtotime($order->tanggal_pemesanan)));
                        $date2 = DateTime::createFromFormat('Y-m-d', date('Y-m-d'));
                        $interval = date_diff($date1, $date2);
                        
                        echo $interval->format('%d Hari');
                        
                        ?>
                    </td>
                    <td>
                        <form action="/delete" method="POST">
                            @csrf
                            <a href="https://wa.me/{{ $order->no_hp }}" target="_blank" class="btn btn-success"><i
                                    class="bi bi-whatsapp"></i></a>
                            <input type="hidden" value="{{ $order->id }}" name="id_order" id="id_order">
                            <input type="hidden" value="{{ $order->kendaraan_id }}" name="id_kendaraan"
                                id="id_kendaraan">
                            <button type="submit" class="btn btn-danger"><i class="bi bi-trash"></i></button>
                        </form>
                    </td>
                </tr>
                <?php $i++; ?>
            @endforeach
        </table>
    </div>
@endsection
