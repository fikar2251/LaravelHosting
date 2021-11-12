<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDiklatsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('diklats', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('jumlah');
            $table->string('penyelenggara');
            $table->text('tempat');
            $table->year('angkatan');
            $table->year('tahun_diklat');
            $table->string('nomor_diklat');
            $table->date('tanggal_sttpp');
            $table->string('sertifikat');
            $table->integer('status');
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
        Schema::dropIfExists('diklats');
    }
}
