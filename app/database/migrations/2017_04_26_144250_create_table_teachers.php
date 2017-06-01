<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableTeachers extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('mdl_homenew_teachers', function(Blueprint $table) {
			$table->increments('id');
            $table->integer('teacher_id');
            $table->string('birthday')->nullable();
            $table->string('description')->nullable();
            $table->string('live_in')->nullable();
            $table->text('record')->nullable();
            $table->string('facebook')->nullable();
            $table->string('image')->nullable();
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
		Schema::drop('mdl_homenew_teachers');
	}

}
