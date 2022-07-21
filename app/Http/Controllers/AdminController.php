<?php

namespace App\Http\Controllers;

use App\Models\User;
use LengthException;
use App\Models\Order;
use App\Models\Kendaraan;
use Illuminate\Http\Request;
use App\Models\JenisKendaraan;
use App\Models\DetailKendaraan;
use PhpParser\Node\Stmt\Foreach_;
use Illuminate\Contracts\Cache\Store;
use Illuminate\Support\Facades\Storage;
use Egulias\EmailValidator\Result\Reason\DetailedReason;
use Illuminate\Support\Facades\Redirect;

class AdminController extends Controller
{
    public function index()
    {
        $currentMonth = date('m');
        $title = "Admin";
        $orders = Order::where('status_kembali', '1')->sum('total_harga');
        $order = Order::where('status_kembali', '1')->whereMonth('date_end', [$currentMonth])->sum('total_harga');
        $users = User::where('is_admin', '0')->count();
        $kendaraans = Kendaraan::where('available_status', '0')->count();
        $kendaraan = Kendaraan::where('available_status', '1')->count();

        return view('admins/dashboard/index', compact('title', 'orders', 'users', 'kendaraans', 'order', 'kendaraan'));
    }

    public function belum()
    {
        $title = "Belum";
        $orders = Order::whereNull('bukti_pembayaran')->whereNull('foto_ktp')->get();

        return view('admins/dashboard/belum', compact('title', 'orders'));
    }

    public function sudah()
    {
        $title = "Sudah";
        $orders = Order::whereNotNull('bukti_pembayaran')->whereNotNull('foto_ktp')->where('status_konfirmasi', 0)->get();

        return view('admins/dashboard/sudah', compact('title', 'orders'));
    }

    public function kembali()
    {
        $title = "Pengembalian";
        $orders = Order::where('status_konfirmasi', 1)->where('status_kembali', 0)->get();

        return view('admins/dashboard/kembali', compact('title', 'orders'));
    }


    public function sukses()
    {
        $title = "Order Selesai";
        $orders = Order::where('status_kembali', 1)->get();

        return view('admins/dashboard/sukses', compact('title', 'orders'));
    }



    public function delete(Request $request)
    {
        $data = $request->input('id_order');
        $kendaraan = $request->input('id_kendaraan');

        $kendaraans = explode(',', $kendaraan);

        foreach ($kendaraans as $k) {
            Kendaraan::where('id', $k)->update(array('available_status' => '1'));
        }

        Order::where('id', $data)->delete();

        return redirect('/admin/belum');
    }

    public function confirm(Request $request)
    {
        $data = $request->input('id_order');

        Order::where('id', $data)->update(array('status_konfirmasi' => '1'));

        return redirect('/admin/sudah');
    }

    public function kendaraan()
    {
        $title = "Kendaraan";
        $kendaraans = Kendaraan::all();

        return view('admins/dashboard/kendaraan', compact('title', 'kendaraans'));
    }

    public function jenis_kendaraan()
    {
        $title = "Jenis Kendaraan";
        $jenis_kendaraans = JenisKendaraan::all();

        return view('admins/dashboard/jenis_kendaraan', compact('title', 'jenis_kendaraans'));
    }

    public function detail($id)
    {

        $title = "Detail Kendaraan";
        $kendaraans = Kendaraan::where('id', $id)->get();

        return view('admins/dashboard/detail', compact('title', 'kendaraans'));
    }

    public function user()
    {
        $title = "User";
        $users = User::where('is_admin', '0')->get();

        return view('admins/dashboard/user', compact('title', 'users'));
    }

    public function tambah()
    {
        $title = "Form Tambah";
        $jenis_kendaraan = JenisKendaraan::all();

        return view('admins/dashboard/tambah', compact('title', 'jenis_kendaraan'));
    }

    public function tambah_kendaraan(Request $request)
    {
        $data = ([
            'jenis_kendaraan_id' => $request->input('jenis_kendaraan'),
            'plat' => $request->input('plat'),
            'warna' => $request->input('warna'),
            'nomor_stnk' => $request->input('stnk'),
            'harga_sewa' => $request->input('harga'),
            'tahun_rakitan' => $request->input('tahun')
        ]);

        Kendaraan::create($data);

        $kendaraan = Kendaraan::latest()->first();

        $foto = ([
            'kendaraan_id' => $kendaraan->id,
            'tampak_depan' => $request->file('foto_depan')->store('detail-images'),
            'tampak_belakang' => $request->file('foto_belakang')->store('detail-images'),
            'tampak_samping' => $request->file('foto_samping')->store('detail-images'),
            'tampak_dalam' => $request->file('foto_dalam')->store('detail-images')
        ]);

        DetailKendaraan::create($foto);

        $detail =  DetailKendaraan::latest()->first();

        Kendaraan::where('id', $kendaraan->id)->update(array('detail_kendaraan_id' => $detail->id));

        return redirect('/admin/kendaraan');
    }

    public function pengembalian(Request $request)
    {
        $data = $request->input('id_kendaraan');

        $id = $request->input('id_order');

        $kendaraan = explode(',', $data);

        foreach ($kendaraan as $k) {
            Kendaraan::where('id', $k)->update(array('available_status' => 1));
        }

        Order::where('id', $id)->update(array('status_kembali' => 1));

        return redirect('/admin/kembali');
    }

