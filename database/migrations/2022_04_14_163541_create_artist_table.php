<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArtistTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('artist', function (Blueprint $table) {
            $table->increments('ARTIST_ID')->comment('藝術家流水編號');
            $table->string('ARTIST_NAME',255)->comment('藝術家名字');
            $table->string('ARTIST_ENNAME',255)->comment('藝術家英文名字');
            $table->string('ARTIST_CONTENT',255)->comment('藝術家簡介');
            $table->string('ARTIST_IMGURL',255)->comment('藝術家頭貼');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('artist');
    }
}
