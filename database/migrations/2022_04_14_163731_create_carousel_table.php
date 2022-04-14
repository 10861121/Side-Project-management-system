<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCarouselTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('carousel', function (Blueprint $table) {
            $table->increments('ca_id')->comment('輪播流水編號');
            $table->string('ca_file',255)->comment('輪播影像名稱');
            $table->string('ca_title',255)->comment('輪播');
            $table->string('ca_order',255)->comment('輪播順序');
            $table->string('ca_switch',255)->comment('輪播是否開啟');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('carousel');
    }
}
