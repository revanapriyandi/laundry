<?php

namespace App\Events;

use App\Models\LaundrySettings;
use Illuminate\Broadcasting\Channel;
use Illuminate\Support\Facades\Http;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class PesananReminder
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
    }

    public function sendWhatsapp($user)
    {
        $setting = LaundrySettings::first();
        $base_url = config('services.whatsapp.base_url');

        $body = 'Halo, ' . $user->name . ',

Selamat bergabung di ' . $setting->name . ' ya!. Jam kerja toko kami setiap hari lo, mulai jam 08.00 - 17.00 WIB, kami tunggu orderannya ya!

Terima Kasih';
        $res = Http::post($base_url . '/chats/send?id=laundryapp', [
            'receiver' => $user->formatPhoneNumber(),
            'message' => ['text' => $body]
        ]);

        $res->json();

        return $res;
    }
}
