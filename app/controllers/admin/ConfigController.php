<?php

class ConfigController extends AdminController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$data = HomeConfig::orderBy('id', 'desc')->paginate(PAGINATE);
		return View::make('admin.config.index')->with(compact('data'));
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('admin.config.create');
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$rules = array(
			'key'   => 'required',
			'value'   => 'required',
			'weight_number' => 'numeric',
		);
		$input = Input::except('_token');
		$validator = Validator::make($input,$rules);
		if($validator->fails()){
			return Redirect::action('ConfigController@create')
	            ->withErrors($validator);
        } else {
			$input['status'] = ACTIVE;
			CommonNormal::create($input);
			return Redirect::action('ConfigController@index') ;
		}
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
		$data = HomeConfig::find($id);
		return View::make('admin.config.edit')->with(compact('data'));
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$rules = array(
			'key'   => 'required',
			'value'   => 'required',
			'weight_number' => 'numeric',
		);
		$input = Input::except('_token');
		$validator = Validator::make($input,$rules);
		if($validator->fails()) {
			return Redirect::action('ConfigController@edit', $id)
	            ->withErrors($validator);
        } else {
			CommonNormal::update($id, $input);
			return Redirect::action('ConfigController@index') ;
		}
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
		return Redirect::action('ConfigController@index');
	}
}
