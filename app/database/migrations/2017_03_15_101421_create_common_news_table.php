<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCommonNewsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('mdl_homenew_common_news', function(Blueprint $table) {
            $table->increments('id');
            $table->string('model_name', 256)->nullable();
            $table->integer('model_id')->nullable();
            $table->string('model_relation_name', 256)->nullable();
            $table->integer('model_relation_id')->nullable();
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
		Schema::drop('mdl_homenew_common_news');
	}

}
