<?php

namespace Database\Seeders;

use App\Models\NotifikasiSetting;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class NotifikasiSettings extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        NotifikasiSetting::create([
            'nama' => 'Pemberitahuan Pelanggan Baru',
            'email' => true,
            'telegram' => true,
            'whatsapp' => true,
        ]);

        NotifikasiSetting::create([
            'nama' => 'Pemberitahuan Pesanan Baru',
            'email' => true,
            'telegram' => true,
            'whatsapp' => true,
        ]);

        NotifikasiSetting::create([
            'nama' => 'Pemberitahuan Perubahan Status Pesanan',
            'email' => true,
            'telegram' => true,
            'whatsapp' => true,
        ]);
    }
}
