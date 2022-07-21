@extends('admins/layout/main')
@section('container')
    <div class="container">
        <div class="d-sm-flex align-items-center justify-content-start mb-4">
            <h1 class="h3 mb-0 text-gray-800">Sudah Dibayar :</h1>
        </div>
        <table class="table table-bordered table-hover table-sm">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Kendaraan</th>
                    <th>Jaminan</th>
                    <th>Total Biaya</th>
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
                        {{ $order->jaminan }}
                    </td>
                    <td>
                        <?php
                        $harga = 'Rp ' . number_format($order->total_harga, 2, ',', '.');
                        echo $harga;
                        ?>
                    </td>
                    <td>
                        <form action="/confirm" method="POST" style="display:inline">
                            @csrf
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                data-bs-target="#detail{{ $i }}"><i class="bi bi-eye"></i></button>
                            <input type="hidden" value="{{ $order->id }}" name="id_order" id="id_order">
                            <button type="submit" class="btn btn-success"><i class="bi bi-check-square"></i></button>
                        </form>
                        <form action="/delete-order" method="POST" style="display:inline">
                            @csrf
                            <input type="hidden" value="{{ $order->id }}" name="id_order" id="id_order">
                            <button type="submit" class="btn btn-danger"><i class="bi bi-trash"></i></button>
                        </form>
                    </td>
                </tr>
                <div class="modal fade" id="detail{{ $i }}" tabindex="-1" aria-labelledby="detailLabel"
                    aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="detailLabel">Upload KTP, Bukti Bayar & SIM</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <img src="{{ url('storage') }}/{{ $order->foto_ktp }}" style="width: 220px;">
                                <img src="{{ url('storage') }}/{{ $order->bukti_pembayaran }}" style="width: 220px;">
                                <img src="{{ url('storage') }}/{{ $order->foto_sim }}" style="width: 220px;">
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>
                <?php $i++; ?>
            @endforeach
        </table>
    </div>
@endsection
