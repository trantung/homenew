<?php

class CardAdminController extends \BaseController {

	public function __construct() {
        $this->beforeFilter('card', array('except'=>array('login','doLogin')));
        global $CFG;
		global $USER;
		$this->cfg = $CFG;
		$this->user = $USER;
    }

	public function index()
	{
		if (CardAdmin::isAdmin()) {
			$data = CardAdmin::orderBy('id', 'desc')->paginate(PAGINATE);
			return View::make('admin.card-user.index')->with(compact('data'));
		}
		return Redirect::action('CardController@index');
		
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('admin.card-user.create');
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$inputAll = Input::except('_token');
		$rules = array(
			'username'   => 'required|unique:mdl_card_admin',
			'password' => 'required|min:6|confirmed',
        	'password_confirmation' => 'required|min:6',
		);
		$validator = Validator::make($inputAll,$rules);
		if($validator->fails()) {
			return Redirect::action('CardAdminController@create')
	            ->withErrors($validator);
        } else {
        	CommonNormal::create($inputAll);
        }
		return Redirect::action('CardAdminController@index') ;
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$data = CardAdmin::find($id);
		return View::make('admin.card-user.edit')->with(compact('data'));
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		if (Input::get('password') != '') {
			$inputAll = Input::except('_token', '_method');
			$rules = array(
				'username'   => 'required|unique:mdl_card_admin,username,'.$id,
				'password' => 'required|min:6|confirmed',
    			'password_confirmation' => 'required|min:6',
			);
		} else {
			$inputAll = Input::except('_token', 'password', '_method');
			$rules = array(
				'username'   => 'required|unique:mdl_card_admin,username,'.$id,
			);
		}
		$validator = Validator::make($inputAll,$rules);
		if($validator->fails()) {
			return Redirect::action('CardAdminController@edit', $id)
	            ->withErrors($validator)
	            ->withInput(Input::except('password'));
        } else {
        	CommonNormal::update($id,$inputAll);
        }
		return Redirect::action('CardAdminController@index') ;
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		CommonNormal::delete($id);
		return Redirect::action('CardAdminController@index');
	}

	public function login()
    {
    	return '<b>abc</b>';
      //   $checkLogin = Auth::member()->check();
      //   if($checkLogin) {
      //   	// print(View::make('admin.layout.login')->with(compact('message','chưa kich hoat')));
	    	// return View::make('admin.layout.login')->with(compact('message','chưa kich hoat'));
      //   } else {
      //   	// print(View::make('admin.layout.login'));
      //       return View::make('admin.layout.login');
      //   }
        // exit;
    }
    public function doLogin()
    {
        $rules = array(
            'username'   => 'required',
            'password'   => 'required',
        );
        $input = Input::all();
        $validator = Validator::make($input, $rules);
        if ($validator->fails()) {
            return Redirect::route('admin.layout.login')
                ->withErrors($validator)
                ->withInput(Input::except('password'));
        } else {
        	$input = ['username' => $input['username'], 'password' => $input['password']];
            $checkLogin = Auth::member()->attempt($input);
            if($checkLogin) {
                return Redirect::action('CardAdminController@index');
            } else {
                return Redirect::route('admin.layout.login');
            }
        }
    }
    public function logout()
    {
        Auth::member()->logout();
        Session::flush();
        return Redirect::route('admin.layout.login');
    }


}
