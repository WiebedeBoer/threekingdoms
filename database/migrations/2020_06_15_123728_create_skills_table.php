<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSkillsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('skills', function (Blueprint $table) {
            $table->bigIncrements('skill_id');
			//fk
			$table->unsignedBigInteger('person')->nullable();
			//skills
			$table->integer('adm')->default(0);
			$table->integer('arc')->default(0);
			$table->integer('art')->default(0);
			$table->integer('bal')->default(0);
			$table->integer('car')->default(0);
			$table->integer('eng')->default(0);
			$table->integer('far')->default(0);
			$table->integer('her')->default(0);
			$table->integer('lit')->default(0);
			$table->integer('mac')->default(0);
			$table->integer('mas')->default(0);
			$table->integer('med')->default(0);
			$table->integer('nav')->default(0);
			$table->integer('phi')->default(0);
			$table->integer('poe')->default(0);
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
        Schema::dropIfExists('skills');
    }
}
