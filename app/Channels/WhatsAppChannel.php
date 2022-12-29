<?php

namespace App\Channels;

use Illuminate\Support\Facades\Http;
use Illuminate\Notifications\Notification;

class WhatsAppChannel
{
    public function send($notifiable, Notification $notification)
    {
        $message = $notification->toWhatsApp($notifiable);


        $to = $notifiable->routeNotificationForWhatsApp();


        $base_url = config('services.whatsapp.base_url');
        $res = Http::post($base_url . '/chats/send?id=laundryapp', [
            'receiver' => $to,
            'message' => ['text' => $message->content]
        ]);

        $res2 = $res->json();

        if ($res2['success'] === 'false' || !$res2['success']) {
            while ($res2['success'] === 'false' || !$res2['success']) {
                return $res;
            }
        }
        return $res;
    }
}
