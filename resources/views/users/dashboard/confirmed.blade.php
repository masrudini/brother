@extends('users/layout/main')
@section('container')
    <div class="inner" style="display: block; height:500px;">
        <h2>Sudah Terkonfirmasi :</h2>
        <section class="tiles">
            @foreach ($orders as $order)
                @if ($order->bukti_pembayaran != null &&
                    $order->foto_ktp != null &&
                    $order->foto_sim != null &&
                    $order->jaminan != null &&
                    $order->status_konfirmasi == 1 &&
                    $order->status_kembali == 0)
                    <div class="card" style="width: 20rem; margin:10px 10px;">
                        <?php $ids = explode(',', $order->kendaraan_id); ?>
                        <div class="" style=" display: grid;">
                            <img src="{{ url('storage') }}/{{ $kendaraans->firstWhere('id', $ids[0])->detailKendaraan->tampak_depan }}"
                                class="card-img-top">
                        </div>
                        <div class="card-body">
                            <p class="card-text" style="color: black;">Tanggal Pemesanan : {{ $order->date_start }}
                                <br>
                                Tanggal Kembalikan : {{ $order->date_end }}
                            </p>
                        </div>
                    </div>
                @endif
            @endforeach
        </section>
    </div>
@endsection
