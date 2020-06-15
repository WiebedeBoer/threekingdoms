<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStancesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stances', function (Blueprint $table) {
            $table->bigIncrements('stance_id');
			//data
			$table->string('type');
			$table->integer('start')->nullable();
			$table->integer('end')->nullable();
			//fk
			$table->unsignedBigInteger('to');
			$table->unsignedBigInteger('from');
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
        Schema::dropIfExists('stances');
    }
}
