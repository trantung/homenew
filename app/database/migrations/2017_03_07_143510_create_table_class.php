<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableClass extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('mdl_homenew_class', function(Blueprint $table) {
            $table->increments('id');
            $table->integer('block_id')->nullable();
            $table->string('name', 256)->nullable();
            $table->integer('status')->nullable();
            $table->integer('default')->nullable();
            $table->integer('weight_number')->nullable();
            $table->softDeletes();
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
		Schema::drop('mdl_homenew_class');
	}

}
