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
        Schema::create('dokter_reseps', function (Blueprint $table) {
            $table->id();
            $table->string('nama_obat',60);
            $table->integer('jumlah')->unsigned();
            $table->integer('harga')->unsigned()->nullable();
            $table->bigInteger('id_resep')->unsigned()->nullable();
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
        Schema::dropIfExists('dokter_reseps');
    }
};
