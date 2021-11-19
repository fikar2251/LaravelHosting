<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKategoriSppdsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kategori_sppds', function (Blueprint $table) {
            $table->id();
            $table->string('tujuan');
            $table->enum('jenis',['Dalam Negeri','Luar Negeri']);
            $table->integer('harian');
            $table->integer('penginapan');
            $table->integer('transportasi');
            $table->integer('dll');
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
        Schema::dropIfExists('kategori_sppds');
    }
}
