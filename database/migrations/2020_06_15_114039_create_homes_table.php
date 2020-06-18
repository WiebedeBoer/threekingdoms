<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHomesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('homes', function (Blueprint $table) {
            $table->bigIncrements('home_id');
			$table->string('home_name');
			//upgrades
			$table->string('garden');
			$table->string('wall');
			$table->string('hall');
			$table->string('kitchen');
			//goods stats
			$table->integer('jade')->default(0);
			$table->integer('censer')->default(0);
			$table->integer('fabrics')->default(0);
			$table->integer('pottery')->default(0);
			$table->integer('lacquerware')->default(0);
			$table->integer('paintings')->default(0);
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
        Schema::dropIfExists('homes');
    }
}
