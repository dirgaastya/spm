<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class FkDokumen extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('dokumens', function (Blueprint $table) {
            $table->string('no_jenis_dokumen', 8);
            $table->foreign('no_jenis_dokumen', 'fk_dokumen_no_jenis_dokumen')->references('no')->on('jenis_dokumens')->onUpdate('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('dokumens', function (Blueprint $table) {
            $table->dropForeign('fk_dokumen_no_jenis_dokumen');
            $table->dropColumn('no_jenis_dokumen');
        });
    }
}
