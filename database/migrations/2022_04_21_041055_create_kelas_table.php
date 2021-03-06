<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKelasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kelas', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignUuid('tahun_id')->constrained();
            $table->foreignUuid('user_id')->constrained();
            $table->string('nama');
            switch (env('JENJANG_SEKOLAH')) {
                case 'sma':
                    $level = ['10', '11', '12'];
                    $table->enum('level', $level);
                    break;
                case 'smp':
                    $level = ['7', '8', '9'];
                    $table->enum('level', $level);
                    break;
                case 'sd':
                    $level = ['1', '2', '3', '4', '5', '6'];
                    $table->enum('level', $level);
                    break;
                case 'tk':
                    $level = ['a', 'b'];
                    $table->enum('level', $level);
                    break;
            }
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
        Schema::dropIfExists('kelas');
    }
}
