<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAbsensisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('absensis', function (Blueprint $table) {
            $table->id();
            $table->date('tanggal');
            $table->time('masuk')->nullable();
            $table->time('keluar')->nullable();
            $table->foreignId('pegawai_id')->constrained('pegawais');
            $table->enum('tipe',['telat','tidak telat']);
            $table->text('langitude')->nullable();
            $table->text('longitude')->nullable();
            $table->string('foto')->nullable();
            $table->string('sidik_jari')->nullable();
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
        Schema::dropIfExists('absensis');
    }
}
