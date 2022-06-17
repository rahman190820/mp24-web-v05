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
        Schema::create('klslyn_manfaats', function (Blueprint $table) {
            $table->id();
            $table->integer('klslyn_id')->unsigned();
            $table->integer('manfaat_id')->unsigned();
            $table->foreign('klslyn_id')->references('id')->on('klslyns')->onDelete('cascade');
            $table->foreign('manfaat_id')->references('id')->on('manfaats')->onDelete('cascade');
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
        Schema::dropIfExists('klslyn_manfaats');
    }
};
