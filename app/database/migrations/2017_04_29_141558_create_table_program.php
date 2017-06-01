<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableProgram extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('mdl_homenew_programs', function(Blueprint $table) {
			$table->increments('id');
            $table->integer('package_group_id')->nullable();
            $table->integer('menu_id')->nullable();
            $table->string('description_object')->nullable();
            $table->string('description_program')->nullable();
            $table->string('description')->nullable();
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
		Schema::drop('mdl_homenew_programs');
	}

}
