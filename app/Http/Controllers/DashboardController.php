<?php

namespace App\Http\Controllers;

use App\Models\DetailKendaraan;
use App\Models\User;
use App\Models\Order;
use App\Models\Kendaraan;
use Illuminate\Http\Request;
use App\Models\OrderKendaraan;
use Illuminate\Support\Facades\Auth;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

class DashboardController extends Controller
{

    public function home()
    {
        $title = 'Home';
        $kendaraans = Kendaraan::where('available_status', '1')->simplePaginate(3)->withQueryString();

        return view('users/dashboard/home', compact('title', 'kendaraans'));
    }

    public function index()
    {
        $title = 'Dashboard';
        $kendaraans = Kendaraan::where('available_status', 1)->simplePaginate(3)->withQueryString();
        $order_kendaraans = OrderKendaraan::where('user_id', auth()->user()->id)->get();
        $orders = Order::all();
        $users = User::where('id', auth()->user()->id)->first();
        if ($users->is_admin == "0") {
            return view('users/dashboard/index', compact('title', 'kendaraans', 'order_kendaraans'));
        } else {
            return redirect('/admin');
        }
    }

    public function select(Request $request)
    {
        $data = ([
            'user_id' => $request->input('user_id'),
            'kendaraan_id' => $request->input('kendaraan_id'),
        ]);

        Kendaraan::where('id', $data['kendaraan_id'])->update(array('available_status' => '0'));

        OrderKendaraan::create($data);

        return redirect('/dashboard');
    }

    public function order()
    {
        return redirect('/order');
    }

    public function cancel(Request $request)
    {

        $data = $request->input('kendaraan_id');

        OrderKendaraan::where('kendaraan_id', $data)->delete();

        Kendaraan::where('id', $data)->update(array('available_status' => '1'));

        return redirect('/dashboard');
    }

    public function detail($id)
    {
        $title = "Detail";

        $kendaraans = Kendaraan::where('id', $id)->get();

        return view('users/dashboard/detail', compact('title', 'kendaraans'));
    }

    public function detail_guest($id)
    {
        $title = "Detail";

        $kendaraans = Kendaraan::where('id', $id)->get();

        return view('users/dashboard/detail-guest', compact('title', 'kendaraans'));
    }

    public function profile()
    {
        $title = "Profile";

        $users = User::where('id', auth()->user()->id)->get();

        return view('users/dashboard/profile', compact('title', 'users'));
    }

    public function edit_profile()
    {

        $title = "Edit Profile";
        return view('users/dashboard/edit-profile', compact('title'));
    }

    public function save_profile(Request $request)
    {
        if ($request->file('foto') == null) {
            $data = ([
                'name' => $request->input('nama'),
                'alamat' => $request->input('alamat'),
                'email' => $request->input('email')
            ]);

            User::where('id', auth()->user()->id)->update(array('name' => $data['name'], 'alamat' => $data['alamat'], 'email' => $data['email']));
        } else {
            $data = ([
                'name' => $request->input('nama'),
                'alamat' => $request->input('alamat'),
                'email' => $request->input('email'),
                'foto' => $request->file('foto')->store('foto-profile-images')
            ]);

            User::where('id', auth()->user()->id)->update(array('name' => $data['name'], 'alamat' => $data['alamat'], 'email' => $data['email'], 'foto_profile' => $data['foto']));
        }
        return redirect('/dashboard/profile');
    }
}
