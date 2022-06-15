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
        Schema::create('fastens', function (Blueprint $table) {
            $table->id();
            $table->string('fastenmedis',100);
            $table->text('alamat')->nullable();
            $table->bigInteger('kontak')->length(15)->unsigned()->nullable();
            $table->enum('status', [0, 1])->default(1);	
            $table->integer('child')->length(1)->unsigned()->nullable();
            $table->biginteger('tipe')->length(1)->unsigned()->nullable();
            $table->char('wilayah')->nullable();
            $table->string('koordinat_long')->nullable();
            $table->string('koordinat_lat')->nullable();
            // $table->bigInteger('Mobile')->length(15)->unsigned()->nullable(); // tidak bisa baca +62 
            $table->string('Mobile')->length(15)->nullable(); // tidak bisa baca +62 
            $table->char('Email')->length(60)->nullable();
            $table->string('Image')->nullable();
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
        Schema::dropIfExists('fastens');
    }
};
