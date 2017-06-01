<?php

class AdminBlockController extends AdminController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$data = Blocks::where('status', ACTIVE)->orderBy('id', 'desc')->get();
		return View::make('admin.block.index')->with(compact('data'));
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('admin.block.create');
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$rules = array(
			'name'   => 'required'
		);
		$input = Input::except('_token');
		$validator = Validator::make($input,$rules);
		if($validator->fails()) {
			return Redirect::action('AdminBlockController@create')
	            ->withErrors($validator)
	            ->withInput(Input::except('password'));
        } else {
			$input['logo'] = Common::uploadImage(IMAGEBLOCK, 'logo');
			$input['status'] = ACTIVE;
			CommonNormal::create($input);
			return Redirect::action('AdminBlockController@index') ;
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
		$data = Blocks::find($id);		
		return View::make('admin.block.edit')->with(compact('data'));
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$data = Blocks::find($id);
		$rules = array(
			'name'   => 'required'
		);
		$input = Input::except('_token');
		$validator = Validator::make($input,$rules);
		if($validator->fails()) {
			return Redirect::action('AdminBlockController@edit', $id)
	            ->withErrors($validator)
	            ->withInput(Input::except('password'));
        } else {
        	$input['logo'] = Common::uploadImage(IMAGEBLOCK, 'logo', $data->logo);
			CommonNormal::update($id,$input);
			return Redirect::action('AdminBlockController@index') ;
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
		return Redirect::action('AdminBlockController@index');
	}


}
