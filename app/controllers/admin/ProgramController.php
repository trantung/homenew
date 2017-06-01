<?php

class ProgramController extends AdminController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$arrClass = getListClassByBlock(checkPermissionBlock());
		$listMenu = MenuClass::whereIn('class_id', $arrClass)->lists('menu_id');
		$data = Program::whereIn('menu_id', $listMenu)->orderBy('id', 'desc')->paginate(PAGINATE);
		return View::make('admin.program.index')->with(compact('data'));
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('admin.program.create');
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{

		$rules = array(
			'menu_id'   => 'required'
		);
		$inputAll = Input::except('_token');
		$validator = Validator::make($inputAll,$rules);
		if($validator->fails()) {
			return Redirect::action('ProgramController@create')
	            ->withErrors($validator);
        } else {
			CommonNormal::create($inputAll);
			return Redirect::action('ProgramController@index') ;
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
		$data = Program::find($id);
		return View::make('admin.program.edit')->with(compact('data'));
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
			'menu_id'   => 'required'
		);
		$inputAll = Input::except('_token');
		$validator = Validator::make($inputAll,$rules);
		if($validator->fails()) {
			return Redirect::action('ProgramController@edit', $id)
	            ->withErrors($validator);
        } else {
			CommonNormal::update($id,$inputAll);
			return Redirect::action('ProgramController@index') ;
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
		return Redirect::action('ProgramController@index');
	}


}
