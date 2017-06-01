<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableRelationNewTypeNew extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('mdl_homenew_relation_new_type', function(Blueprint $table) {
            $table->increments('id');
            $table->integer('new_id')->nullable();
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
		Schema::drop('mdl_homenew_relation_new_type');
	}

}
