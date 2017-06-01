<?php

class BlockTableSeeder extends Seeder {

	public function run()
	{
		Blocks::create([
			'name'=>'Trung học phổ thông',
			'weight_number' => 1,
			'status' => 1,
		]);
		Blocks::create([
			'name'=>'Trung học cơ sở',
			'weight_number' => 2,
			'status' => 1,
		]);
		Blocks::create([
			'name'=>'Khối <br/>tiểu học',
			'weight_number' => 3,
			'status' => 1,
		]);

	}

}