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
            $table->bigInteger('nokartu')->length(16)->unsigned()->nullable();
            $table->string('nopeserta')->length(16)->unsigned()->nullable();
            $table->string('inisial_nama',3)->nullable();
            $table->string('nama',50)->index();
            $table->biginteger('child')->nullable();
            $table->text('alamat',200)->nullable();
            $table->string('kodepos',6)->nullable();
            $table->double('lat')->nullable();
            $table->double('lng')->nullable();
            $table->date('tanggallahir')->nullable();
            $table->bigInteger('nohp')->length(15)->unsigned()->nullable();
            $table->string('email',150)->unique();
            $table->integer('jml_turunan')->nullable()->default(0);

            $table->enum('jeniskelamin',['L','P'])->length(1)->nullable();
            $table->enum('stts_approval', ['Y', 'T'])->lenght(1)->default('T');
            $table->date('date_approval')->nullable();
            $table->string('stts_approval_user_by')->length(40)->default('System')->nullable();
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
            $table->index('nokartu');

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
