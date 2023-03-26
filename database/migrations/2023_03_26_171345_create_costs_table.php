<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('costs', function (Blueprint $table) {
            //id,項目,小項目,内容,金額,経費日付,担当,timestanp
            $table->bigIncrements('id');
            $table->integer('item1');
            $table->integer('item2');
            $table->string('del', 100)->nullable($value = true);
            $table->string('fee', 50);
            $table->integer('cdate');
            $table->integer('staff')->nullable($value = true);
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
        Schema::dropIfExists('costs');
    }
}
