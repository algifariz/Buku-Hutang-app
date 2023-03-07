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
        Schema::create('data_bayar', function (Blueprint $table) {
            $table->id();
            $table->string('kode_pelanggan')->foreign('kode_pelanggan')->references('kode_pelanggan')->on('data_hutang');
            $table->string('nama_pelanggan');
            $table->integer('jumlah_bayar');
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
        Schema::dropIfExists('data_bayar');
    }
};
