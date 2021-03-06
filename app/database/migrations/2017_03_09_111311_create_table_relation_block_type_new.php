<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableRelationBlockTypeNew extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('mdl_homenew_block_type_new', function(Blueprint $table) {
            $table->increments('id');
            $table->integer('block_id')->nullable();
            $table->integer('type_new_id')->nullable();
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
		Schema::drop('mdl_homenew_block_type_new');
	}

}
