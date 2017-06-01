<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableHomainewConfig extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('mdl_homenew_config', function(Blueprint $table) {
            $table->increments('id');
            $table->string('key', 256)->nullable();
            $table->string('value', 256)->nullable();
            $table->integer('status')->nullable();
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
		Schema::drop('mdl_homenew_config');
	}

}
