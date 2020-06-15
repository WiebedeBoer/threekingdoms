<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFarmsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('farms', function (Blueprint $table) {
            $table->bigIncrements('farm_id');
			$table->string('farm_name');
			$table->string('category');
			//upgrades
			$table->string('garden');
			$table->string('wall');
			$table->string('hall');
			$table->string('kitchen');
			//stats
			$table->integer('food');
			$table->integer('animals');
			$table->integer('goods');
			//location
			$table->integer('xcooord');
			$table->integer('ycooord');
			//fk
			$table->unsignedBigInteger('owner')->nullable();
			$table->unsignedBigInteger('location')->nullable();
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
        Schema::dropIfExists('farms');
    }
}
