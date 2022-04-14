<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('news', function (Blueprint $table) {
            $table->increments('NEWS_ID')->comment('訊息流水編號');
            $table->string('NEWS_T1',255)->comment('訊息年分月份');
            $table->string('NEWS_TITLE',255)->comment('訊息主題');
            $table->string('NEWS_T2',255)->comment('訊息時間區間');
            $table->string('NEWS_CONTENT',255)->comment('訊息內容');
            $table->string('NEWS_IMGURL',255)->comment('訊息影像名稱');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('news');
    }
}
