<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGurusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gurus', function (Blueprint $table) {
            $table->id();
            // $table->foreignId('user_id')->constrained();
            $table->uuid('user_id')->nullable(false);
            $table->string('tempat_lahir')->nullable();
            $table->date('tanggal_lahir')->nullable();
            $table->enum('jenis_kelamin', ['laki-laki', 'perempuan'])->nullable();
            $table->string('nik')->nullable()->comment('nomor induk kependudukan');
            $table->string('nip')->nullable()->comment('nomor induk pegawai');
            $table->string('niy')->nullable()->comment('nomor induk yayasan');
            $table->enum('status_pegawai', ['pns', 'gty', 'gtt'])->nullable();
            $table->string('alamat')->nullable();
            
            $table->unsignedBigInteger('provinsi_id')->nullable();
            $table->foreign('provinsi_id')->references('id')->on(config('laravolt.indonesia.table_prefix') . 'provinces');
            $table->unsignedBigInteger('kota_id')->nullable();
            $table->foreign('kota_id')->references('id')->on(config('laravolt.indonesia.table_prefix') . 'cities');
            $table->unsignedBigInteger('kecamatan_id')->nullable();
            $table->foreign('kecamatan_id')->references('id')->on(config('laravolt.indonesia.table_prefix') . 'districts');
            $table->unsignedBigInteger('kelurahan_id')->nullable();
            $table->foreign('kelurahan_id')->references('id')->on(config('laravolt.indonesia.table_prefix') . 'villages');

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
        Schema::dropIfExists('gurus');
    }
}
