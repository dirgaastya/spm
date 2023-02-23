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
            $table->integer('id_kategori')->unsigned();
            $table->foreign('id_kategori', 'fk_dokumen_id_kategori')->references('id')->on('kategoris')->onUpdate('CASCADE');
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
            $table->dropForeign('fk_dokumen_id_kategori');
            $table->dropColumn('id_kategori');
        });
    }
}
