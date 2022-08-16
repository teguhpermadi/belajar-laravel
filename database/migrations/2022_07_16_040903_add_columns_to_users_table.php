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
        Schema::table('users', function (Blueprint $table) {
            $table->string('fullname');
            $table->string('nickname')->nullable();
            $table->string('avatar')->nullable();
            $table->string('phone')->nullable();
            $table->enum('jenis_kelamin', ['l', 'p'])->nullable();
            $table->unsignedBigInteger('tempat_lahir')->nullable();
            $table->foreign('tempat_lahir')->references('id')->on(config('laravolt.indonesia.table_prefix') . 'cities');
            $table->date('tanggal_lahir')->nullable();
            $table->string('ttd')->nullable();
            $table->string('alamat')->nullable();
            $table->string('kodepos')->nullable();
            $table->unsignedBigInteger('kelurahan_id')->nullable();
            $table->foreign('kelurahan_id')->references('id')->on(config('laravolt.indonesia.table_prefix') . 'villages');
            $table->enum('is_active', [1, 0])->default(1);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn([
                'fullname',
                'nickname',
                'avatar',
                'phone',
                'jenis_kelamin',
                'tempat_lahir',
                'tanggal_lahir',
                'ttd',
                'alamat',
                'kodepos',
                'kelurahan_id',
                'is_active',
            ]);
        });
    }
};
