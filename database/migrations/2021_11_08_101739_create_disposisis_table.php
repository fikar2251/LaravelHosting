<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDisposisisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('disposisis', function (Blueprint $table) {
            $table->id();
            $table->string('tujuan');
            $table->text('isi');
            $table->date('batas_waktu');
            $table->text('catatan');
            $table->enum('tipe',['Biasa','Penting','Segera','Rahasia']);
            $table->foreignId('surat_masuk_id')->constrained('surat_masuks');
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
        Schema::dropIfExists('disposisis');
    }
}
