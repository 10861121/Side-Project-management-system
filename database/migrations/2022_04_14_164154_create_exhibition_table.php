<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExhibitionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('exhibition', function (Blueprint $table) {
            $table->increments('EXHIBITION_ID')->comment('展覽流水編號');
            $table->string('EXHIBITION_TITLE',255)->comment('展覽名稱');
            $table->string('EXHIBITION_T1',255)->comment('展覽時間');
            $table->string('EXHIBITION_IMGURL',255)->comment('展覽影像名稱');
            $table->string('EXHIBITION_YEAR_ID',255)->comment('展覽年份編號');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('exhibition');
    }
}
