<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableBlock extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('mdl_homenew_block', function(Blueprint $table) {
            $table->increments('id');
            $table->string('name', 256)->nullable();
            $table->string('description', 500)->nullable();
            $table->integer('status')->nullable();
            $table->string('logo', 500)->nullable();
            $table->integer('weight_number')->nullable();
            $table->string('color_code', 256)->nullable();
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
		Schema::drop('mdl_homenew_block');
	}

}
