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
        Schema::create('kendaraans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('jenis_kendaraan_id');
            $table->foreignId('detail_kendaraan_id')->nullable();
            $table->string('plat');
            $table->string('warna');
            $table->string('nomor_stnk');
            $table->integer('harga_sewa');
            $table->integer('tahun_rakitan');
            $table->integer('available_status')->default('1');
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
        Schema::dropIfExists('kendaraans');
    }
};
