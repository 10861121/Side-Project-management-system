<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id')->comment('使用者流水編號');
            $table->string('username',255)->comment('使用者名字');
            $table->string('account',255)->comment('使用者帳號');
            $table->string('password',255)->comment('使用者密碼');
            $table->string('remember_token',255)->comment('使用者token');
            $table->timestamp('created_at',255)->comment('使用者創建時間');
            $table->timestamp('updated_at',255)->comment('使用者修改時間');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
