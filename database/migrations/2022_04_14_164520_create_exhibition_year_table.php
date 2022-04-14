<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExhibitionYearTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('exhibition_year', function (Blueprint $table) {
            $table->increments('EXHIBITION_YEAR_ID')->comment('展覽年分流水編號');
            $table->string('EXHIBITION_YEAR',255)->comment('展覽年分');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('exhibition_year');
    }
}
