<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIklansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('iklans', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('id_prop');
            $table->unsignedBigInteger('id_user');
            $table->tinyInteger('jenis');
            $table->tinyInteger('nego');
            $table->tinyInteger('sold');
            $table->tinyInteger('status');
            $table->tinyInteger('book');
            $table->string('dilihat');
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
        Schema::dropIfExists('iklans');
    }
}
