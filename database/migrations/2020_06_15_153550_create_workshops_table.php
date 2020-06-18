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
			//resources stats
			$table->string('clay')->default(0);
			$table->string('wood')->default(0);
			$table->string('metal')->default(0);
			$table->string('silk')->default(0);
			$table->string('goods')->default(0);
			$table->string('medicine')->default(0);
			//resources prices
			$table->string('medicine_price')->default(0);
			//weapons and armor stats
			$table->integer('pikes')->default(0);
			$table->integer('swords')->default(0);
			$table->integer('bows')->default(0);
			$table->integer('chariots')->default(0);
			$table->integer('armor')->default(0);
			$table->integer('siege_equipment')->default(0);
			//weapons and armor prices
			$table->integer('pikes_price')->default(0);
			$table->integer('swords_price')->default(0);
			$table->integer('bows_price')->default(0);			
			//goods stats
			$table->integer('jade')->default(0);
			$table->integer('censer')->default(0);
			$table->integer('fabrics')->default(0);
			$table->integer('pottery')->default(0);
			$table->integer('lacquerware')->default(0);
			$table->integer('paintings')->default(0);
			//goods prices
			$table->integer('jade_price')->default(0);
			$table->integer('censer_price')->default(0);
			$table->integer('fabrics_price')->default(0);
			$table->integer('pottery_price')->default(0);
			$table->integer('lacquerware_price')->default(0);
			$table->integer('paintings_price')->default(0);
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
