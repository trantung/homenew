<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableHomenewRelationTeacherDocument extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('mdl_homenew_relation_document_teacher', function(Blueprint $table) {
            $table->increments('id');
            $table->integer('teacher_id')->nullable();
            $table->integer('document_id')->nullable();
        });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('mdl_homenew_relation_document_teacher');
	}

}
