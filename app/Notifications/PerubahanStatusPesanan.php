<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use App\Models\LaundrySettings;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use NotificationChannels\Telegram\TelegramMessage;

class PerubahanStatusPesanan extends Notification
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
        $body = 'Halo, ' . $notifiable->pelanggan->name . ',

Status pesananmu sudah berubah menjadi ' . strtoupper($notifiable->status);
        if ($notifiable->status == 'siap_diambil') {
            $body .= ' dan sudah bisa diambil, kami tunggu kedatangan kamu ya.';
        } else if ($notifiable->status == 'selesai') {
            $body .= ' Gimana laundrymu? Semoga puas ya. Terima kasih sudah menggunakan jasa kami. Semoga laundrymu selalu bersih dan rapi. Jangan lupa untuk memberikan rating ya.';
        } else if ($notifiable->status == 'batal') {
            $body .= ' Maaf ya, kami tidak bisa menerima pesananmu. Kami tunggu kedatangan kamu ya. Terima kasih sudah menggunakan jasa kami. Semoga laundrymu selalu bersih dan rapi. Jangan lupa untuk memberikan rating ya. ';
        }
        $body .= '

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
