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
            $table->id();
            $table->biginteger('dokter_id');
            $table->biginteger('pasien_id');
            $table->text('keluhan');
            $table->timestamp('tanggal_dibuat');
            $table->enum('status',[0,1])->default(0);
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
