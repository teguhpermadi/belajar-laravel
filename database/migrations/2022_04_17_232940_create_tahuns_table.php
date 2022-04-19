<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTahunsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tahuns', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->year('tahun');
            $table->enum('semester', ['ganjil', 'genap']);
            $table->date('tanggal_awal')->nullable();
            $table->date('tanggal_akhir')->nullable();
            $table->foreignUuid('kepala_sekolah')->references('id')->on('gurus');
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
        Schema::dropIfExists('tahuns');
    }
}
