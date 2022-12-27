<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Layanan;
use App\Models\Pesanan;
use Illuminate\Http\Request;
use NotificationChannels\Telegram\TelegramUpdates;

class DashboardController extends Controller
{
    public function index()
    {
        $laundry = Pesanan::all();
        $layananan = Layanan::all();

        $pendapatan_tahun_ini = $laundry->where('status', 'selesai')->where('created_at', '>=', date('Y-01-01'))->where('created_at', '<=', date('Y-12-31'))->sum('total');
        $pendapatan_tahun_lalu = $laundry->where('status', 'selesai')->where('created_at', '>=', date('Y-01-01', strtotime('-1 year')))->where('created_at', '<=', date('Y-12-31', strtotime('-1 year')))->sum('total');

        $pendapatan_bulan_ini = $laundry->where('status', 'selesai')->where('created_at', '>=', date('Y-m-01'))->where('created_at', '<=', date('Y-m-t'))->sum('total');

        $pendapatan_hari_ini = $laundry->where('status', 'selesai')->where('created_at', '>=', date('Y-m-d'))->sum('total');

        $pendapatan_kemarin = $laundry->where('status', 'selesai')->where('created_at', '<=', date('Y-m-d', strtotime('-1 day')))->sum('total');

        $penjualan_sesuai_bulan = $laundry->where('status', 'selesai')->groupBy(function ($date) {
            return \Carbon\Carbon::parse($date->created_at)->format('m'); // grouping by months
        });
        $penjualan_sesuai_bulan->toArray();

        return view('dashboard', [
            'users' => User::all(),
            'laundry' => $laundry,
            'layananan' => $layananan,
            'pendapatan_tahun_ini' => $pendapatan_tahun_ini,
            'pendapatan_tahun_lalu' => $pendapatan_tahun_lalu,
            'pendapatan_bulan_ini' => $pendapatan_bulan_ini,
            'pendapatan_hari_ini' => $pendapatan_hari_ini,
            'pendapatan_kemarin' => $pendapatan_kemarin,
            'layanan' => Layanan::all(),
            'data' => Pesanan::all()
        ]);
    }
}
