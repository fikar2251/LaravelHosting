<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCutisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cutis', function (Blueprint $table) {
            $table->id();
            $table->date('tanggal_mulai');
            $table->date('tanggal_akhir');
            $table->enum('status',[0,1,2])->default(0);
            $table->text('keterangan');
            $table->foreignId('kategori_cuti_id')->constrained('kategori_cutis');
            $table->foreignId('pegawai_id')->constrained('pegawais');
            $table->unsignedBigInteger('approve_by_id')->nullable();
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
        Schema::dropIfExists('cutis');
    }
}
