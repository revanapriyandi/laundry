<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Support\Facades\Http;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Contracts\Queue\ShouldBeUnique;

class PerubahanStatusWhatsapp implements ShouldQueue
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
        $res = $this->sendStatusWa($this->data);

        while ($res['success'] === 'false' || !$res['success']) {
            $res = $this->sendStatusWa($this->data);
        }
    }

    public function sendStatusWa($data)
    {
        $base_url = config('services.whatsapp.base_url');
        $body = 'Halo, ' . $data->pelanggan->name . ',

Status pesananmu sudah berubah menjadi ' . strtoupper($data->status);
        if ($data->status == 'siap_diambil') {
            $body .= ' dan sudah bisa diambil, kami tunggu kedatangan kamu ya.';
        } else if ($data->status == 'selesai') {
            $body .= 'Gimana laundrymu? Semoga puas ya. Terima kasih sudah menggunakan jasa kami. Semoga laundrymu selalu bersih dan rapi. Jangan lupa untuk memberikan rating ya.';
        } else if ($data->status == 'batal') {
            $body .= 'Maaf ya, kami tidak bisa menerima pesananmu. Kami tunggu kedatangan kamu ya. Terima kasih sudah menggunakan jasa kami. Semoga laundrymu selalu bersih dan rapi. Jangan lupa untuk memberikan rating ya. ';
        }
        $body .= '

Terima Kasih';
        $res = Http::post($base_url . '/chats/send?id=laundryapp', [
            'receiver' => $data->pelanggan->formatPhoneNumber(),
            'message' => ['text' => $body]
        ]);

        return $res->json();
    }
}
