<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStdDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('std_details', function (Blueprint $table) {
            $table->bigIncrements('id');
            //生徒ID
            $table->string('stdid', 100);
            //フリガナ
            $table->string('kana', 100);
            //性別
            $table->integer('sex');
            //コース
            $table->integer('course');
            //月回数
            $table->integer('times');
            //レッスン曜日
            $table->integer('week');
            //レッスン時間
            $table->integer('term');
            //レッスンチーム
            $table->integer('team');
            //保護者様1
            $table->string('pname1', 100)->nullable($value = true);
            //保護者様1属性
            $table->integer('rlt1')->nullable($value = true);
            //保護者様2
            $table->string('pname2', 100)->nullable($value = true);
            //保護者様2属性
            $table->integer('rlt2')->nullable($value = true);
            //郵便番号
            $table->integer('post')->nullable($value = true);
            //都道府県
            $table->integer('pref')->nullable($value = true);
            //住所
            $table->string('add', 100)->nullable($value = true);
            //入会日
            $table->date('date')->nullable($value = true);
            //好きな教科
            $table->integer('sub')->nullable($value = true);
            //好きなモノ1
            $table->string('favorite1', 200)->nullable($value = true);
            //好きなモノ2
            $table->string('favorite2', 200)->nullable($value = true);
            //備考1
            $table->string('memo1', 500)->nullable($value = true);
            //備考2
            $table->string('memo2', 500)->nullable($value = true);
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
        Schema::dropIfExists('std_details');
    }
}
