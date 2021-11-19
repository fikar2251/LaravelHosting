<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSppdsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sppds', function (Blueprint $table) {
            $table->id();
            $table->string('nomor');
            $table->string('asal');
            $table->date('tanggal_surat');
            $table->date('tanggal_berangkat');
            $table->date('tanggal_kembali');
            $table->string('pemberi');
            $table->foreignId('pegawai_id')->constrained('pegawais');
            $table->foreignId('kategori_sppd_id')->constrained('kategori_sppds');
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
        Schema::dropIfExists('sppds');
    }
}
