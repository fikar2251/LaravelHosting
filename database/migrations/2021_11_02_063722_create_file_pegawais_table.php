<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFilePegawaisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('file_pegawais', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('file');
            $table->timestamp('date');
            $table->foreignId('pegawai_id')->constrained('pegawais');
            $table->integer('aktifya');
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
        Schema::dropIfExists('file_pegawais');
    }
}
