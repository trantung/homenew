<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableCardAdmin extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('mdl_card_admin', function(Blueprint $table) {
			$table->increments('id');
            $table->string('username');
            $table->string('password');
            $table->integer('role_id');
            $table->integer('remember_token');
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
		Schema::drop('mdl_card_admin');
	}

}
