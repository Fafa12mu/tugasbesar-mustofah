<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBkeluarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bkeluars', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->char('kdbk', 10);
            $table->string('nmbk', 50);
            $table->string('kasir', 50);
            $table->integer('hbk');
            $table->integer('jbk');
            $table->integer('totalh');
            $table->string('gbk', 100);
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
        Schema::dropIfExists('bkeluars');
    }
}
