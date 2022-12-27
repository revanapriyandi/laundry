<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use NotificationChannels\Telegram\TelegramUpdates;

class TelegramUpdate extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'telegram:update';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Update chat id telegram';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $updates = TelegramUpdates::create()
            ->latest();
        if ($updates['ok']) {
            // Chat ID
            $chatId = $updates['result'][0]['message']['chat']['id'];
        }
        return Command::SUCCESS;
    }
}
