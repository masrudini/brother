<?php

namespace App\Http\Controllers;

use App\Models\Kendaraan;
use App\Models\Order;
use Illuminate\Http\Request;
use App\Models\OrderKendaraan;

class OrderController extends Controller
{
    public function index()
    {
        $title = 'Form Order';
        $order_kendaraans = OrderKendaraan::where('user_id', auth()->user()->id)->get();
        $session_user = auth()->user();


        return view('users/dashboard/order', compact('title', 'order_kendaraans', 'session_user'));
    }

    public function booking(Request $request)
    {

        if ($request->file('ktp') == null && $request->file('bayar') == null && $request->file('sim') == null && $request->input('jaminan') == null) {
            $data = ([
                'user_id' => auth()->user()->id,
                'atas_nama' => $request->input('name'),
                'alamat' => $request->input('location'),
                'date_start' => $request->input('date_start'),
                'date_end' => $request->input('date_end'),
                'kendaraan_id' => $request->input('kendaraan_id'),
                'no_hp' => $request->input('no_hp'),
                'total_harga' => $request->input('total')
            ]);
        } else {
            $data = $request->validate([
                'ktp' => 'image|required',
                'bayar' => 'image|required',
                'sim' => 'image|required',
                'jaminan' => 'required'
            ]);

            $data = ([
                'user_id' => auth()->user()->id,
                'atas_nama' => $request->input('name'),
                'alamat' => $request->input('location'),
                'date_start' => $request->input('date_start'),
                'date_end' => $request->input('date_end'),
                'kendaraan_id' => $request->input('kendaraan_id'),
                'no_hp' => $request->input('no_hp'),
                'total_harga' => $request->input('total'),
                'jaminan' => $request->input('jaminan'),
                'foto_ktp' => $request->file('ktp')->store('ktp-images'),
                'bukti_pembayaran' => $request->file('bayar')->store('bukti-bayar-images'),
                'sim' => $request->file('sim')->store('sim-images'),
            ]);
        }

        Order::create($data);

        OrderKendaraan::where('user_id', auth()->user()->id)->delete();

        return redirect('/dashboard');
    }

    public function pendingpay()
    {
        $title = "Ordered";
        $orders = Order::where('user_id', auth()->user()->id)->get();

        return view('users/dashboard/upload', compact('title', 'orders'));
    }

    public function pay($id)
    {
        $kendaraans = Kendaraan::all();
        $title = "Form Order";
        $orders = Order::where('id', $id)->get();

        return view('users/dashboard/pay', compact('title', 'orders', 'kendaraans'));
    }

    public function paying(Request $request)
    {
        $validated = $request->validate([
            'ktp' => 'image',
            'bayar' => 'image',
            'stnk' => 'image',
            'sim' => 'image'
        ]);

        $validated['ktp'] = $request->file('ktp')->store('ktp-images');
        $validated['bayar'] = $request->file('bayar')->store('bukti-bayar-images');
        $validated['sim'] = $request->file('sim')->store('sim-images');
        $jaminan = $request->input('jaminan');
        $id = $request->input('order_id');

        Order::where('id', $id)->update(array('foto_ktp' => $validated['ktp'], 'bukti_pembayaran' => $validated['bayar'], 'foto_stnk' => $validated['stnk'], 'foto_sim' => $validated['sim'], 'jaminan' => $jaminan));
        return redirect('/dashboard');
    }

    public function confirm()
    {
        $title = "Ordered";
        $orders = Order::where('user_id', auth()->user()->id)->get();
        $kendaraans = Kendaraan::all();

        return view('users/dashboard/confirm', compact('title', 'orders', 'kendaraans'));
    }

    public function confirmed()
    {
        $title = "Ordered";
        $orders = Order::where('user_id', auth()->user()->id)->get();
        $kendaraans = Kendaraan::all();

        return view('users/dashboard/confirmed', compact('title', 'orders', 'kendaraans'));
    }
}
