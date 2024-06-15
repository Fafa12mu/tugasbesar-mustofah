<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBmasuksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bmasuks', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->char('kdbm', 10);
            $table->string('nmbm', 50);
            $table->integer('hbm');
            $table->integer('jbm');
            $table->string('gbm', 100);
            $table->string('pengirim', 40);
            $table->string('penerima', 40);
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
        Schema::dropIfExists('bmasuks');
    }
}
