<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArmiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('armies', function (Blueprint $table) {
            $table->bigIncrements('army_id');
			$table->string('army_name')->default('army');
			$table->integer('bodyguards')->default(1);
			$table->integer('militia')->default(0);
			$table->integer('spearmen')->default(0);
			$table->integer('pikemen')->default(0);
			$table->integer('swordsmen')->default(0);
			$table->integer('archers')->default(0);
			$table->integer('horsemen')->default(0);
			$table->integer('morale')->default(100);
			$table->integer('training')->default(100);
			$table->integer('food')->default(100);
			$table->integer('weapons')->default(100);
			$table->string('status')->default('guarding');
			//fk
			$table->unsignedBigInteger('marshall')->nullable();
			$table->unsignedBigInteger('general')->nullable();
			$table->unsignedBigInteger('lieutenant')->nullable();
			$table->unsignedBigInteger('logistics')->nullable();
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
        Schema::dropIfExists('armies');
    }
}
