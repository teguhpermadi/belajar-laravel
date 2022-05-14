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
        Schema::create('nomor_identitas_users', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignUuid('user_id')->constrained();
            $table->string('nik')->nullable()->comment('nomor induk kependudukan');
            $table->string('nkk')->nullable()->comment('nomor kartu keluarga');
            $table->string('nip')->nullable()->comment('nomor induk pegawai');
            $table->string('niy')->nullable()->comment('nomor induk yayasan');
            $table->string('nuptk')->nullable()->comment('nomor unik pendidik dan tenaga kependidikan');
            $table->string('nisn')->nullable()->comment('nomor induk siswa nasional'); 
            $table->string('nis')->nullable()->comment('nomor induk siswa'); 
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
        Schema::dropIfExists('nomor_identitas_users');
    }
};
