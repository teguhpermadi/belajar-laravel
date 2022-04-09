<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePpdbsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ppdbs', function (Blueprint $table) {
            $table->id();
            $table->foreign('user_id')->references('id')->on('users');
            $table->string('scan_aktalahir')->nullable();
            $table->enum('konfirmasi_aktalahir', ['0', '1'])->default('0');
            $table->string('scan_kartukeluarga')->nullable();
            $table->enum('konfirmasi_kartukeluarga', ['0', '1'])->default('0');
            $table->string('scan_ktpayah')->nullable();
            $table->enum('konfirmasi_ktpayah', ['0', '1'])->default('0');
            $table->string('scan_ktpibu')->nullable();
            $table->enum('konfirmasi_ktpibu', ['0', '1'])->default('0');
            $table->string('scan_ktpwali')->nullable();
            $table->enum('konfirmasi_ktpwali', ['0', '1'])->default('0');
            $table->string('scan_surataktiflulus')->nullable();
            $table->enum('konfirmasi_surataktiflulus', ['0', '1'])->default('0');
            $table->string('scan_rapor')->nullable();
            $table->enum('konfirmasi_rapor', ['0', '1'])->default('0');
            $table->string('pasfoto')->nullable();
            $table->enum('konfirmasi_pasfoto', ['0', '1'])->default('0');
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
        Schema::dropIfExists('ppdbs');
    }
}
