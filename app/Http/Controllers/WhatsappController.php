<?php

namespace App\Http\Controllers;

use App\Models\LaundrySettings;
use App\Models\NotifikasiSetting;
use Illuminate\Support\Facades\Http;

class WhatsappController extends Controller
{

    public function __construct()
    {
        $this->base_url = config('services.whatsapp.base_url');
    }

    public function index()
    {
        $data = $this->whatsapp();

        return view('settings.whatsapp', [
            "setting" => LaundrySettings::first(),
            'notifikasi' => NotifikasiSetting::all(),
            'image' => $data['image'],
            'cek' => $data['cek']
        ]);
    }

    public function disconnect()
    {
        $res = Http::delete($this->base_url . '/sessions/delete/laundryapp');
        // $curl = curl_init();

        // curl_setopt_array($curl, array(
        //     CURLOPT_URL => $this->base_url . '/sessions/delete/laundryapp',
        //     CURLOPT_RETURNTRANSFER => true,
        //     CURLOPT_ENCODING => '',
        //     CURLOPT_MAXREDIRS => 10,
        //     CURLOPT_TIMEOUT => 0,
        //     CURLOPT_FOLLOWLOCATION => true,
        //     CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        //     CURLOPT_CUSTOMREQUEST => 'DELETE',
        // ));

        // $response = curl_exec($curl);

        // curl_close($curl);
        while ($res['success'] === 'false' || !$res['success']) {
            $res = Http::delete(env('URL_WA_SERVER') . '/sessions/delete/laundryapp');
        }
        return redirect()->back()->with('success', 'Berhasil Disconnect Whatsapp');
    }

    public function whatsapp()
    {
        $find = Http::get($this->base_url . '/sessions/find/laundryapp')->json();

        $cek = $find;
        $image = '';

        if ($cek['message'] == 'Session not found.' &&  $cek['success'] == 'false') {
            $response = Http::post($this->base_url . '/sessions/add', ['id' => 'laundryapp', 'isLegacy' => 'false'])->json();
            $res = $response;

            $image = $res['data']['qr'];
        }

        return $data = [
            'image' => $image,
            'cek' => $cek
        ];
    }
}
