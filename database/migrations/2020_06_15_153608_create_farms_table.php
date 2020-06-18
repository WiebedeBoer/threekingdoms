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
			//farm type
			$table->string('category');
			//upgrades
			$table->string('garden');
			$table->string('wall');
			$table->string('hall');
			$table->string('kitchen');
			//stats
			$table->integer('food')->default(0);
			$table->integer('animals')->default(0);
			$table->integer('plum')->default(0);
			$table->integer('peach')->default(0);
			$table->integer('tea')->default(0);
			$table->integer('silk')->default(0);
			$table->integer('goods')->default(0);
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
