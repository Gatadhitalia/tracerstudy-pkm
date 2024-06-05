<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWhatsappLogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('whatsapp_logs', function (Blueprint $table) {
            $table->id();
            $table->string('phone_number');
            $table->string('title')->default('Pemberitahuan'); // seperti = "Notifikasi Absen", "Pemberitahuan" dan lain lain
            $table->text('message'); // Isi pesan whatsapp
            $table->enum('status', ['unproccessed', 'need_resend', 'success_send', 'failed_send'])->default('unproccessed'); // 0 = Gagal Terkirim, 1 = Terkirim
            $table->text('failed_reason')->nullable(); // Alasan gagal terkirim
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
        Schema::dropIfExists('whatsapp_logs');
    }
}
