<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableTypeNews extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('mdl_homenew_type_news', function(Blueprint $table) {
            $table->increments('id');
            $table->string('name', 256)->nullable();
            $table->string('description', 500)->nullable();
            $table->integer('position')->nullable();
            $table->integer('status')->nullable();
            $table->integer('type')->nullable();
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
		Schema::drop('mdl_homenew_type_news');
	}

}
