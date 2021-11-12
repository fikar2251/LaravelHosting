<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePegawaisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pegawais', function (Blueprint $table) {
            $table->id();
            $table->string('nip');
            $table->string('nama');
            $table->string('nik');
            $table->date('tanggal_lahir');
            $table->string('tempat_lahir');
            $table->text('alamat');
            $table->string('jenis_kelamin');
            $table->string('no_hp');
            $table->string('foto');
            $table->string('facebook');
            $table->string('instagram');
            $table->date('tmt');
            $table->date('tanggal_kenaikan_berkala_terakhir');
            $table->date('tanggal_kenaikan_pangkat_terakhir');
            $table->integer('status_pns');
            $table->integer('status_user');
            $table->foreignId('user_id')->constrained('users');
            $table->foreignId('status_perkawinan_id')->constrained('status_pernikahans');
            $table->foreignId('agama_id')->constrained('agamas');
            $table->foreignId('jabatan_id')->constrained('jabatans');
            $table->foreignId('pendidikan_id')->constrained('pendidikans');
            $table->foreignId('golongan_id')->constrained('golongans');
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
        Schema::dropIfExists('pegawais');
    }
}
