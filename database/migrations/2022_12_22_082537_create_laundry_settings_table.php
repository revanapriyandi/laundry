<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('laundry_settings', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('alamat');
            $table->string('no_telp');
            $table->string('photo_path', 2048)->nullable();
            $table->string('TELEGRAM_BOT_TOKEN', 2048)->nullable();
            $table->string('TELEGRAM_ID_CHANEL', 2048)->nullable();
            $table->boolean('telegram_notification')->default(false);
            $table->boolean('whatsapp_notification')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('laundry_settings');
    }
};
