<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBiddingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('biddings', function (Blueprint $table) {
            $table->increments('id');

            $table->string('number', 20);
            $table->string('description', 800)->nullable();
            $table->string('file', 255)->nullable();
            $table->timestamps();

            $table->integer('category_id')->unsigned();
            $table->foreign('category_id')->
                references('id')->
                on('categories')->
                onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('biddings');
    }
}
