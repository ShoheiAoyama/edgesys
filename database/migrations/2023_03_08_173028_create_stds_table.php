<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStdsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stds', function (Blueprint $table) {
            $table->bigIncrements('id');
            //名前
            $table->string('name', 100);
            //生徒ID
            $table->integer('stdid');
            //パスワード
            $table->bigInteger('ps');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('stds');
    }
}
