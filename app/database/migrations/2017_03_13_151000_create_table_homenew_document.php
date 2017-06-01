<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableHomenewDocument extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('mdl_homenew_documents', function(Blueprint $table) {
            $table->increments('id');
            $table->string('name', 256)->nullable();
            $table->text('description')->nullable();
            $table->integer('weight_number')->nullable();
            $table->string('link_url', 500)->nullable();
            $table->string('image_url', 256)->nullable();
            $table->string('files', 256)->nullable();
            $table->integer('status')->nullable();
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
		Schema::drop('mdl_homenew_documents');
	}

}
