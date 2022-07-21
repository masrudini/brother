<?php

use App\Models\User;
use App\Models\OrderKendaraan;
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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');
            $table->string('atas_nama');
            $table->timestamp('tanggal_pemesanan');
            $table->string('alamat');
            $table->date('date_start');
            $table->date('date_end');
            $table->string('kendaraan_id');
            $table->string('no_hp');
            $table->integer('total_harga');
            $table->string('bukti_pembayaran')->nullable();
            $table->string('foto_ktp')->nullable();
            $table->string('foto_sim')->nullable();
            $table->string('jaminan')->nullable();
            $table->integer('status_konfirmasi')->default(0);
            $table->integer('status_kembali')->default(0);
            $table->timestamp('updated_at')->nullable();
            $table->timestamp('created_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
};
