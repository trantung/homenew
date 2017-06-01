<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableMenus extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('mdl_homenew_menu', function(Blueprint $table) {
            $table->increments('id');
            $table->integer('class_id')->nullable();
            $table->string('name', 256)->nullable();
            $table->string('link', 500)->nullable();
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
		Schema::drop('mdl_homenew_menu');
	}

}
