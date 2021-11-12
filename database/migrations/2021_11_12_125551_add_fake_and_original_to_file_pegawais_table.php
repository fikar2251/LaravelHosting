<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFakeAndOriginalToFilePegawaisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('file_pegawais', function (Blueprint $table) {
            $table->string('fake')->after('file');
            $table->string('original')->after('fake');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('file_pegawais', function (Blueprint $table) {
            $table->dropColumn('fake');
            $table->dropColumn('original');
        });
    }
}
