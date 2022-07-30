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
            $table->integer('parent')->length(2)->unsigned()->nullable();
            $table->integer('child')->length(1)->unsigned()->nullable();
            $table->biginteger('tipe')->length(1)->unsigned()->nullable();
            $table->char('wilayah')->nullable();
            $table->string('koordinat_long')->nullable();
            $table->string('koordinat_lat')->nullable();
            // $table->bigInteger('Mobile')->length(15)->unsigned()->nullable(); // tidak bisa baca +62 
            $table->string('Mobile')->length(15)->nullable(); // tidak bisa baca +62 

            $table->char('email')->length(60)->nullable();
            $table->enum('stts_approval', ['Y', 'T'])->lenght(1)->default('T');
            $table->date('date_approval')->nullable();
            $table->string('stts_approval_user_by')->length(40)->default('System')->nullable();
            $table->enum('stts_approval_user', ['Y', 'T'])->default('T');
            $table->date('date_approval_user')->nullable();
            $table->enum('stts', ['Y', 'T'])->default('Y');
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->tinyInteger('type')->default(0);
            $table->string('foto')->nullable();
            $table->tinyInteger('is_admn')->default(0);
            $table->rememberToken();
            $table->timestamps();
            $table->foreign('tipe')->references('id')->on('katdoks')->onDelete('cascade');
            
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
