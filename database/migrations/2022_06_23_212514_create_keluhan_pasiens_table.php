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
            $table->integer('pasien_id')->unsigned()->nullable();
            $table->integer('dokter_id')->unsigned()->nullable();
            $table->integer('obat_id')->unsigned()->nullable();
            $table->text('keluhan')->length('200')->nullable();
            $table->text('diagnosa')->length('200')->nullable();
            $table->double('hrgdiagnosa',10,2)->nullable();
            $table->string('foto_resep',200)->nullable()->index();
            $table->double('hrgresep',10,2)->nullable();
            $table->timestamp('tanggal_dibuat');
            $table->datetime('tgl_keluhan_req_dokter')->nullable();
            $table->datetime('tgl_keluhan_res_dokter')->nullable();
            $table->datetime('tgl_keluhan_req_apotik')->nullable();
            $table->datetime('tgl_keluhan_res_apotik')->nullable();
            $table->integer('status')->unsigned()->default(0);
            /*
            status = 
            0(defautl), 
            1(pasien keluhan),
            2(pilih dokter langgan(*.0) atau (*.1)non-langgan)
            3.0 (diterima doktr),
            3.1 (pasien upload kwitansi dokter dan ressep)
            4.0 (ditangani dokter),
            5.0 (resepdkter dtrm pasien),
            6.0 (pasien pilih apotik -> upload resp),
            7.0 (resrp diterima apotik),
            8.0 (resrp dtgni apotik), 7 ke 8 untuk estimasi penanganan
            9.0 (apttk kirim stts siap diambil),
            10.0(psin pilih diambil atau dikirim),
            
            */
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
