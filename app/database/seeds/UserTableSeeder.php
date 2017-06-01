<?php

class UserTableSeeder extends Seeder {

	public function run()
	{
		User::create([
					'email'=>'trantunghn196@gmail.com',
					'password'=>Hash::make('123456'),
					'username' => 'trantung',
					'phone' => '0984473489',
					'avatar' => 'a1.jpg',
					'status'=>'1',
					'type'=>'1',
					'lat'=>'21.00296184',
					'long'=>'105.85202157',
			]);
	}

}