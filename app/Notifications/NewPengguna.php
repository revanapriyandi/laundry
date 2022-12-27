<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use App\Models\LaundrySettings;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use NotificationChannels\Telegram\TelegramMessage;

class NewPengguna extends Notification
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
        return TelegramMessage::create()
            ->to($setting->TELEGRAM_ID_CHANEL)
            ->content('Halo, ' . $notifiable->name . ' telah terdaftar sebagai pengguna baru di aplikasi ' . config('app.name') . '. Silahkan login untuk melanjutkan. ')
            ->line('Terima kasih telah menggunakan aplikasi ' . config('app.name') . '.')
            ->line('Jika ada pertanyaan, silahkan hubungi kami di ' . $setting->TELEGRAM_ID_CHANEL . '.');
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
