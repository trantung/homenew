<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableLinkUrls extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('mdl_homenew_link_urls', function(Blueprint $table) {
            $table->increments('id');
            $table->integer('block_id')->nullable();
            $table->string('name', 256)->nullable();
            $table->string('logo', 500)->nullable();
            $table->string('logo_hover', 500)->nullable();
            $table->integer('weight_number')->nullable();
            $table->string('link', 500)->nullable();
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
		Schema::drop('mdl_homenew_link_urls');
	}

}