    public function mengedit($id)
    {
        $title = 'Edit Kendaraan';

        $kendaraans = Kendaraan::where('id', $id)->get();

        $jenis_kendaraans = JenisKendaraan::all();


        return view('admins/dashboard/edit', compact('title', 'kendaraans', 'jenis_kendaraans'));
    }

    public function edit(Request $request)
    {

        $id = $request->input('kendaraan_id');

        $kendaraan = ([
            'jenis_kendaraan_id' => $request->input('jenis_kendaraan'),
            'plat' => $request->input('plat'),
            'warna' => $request->input('warna'),
            'nomor_stnk' => $request->input('stnk'),
            'harga_sewa' => $request->input('harga'),
            'tahun_rakitan' => $request->input('tahun')
        ]);

        $detailold = ([
            'tampak_depan' => $request->input('old-depan'),
            'tampak_samping' => $request->input('old-samping'),
            'tampak_belakang' => $request->input('old-belakang'),
            'tampak_dalam' => $request->input('old-dalam')
        ]);

        if ($request->file('foto_depan')) {
            Storage::delete($detailold['tampak_depan']);
        }
        if ($request->file('foto_samping')) {
            Storage::delete($detailold['tampak_samping']);
        }
        if ($request->file('foto_belakang')) {
            Storage::delete($detailold['tampak_belakang']);
        }
        if ($request->file('foto_dalam')) {
            Storage::delete($detailold['tampak_dalam']);
        }

        $detailnew = ([
            'tampak_depan' => $request->file('foto_depan') == null ? $detailold['tampak_depan'] : $request->file('foto_depan')->store('detail-images'),
            'tampak_samping' => $request->file('foto_samping')  == null ? $detailold['tampak_samping'] : $request->file('foto_samping')->store('detail-images'),
            'tampak_belakang' => $request->file('foto_belakang') == null ? $detailold['tampak_belakang'] : $request->file('foto_belakang')->store('detail-images'),
            'tampak_dalam' => $request->file('foto_dalam') == null ? $detailold['tampak_dalam'] : $request->file('foto_dalam')->store('detail-images')
        ]);

        DetailKendaraan::where('kendaraan_id', $id)->update(array('tampak_depan' => $detailnew['tampak_depan'], 'tampak_samping' =>  $detailnew['tampak_samping'], 'tampak_belakang' => $detailnew['tampak_belakang'], 'tampak_dalam' => $detailnew['tampak_dalam']));

        Kendaraan::where('id', $id)->update(array('jenis_kendaraan_id' => $kendaraan['jenis_kendaraan_id'], 'plat' => $kendaraan['plat'], 'warna' => $kendaraan['warna'], 'nomor_stnk' => $kendaraan['nomor_stnk'], 'harga_sewa' => $kendaraan['harga_sewa'], 'tahun_rakitan' => $kendaraan['tahun_rakitan']));

        return redirect('/admin/kendaraan');
    }

    public function delete_kendaraan(Request $request)
    {
        $id = $request->input('kendaraan_id');

        $kendaraan =   Kendaraan::where('id', $id)->first();
        Storage::delete($kendaraan->detailKendaraan->tampak_depan);
        Storage::delete($kendaraan->detailKendaraan->tampak_belakang);
        Storage::delete($kendaraan->detailKendaraan->tampak_samping);
        Storage::delete($kendaraan->detailKendaraan->tampak_dalam);
        Kendaraan::where('id', $id)->delete();
        DetailKendaraan::where('kendaraan_id', $id)->delete();

        return redirect('/admin/kendaraan');
    }

    public function delete_user(Request $request)
    {
        $id = $request->input('id_user');

        $user =  User::where('id', $id)->first();

        if ($user->foto_profile != 'foto-profile-images/profile_default.png') {
            User::where('id', $id)->delete();
            Storage::delete($user->foto_profile);
        } else {
            User::where('id', $id)->delete();
        }
        return redirect('/admin/user');
    }

    public function tambah_jenis_kendaraan()
    {

        $title = "Form Tambah";

        return view('admins/dashboard/tambah_jenis_kendaraan', compact('title'));
    }

    public function tambah_jenis(Request $request)
    {
        $data = ([
            'tipe' => $request->input('tipe'),
            'merek' => $request->input('merek'),
            'cc' => $request->input('cc'),
            'kapasitas' => $request->input('kapasitas')
        ]);

        JenisKendaraan::create($data);

        return redirect('/admin/jenis-kendaraan');
    }

    public function delete_jenis(Request $request)
    {
        $id = $request->input('jenis_kendaraan_id');

        JenisKendaraan::where('id', $id)->delete();

        return redirect('/admin/jenis-kendaraan');
    }

    public function delete_order(Request $request)
    {
        $id = $request->input('id_order');

        $order = Order::where('id', $id)->first();

        Order::where('id', $id)->update(array('bukti_pembayaran' => null, 'foto_ktp' => null));

        Storage::delete($order->bukti_pembayaran);
        Storage::delete($order->foto_ktp);

        return redirect()->back();
    }
}
