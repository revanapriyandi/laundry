<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Support\Facades\Http;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Contracts\Queue\ShouldBeUnique;

class KonfirmasiStatusWhatsapp implements ShouldQueue
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
        $res = $this->sendWaKonfirmasi($this->data);


        while ($res['success'] === 'false' || !$res['success']) {
            $res = $this->sendWaKonfirmasi($this->data);
        }
    }

    public function sendWaKonfirmasi($data)
    {
        $base_url = config('services.whatsapp.base_url');
        $body = 'Halo, ' . $data->pelanggan->name . ',

Laundrymu sudah kami terima dan akan menghubungi kamu jika sudah selesai.

Terima Kasih';
        $res = Http::post($base_url . '/chats/send?id=laundryapp', [
            'receiver' => $data->pelanggan->formatPhoneNumber(),
            'message' => ['text' => $body]
        ]);

        return $res->json();
    }
}
