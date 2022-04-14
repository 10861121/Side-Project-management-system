<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProblemTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('problem', function (Blueprint $table) {
            $table->increments('PROBLEM ')->comment('問題回報流水編號');
            $table->string('PROBLEM_NAME',255)->comment('問題回報名字');
            $table->string('PROBLEM_EMAIL',255)->comment('問題回報信箱');
            $table->string('PROBLEM_CONTENT',255)->comment('問題回報內容');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('problem');
    }
}
