<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use App\Models\LaundrySettings;
use Illuminate\Support\Facades\Http;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Contracts\Queue\ShouldBeUnique;

class NewPenggunaWhatsapp implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public $data;
    public function __construct($data)
    {
        $this->data = $data;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $res = $this->sendWhatsapp($this->data);

        while ($res['success'] === 'false' || !$res['success']) {
            $res = $this->sendWhatsapp($this->data);
        }
    }

    public function sendWhatsapp($user)
    {
        $setting = LaundrySettings::first();
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
}
