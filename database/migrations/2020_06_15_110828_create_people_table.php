<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePeopleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('people', function (Blueprint $table) {
            $table->bigIncrements('person_id');
			//name
			$table->string('first_name');
			$table->string('surname');
			//birth year
			$table->string('birth')->default(166);
			//gender
			$table->string('gender')->default('male');
			//role
			$table->string('role')->default('warrior');
			//portrait
			$table->string('portrait')->default('w001');
			//weapon category
			$table->string('weapon_category')->default('halberd');
			//turns
			$table->integer('PT')->default(1);
			$table->integer('KT')->default(1);
			//fk
			$table->unsignedBigInteger('owner')->nullable();
			//biography
			$table->text('bio')->nullable();
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
        Schema::dropIfExists('people');
    }
}
