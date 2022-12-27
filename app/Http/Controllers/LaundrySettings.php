<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\NotifikasiSetting;
use Illuminate\Support\Facades\Http;
use App\Models\LaundrySettings as ModelsLaundrySettings;

class LaundrySettings extends Controller
{
    public function __construct()
    {
        $this->base_url = 'https://whale-app-ramq7.ondigitalocean.app';
    }

    public function index()
    {

        return view('settings.index', [
            "setting" => ModelsLaundrySettings::first(),
            'notifikasi' => NotifikasiSetting::all(),
        ]);
    }

    public function update(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'alamat' => ['required', 'string', 'max:255'],
            'no_telp' => ['required', 'string', 'max:255'],
        ]);

        $setting = ModelsLaundrySettings::first();
        $setting->update([
            'name' => $request->name,
            'alamat' => $request->alamat,
            'no_telp' => $request->no_telp,
            'TELEGRAM_BOT_TOKEN' => $request->TELEGRAM_BOT_TOKEN,
            'TELEGRAM_ID_CHANEL' => $request->TELEGRAM_ID_CHANEL
        ]);

        return redirect()->route('settings.index')->with('success', 'Berhasil mengubah data');
    }

    public function updateNotifikasi(Request $request)
    {

        $setting = ModelsLaundrySettings::find($request->id);
        if ($request->type == 'whatsapp') {
            $setting->update([
                'whatsapp_notification' => $setting->whatsapp_notification == true ? false : true,
            ]);
        } elseif ($request->type == 'telegram') {
            $setting->update([
                'telegram_notification' => $setting->telegram_notification == true ? false : true,
            ]);
        }

        return response()->json([
            'success' => 'Berhasil mengubah status notifikasi',
        ]);
    }

    public function statusNotifkasi(Request $request)
    {
        $notif = NotifikasiSetting::find($request->id);
        if ($request->type == 'email') {
            $notif->update([
                'email' => $notif->email == true ? false : true,
            ]);
        } elseif ($request->type == 'telegram') {
            $notif->update([
                'telegram' => $notif->telegram == true ? false : true,
            ]);
        } else if ($request->type == 'whatsapp') {
            $notif->update([
                'whatsapp' => $notif->whatsapp == true ? false : true,
            ]);
        }

        return response()->json([
            'success' => 'Berhasil mengubah status notifikasi',
        ]);
    }
}
