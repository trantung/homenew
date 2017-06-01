<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableBanners extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('mdl_homenew_banners', function(Blueprint $table) {
            $table->increments('id');
            $table->integer('block_id')->nullable();
            $table->string('image_url', 500)->nullable();
            $table->string('name', 256)->nullable();
            $table->string('description', 500)->nullable();
            $table->string('link_url', 500)->nullable();
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
		Schema::drop('mdl_homenew_banners');
	}

}
