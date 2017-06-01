<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableHomenewCourseManager extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('mdl_homenew_course', function(Blueprint $table) {
            $table->increments('id');
            $table->integer('is_hot')->nullable();
            $table->integer('is_sale')->nullable();
            $table->integer('is_new')->nullable();
            $table->integer('weight_number')->nullable();
            $table->integer('course_id')->nullable();
            $table->string('image_url', 256)->nullable();
            $table->string('link', 256)->nullable();
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
		Schema::drop('mdl_homenew_course');
	}

}
