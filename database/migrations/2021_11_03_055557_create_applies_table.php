<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAppliesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('applies', function (Blueprint $table) {
            $table->id();
            $table->string('kode');
            $table->date('tanggal_generate');
            $table->date('tanggal_kenaikan');
            $table->date('tanggal_accept')->nullable();
            $table->integer('tipe');
            $table->integer('golongan_terakhir');
            $table->integer('aktifya');
            $table->text('keterangan')->nullable();
            $table->foreignId('pegawai_id')->constrained('pegawais');
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
        Schema::dropIfExists('applies');
    }
}
