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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('noKartu')->length(16)->unsigned()->nullable();
            $table->string('noPeserta')->length(16)->unsigned()->nullable();
            $table->string('nama');

            $table->text('alamat')->nullable();
            $table->string('kodepos',6)->nullable();
            $table->double('lat')->nullable();
            $table->double('lng')->nullable();
            $table->date('tanggalLahir')->nullable();
            $table->bigInteger('noHP')->length(15)->unsigned()->nullable();
            $table->string('email')->unique();

            $table->enum('jenisKelamin',['L','P'])->nullable();
            $table->enum('stts_approval', ['Y', 'T'])->default('T');
            $table->date('date_approval')->nullable();
            $table->string('stts_approval_user_by')->nullable();
            $table->enum('stts_approval_user', ['Y', 'T'])->default('T');
            $table->date('date_approval_user')->nullable();
            $table->enum('stts', ['Y', 'T'])->default('Y');
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->tinyInteger('type')->default(0);
            /* Users: 0=>Pasien, 1=>Dokter, 2=>apotik */
            $table->string('foto')->nullable();
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
};
