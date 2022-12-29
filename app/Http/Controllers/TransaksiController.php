<?php

namespace App\Http\Controllers;

use DateTime;
use App\Models\User;
use App\Models\Layanan;
use App\Models\Pesanan;
use App\Models\PesananItem;
use Illuminate\Http\Request;
use App\Models\LaundrySettings;
use App\Models\NotifikasiSetting;
use App\Notifications\NewPesanan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use App\Notifications\NewPesananWhatsapp;
use Illuminate\Support\Facades\Notification;
use App\Notifications\PerubahanStatusPesanan;
use App\Notifications\PerubahanStatusWhatsapp;
use App\Notifications\KonfirmasiStatusWhatsapp;
use App\Notifications\NewPesananWhatsapp as NotificationsNewPesananWhatsapp;

class TransaksiController extends Controller
{
    public function __construct()
    {
        $this->base_url = config('services.whatsapp.base_url');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (auth()->user()->role == 'admin') {
            $data = Pesanan::all();
        } else {
            $data = Pesanan::where('user_id', auth()->user()->id)->get();
        }
        return view('pesanan.index', [
            'data' => $data,
            'layanan' => Layanan::all(),
            'user' => User::where('is_active', true)->where('role', 'pelanggan')->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pesanan.create', [
            'layanan' => Layanan::all(),
            'user' => User::where('is_active', true)->where('role', 'pelanggan')->get(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validateWithBag('buatPesanan', [
            'pelanggan' => ['required', 'exists:users,id', 'integer'],
            'jenis_layanan' => ['required', 'exists:layanans,id', 'integer'],
            'berat' => ['required', 'string'],
            'catatan' => ['nullable', 'string'],
            'tanggal_dipesan' => ['required'],
        ]);


        $layanan = Layanan::find($request->jenis_layanan);
        $total = $request->berat * $layanan->harga;
        $kode = 'INV-' . date('mdY') . '-' . mt_rand(1000, 9999);
        $date = new DateTime($request->tanggal_dipesan);
        $date_plus = $date->modify("+1 days");
        $estimasi = $date_plus->format("Y-m-d H:i");


        $data = Pesanan::create([
            'kode_unik' => $kode,
            'user_id' => $request->pelanggan,
            'berat' => $request->berat,
            'status' => 'pending',
            'total' => $total,
            'tanggal_dipesan' => $request->tanggal_dipesan,
            'estimasi_selesai' => $estimasi
        ]);

        $item = PesananItem::create([
            'pesanan_id' => $data->id,
            'layanan_id' => $request->jenis_layanan,
            'berat' => $request->berat,
            'total' => $total,
            'catatan' => $request->catatan,
        ]);
        $setting = LaundrySettings::first();
        $notif = NotifikasiSetting::where('id', '2')->first();

        if ($setting->whatsapp_notification == true && $notif->whatsapp == true) {
            // $res = $this->sendNotaWhatsapp($data, $item);

            // while ($res['success'] === 'false' || !$res['success']) {
            //     $res = $this->sendNotaWhatsapp($data, $item);
            // }
            // dispatch(new NewPesananWhatsapp($data));
            Notification::send($data, new NewPesananWhatsapp($data));
        }

        if ($setting->telegram_notification == true && $notif->telegram == true) {
            // dispatch(new NewPesanan($data));
            Notification::send($data, new NewPesanan($data));
        }
        return redirect()->route('pesanan.konfirmasi', $data->id);
    }



    public function store1(Request $request)
    {
        $request->validateWithBag('buatPesanan', [
            '__id' => ['required', 'exists:pesanans,id', 'integer'],
            'pelanggan' => ['required', 'exists:users,id', 'integer'],
            'jenis_layanan' => ['required', 'exists:layanans,id', 'integer'],
            'berat' => ['required', 'string'],
            'catatan' => ['nullable', 'string'],
            'tanggal_dipesan' => ['required'],
        ]);


        $layanan = Layanan::find($request->jenis_layanan);
        $total = $request->berat * $layanan->harga;
        $date = new DateTime($request->tanggal_dipesan);
        $date_plus = $date->modify("+1 days");

        $data = Pesanan::find($request->__id);

        $item = PesananItem::create([
            'pesanan_id' => $data->id,
            'layanan_id' => $request->jenis_layanan,
            'berat' => $request->berat,
            'total' => $total,
            'catatan' => $request->catatan,
        ]);
        $subtotal = $item->total + $data->total;
        $subberat = $item->berat + $data->berat;

        $data->update([
            'berat' => $subberat,
            'total' => $subtotal,
        ]);


        return redirect()->route('pesanan.konfirmasi', $data->id);
    }

    public function konfirmasi($id)
    {
        $data = Pesanan::find($id);
        return view('pesanan.confirmation', [
            'data' => $data,
            'layanan' => Layanan::all(),
        ]);
    }

    public function updateStatus($id)
    {
        $data = Pesanan::find($id);
        $data->update([
            'status' => 'diterima',
        ]);
        $setting = LaundrySettings::first();
        $notif = NotifikasiSetting::where('id', '3')->first();
        if ($setting->whatsapp_notification == true || $notif->whatsapp == true) {
            // $res = $this->sendWaKonfirmasi($data);


            // while ($res['success'] === 'false' || !$res['success']) {
            //     $res = $this->sendWaKonfirmasi($data);
            // }
            // dispatch(new KonfirmasiStatusWhatsapp($data));
            Notification::send($data, new KonfirmasiStatusWhatsapp($data));
        }

        if ($setting->telegram_notification == true && $notif->telegram == true) {
            // dispatch(new PerubahanStatus($data));
            Notification::send($data, new PerubahanStatusPesanan($data));
        }
        return redirect()->route('pesanan.index')->with('success', 'Pesanan berhasil dibuat');
    }



    public function statusChange($id)
    {
        $data = Pesanan::find($id);


        return view('pesanan.changeStatus', [
            'item' => $data,
        ]);
    }


    public function statusChangeStore(Request $request, $id)
    {
        $request->validateWithBag('statusPesananBag', [
            'statusPesanan' => ['required', 'string']
        ]);

        $data = Pesanan::find($id);
        $data->update([
            'status' => $request->statusPesanan,
        ]);

        $setting = LaundrySettings::first();
        $notif = NotifikasiSetting::where('id', '3')->first();

        if ($setting->whatsapp_notification == true || $notif->whatsapp == true) {
            // dispatch(new PerubahanStatusWhatsapp($data));
            Notification::send($data, new PerubahanStatusWhatsapp($data));
            if ($data->status == 'selesai') {
                // dispatch(new NewPesananWhatsapp($data));
                Notification::send($data, new NewPesananWhatsapp($data));
            }
        }

        if ($setting->telegram_notification == true && $notif->telegram == true) {
            // dispatch(new PerubahanStatus($data));
            Notification::send($data, new PerubahanStatusPesanan($data));
        }

        return redirect()->route('pesanan.index')->with('success', 'Status pesanan berhasil diubah');
    }

    public function hapusItem($id)
    {
        $data = PesananItem::find($id);
        $pesanan = Pesanan::find($data->pesanan_id);
        $subtotal = $pesanan->total - $data->total;
        $subberat = $pesanan->berat - $data->berat;

        $pesanan->update([
            'berat' => $subberat,
            'total' => $subtotal,
        ]);

        $data->delete();

        return redirect()->route('pesanan.konfirmasi', $pesanan->id);
    }

    public function cancelPesanan($id)
    {
        $data = Pesanan::find($id);
        $data->update([
            'status' => 'batal',
        ]);

        return redirect()->route('pesanan.index')->with('success', 'Pesanan berhasil dibatalkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Pesanan::find($id);
        return view('pesanan.show', [
            'data' => $data,
            'layanan' => Layanan::all(),
        ]);
    }

    public function invoices($id)
    {
        $data = Pesanan::find($id);
        if ($data->pelanggan->id == Auth::user()->id) {
            return view('pesanan.invoice', [
                'data' => $data,
                'layanan' => Layanan::all(),
            ]);
        }
        return abort(202, 'Anda tidak memiliki akses ke halaman ini');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
