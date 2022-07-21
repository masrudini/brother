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
        Schema::create('detail_kendaraans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('kendaraan_id');
            $table->string('tampak_depan');
            $table->string('tampak_belakang');
            $table->string('tampak_samping');
            $table->string('tampak_dalam');
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
        Schema::dropIfExists('detail_kendaraans');
    }
};
