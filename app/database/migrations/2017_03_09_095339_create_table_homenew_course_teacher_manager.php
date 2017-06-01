<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableHomenewCourseTeacherManager extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('mdl_homenew_course_teacher_manager_free', function(Blueprint $table) {
            $table->increments('id');
            $table->string('name', 256)->nullable();
            $table->string('sapo', 256)->nullable();
            $table->text('description')->nullable();
            $table->integer('teacher_id')->nullable();
            $table->integer('subject_id')->nullable();
            $table->integer('groupid')->nullable();
            $table->integer('class_id')->nullable();
		    $table->integer('course_group_id')->nullable();
		    $table->integer('status')->nullable();
           	$table->string('link', 500)->nullable();
            $table->string('image_url', 256)->nullable();
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
		Schema::drop('mdl_homenew_course_teacher_manager_free');
	}

}
