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
        Schema::create('pesanans', function (Blueprint $table) {
            $table->id();
            $table->string('kode_unik');
            $table->unsignedBigInteger('user_id');
            $table->string('berat');
            $table->foreignId('diskon_id')->nullable();
            $table->string('total');
            $table->text('catatan_umum')->nullable();
            $table->enum('status', ['diterima', 'proses', 'siap_diambil', 'selesai', 'batal']);
            $table->dateTime('tanggal_dipesan');
            $table->dateTime('estimasi_selesai');
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pesananans');
    }
};
