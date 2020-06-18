<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('factions', function (Blueprint $table) {
            $table->bigIncrements('faction_id');
			$table->string('faction_name');
			//emperor
			$table->integer('emperor')->default(1);
			//culture
			$table->string('culture')->default('Chinese');
			//treasury
			$table->integer('treasury')->default(0);
			//fk
			$table->unsignedBigInteger('ruler')->nullable();
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
        Schema::dropIfExists('factions');
    }
}
