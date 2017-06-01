<?php

class MenuController extends AdminController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		// dd($permissionBlock);
		$input = Input::except('page');
		$input = CommonAdmin::processDataFilter($input);
		$permissionBlock = checkPermissionBlock();
		$arrIdAllowed = array_keys(getMenuByBlock());
		$data = new Menus();
		if (checkPermissionBlock() != SUPER_ADMIN) {
			$data = $data->whereIn('id', $arrIdAllowed)->orWhere('block_id', checkPermissionBlock());
		}
		$data = $data->where($input)->with('pupilClass')->orderBy('id', 'desc')->get();
		// dd($data->toArray());
		if ($permissionBlock != 0) {
			return View::make('admin.menus.index')->with(compact('data', 'permissionBlock'));
		}
		return View::make('admin.menus.index')->with(compact('data'));
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('admin.menus.create');
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
		$inputAll = Input::except('_token');
		$input = Input::except('_token', 'class');
		$validator = Validator::make($input,$rules);
		if($validator->fails()) {
			return Redirect::action('MenuController@create')
	            ->withErrors($validator);
        } else {
			$input['status'] = ACTIVE;
			$menuId = CommonNormal::create($input);
			// Common::attachRelation('Menus', $menuId, 'pupilClass', $inputAll, 'class_id');
			if (isset($inputAll['class'])) {
				foreach ($inputAll['class'] as $key => $value) {
					if (isset($value['class_id'])) {
						Common::attachRelation('Menus', $menuId, 'pupilClass', $value, 'class_id', WEIGHT_NUMBER);
					}
					
				}
			}
			return Redirect::action('MenuController@index') ;
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
		$data = Menus::find($id);
		return View::make('admin.menus.edit')->with(compact('data'));
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
			'name'   => 'required'
		);
		$inputAll = Input::except('_token');
		$input = Input::except('_token', 'class_id');
		$validator = Validator::make($input,$rules);
		if($validator->fails()) {
			return Redirect::action('MenuController@edit', $id)
	            ->withErrors($validator);
        } else {
			CommonNormal::update($id,$input);
			Common::deleteRecordRelation('MenuClass', 'menu_id', $id);
			if (isset($inputAll['class'])) {
				Common::syncRelationParams('MenuClass', ['menu_id' => $id], $inputAll['class'], 'class_id');
        	}
			// Common::syncRelation('Menus', $id, 'pupilClass', $inputAll, 'class_id');
			return Redirect::action('MenuController@index') ;
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
		Common::detachRelation('Menus', $id, 'pupilClass');
		CommonNormal::delete($id);
		return Redirect::action('MenuController@index');
	}


}
