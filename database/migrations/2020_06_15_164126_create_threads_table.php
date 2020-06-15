<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateThreadsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('threads', function (Blueprint $table) {
            $table->bigIncrements('thread_id');
			$table->string('subforum')->default('tavern');
			$table->string('thread_name');
			//fk
			$table->unsignedBigInteger('creator')->default(1); //user fk
			$table->unsignedBigInteger('tavern')->nullable(); //tavern place fk
			$table->unsignedBigInteger('faction')->nullable(); //faction fk
			$table->unsignedBigInteger('belligerent')->nullable(); //war faction fk
			//sticky
			$table->integer('sticky')->default(0);
			//description
			$table->text('thread_description')->nullable();
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
        Schema::dropIfExists('threads');
    }
}
