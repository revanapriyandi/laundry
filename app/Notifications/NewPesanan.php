<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use App\Models\LaundrySettings;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use NotificationChannels\Telegram\TelegramMessage;

class NewPesanan extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['telegram'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toTelegram($notifiable)
    {
        $setting = LaundrySettings::first();

        $body = 'Halo, ' . $notifiable->pelanggan->name . ',

' . $setting->name . '
' . $setting->alamat . '


No. Nota:
' . $notifiable->kode_unik . '

Pelanggan:
' . $notifiable->pelanggan->name . '
---------------------------------------------------------------
Rincian pesanan:

' . $notifiable->items[0]->name . '
';
        foreach ($notifiable->items as $key => $value) {
            $body .= $value->berat . ' kg x' . $value->layanan->harga . ' = ' . 'Rp. ' . number_format($value->total, 0, ',', '.') . "\n\r";
        }
        $body .= '

---------------------------------------------------------------
Subtotal          = ' . 'Rp. ' . number_format($notifiable->total, 0, ',', '.') . '
Diskon             = Rp 0
Total              = ' . 'Rp. ' . number_format($notifiable->total, 0, ',', '.') . '

Status:
' . strtoupper($notifiable->status) . '
---------------------------------------------------------------
--- Estimasi selesai ---
' . date('d F Y H:i', strtotime($notifiable->estimasi_selesai)) . '

Lihat status pesanan secara realtime disitus kamis
' . config('app.url') . '/pesanan/' . $notifiable->id . '

Terima Kasih';
        $setting = LaundrySettings::first();
        return TelegramMessage::create()
            ->to($setting->TELEGRAM_ID_CHANEL)
            ->content($body);
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
