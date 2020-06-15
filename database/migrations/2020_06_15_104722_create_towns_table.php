<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTownsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('towns', function (Blueprint $table) {
            $table->bigIncrements('town_id');
			$table->string('town_name');
			//population
			$table->integer('population');
			//size
			$table->string('category_size');
			//location
			$table->integer('xcooord');
			$table->integer('ycooord');
			//stats
			$table->integer('defenses')->default(10);
			$table->integer('justice')->default(900);
			$table->integer('commerce')->default(10);
			$table->integer('agriculture')->default(10);
			//soldiers
			$table->integer('guards')->default(1);
			//resources economy
			$table->string('staple_food')->default('rice');
			$table->string('plum')->default('none');
			$table->string('peach')->default('none');
			$table->string('tea')->default('none');
			$table->string('silk')->default('none');
			//goods economy
			$table->string('jade')->default('none');
			$table->string('censer')->default('none');
			$table->string('fabrics')->default('none');
			$table->string('pottery')->default('none');
			$table->string('lacquerware')->default('none');
			$table->string('paintings')->default('none');
			//fk
			$table->unsignedBigInteger('ruler')->nullable();
			$table->unsignedBigInteger('governor')->nullable();
			$table->unsignedBigInteger('faction')->nullable();
			//timestamps
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
        Schema::dropIfExists('towns');
    }
}