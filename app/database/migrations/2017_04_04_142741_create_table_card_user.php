<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableCardUser extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('mdl_card_user', function(Blueprint $table) {
			$table->increments('id');
            $table->string('code')->nullable();
            $table->string('password');
            $table->integer('user_id');
            $table->tinyInteger('active');
            $table->integer('time_active');
            $table->integer('trial_day');
            $table->integer('sell')->default(0);
            $table->string('phone')->nullable();
            $table->tinyInteger('free_learn_expire')->default(0);
            $table->integer('created_by')->index();
			$table->integer('updated_by')->index();
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
		Schema::drop('mdl_card_user');
	}

}
