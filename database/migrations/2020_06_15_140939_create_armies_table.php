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
			//bodyguards
			$table->integer('bodyguards')->default(1);
			//militia
			$table->integer('pike_militia')->default(0);
			$table->integer('sword_militia')->default(0);
			$table->integer('archer_militia')->default(0);
			//infantry
			$table->integer('pikemen')->default(0);
			$table->integer('swordsmen')->default(0);
			$table->integer('archers')->default(0);
			//cavalry
			$table->integer('horse_archers')->default(0);
			$table->integer('lancers')->default(0);
			$table->integer('chariot_archers')->default(0);
			$table->integer('chariot_lancers')->default(0);			
			//resources
			$table->integer('food')->default(0);
			//weapons and armor
			$table->integer('pikes')->default(0);
			$table->integer('swords')->default(0);
			$table->integer('bows')->default(0);
			$table->integer('chariots')->default(0);
			$table->integer('armor')->default(0);
			$table->integer('siege_equipment')->default(0);
			//status
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
