<?php

class CardAdminSeeder extends Seeder {

	public function run()
	{
		DB::table('mdl_card_admin')->delete();
		CardAdmin::create([
					'username' => 'tungtt2@hocmai.vn',
					'password'=> '123456',
					'role_id' => '1',
			]);
	}

}
