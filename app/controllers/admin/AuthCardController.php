<?php

class AuthCardController extends \BaseController {


	public function postLogin()
	{
		$data = Input::all();
		$input = ['code' => $data['username'], 'password' => $data['password']];
		$response = [];
		if (Auth::card()->attempt($input))
		{
			$response['status'] = true;
		} else {
			$response['status'] = false;
		}
		return Response::json($response);
	}

	public function postConfirm()
	{
		$now = time();
		$data = Input::all();
		$card = Card::where('code', $data['username'])->first();
		if ($card->active == 0) {
		    //clone user
			$user = User::create([
				'username' => $data['username'], 
				'email' => $data['username'] . '@hocmai.vn',
				'password' => hash_internal_user_password($data['password']),
				'confirmed' => 1,
				'phone2' => $data['phone']
			]);
			if ($user) {
				//active card + set userid in card
				$card->update([
					'user_id' => $user->id, 
					'active' => ACTIVE,
					'time_active' => $now,
					'phone' => $user->phone2
				]);
				$user = DB::table('mdl_user')->select('mdl_user.*')->where('mdl_user.id', $user->id)->first();
				$response['status'] = true;
				$response['data'] = $user;
			}
		} else {
			$response['status'] = false;
		}
		return Response::json($response);
	}

}
