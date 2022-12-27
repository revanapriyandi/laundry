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

class NewPesananWhatsapp implements ShouldQueue
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
        $res = $this->whatsapp($this->data);

        while ($res['success'] === 'false' || !$res['success']) {
            $res = $this->whatsapp($this->data);
        }
    }

    public function whatsapp($data)
    {
        $setting = LaundrySettings::first();
        $base_url = config('services.whatsapp.base_url');

        $body = 'Halo, ' . $data->pelanggan->name . ',

' . $setting->name . '
' . $setting->alamat . '


No. Nota:
' . $data->kode_unik . '

Pelanggan:
' . $data->pelanggan->name . '
---------------------------------------------------------------
Rincian pesanan:

' . $data->items[0]->name . '
';
        foreach ($data->items as $key => $value) {
            $body .= $value->berat . ' kg x' . $value->layanan->harga . ' = ' . 'Rp. ' . number_format($value->total, 0, ',', '.');
        }
        $body .= '

---------------------------------------------------------------
Subtotal          = ' . 'Rp. ' . number_format($data->total, 0, ',', '.') . '
Diskon             = Rp 0
Total              = ' . 'Rp. ' . number_format($data->total, 0, ',', '.') . '

Status:
' . strtoupper($data->status) . '
---------------------------------------------------------------
--- Estimasi selesai ---
' . date('d F Y H:i', strtotime($data->estimasi_selesai)) . '

Lihat status pesanan secara realtime disitus kamis
' . config('app.url') . '/pesanan/' . $data->id . '

Terima Kasih';
        $res = Http::post($base_url . '/chats/send?id=laundryapp', [
            'receiver' => $data->pelanggan->formatPhoneNumber(),
            'message' => ['text' => $body]
        ]);

        return $res->json();
    }
}
