<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use App\Channels\WhatsAppChannel;
use Illuminate\Support\Facades\Http;
use App\Channels\Messages\WhatsAppMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class KonfirmasiStatusWhatsapp extends Notification
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
        // $res = $this->sendWaKonfirmasi($notifiable);

        // while ($res['success'] === 'false' || !$res['success']) {
        //     $res = $this->sendWaKonfirmasi($notifiable);
        // }

        // return $res;
        $body = 'Halo, ' . $notifiable->pelanggan->name . ',

        Laundrymu sudah kami terima dan akan menghubungi kamu jika sudah selesai.

        Terima Kasih';

        return (new WhatsAppMessage)
            ->content($body);
    }

    public function sendWaKonfirmasi($data)
    {
        //         $base_url = config('services.whatsapp.base_url');
        // $body = 'Halo, ' . $data->pelanggan->name . ',

        // Laundrymu sudah kami terima dan akan menghubungi kamu jika sudah selesai.

        // Terima Kasih';
        //         $res = Http::post($base_url . '/chats/send?id=laundryapp', [
        //             'receiver' => $data->pelanggan->formatPhoneNumber(),
        //             'message' => ['text' => $body]
        //         ]);

        //         return $res->json();
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
