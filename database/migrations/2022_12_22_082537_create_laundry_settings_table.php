<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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

        DB::table('laundry_settings')->insert([
            'name' => 'Laundry',
            'alamat' => 'Jl. Jalan',
            'no_telp' => '08123456789',
            'photo_path' => 'https://via.placeholder.com/150',
        ]);
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
