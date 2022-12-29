<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use App\Channels\WhatsAppChannel;
use App\Channels\Messages\WhatsAppMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class PerubahanStatusWhatsapp extends Notification
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
        return [WhatsAppChannel::class];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toWhatsApp($notifiable)
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
        return (new WhatsAppMessage)
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
