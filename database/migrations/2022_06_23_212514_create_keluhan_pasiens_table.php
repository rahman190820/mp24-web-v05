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
        Schema::create('keluhan_pasiens', function (Blueprint $table) {
            $table->id('id_keluhan');
            $table->biginteger('dokter_id')->unsigned()->nullable();
            $table->biginteger('pasien_id')->unsigned()->nullable();
            $table->text('keluhan')->nullable();
            $table->text('diagnosa')->nullable();
            $table->string('resep_id',8)->nullable()->index();
            $table->timestamp('tanggal_dibuat');
            $table->datetime('tgl_keluhan_respon_dokter')->nullable();
            $table->datetime('tgl_keluhan_respon_apotik')->nullable();
            $table->integer('status')->unsigned()->default(0);
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
        Schema::dropIfExists('keluhan_pasiens');
    }
};
