<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWorkshopsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('workshops', function (Blueprint $table) {
            $table->bigIncrements('workshop_id');
			$table->string('workshop_name');
			$table->string('category');
			//upgrades
			$table->string('garden');
			$table->string('wall');
			$table->string('hall');
			$table->string('kitchen');
			//stats
			$table->integer('weapons');
			$table->integer('goods');
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
        Schema::dropIfExists('workshops');
    }
}
