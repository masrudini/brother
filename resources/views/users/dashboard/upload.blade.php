@extends('users/layout/main')
@section('container')
    <div class="inner" style="display: block; height:500px;">
        <h2>Pesanan Belum Dibayar :</h2>
        <section class="tiles">
            @foreach ($orders as $order)
                @if ($order->bukti_pembayaran == null &&
                    $order->foto_ktp == null &&
                    $order->foto_sim == null &&
                    $order->jaminan == null)
                    <div class="card" style="width: 20rem; margin:10px 10px;">
                        <div class="card-body">
                            <h5 class="card-title">Card title</h5>
                            <p class="card-text" style="color:#000000">Tanggal Pemesanan : {{ $order->date_start }}
                                <br>
                                Total Pembayaran : Rp. {{ $order->total_harga }}
                            </p>
                            <a href="/order/pay/{{ $order->id }}" class="btn btn-primary">Bayar Sekarang</a>
                        </div>
                    </div>
                @endif
            @endforeach
        </section>
    </div>
@endsection
