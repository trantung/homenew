<?php

class ClassTableSeeder extends Seeder {

	public function run()
	{
		HomeClass::insert([
			'id' => 12,
			'name'=>'Lớp 12',
			'weight_number' => 1,
			'default' => 1,
			'block_id' => 1
		]);
		HomeClass::insert([
			'id' => 11,
			'name'=>'Lớp 11',
			'weight_number' => 2,
			'default' => 2,
			'block_id' => 1
		]);
		HomeClass::insert([
			'id' => 10,
			'name'=>'Lớp 10',
			'weight_number' => 3,
			'default' => 2,
			'block_id' => 1
		]);
		HomeClass::insert([
			'id' => 9,
			'name'=>'Lớp 9',
			'weight_number' => 1,
			'default' => 1,
			'block_id' => 2
		]);
		HomeClass::insert([
			'id' => 8,
			'name'=>'Lớp 8',
			'weight_number' => 2,
			'default' => 2,
			'block_id' => 2
		]);
		HomeClass::insert([
			'id' => 7,
						'name'=>'Lớp 7',
			'weight_number' => 3,
			'default' => 2,
			'block_id' => 2
		]);
		HomeClass::insert([
			'id' => 6,
						'name'=>'Lớp 6',
			'weight_number' => 4,
			'default' => 2,
			'block_id' => 2
		]);
		HomeClass::insert([
			'id' => 5,
			'name'=>'Lớp 5',
			'weight_number' => 1,
			'default' => 1,
			'block_id' => 3
		]);
		HomeClass::insert([
			'id' => 4,
			'name'=>'Lớp 4',
			'weight_number' => 2,
			'default' => 2,
			'block_id' => 3
		]);
		HomeClass::insert([
			'id' => 3,
			'name'=>'Lớp 3',
			'weight_number' => 3,
			'default' => 2,
			'block_id' => 3
		]);
		HomeClass::insert([
			'id' => 2,
			'name'=>'Lớp 2',
			'weight_number' => 4,
			'default' => 2,
			'block_id' => 3
		]);
		HomeClass::insert([
			'id' => 1,
			'name'=>'Lớp 1',
			'weight_number' => 5,
			'default' => 2,
			'block_id' => 3
		]);


	}

}