<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use App\Models\LaundrySettings;
use App\Channels\WhatsAppChannel;
use App\Channels\Messages\WhatsAppMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class NewPenggunaWhatsapp extends Notification
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
        $setting = LaundrySettings::first();
        $body = 'Halo, ' . $notifiable->name . ',

Selamat bergabung di ' . $setting->name . ' ya!. Jam kerja toko kami setiap hari lo, mulai jam 08.00 - 17.00 WIB, kami tunggu orderannya ya!

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
