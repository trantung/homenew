<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFieldIntoBannerTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('mdl_homenew_banners', function(Blueprint $table) {
			$table->string('image_url_mobile');
			$table->integer('model_id');
            $table->string('model_name');
			$table->string('time_start', 256)->nullable();
            $table->string('time_end', 256)->nullable();
            $table->string('expire_time', 256)->nullable();
            $table->string('position', 256)->nullable();
        });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		//
	}

}
