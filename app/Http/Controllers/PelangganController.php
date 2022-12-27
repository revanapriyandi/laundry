<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Jobs\NewPengguna;
use App\Jobs\NewPenggunaWhatsapp;
use Illuminate\Http\Request;
use App\Models\LaundrySettings;
use App\Models\NotifikasiSetting;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;

class PelangganController extends Controller
{


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::select('id', 'name', 'phone', 'email', 'is_active', 'profile_photo_path', 'created_at')->get();
        return view('pelanggan.index', compact('users'));
    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validateWithBag('addPelanggan', [
            'nama' => ['required', 'string', 'max:255'],
            'alamat' => ['nullable', 'string', 'max:255'],
            'phone' => ['required', 'string', 'max:16', 'unique:users,phone', 'min:10'],
            'email' => ['nullable', 'string', 'email', 'max:255', 'unique:users,email'],
        ]);

        $user = User::create([
            'name' => $request->nama,
            'email' => $request->email,
            'phone' => $request->phone,
            'password' => Hash::make('default'),
            'role' => 'pelanggan',
            'is_active' => 1,
            'address' => $request->alamat,
        ]);
        $setting = LaundrySettings::first();
        $notif = NotifikasiSetting::where('id', '1')->first();

        if ($setting->whatsapp_notification == true && $notif->whatsapp == true) {
            // $res = $this->sendWhatsapp($user, $setting);

            // while ($res['success'] === 'false' || !$res['success']) {
            //     $res = $this->sendWhatsapp($user, $setting);
            // }
            dispatch(new NewPenggunaWhatsapp($user));
        }

        if ($setting->telegram_notification == true && $notif->telegram == true) {
            dispatch(new NewPengguna($user));
        }

        return redirect()->route('pelanggan.index')->with('success', 'Pelanggan berhasil ditambahkan');
    }

    public function sendWhatsapp($user, $setting)
    {
        $base_url = config('services.whatsapp.base_url');

        $body = 'Halo, ' . $user->name . ',

Selamat bergabung di ' . $setting->name . ' ya!. Jam kerja toko kami setiap hari lo, mulai jam 08.00 - 17.00 WIB, kami tunggu orderannya ya!

Terima Kasih';
        $res = Http::post($base_url . '/chats/send?id=laundryapp', [
            'receiver' => $user->formatPhoneNumber(),
            'message' => ['text' => $body]
        ]);

        $res->json();

        return $res;
    }

    public function statusActive($id)
    {
        $user = User::find($id);
        if ($user->is_active == true) {
            $user->is_active = false;
            $user->save();
        } else {
            $user->is_active = true;
            $user->save();
        }

        return redirect()->route('pelanggan.index')->with('success', 'Status pelanggan berhasil diubah');
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::findOrFail($id);

        return view('pelanggan.comp.edit-data', compact('user'));
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
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'alamat' => ['nullable', 'string', 'max:255'],
            'phone' => ['required', 'string', 'max:16', 'min:10', 'unique:users,phone,' . $id],
            'email' => ['nullable', 'string', 'email', 'max:255', 'unique:users,email,' . $id],
            'role' => ['required', 'string'],
        ]);

        $user = User::findOrFail($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->role = $request->role;
        $user->address = $request->alamat;
        $user->save();

        return redirect()->route('pelanggan.edit', $user->id)->with('success', 'Data pelanggan berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        if ($user->id == auth()->user()->id) {
            return redirect()->route('pelanggan.index')->with('error', 'Data pelanggan gagal dihapus');
        } else {
            $user->delete();
        }

        return redirect()->route('pelanggan.index')->with('success', 'Data pelanggan berhasil dihapus');
    }
}
