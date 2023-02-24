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
        Schema::create('data_hutang', function (Blueprint $table) {
            $table->id();
            $table->string('kode_pelanggan');
            $table->string('nama_pelanggan');
            $table->date('tanggal');
            $table->integer('jumlah_hutang');
            $table->string('status');
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
        Schema::dropIfExists('data_hutang');
    }
};
